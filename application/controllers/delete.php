<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Delete extends CI_Controller {
    
    function __construct() {
        parent::__construct();
    }
    
    function peserta($ID_peserta) {
        $this->db->where('ID_peserta',$this->encryption->decode($ID_peserta));
        $foto = $this->db->get('tb_peserta')->row();
        
        $path = './upload/'.$foto->foto;
        @unlink($path);
        
        $this->db->where('kd_anggota', $foto->kd_anggota);
        $this->db->delete('tb_jawaban');
        
        $this->db->where('username', $foto->kd_anggota);
        $this->db->delete('tb_users');
        
        $this->db->where('ID_peserta', $this->encryption->decode($ID_peserta));
        $this->db->delete('tb_peserta');
        redirect('admin/master/peserta');
    }
    
    function soal($ID_soal) {
        $this->db->where('ID_soal', $this->encryption->decode($ID_soal));
        $audio = $this->db->get('tb_soal')->row();
        
        $path = './upload/'.$audio->audio;
        @unlink($path);

        $this->db->where('ID_soal', $this->encryption->decode($ID_soal));
        $this->db->delete('tb_jawaban');
        
        $this->db->where('ID_soal', $this->encryption->decode($ID_soal));
        $this->db->delete('tb_soal');
        redirect('admin/master/soal');
    }
    
    function klp_ujian($ID_klp_ujian) {
        $this->db->where('ID_klp_ujian', $this->encryption->decode($ID_klp_ujian));
        $this->db->delete('tb_klp_ujian');
        
        redirect('admin/setting/kelompok-ujian');
    }
    
}

/* End of file delete.php */
/* Location: ./application/controllers/delete.php */