<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'login', true);
    }
    
    function index() {
        $validation = array(
            array('field' => 'username', 'rules' => 'required|xss_clean'),
            array('field' => 'password', 'rules' => 'required|xss_clean')
        );
        $this->form_validation->set_rules($validation);
        
        if ($this->form_validation->run() == true) {
            $this->login->sign_in();
        }
        
        $this->load->view('login');
    }
    
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */