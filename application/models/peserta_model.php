<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peserta_model extends CI_Model {
    
    function _save_jawaban() {
        $ID_soal = $this->encryption->decode($this->input->post('ID_soal'));
        $ID_users = $this->session->userdata('is_login');
        $kd_anggota = $this->encryption->decode($this->input->post('kd_anggota'));
        $jawaban = $this->input->post('jawaban');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));
        
        $data = array(
            'ID_users' =>  $ID_users,
            'ID_klp_ujian' => $ID_klp_ujian,
            'ID_soal' => $ID_soal,
            'kd_anggota' => $kd_anggota,
            'jawaban' => $jawaban
        );
        $this->db->insert('tb_jawaban', $data);
        redirect('peserta/ujian');
    }
    
    function _jumlah_soal() {
        $this->db->where('ID_users', $this->session->userdata('is_login'));
        $cek_users = $this->db->get('tb_users')->row();
        
        $this->db->where('kd_anggota', $cek_users->username);
        $cek_peserta = $this->db->get('tb_peserta')->row();
        
        $this->db->where('ID_klp_ujian', $cek_peserta->ID_klp_ujian);
        return $this->db->get('tb_soal');
    }
    
    function _total_jawaban_peserta() {
        $this->db->where('ID_users', $this->session->userdata('is_login'));
        $session = $this->db->get('tb_users')->row();
        
        $this->db->where('kd_anggota', $session->username);
        return $this->db->get('tb_jawaban');
    }
    
    function _save_edit_jawaban() {
        $jawaban = $this->input->post('jawaban');
        
        $data = array(
            'jawaban' => $jawaban
        );
        
        $ID_jawaban = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_jawaban', $ID_jawaban);
        $this->db->update('tb_jawaban', $data);
        redirect('peserta/review/detail/'.$this->uri->segment(4));
    }
    
    function _finish_ujian() {
        $kd_anggota = $this->encryption->decode($this->input->post('kd_anggota'));
        $status_ujian = 'selesai';
        $status_user = '0';
        
        $data = array(
            'status_ujian' => $status_ujian,
            'status_user' => $status_user
        );
        
        $this->db->where('username', $kd_anggota);
        $this->db->update('tb_users', $data);
        redirect('peserta/tampil_skor');
    }
    
    function _save_profile() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->encryption->encode($this->input->post('password'));
        
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password,
        );
        
        $this->db->where('ID_users', $this->session->userdata('is_login'));
        $this->db->update('tb_users', $data);
        redirect('peserta/profile');
    }

    function cekstatuspaket($email) {
       
        return $this->db->get_where('v_status',array('email'=>$email))->row();
    }

    function poinSection($ID_users,$section) {
        $this->db->select('tb_soal.ID_soal,tb_soal.ID_klp_ujian,tb_soal.kategori, tb_soal.jawaban AS kuncijawaban, tb_jawaban.jawaban AS jawabanpeserta');
        $this->db->where('(tb_jawaban.ID_soal = tb_soal.ID_soal)');
        $this->db->where('ID_users', $ID_users);
        $this->db->where('kategori', $section);
        return $this->db->get('tb_jawaban, tb_soal')->result();
        
    }
}

/* End of file peserta_model.php */
/* Location: ./application/models/peserta_model.php */