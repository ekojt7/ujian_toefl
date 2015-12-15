<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Main extends CI_Controller {
     
    public function __construct(){
        parent::__construct();
         
        $this->load->model('siswa_model');
    }
     
    public function index(){
        $data['siswa'] = $this->siswa_model->view();
        $this->load->view('preview', $data);
    }
     
    public function cetak(){
        ob_start();
        $data['siswa'] = $this->siswa_model->view();
        $this->load->view('print', $data);
        $html = ob_get_contents();
        ob_end_clean();
         
        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('TOEFL_Exam_Report.pdf', 'D');
    }
}