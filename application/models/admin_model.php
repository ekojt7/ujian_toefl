<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {
    
    function _save_peserta() {
        $kd_anggota = $this->input->post('kd_anggota');
        $foto = $this->upload->file_name;
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');
        $jekel = $this->input->post('jekel');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nim = $this->input->post('nim');
        $terdaftar = date('Y-m-d H:i:s');
        $password = $this->encryption->encode($kd_anggota);
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));
        
        $this->db->where('email', $email);
        $dup_email = $this->db->get('tb_peserta');
        
        if ($dup_email->num_rows() > 0) {
            $this->session->set_userdata('error_email', $email);
        } else {
            $this->session->unset_userdata('error_email');
            $data = array(
                'ID_klp_ujian' => $ID_klp_ujian,
                'kd_anggota' => $kd_anggota,
                'foto' => $foto,
                'nama' => $nama,
                'email' => $email,
                'telp' => $telp,
                'alamat' => $alamat,
                'jekel' => $jekel,
                'tgl_lahir' => $tgl_lahir,
                'nim' => $nim,
                'terdaftar' => $terdaftar,
            );
            $this->db->insert('tb_peserta', $data);
            
            $data_users = array(
                'foto' => $foto,
                'nama' => $nama,
                'nim' => $nim,
                'email' => $email,
                'username' => $kd_anggota,
                'password' => $password,
                'level' => 'peserta',
                'status_user' => '1'
            );
            $this->db->insert('tb_users', $data_users);
            redirect('admin/master/peserta/'.$this->encryption->encode($ID_klp_ujian));
        }
    }
    
    function _save_edit_peserta() {
        $kd_anggota = $this->input->post('kd_anggota');
        $foto = $this->upload->file_name;
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');
        $jekel = $this->input->post('jekel');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nim = $this->input->post('nim');
        $status = $this->input->post('status');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));
        
        $ID_peserta = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_peserta', $ID_peserta);
        $old_foto = $this->db->get('tb_peserta')->row();
        
        $path = './upload/'.$old_foto->foto;
        @unlink($path);
        
        $data = array(
            'ID_klp_ujian' => $ID_klp_ujian,
            'kd_anggota' => $kd_anggota,
            'foto' => $foto,
            'nama' => $nama,
            'email' => $email,
            'telp' => $telp,
            'alamat' => $alamat,
            'jekel' => $jekel,
            'tgl_lahir' => $tgl_lahir,
            'nim' => $nim,
        );
        
        $this->db->where('username', $kd_anggota);
        $cek_status = $this->db->get('tb_users')->row();
        
        if ($cek_status->status_user == 1) {
            
        } else {
            // delete jawaban sebelumnya
            $this->db->where('kd_anggota', $kd_anggota);
            $this->db->delete('tb_jawaban');
        }
        
        $update_user = array(
            'status_ujian' => 'ujian',
            'status_user' => $status
        );
        
        $this->db->where('username', $kd_anggota);
        $this->db->update('tb_users', $update_user);

        $this->db->where('ID_peserta', $ID_peserta);
        $this->db->update('tb_peserta', $data);
        redirect('admin/master/peserta/'.$this->encryption->encode($ID_klp_ujian));
    }
    
    function _save_edit_peserta2() {
        $kd_anggota = $this->input->post('kd_anggota');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $telp = $this->input->post('telp');
        $alamat = $this->input->post('alamat');
        $jekel = $this->input->post('jekel');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $nim = $this->input->post('nim');
        $status = $this->input->post('status');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));

        
        $data = array(
            'ID_klp_ujian' => $ID_klp_ujian,
            'kd_anggota' => $kd_anggota,
            'nama' => $nama,
            'email' => $email,
            'telp' => $telp,
            'alamat' => $alamat,
            'jekel' => $jekel,
            'tgl_lahir' => $tgl_lahir,
            'nim' => $nim,
        );
        
        $this->db->where('username', $kd_anggota);
        $cek_status = $this->db->get('tb_users')->row();
        
        if ($cek_status->status_user == 1) {
            
        } else {
            // delete jawaban sebelumnya
            $this->db->where('kd_anggota', $kd_anggota);
            $this->db->delete('tb_jawaban');
        }
        
        $update_user = array(
            'status_ujian' => 'ujian',
            'status_user' => $status
        );
        
        $this->db->where('username', $kd_anggota);
        $this->db->update('tb_users', $update_user);
        
        $ID_peserta = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_peserta', $ID_peserta);
        $this->db->update('tb_peserta', $data);
        redirect('admin/master/peserta/'.$this->encryption->encode($ID_klp_ujian));
    }
    
    function _save_soal() {
        $kategori = $this->input->post('kategori');
        $pertanyaan = $this->input->post('pertanyaan');
        $audio = $this->upload->file_name;
        $pil_a = $this->input->post('pil_a');
        $pil_b = $this->input->post('pil_b');
        $pil_c = $this->input->post('pil_c');
        $pil_d = $this->input->post('pil_d');
        $jawaban = $this->input->post('jawaban');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));

        
        $data = array(
            'ID_klp_ujian' => $ID_klp_ujian,
            'kategori' => $kategori,
            'pertanyaan' => $pertanyaan,
            'audio' => $audio,
            'pil_a' => $pil_a,
            'pil_b' => $pil_b,
            'pil_c' => $pil_c,
            'pil_d' => $pil_d,
            'jawaban' => $jawaban
        );
        
        $this->db->insert('tb_soal', $data);
        redirect('admin/master/soal/'.$this->encryption->encode($ID_klp_ujian));
    }
    
    function _save_edit_soal() {
        $kategori = $this->input->post('kategori');
        $pertanyaan = $this->input->post('pertanyaan');
        $audio = $this->upload->file_name;
        $pil_a = $this->input->post('pil_a');
        $pil_b = $this->input->post('pil_b');
        $pil_c = $this->input->post('pil_c');
        $pil_d = $this->input->post('pil_d');
        $jawaban = $this->input->post('jawaban');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));

        $ID_soal = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_soal', $ID_soal);
        $old_audio = $this->db->get('tb_soal')->row();
        
        $path = './upload/'.$old_audio->audio;
        @unlink($path);
        
        $data = array(
            'ID_klp_ujian' => $ID_klp_ujian,
            'kategori' => $kategori,
            'pertanyaan' => $pertanyaan,
            'audio' => $audio,
            'pil_a' => $pil_a,
            'pil_b' => $pil_b,
            'pil_c' => $pil_c,
            'pil_d' => $pil_d,
            'jawaban' => $jawaban
        );
        
        $ID_soal = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_soal', $ID_soal);
        $this->db->update('tb_soal', $data);
        redirect('admin/master/soal/'.$this->encryption->encode($ID_klp_ujian));

    }

    function _save_edit_soal2() {
        $kategori = $this->input->post('kategori');
        $pertanyaan = $this->input->post('pertanyaan');
        $pil_a = $this->input->post('pil_a');
        $pil_b = $this->input->post('pil_b');
        $pil_c = $this->input->post('pil_c');
        $pil_d = $this->input->post('pil_d');
        $jawaban = $this->input->post('jawaban');
        $ID_klp_ujian = $this->encryption->decode($this->input->post('ID_klp_ujian'));
        
        $data = array(
            'ID_klp_ujian' => $ID_klp_ujian,
            'kategori' => $kategori,
            'pertanyaan' => $pertanyaan,
            'pil_a' => $pil_a,
            'pil_b' => $pil_b,
            'pil_c' => $pil_c,
            'pil_d' => $pil_d,
            'jawaban' => $jawaban
        );
        
        $ID_soal = $this->encryption->decode($this->uri->segment(4));
        $this->db->where('ID_soal', $ID_soal);
        $this->db->update('tb_soal', $data);
        redirect('admin/master/soal/'.$this->encryption->encode($ID_klp_ujian));

    }
    
    function _save_setting_peserta() {
        $kd_peserta = strtoupper($this->input->post('kd_peserta'));
        $no_peserta = $this->input->post('no_peserta');
        
        $data = array(
            'kd_peserta' => $kd_peserta,
            'no_peserta' => $no_peserta,
        );
        
        $this->db->where('ID_settings', '1');
        $this->db->update('tb_settings', $data);
        redirect('admin/setting/peserta');
    }
    
    function _save_user() {
        $foto = $this->upload->file_name;
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->encryption->encode($this->input->post('password'));
        
        $data = array(
            'foto' => $foto,
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password,
            'level' => 'admin'
        );
        
        $this->db->insert('tb_users', $data);
        redirect('admin/setting/user');
    }
    
    function _save_edit_user() {
        $foto = $this->upload->file_name;
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->encryption->encode($this->input->post('password'));
        
        $data = array(
            'foto' => $foto,
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password
        );
        
        $this->db->where('ID_users', $this->session->userdata('is_login'));
        $this->db->update('tb_users', $data);
        redirect('admin/setting/edit-user');
    }
    
    function _save_edit_user2() {
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->encryption->encode($this->input->post('password'));
        
        $data = array(
            'nama' => $nama,
            'email' => $email,
            'username' => $username,
            'password' => $password
        );
        
        $this->db->where('ID_users', $this->session->userdata('is_login'));
        $this->db->update('tb_users', $data);
        redirect('admin/setting/edit-user');
    }
    
    function _save_setting_default() {
        $waktu_ujian = $this->input->post('waktu_ujian');
        $point_soal = $this->input->post('point_soal');
        
        $data = array(
            'waktu_ujian' => $waktu_ujian,
            'point_soal' => $point_soal
        );
        
        $this->db->where('ID_settings', '1');
        $this->db->update('tb_settings', $data);
        redirect('admin/setting/default');
    }
    
    function _save_kelompok_ujian() {
        $nm_kelompok = ucfirst($this->input->post('nm_kelompok'));
        $slug = strtolower(url_title($nm_kelompok));
        $status = $this->input->post('status');
       
        
        $data = array(
            'nm_kelompok' => $nm_kelompok,
            'slug_klp' => $slug,
            'status' => $status
        );
        
        $this->db->insert('tb_klp_ujian', $data);
        redirect('admin/setting/kelompok-ujian');
    }
    
    function _save_edit_kelompok_ujian() {
        $ID_kllp_ujian = $this->encryption->decode($this->uri->segment(4));
        $nm_kelompok = ucfirst($this->input->post('nm_kelompok'));
        $slug = strtolower(url_title($nm_kelompok));
        $status = $this->input->post('status');
       
        
        $data = array(
            'nm_kelompok' => $nm_kelompok,
            'slug_klp' => $slug,
            'status' => $status
        );
        
        $this->db->where('ID_klp_ujian', $ID_kllp_ujian);
        $this->db->update('tb_klp_ujian', $data);
        redirect('admin/setting/kelompok-ujian');
    }

    function report() {
        return $this->db->get('view_laporan')->result();
    }

    function cetakkartupeserta() {
            $ID_peserta = $this->uri->segment(4);
            $ID_peserta = 23;
            $this->db->select('*');
            $this->db->from('tb_peserta');
            $this->db->where('ID_peserta', $ID_peserta);

            $query = $this->db->get();

            if ( $query->num_rows() > 0 )
            {
                $row = $query->row_array();
                return $row;
            }
    }

    function cetakkartupeserta2() {
        return $this->db->get('tb_peserta')->result();
    }

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */