<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('upload');
        $this->load->model('admin_model', 'admin', true);
        $this->load->model('login_model', 'login', true);
    }
    
    function index() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;
            $data['peserta'] = $this->db->get('tb_peserta');
            $data['soal'] = $this->db->get('tb_soal');
            
            $this->template->set('title', 'Dashboard');
            $this->template->load('admin_tmp', 'admin/content/dashboard', $data);
        }
    }
    
    function master($params) {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            if ($params == 'peserta') {
                $this->_peserta();
            } elseif ($params == 'input-peserta') {
                $this->_input_peserta();
            } elseif ($params == 'edit-peserta') {
                $this->_edit_peserta();
            } elseif ($params == 'soal') {
                $this->_soal();
            } elseif ($params == 'input-soal') {
                $this->_input_soal();
            } elseif ($params == 'edit-soal') {
                $this->_edit_soal();
            } else {
                redirect('admin/master/peserta');
            }
        }
    }
    
    function _peserta() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;
            $data['klp_ujian'] = $this->db->get('tb_klp_ujian')->result();
            
            $ID_klp_ujian = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_klp_ujian', $ID_klp_ujian);
            $data['query'] = $this->db->get('tb_peserta')->result();

            $this->template->set('title', 'Examinee');
            $this->template->load('admin_tmp', 'admin/content/peserta', $data);
        }
    }
    
    function _input_peserta() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $validation = array(
                array('field' => 'kd_anggota', 'rules' => 'required|xss_clean'),
                array('field' => 'nama', 'rules' => 'required|xss_clean'),
                array('field' => 'email', 'rules' => 'required|xss_clean|valid_email'),
                array('field' => 'telp', 'rules' => 'required|xss_clean|numeric'),
                array('field' => 'alamat', 'rules' => 'required|xss_clean'),
                array('field' => 'jekel', 'rules' => 'required|xss_clean'),
                array('field' => 'tgl_lahir', 'rules' => 'required|xss_clean'),
                array('field' => 'nim', 'rules' => 'required|xss_clean'),

            );
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");

            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_width' => '0',
                'max_height' => '0',
                'file_name' => url_title($this->input->post('foto'))
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_userdata('error_foto', 'error');
                } else {
                    $this->session->unset_userdata('error_foto');
                    $this->admin->_save_peserta();
                }
            }

            $this->db->where('ID_settings', '1');
            $settings = $this->db->get('tb_settings')->row();

            $limit_peserta = strlen($settings->no_peserta);

            $no_buku_query = "SELECT MAX(CONCAT(LPAD((RIGHT((kd_anggota),$limit_peserta)+1),$limit_peserta,'0'))) AS no_peserta FROM tb_peserta";
            $result = $this->db->query($no_buku_query)->row();

            if ($result->no_peserta == 0) {
                $no_peserta = $settings->no_peserta;
            } else {
                $no_peserta = $result->no_peserta;
            }

            $data['no_peserta'] = $no_peserta;
            $data['kd_peserta'] = $settings->kd_peserta;
            $data['session'] = $session;
            $data['klp_ujian'] = $this->db->get('tb_klp_ujian')->result();

            $this->template->set('title', 'Input Examinees');
            $this->template->load('admin_tmp', 'admin/content/input_peserta', $data);
        }
    }
    
    function _edit_peserta() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $validation = array(
                array('field' => 'kd_anggota', 'rules' => 'required|xss_clean'),
                array('field' => 'nama', 'rules' => 'required|xss_clean'),
                array('field' => 'email', 'rules' => 'required|xss_clean|valid_email'),
                array('field' => 'telp', 'rules' => 'required|xss_clean|numeric'),
                array('field' => 'alamat', 'rules' => 'required|xss_clean'),
                array('field' => 'jekel', 'rules' => 'required|xss_clean'),
                array('field' => 'tgl_lahir', 'rules' => 'required|xss_clean'),
                array('field' => 'nim', 'rules' => 'required|xss_clean'),
                array('field' => 'status', 'rules' => 'xss_clean')
            );
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");

            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_width' => '0',
                'max_height' => '0',
                'file_name' => url_title($this->input->post('foto'))
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $this->admin->_save_edit_peserta2();
                } else {
                    $this->admin->_save_edit_peserta();
                }
            }

            $ID_peserta = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_peserta', $ID_peserta);
            $query = $this->db->get('tb_peserta');

            $dynamic_title = $query->row();
            $data['update'] = $query->row();
            $data['klp_ujian'] = $this->db->get('tb_klp_ujian')->result();

            $this->template->set('title', $dynamic_title->kd_anggota.' | Edit');
            $this->template->load('admin_tmp', 'admin/content/edit_peserta', $data);
        }
    }
    
    function _soal() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $session = $this->login->logged();
            $data['session'] = $session;
            $data['klp_ujian'] = $this->db->get('tb_klp_ujian')->result();
            
            $ID_klp_ujian = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_klp_ujian', $ID_klp_ujian);
            $data['query'] = $this->db->get('tb_soal')->result();

            $this->template->set('title', 'Soal');
            $this->template->load('admin_tmp', 'admin/content/soal', $data);
        }
    }
    
    function _input_soal() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $validation = array(
                array('field' => 'kategori', 'rules' => 'required|xss_clean'),
                array('field' => 'pertanyaan', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_a', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_b', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_c', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_d', 'rules' => 'required|xss_clean'),
                array('field' => 'jawaban', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");

            $config = array(
                'upload_path' => './upload/',
                'allowed_types'=> 'mov|mpeg|mp3|avi',
                'max_size' => '500000',
                'file_name' => url_title($this->input->post('audio')),
                'overwrite' => false,
                'remove_spaces' => TRUE,
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('audio')) {
                    $this->admin->_save_soal();
                } else {
                    
                    $this->admin->_save_soal();
                }
            }


            $this->template->set('title', 'Input Soal');
            $this->template->load('admin_tmp', 'admin/content/input_soal', $data);
        }
    }
    
    function _edit_soal() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $validation = array(
                array('field' => 'kategori', 'rules' => 'required|xss_clean'),
                array('field' => 'pertanyaan', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_a', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_b', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_c', 'rules' => 'required|xss_clean'),
                array('field' => 'pil_d', 'rules' => 'required|xss_clean'),
                array('field' => 'jawaban', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);
            $this->form_validation->set_error_delimiters("<div class='alert alert-danger'>","</div>");

            
            $config = array(
                'upload_path' => './upload/',
                'allowed_types'=> 'mov|mpeg|mp3|avi',
                'max_size' => '500000',
                'file_name' => url_title($this->input->post('audio')),
                'overwrite' => false,
                'remove_spaces' => TRUE,
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('audio')) {
                    $this->admin->_save_edit_soal2();
                } else {
                    
                    $this->admin->_save_edit_soal();
                }
            }

            $ID_soal = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_soal', $ID_soal);
            $query = $this->db->get('tb_soal');

            $dynamic_title = $query->row();
            $data['update'] = $query->row();

            $this->template->set('title', strip_tags(word_limiter($dynamic_title->pertanyaan, 3)).' | Edit');
            $this->template->load('admin_tmp', 'admin/content/edit_soal', $data);
        }
    }
    
    function setting($params) {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            if ($params == 'peserta') {
                $this->_setting_peserta();
            } elseif ($params == 'user') {
                $this->_setting_user();
            } elseif ($params == 'edit-user') {
                $this->_setting_edit_user();
            } elseif ($params == 'default') {
                $this->_setting_default();
            } elseif ($params == 'kelompok-ujian') {
                $this->_setting_kelompok_ujian();
             } elseif ($params == 'kelompok-ujian2') {
                $this->_setting_kelompok_ujian2();
            } elseif ($params == 'aktivasi-paketujian') {
                $this->_setting_aktivasi_paketujian();
            } elseif ($params == 'edit-kelompok-ujian') {
                $this->_setting_edit_klompok_ujian();
            } else {
                redirect('admin/setting/peserta');
            }
        }
    }
    
    function _setting_peserta() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $validation = array(
                array('field' => 'kd_peserta', 'rules' => 'required|xss_clean'),
                array('field' => 'no_peserta', 'rules' => 'required|xss_clean|numeric')
            );
            $this->form_validation->set_rules($validation);

            if ($this->form_validation->run() == true) {
                $this->admin->_save_setting_peserta();
            }

            $data['detail'] = $this->db->get('tb_settings')->row();

            $this->template->set('title', 'Setting Peserta');
            $this->template->load('admin_tmp', 'admin/content/setting_peserta', $data);
        }
    }
    
    function _setting_user() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $validation = array(
                array('field' => 'nama', 'rules' => 'required|xss_clean'),
                array('field' => 'email', 'rules' => 'required|xss_clean|valid_email'),
                array('field' => 'username', 'rules' => 'required|xss_clean'),
                array('field' => 'password', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);

            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_width' => '0',
                'max_height' => '0',
                'file_name' => url_title($this->input->post('foto'))
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_userdata('error_foto', 'error');
                } else {
                    $this->session->unset_userdata('error_foto');
                    $this->admin->_save_user();
                }
            }

            $this->db->where('ID_users !=', $this->session->userdata('is_login'));
            $this->db->where('level !=', 'peserta');
            $data['query'] = $this->db->get('tb_users')->result();

            $this->template->set('title', 'Setting User');
            $this->template->load('admin_tmp', 'admin/content/setting_user', $data);
        }
    }
    
    function _setting_edit_user() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $this->db->where('level !=', 'peserta');
            $this->db->where('ID_users !=', $session->ID_users);
            $data['query'] = $this->db->get('tb_users')->result();

            $validation = array(
                array('field' => 'nama', 'rules' => 'required|xss_clean'),
                array('field' => 'email', 'rules' => 'required|xss_clean|valid_email'),
                array('field' => 'username', 'rules' => 'required|xss_clean'),
                array('field' => 'password', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);

            $config = array(
                'upload_path' => './upload/',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'max_width' => '0',
                'max_height' => '0',
                'file_name' => url_title($this->input->post('foto'))
            );

            if ($this->form_validation->run() == true) {
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('foto')) {
                    $this->admin->_save_edit_user2();
                } else {
                    $this->admin->_save_edit_user();
                }
            }

            $this->template->set('title', 'Setting User');
            $this->template->load('admin_tmp', 'admin/content/setting_user', $data);
        }
    }
    
    function _setting_default() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $validation = array(
                array('field' => 'waktu_ujian', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);

            if ($this->form_validation->run() == true) {
                $this->admin->_save_setting_default();
            }

            $data['session'] = $this->login->logged();

            $this->db->where('ID_settings', '1');
            $data['update'] = $this->db->get('tb_settings')->row();

            $this->template->set('title', 'Setting Waktu Ujian');
            $this->template->load('admin_tmp', 'admin/content/setting_default', $data);
        }
    }
    
    function _setting_kelompok_ujian() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $validation = array(
                array('field' => 'nm_kelompok', 'rules' => 'required|xss_clean'),
                array('field' => 'status', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);
            
            if ($this->form_validation->run() == true) {
                $this->admin->_save_kelompok_ujian();
            }
            
            $data['session'] = $session;
            $data['query'] = $this->db->get('tb_klp_ujian')->result();
            
            $this->template->set('title', 'Setting Kelompok Ujian');
            $this->template->load('admin_tmp', 'admin/content/kelompok_ujian', $data);
        }
    }


    function _setting_edit_klompok_ujian() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $validation = array(
                array('field' => 'nm_kelompok', 'rules' => 'required|xss_clean'),
                array('field' => 'status', 'rules' => 'required|xss_clean')
            );
            $this->form_validation->set_rules($validation);
            
            if ($this->form_validation->run() == true) {
                $this->admin->_save_edit_kelompok_ujian();
            }
            
            $data['session'] = $session;
            $data['query'] = $this->db->get('tb_klp_ujian')->result();
            
            $ID_klp_ujian = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_klp_ujian', $ID_klp_ujian);
            $data['update'] = $this->db->get('tb_klp_ujian')->row();
            
            $this->template->set('title', 'Setting Kelompok Ujian');
            $this->template->load('admin_tmp', 'admin/content/kelompok_ujian', $data);
        }
    }
    
    function view($params) {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            if ($params == 'anggota') {
                $this->_view_anggota();
            } elseif ($params == 'soal') {
                $this->_view_soal();
            } else {
                redirect('admin');
            }
        }
    }
    
    function _view_anggota() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $ID_peserta = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_peserta', $ID_peserta);
            $query = $this->db->get('tb_peserta');

            $dynamic_title = $query->row();
            $data['detail'] = $query->row();

            $this->template->set('title', $dynamic_title->kd_anggota.' | Detail');
            $this->template->load('admin_tmp', 'admin/content/view_peserta', $data);
        }
    }
    
    function _view_soal() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            $data['session'] = $session;

            $ID_soal = $this->encryption->decode($this->uri->segment(4));
            $this->db->where('ID_soal', $ID_soal);
            $query = $this->db->get('tb_soal');

            $dynamic_title = $query->row();
            $data['detail'] = $query->row();

            $this->template->set('title', strip_tags(word_limiter($dynamic_title->pertanyaan, 3)).' | Detail');
            $this->template->load('admin_tmp', 'admin/content/view_soal', $data);
        }
    }
    
    function logout() {
        $this->session->unset_userdata('is_login');
        $this->session->sess_destroy();
        redirect('login');
    }
    
    function transaksi($params) {
        if ($params == 'ujian') {
            $this->_transaksi_ujian();
        } elseif ($params == 'cetak') {
            $this->_transaksi_cetak();
        } else {
            redirect('admin/transaksi/ujian');
        }
    }
    
    function _transaksi_ujian() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
             $data['session'] = $session;
            $data['ujian'] = $this->admin->report();
            //$this->load->view('preview', $data);
            $this->template->set('title', 'TOEFL Report');
            $this->template->load('admin_tmp', 'admin/content/transaksi_ujian', $data);
        }
    }
    
    function _transaksi_cetak() {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            ob_start();
            $data['ujian'] = $this->admin->report();
            $this->load->view('admin/content/cetak_laporan', $data);
            $html = ob_get_contents();
            ob_end_clean();
         
            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('TOEFL_Exam_Report.pdf', 'D');
    
        }
    }

    function cetak_kartu_ujian($id) {
        $session = $this->login->logged();
        if ($session->level != 'admin') {
            redirect('login');
        } else {
            ob_start();
            $data['session'] = $session;

            $this->db->where('ID_peserta',$id);
            $query = $this->db->get('tb_peserta');

            //$dynamic_title = $query->row();
            $data['deco'] = $id;
            $data['deconama'] = $nama;
            $data['detail'] = $query->row();
            
            $this->load->view('admin/content/cetak_kartu_ujian', $data);
            $html = ob_get_contents();
            ob_end_clean();
         
            require_once('./assets/html2pdf/html2pdf.class.php');
            $pdf = new HTML2PDF('P','A4','en');
            $pdf->WriteHTML($html);
            $pdf->Output('KartuUjian.pdf', 'D');
    
        }
    }

     

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */