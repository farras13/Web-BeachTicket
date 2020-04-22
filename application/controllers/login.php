<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model', 'auth');
		$this->load->model('admin_model');
	}

	public function index()
	{
		$a = $this->session->userdata('user_login');
		if ($a != null) {
			if ($a['level'] == 1) {
				redirect('Admin','refresh');
			}else if ($a['level'] == 0) {
				echo "<script>history.go(-1);</script>";
				// redirect('home','refresh');
			}
		}else{
			
			$this->load->view('login');
		}
	}

	public function Regis()
	{
		$data['ngr'] = $this->admin_model->getNegara()->result_array();
		$this->load->view('register',$data);	
	}

	public function proses_regis()
	{
		$email=$this->input->post('email');
		$pass=$this->input->post('pass');
		$user=$this->input->post('nama');
		$usernm=$this->input->post('username');
		$ng=$this->input->post('id');

		$check = $this->auth->checkemail($email);
		if ($email != $check->row()->email) {
			
			$insert = array(
				'username' => $usernm,
				'nama' => $user,
				'id_negara' => $ng,
				'email' => $email,
				'password' => $pass,
			);

			$exc = $this->auth->regis($insert);

			if ($exc >= 1) {
				$this->session->set_flashdata('flash-data', 'Alhamdulillah Berhasil Sign Up');
				redirect('Login');
			} else {
				$this->session->set_flashdata('flash-data', 'Maaf Anda Kurang Beruntung, Please Try Again');
				redirect('Login/regis');
			}

		} else {
			$this->session->set_flashdata('flash-data', 'Email telah digunakan');
			redirect('Login/regis');
		}
	}

	public function Check()
	{
		
		$user 		= $this->input->post('email');
		$pass 		= $this->input->post('pass');
		$password  	= $pass;
		$check 		= $this->auth->login($user, $password);

		if ($check->row() != null) {

			$userdata = array('id_negara' => $check->row()->id_negara, 'nama' => $check->row()->nama, 'username' => $check->row()->username, 'email' => $check->row()->email, 'id_auth' => $check->row()->id_auth, 'level' => $check->row()->level) ;
			$this->session->set_userdata('user_login', $userdata);
			$datauser = $this->session->userdata('user_login');
			
			if ($datauser['level'] == 0) {
				echo "<script>history.go(-1);</script>";
			}elseif ($datauser['level'] == 1) {
				redirect('Admin','refresh');
			}


		}else{
			$this->session->set_flashdata('flash-data', 'email or Pass masih salah bre');
			redirect('Login');
		}
	}

	public function Logout()
	{
		$this->session->sess_destroy();
		redirect('home');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */