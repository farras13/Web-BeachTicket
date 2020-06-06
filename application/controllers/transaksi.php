<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set('Asia/jakarta');

		$lvl = $this->session->userdata('user_login');
		if ($lvl == null) {
			redirect('login', 'refresh');
		}

		$this->load->model('admin_model', 'transak');
		$this->load->model('vacation');
	}

	public function index()
	{

		$id = $this->session->userdata('user_login');
		$id_user = $id['id_auth'];
		$id_vct = $this->input->post('id_vct');
		$qty =  $this->input->post('qty');
		$tgl = $this->input->post('tanggal');
		$time = strtotime($tgl);
		$newformat = date('Y-m-d', $time);
		var_dump($tgl);
		if ($qty == null) {
			$qty = 1;
		}
		$hrg = $this->input->post('harga');
		$tth = $hrg * $qty;

		$r = rand(100, 999);

		$this->load->library('ciqrcode'); //pemanggilan library QR CODE

		$config['cacheable']    = true; //boolean, the default is true
		$config['cachedir']     = './assets/'; //string, the default is application/cache/
		$config['errorlog']     = './assets/'; //string, the default is application/logs/
		$config['imagedir']     = './assets/uploads/'; //direktori penyimpanan qr code
		$config['quality']      = true; //boolean, the default is true
		$config['size']         = '1024'; //interger, the default is 1024
		$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
		$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
		$this->ciqrcode->initialize($config);

		$image_name = $qty . $r . $id_vct . $id_user . '.png';
		$baba = $qty . $r . $id_vct . $id_user;
		$params['data'] = $id_user . $id_vct . $qty . $tth . $tgl; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE 

		$arr = array(
			'id_auth' => $id_user,
			'id_vacation' => $id_vct,
			'totalharga' => $tth,
			'tanggal_booking' => $newformat,
			'jumlah' => $qty,
			'codeqr' => $baba,
			'no_debit' => $this->input->post('norek'),
			'qr_code' => $image_name
		);

		$this->transak->add('booking', $arr);
		$this->session->set_flashdata('flash-data', 'Muantaaap Pesanan Baru Hadir !');
		$this->barcode($image_name,$baba);
		// $this->download($image_name);
	}

	public function barcode($image_name,$baba)
	{
		$data['userdata'] = $this->session->userdata('user_login');
		$data['image_name'] = $image_name;
		$data['qr'] = $baba;
		$this->load->view('template/header', $data);
		$this->load->view('user/barcode', $image_name);
		$this->load->view('template/footer');
	}

	// public function download(){		
	// 	  $fileInfo = $this->file->getRows(array('id' => $id));
	//            //file path
	//            $file = 'uploads/files/'.$fileInfo['file_name'];
	// 	force_download('./assets/uploads/$a.png',NULL);
	// }	

	public function laporan_pdf()
	{
		$data = array(
			"dataku" => array(
				"nama" => "Petani Kode",
				"url" => "http://petanikode.com"
			)
		);

		$this->load->library('pdf');

		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-petanikode.pdf";
		$this->pdf->load_view('laporan_pdf', $data);
	}

	public function download($id)
	{
		if (!empty($id)) {
			//load download helper
			$this->load->helper('download');

			//get file info from database
			$fileInfo = $this->vacation->getRowsP(array('qr_code' => $id));

			//file path
			$file = 'assets/uploads/' . $fileInfo['qr_code'];

			//download file from directory
			force_download($file, NULL);

			redirect('home/booked', 'refresh');
		}
	}
}

/* End of file transaksi.php */
/* Location: ./application/controllers/transaksi.php */