<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function add($tabel,$object)
	{
		$this->db->insert($tabel, $object);
	}
	public function edit($tabel,$object,$where)
	{
		$this->db->update($tabel, $object , $where);
	}

	public function del($col,$Value,$Table)
	{
		$this->db->where($col, $Value);
		$this->db->delete($Table);
	}

	//negara
	public function getNegara()
	{
		return $this->db->get('negara');
	}
	public function getNegaraId($id)
	{
		$this->db->where('id_negara', $id);
		return $this->db->get('negara');
	}

	//user
	public function getUser()
	{
		$this->db->join('negara', 'negara.id_negara = auth.id_negara', 'left');
		return $this->db->get('auth');	
	}

	public function getUserId($id)
	{
		$this->db->join('negara', 'negara.id_negara = auth.id_negara', 'left');
		$this->db->where('id_auth', $id);
		return $this->db->get('auth');	
	}

	//booking
	public function getBooking()
	{
		$this->db->join('vacation', 'vacation.id_vacation = booking.id_vacation', 'left');
		$this->db->join('auth', 'auth.id_auth = booking.id_auth', 'left');
		return $this->db->get('booking');	
	}
	public function getBookingId($id)
	{
		$this->db->join('vacation', 'vacation.id_vacation = booking.id_vacation', 'left');
		$this->db->join('auth', 'auth.id_auth = booking.id_auth', 'left');
		$this->db->where('id_booking', $id);
		return $this->db->get('booking');	
	}
	function get_data_barang_bykode($kode){
        $hsl=$this->db->query("SELECT * FROM vacation WHERE id_vacation='$kode'");
        if($hsl->num_rows()>0){
            foreach ($hsl->result() as $data) {
                $hasil=array(
                    'id_vacation' => $data->kode,
                    'harga' => $data->harga,
                    );
            }
        }
        return $hasil;
    }
	

}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */