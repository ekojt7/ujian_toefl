<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Peserta extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'login', true);
        $this->load->model('peserta_model', 'peserta', true);
    }
    
    function index() {
        $session = $this->login->logged();
        if ($session->level != 'peserta') {
            redirect('login');
        } else {
            $validaion = array(
                array('field' => 'mulai', 'rules' => 'required')
            );
            $this->form_validation->set_rules($validaion);
            
            if ($this->form_validation->run() == true) {
                redirect('peserta/ujian');
            }
            
            $data['session'] = $session;
            $this->template->set('title', 'Dashboard');
            $this->template->load('peserta_tmp', 'peserta/content/dashboard', $data);
        }
    }

    
    function ujian() {
        $session = $this->login->logged();
        if ($session->level != 'peserta') {
            redirect('login');
        } else {
            $validation = array(
                array('field' => 'ID_soal', 'rules' => 'required|xss_clean'),
                array('field' => 'jawaban', 'rules' => 'required|xss_clean'),
                array('field' => 'kd_anggota', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);
            
            if ($this->form_validation->run() == true) {
                $this->peserta->_save_jawaban();
            }
            
            $this->db->where('kd_anggota', $session->username);
            $cek_ID_klp = $this->db->get('tb_peserta')->row();

           
            
            $sql = "select * from tb_soal where ID_klp_ujian = '$cek_ID_klp->ID_klp_ujian' and ID_soal not in "
                    . "(select ID_soal from tb_jawaban where kd_anggota = '".$session->username."')";
            $data['soal'] = $this->db->query($sql)->row();

            $email = $cek_ID_klp->email;
            $data['cekstatus'] = $this->peserta->cekstatuspaket($email);

            $data['jumlah_soal'] = $this->peserta->_jumlah_soal();
            $data['jawaban_peserta'] = $this->peserta->_total_jawaban_peserta();
            $data['session'] = $session;
            $data['ID_klp_ujian'] = $cek_ID_klp->ID_klp_ujian;
            
            $this->db->where('ID_settings', '1');
            $data['waktu'] = $this->db->get('tb_settings')->row();
            
            $this->template->set('title', 'Proses Ujian');
            $this->template->load('peserta_tmp', 'peserta/content/mulai_ujian', $data);
        }
    }
    
    function review($params = null) {
        $session = $this->login->logged();
        if ($session->level != 'peserta') {
            redirect('login');
        } else {
            if ($params == 'detail') {
                $this->_detail_review();
            } else {
                $this->_review();
            }
        }
    }
    
    function _review() {
        $validation = array(
            array('field' => 'kd_anggota', 'rules' => 'required|xss_clean')
        );
        $this->form_validation->set_rules($validation);
        
        if ($this->form_validation->run() == true) {
            $this->peserta->_finish_ujian();
            //$this->finish();
           
        }
        
        $session = $this->login->logged();
        $data['session'] = $session;
        
        $this->db->select('ID_jawaban, pertanyaan, tb_jawaban.jawaban');
        $this->db->where('(tb_jawaban.ID_soal = tb_soal.ID_soal)');
        $this->db->where('kd_anggota', $session->username);
        $data['query_soal'] = $this->db->get('tb_jawaban, tb_soal')->result();
        
        $this->db->where('ID_settings', '1');
        $data['waktu'] = $this->db->get('tb_settings')->row();
        
        $this->template->set('title', 'Review Jawaban');
        $this->template->load('peserta_tmp', 'peserta/content/review_jawaban', $data);
    }
    
    function _detail_review() {
        $validation = array(
            array('field' => 'jawaban', 'rules' => 'required|xss_clean')
        );
        $this->form_validation->set_rules($validation);
        
        if ($this->form_validation->run() == true) {
            $this->peserta->_save_edit_jawaban();
        }
        
        $data['session'] = $this->login->logged();
        
        $ID_jawaban = $this->encryption->decode($this->uri->segment(4));
        $this->db->select('tb_soal.pertanyaan, pil_a, pil_b, pil_c, pil_d, tb_jawaban.jawaban');
        $this->db->where('(tb_jawaban.ID_soal = tb_soal.ID_soal)');
        $this->db->where('ID_jawaban', $ID_jawaban);
        $data['detail'] = $this->db->get('tb_jawaban, tb_soal')->row();
        
        $this->template->set('title', 'Proses Ujian');
        $this->template->load('peserta_tmp', 'peserta/content/detail_review', $data);
    }
    
    function finish() {
        $session = $this->login->logged();
        $status_ujian = 'selesai';
        $status_user = '0';
        
        $data = array(
            'status_ujian' => $status_ujian,
            'status_user' => $status_user
        );
        
        $this->db->where('ID_users', $session->ID_users);
        $this->db->update('tb_users', $data);
        redirect('peserta/tampil_skor');
        
    }

    function tampil_skor() {
         $data['selesai'] = "Examination Result";
         $ID_users = $this->session->userdata('is_login');
         $data['users'] = $ID_users;

        //$this->db->select('*');
        //$this->db->where('ID_users',$ID_users);
        //$data['query_skor'] = $this->db->get('v_skor')->result();

        $data['poinSection1'] = $this->peserta->poinSection($ID_users,1);
        $data['poinSection2'] = $this->peserta->poinSection($ID_users,2);
        $data['poinSection3'] = $this->peserta->poinSection($ID_users,3);
        
         //$data['skor'] = $this->peserta->tampil_skor($ID_users);
         $this->load->view('peserta/content/selesai_ujian', $data);
         //$this->template->load('peserta_tmp', 'peserta/content/selesai_ujian', $data);
    }
    
    function profile() {
        $validation = array(
            array('field' => 'nama', 'rules' => 'required|xss_clean'),
            array('field' => 'email', 'rules' => 'required|xss_clean|valid_email'),
            array('field' => 'username', 'rules' => 'required|xss_xlean'),
            array('field' => 'password', 'rules' => 'required|xss_clean')
        );
        $this->form_validation->set_rules($validation);
        
        if ($this->form_validation->run() == true) {
            $this->peserta->_save_profile();
        }
        
        $data['session'] = $this->login->logged();
        
        $this->template->set('title', 'Profile');
        $this->template->load('peserta_tmp', 'peserta/content/profile', $data);
    }
    
    function logout() {
        @session_start();
        $this->session->unset_userdata('is_login');
        $this->session->sess_destroy();
        unset($_SESSION['mulai_ujian']);
        redirect('login');
    }
    
}

/* End of file peserta.php */
/* Location: ./application/controllers/peserta.php */