<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {
    
    function sign_in() {
        $username = $this->input->post('password');
        $password = $this->encryption->encode($this->input->post('password'));
        
        $this->db->where('status_user', '1');
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('tb_users');
        $data = $query->row();
        
        if ($query->num_rows() > 0) {
            $this->session->set_userdata('is_login', $data->ID_users);
            redirect('logged');
        } else {
            $this->session->sess_destroy();
            redirect('login');
        }
    }
    
    function logged() {
        $is_login = $this->session->userdata('is_login');
        $this->db->where('ID_users', $is_login);
        return $this->db->get('tb_users')->row();
    }
    
}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */