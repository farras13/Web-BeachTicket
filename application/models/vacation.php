<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vacation extends CI_Model {
	
	public function getAll()
	{
		return $this->db->get('vacation');
	}

	public function getbyId($id)
	{
		$this->db->where('id_vacation', $id);
		return $this->db->get('vacation');
	}

    public function getCount()
    {
        // return $this->db->query("SELECT a.id_vacation,COUNT(b.id_vacation) as c FROM booking as b
        //                          JOIN vacation a ON a.id_vacation = b.id_vacation
        //                          GROUP BY a.id_vacation");

        return $this->db->query("SELECT b.id_vacation,SUM(b.jumlah) as c FROM booking as b                         
                          WHERE b.tanggal_booking BETWEEN CURRENT_DATE AND now()
                          GROUP by b.id_vacation
                          ORDER BY id_vacation asc");
    }

    public function getCountW($id)
    {
        return $this->db->query("SELECT b.id_vacation,SUM(b.jumlah) as c FROM booking as b                         
                          WHERE  b.id_vacation = '$id' and b.tanggal_booking BETWEEN CURRENT_DATE AND now()
                          GROUP by b.id_vacation
                          ORDER BY id_vacation asc");
    }

	public function download($id){
  		$query = $this->db->get_where('qr',array('id'=>$id));
  		return $query->row_array();
 	}

 	public function getWithJoin($row,$id,$tabel,$join,$rj)
 	{
 		$this->db->where($row, $id);
 		$this->db->join($join, $rj = $rj);
 		$this->db->order_by('id_booking', 'desc');
 		return $this->db->get($tabel);
 	}
	
	// public function getCount()
	// {
		
	// 	return $this->db->query('SELECT * , COUNT(id_vacation) as asw FROM `booking` GROUP by id_vacation');
	// }

	public function search($nm)
	{
		return $this->db->query("SELECT * FROM `vacation` WHERE nama_vacation LIKE '%$nm%' ");
	}
	

	public function getRows($params = array()){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('id_booking','desc');
        if(array_key_exists('id_booking',$params) && !empty($params['id_booking'])){
            $this->db->where('id_booking',$params['id_booking']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }

    public function getRowsP($params = array()){
        $this->db->select('*');
        $this->db->from('booking');
        $this->db->order_by('id_booking','desc');
        if(array_key_exists('qr_code',$params) && !empty($params['qr_code'])){
            $this->db->where('qr_code',$params['qr_code']);
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->row_array():FALSE;
        }else{
            //set start and limit
            if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit'],$params['start']);
            }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
                $this->db->limit($params['limit']);
            }
            //get records
            $query = $this->db->get();
            $result = ($query->num_rows() > 0)?$query->result_array():FALSE;
        }
        //return fetched data
        return $result;
    }
    public function report($id, $dt, $dt2)
    {
       return $this->db->query("SELECT DATE(b.tanggal_booking) as a,SUM(b.jumlah) as c FROM booking as b                         
        WHERE  b.id_vacation = '$id' and b.tanggal_booking BETWEEN  '$dt' AND '$dt2'
        GROUP by DATE(b.tanggal_booking)
        ORDER BY id_vacation asc");
    }
}

/* End of file vacation.php */
/* Location: ./application/models/vacation.php */