<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		date_default_timezone_set('Asia/jakarta');
		$this->load->model('admin_model', 'admin');
		$this->load->model('vacation');
		$this->load->model('auth_model');
		$this->load->helper('ckeditor');
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');

		$a = $this->session->userdata('user_login');
		$lvl = $a['level'];
		if ($lvl != 1) {
			redirect('home', 'refresh');
		}
	}

	public function index()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['vc'] = $this->vacation->getAll()->result();
		$data['graph'] = $this->vacation->getCount()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer_admin',$data);
	}

	public function Country()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['ngr'] = $this->admin->getNegara()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/negara', $data);
		$this->load->view('template/footer_admin');
	}

	public function Country_add()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/add_country', $data);
		$this->load->view('template/footer_admin');
	}

	public function Country_edt($id)
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['ngr'] = $this->admin->getNegaraId($id)->row();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/edt_country', $data);
		$this->load->view('template/footer_admin');
	}

	public function add_country()
	{
		$arr = array('negara' => $this->input->post('negara'));
		$this->admin->add('negara', $arr);
		$this->session->set_flashdata('flash-data', 'Muantaaap Negara Baru Hadir !');
		redirect('Admin/Country', 'refresh');
	}

	public function edt_country()
	{
		$arr = array('negara' => $this->input->post('negara'));
		$id = array('id_negara' => $this->input->post('id'));
		$this->admin->edit('negara', $arr, $id);
		$this->session->set_flashdata('flash-data', 'Muantaaap Edit mu berhasil Bos !');
		redirect('Admin/Country', 'refresh');
	}

	public function del_country($id)
	{
		$this->admin->del('id_negara', $id, 'negara');
		$this->session->set_flashdata('flash-data', 'Yup terhapus, jangan menyesal yaa !');
		redirect('Admin/Country', 'refresh');
	}
	public function User()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['usr'] = $this->admin->getUser()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/user', $data);
		$this->load->view('template/footer_admin');
	}
	public function user_add()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['ngr'] = $this->admin->getNegara()->result_array();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/add_user', $data);
		$this->load->view('template/footer_admin');
	}

	public function user_edt($id)
	{

		$data['ngr'] = $this->admin->getNegara($id)->result();
		$data['ud'] = $this->session->userdata('user_login');
		$data['usr'] = $this->admin->getUserId($id)->row();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/edit_user', $data);
		$this->load->view('template/footer_admin');
	}
	public function add_user()
	{
		$arr = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('pass'),
			'nama' => $this->input->post('nama'),
			'id_negara' => $this->input->post('id'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level')
		);
		$this->admin->add('auth', $arr);
		$this->session->set_flashdata('flash-data', 'Muantaaap User Baru Hadir !');
		redirect('Admin/User', 'refresh');
	}

	public function edt_user()
	{
		$arr = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('pass'),
			'nama' => $this->input->post('nama'),
			'id_negara' => $this->input->post('id'),
			'email' => $this->input->post('email'),
			'level' => $this->input->post('level')
		);
		$id = array('id_auth' => $this->input->post('id_usr'));
		$this->admin->edit('auth', $arr, $id);
		$this->session->set_flashdata('flash-data', 'Muantaaap Edit mu berhasil Bos !');
		redirect('Admin/User', 'refresh');
	}
	public function del_user($id)
	{
		$this->admin->del('id_auth', $id, 'auth');
		$this->session->set_flashdata('flash-data', 'Yup terhapus, jangan menyesal yaa !');
		redirect('Admin/user', 'refresh');
	}

	public function vacation()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['vc'] = $this->vacation->getAll()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/vacation', $data);
		$this->load->view('template/footer_admin');
	}

	public function vacation_add()
	{
		$data['ud'] = $this->session->userdata('user_login');

		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/add_vacation', $data);
		$this->load->view('template/footer_admin');
	}

	public function vacation_edt($id)
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['v'] = $this->vacation->getbyId($id)->row();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/edit_vacation', $data);
		$this->load->view('template/footer_admin');
	}

	public function add_vacation()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';



		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			$error = array('error' => $this->upload->display_errors());
			var_dump($error);
		} else {
			$upload_data = $this->upload->data();
			$arr = array(
				'nama_vacation' => $this->input->post('vacation'),
				'konten_vacation' => $this->input->post('editor'),
				'gambar_vacation' => $upload_data['file_name'],
				'harga' => $this->input->post('harga'),
				'lat' => $this->input->post('lat'),
				'lang' => $this->input->post('lang')
			);
			$this->admin->add('vacation', $arr);
			$this->session->set_flashdata('flash-data', 'Muantaaap User Baru Hadir !');
			redirect('Admin/vacation', 'refresh');
		}
	}

	public function edt_vacation()
	{
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'gif|jpg|png';



		$this->upload->initialize($config);

		if (!$this->upload->do_upload('gambar')) {
			$arr = array(
				'nama_vacation' => $this->input->post('vacation'),
				'konten_vacation' => $this->input->post('editor'),
				'harga' => $this->input->post('harga'),
				'lat' => $this->input->post('lat'),
				'lang' => $this->input->post('lang')
			);
			$id = array('id_vacation' => $this->input->post('id_vct'));
			$this->admin->edit('vacation', $arr, $id);
			$this->session->set_flashdata('flash-data', 'Muantaaap Edit mu berhasil Bos !');
			redirect('Admin/vacation', 'refresh');
		} else {
			$upload_data = $this->upload->data();
			$arr = array(
				'nama_vacation' => $this->input->post('vacation'),
				'konten_vacation' => $this->input->post('editor'),
				'gambar_vacation' => $upload_data['file_name'],
				'harga' => $this->input->post('harga'),
				'lat' => $this->input->post('lat'),
				'lang' => $this->input->post('lang')
			);
			$id = array('id_vacation' => $this->input->post('id_vct'));
			$this->admin->edit('vacation', $arr, $id);
			$this->session->set_flashdata('flash-data', 'Muantaaap Edit mu berhasil Bos !');
			redirect('Admin/vacation', 'refresh');
		}
	}

	public function del_vacation($id)
	{
		$this->admin->del('id_vacation', $id, 'vacation');
		$this->session->set_flashdata('flash-data', 'Yup terhapus, jangan menyesal yaa !');
		redirect('Admin/vacation', 'refresh');
	}

	public function Booking()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['bk'] = $this->admin->getBooking()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/booking', $data);
		$this->load->view('template/footer_admin');
	}

	public function Booking_add()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['v'] = $this->vacation->getAll()->result();
		$this->load->view('template/header_admin', $data);
		$this->load->view('admin/add_booking', $data);
		$this->load->view('template/footer_admin');
	}

	public function add_booking()
	{
		$id = $this->session->userdata('user_login');
		$id_user = $id['id_auth'];
		$id_vct = $this->input->post('id_vct');
		$qty =  $this->input->post('qty');
		$tgl = $this->input->post('tanggal');
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

		$image_name = $r . $id_vct . $id_user . '.png';
		$params['data'] = $id_user . $id_vct . $qty . $tth . $tgl; //data yang akan di jadikan QR CODE
		$params['level'] = 'H'; //H=High
		$params['size'] = 10;
		$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
		$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE 

		$arr = array(
			'id_auth' => $id_user,
			'id_vacation' => $id_vct,
			'totalharga' => $tth,
			'tanggal_booking' => date("Y-m-d H:i:s"),
			'jumlah' => $qty,
			'no_debit' => $this->input->post('norek'),
			'qr_code' => $image_name
		);

		$this->transak->add('booking', $arr);
		$this->session->set_flashdata('flash-data', 'Muantaaap Pesanan Baru Hadir !');
		$this->barcode($image_name);
		$this->session->set_flashdata('flash-data', 'Muantaaap Pesanan Baru Hadir !');
		redirect('Admin/Booking', 'refresh');
	}
	public function barcode($image_name)
	{
		$data['userdata'] = $this->session->userdata('user_login');
		$data['image_name'] = $image_name;
		$this->load->view('template/header', $data);
		$this->load->view('user/barcode', $image_name);
		$this->load->view('template/footer');
	}
	public function del_booking($id)
	{
		$this->admin->del('id_booking', $id, 'booking');
		$this->session->set_flashdata('flash-data', 'Yup terhapus, jangan menyesal yaa !');
		redirect('Admin/Booking', 'refresh');
	}
	public function get_data()
	{
		$kode = $this->input->post('id_vacation');
		$data = $this->admin->get_data_barang_bykode($kode);
		echo json_encode($data);
	}
	public function report()
	{
		$data['ud'] = $this->session->userdata('user_login');
		$data['vc'] = $this->vacation->getAll()->result();
		

		$id = $this->input->post('id');
		$dt = $this->input->post('datef');
		$dt2 = $this->input->post('datet');
		if (empty($id) && empty($dt) && empty($dt2)) {
			$data['graph'] = $this->vacation->getCount()->result();
		}else{
			$data['graph'] = $this->vacation->report($id, $dt, $dt2)->result();
		}
		
		$this->load->view('template/header_admin',$data);
		$this->load->view('admin/report',$data);
		$this->load->view('template/footer_admin',$data);
	}
	// public function checkReport()
	// {
	// 	$id = $this->input->post('id');
	// 	$dt = $this->input->post('datef');
	// 	$dt2 = $this->input->post('datet');
	// 	$data['ud'] = $this->session->userdata('user_login');
	// 	$data['vc'] = $this->vacation->getAll()->result();
	// 	$data['graph'] = $this->vacation->report($id, $dt, $dt2)->result();
	// 	$this->load->view('template/header_admin',$data);
	// 	$this->load->view('admin/report',$data);
	// 	$this->load->view('template/footer_admin',$data);
		
	// }
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */
