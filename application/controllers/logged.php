<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Logged extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('login_model', 'login', true);
    }
    
    function index() {
        $session = $this->login->logged();
        
        $level = $session->level;
        if ($level == 'admin') {
            redirect('admin');
        } else {
            redirect('peserta');
        }
    }
    
}

/* End of file logged.php */
/* Location: ./application/controllers/logged.php */