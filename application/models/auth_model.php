<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {

	public function checkemail($email)
    {
        $this->db->where('email', $email);
        return $this->db->get('auth');
    }

	public function regis($insert)
	{
		return $this->db->insert('auth', $insert);
	}
	
	public function login($user, $password)
	{
		$this->db->where("(email = '$user' OR username = '$user')");
		$this->db->where('password', $password);
        return $this->db->get('auth');
	}
	

}

/* End of file auth_model.php */
/* Location: ./application/models/auth_model.php */