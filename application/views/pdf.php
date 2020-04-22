<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak extends CI_Controller {
 function __construct(){
  parent::__construct();
 }
 public function index(){
  $data = array(
   'record' => $this->db->get('siswa')
  );
  $this->load->view('v_index',$data);
 }
 public function cetak_pdf() {
    // load view yang akan digenerate atau diconvert
    $data = array(
      'record'  => $this->db->query("SELECT * FROM siswa")
    );
    $this->load->view('v_cetak',$data);
    // dapatkan output html
    $html = $this->output->get_output();
    // Load/panggil library dompdfnya
    $this->load->library('dompdf_gen');
    // Convert to PDF
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    //utk menampilkan preview pdf
    $sekarang=date("d:F:Y:h:m:s");
    $this->dompdf->stream("pendaftaran".$sekarang.".pdf",array('Attachment'=>0));
    //atau jika tidak ingin menampilkan (tanpa) preview di halaman browser
    //$this->dompdf->stream("welcome.pdf");
 }
}