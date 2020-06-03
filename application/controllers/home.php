      <?php
	defined('BASEPATH') or exit('No direct script access allowed');

	class Home extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
			$this->load->model('vacation');
			$a = $this->session->userdata('user_login');
		}

		public function index()
		{
			$data['vacation'] = $this->vacation->getAll()->result();
			$peta = $data['vct'] = $this->vacation->getAll()->result();
			$data['count'] = $this->vacation->getCount()->result_array();
			// if (empty($cek)) {
			// 	 = array(
			// 		"id_vacation" => "1",
			// 		"c"	=> "0"
			// 	);
			// }
			$c = $this->vacation->getCount()->result_array();
			$n = 0;
			$this->viewmaps();
			foreach ($peta as $p) {
				if (!empty($c)) :
					if ($c[$n]['id_vacation'] == $p->id_vacation) :
						if ($c[$n]['c'] < 15) :
							$a = $c[$n]['c'];
						elseif ($c[$n]['c'] < 60) :
							$a = $c[$n]['c'];
						else :
							$a = $c[$n]['c'];
						endif;
					else :
						$a = 0;
					endif;
				else :
					$a = 0;
				endif;
				$marker = array();
				$marker['infowindow_content'] = "'<h3> $p->nama_vacation </h3>''<h4>pengunjung : $a</h4>'";
				$marker['position'] = $p->peta;//Posisi marker (itu tuh yang merah2 lancip itu loh :-p)
				$this->googlemaps->add_marker($marker);
			}
			$data['map'] = $this->googlemaps->create_map();
			$data['userdata'] = $this->session->userdata('user_login');
			$this->load->view('template/header', $data);
			$this->load->view('user/main', $data);
			$this->load->view('template/footer');
		}
		public function viewmaps()
		{
			$this->load->library('googlemaps');
			$config['center'] = '-8.436897, 112.641664';//Coordinate tengah peta
			$config['zoom'] = 'auto';
			$this->googlemaps->initialize($config);
		}
		public function detail($id)
		{
			$data['userdata'] = $this->session->userdata('user_login');
			$data['count'] = $this->vacation->getCount($id)->row();
			$data['p'] = $this->vacation->getbyId($id)->row();
			error_reporting(0);
			//maps
			// $this->viewmaps();
			// $peta = $this->vacation->getbyId($id)->row();
			// $c = $this->vacation->getCount($id)->row();
			// var_dump($peta,$c);
			// $n = 0;
			// $this->viewmaps();
			// foreach ($peta as $p) {
			// 	if (!empty($c)) :
			// 		if ($c[$n]['id_vacation'] == $p->id_vacation) :
			// 			if ($c[$n]['c'] < 15) :
			// 				$a = $c[$n]['c'];
			// 			elseif ($c[$n]['c'] < 60) :
			// 				$a = $c[$n]['c'];
			// 			else :
			// 				$a = $c[$n]['c'];
			// 			endif;
			// 		else :
			// 			$a = 0;
			// 		endif;
			// 	else :
			// 		$a = 0;
			// 	endif;
			// 	$marker = array();
			// 	$marker['infowindow_content'] = "'<h3> $p->nama_vacation </h3>''<h4>pengunjung : $a</h4>'";
			// 	$marker['position'] = $p->peta;//Posisi marker (itu tuh yang merah2 lancip itu loh :-p)
			// 	$this->googlemaps->add_marker($marker);
			// }
			//call maps
			// $data['map'] = $this->googlemaps->create_map();
			$this->load->view('template/header', $data);
			$this->load->view('user/detail', $data);
			$this->load->view('template/footer');
		}

		public function Search()
		{
			$nm = $this->input->post('nm_vct');

			$data['userdata'] = $this->session->userdata('user_login');
			$data['vacation'] = $this->vacation->search($nm)->result();

			if ($data['vacation'] == null) {
				$this->load->view('template/header', $data);
				$this->load->view('eror/404', $data);
				$this->load->view('template/footer');
			} else {
				$this->load->view('template/header', $data);
				$this->load->view('user/destination', $data);
				$this->load->view('template/footer');
			}
		}

		public function pesan($id)
		{
			$userdata = $this->session->userdata('user_login');
			if ($userdata == null) {
				redirect('login', 'refresh');
			}
			$data['qty'] = $this->input->post('qty');
			$data['dt'] = $this->input->post('tanggal');
			$data['userdata'] = $this->session->userdata('user_login');
			$data['p'] = $this->vacation->getbyId($id)->row();
			$this->load->view('template/header', $data);
			$this->load->view('user/pesan', $data);
			$this->load->view('template/footer');
		}

		public function detail_pesanan()
		{
			$userdata = $this->session->userdata('user_login');
			if ($userdata == null) {
				redirect('login', 'refresh');
			}

			$id = $this->input->post('id_vct');
			$data['qty'] = $this->input->post('qty');
			$hrg = $this->input->post('hrg');
			$data['dt'] = $this->input->post('tanggal');
			$data['userdata'] = $this->session->userdata('user_login');
			$data['p'] = $this->vacation->getbyId($id)->row();
			$data['ttl'] = number_format($hrg * $data['qty'], 2, ",", ".");
			var_dump($data['qty'], $hrg);
			$this->load->view('template/header', $data);
			$this->load->view('user/detail_pesan', $data);
			$this->load->view('template/footer');
		}

		public function destination()
		{
			$data['userdata'] = $this->session->userdata('user_login');
			$data['vacation'] = $this->vacation->getAll()->result();
			$data['vct'] = $this->vacation->getAll()->result();
			$this->load->view('template/header', $data);
			$this->load->view('user/destination', $data);
			$this->load->view('template/footer');
		}

		public function booked()
		{
			$a = $this->session->userdata('user_login');
			$id = $a['id_auth'];
			$data['userdata'] = $this->session->userdata('user_login');
			$data['vacation'] = $this->vacation->getWithJoin('id_auth', $id, 'booking', 'vacation', 'id_vacation')->result();
			$data['count'] = $this->vacation->getCount()->result();
			$this->load->view('template/header', $data);
			$this->load->view('user/booked', $data);
			$this->load->view('template/footer');
		}

		public function lakukan_download($id)
		{
			if (!empty($id)) {
				//load download helper
				$this->load->helper('download');

				//get file info from database
				$fileInfo = $this->vacation->getRows(array('id_booking' => $id));

				//file path
				$file = 'assets/uploads/' . $fileInfo['qr_code'];

				//download file from directory
				force_download($file, NULL);

				redirect('home/booked', 'refresh');
			}
		}
	}



/* End of file home.php */
/* Location: ./application/controllers/home.php */