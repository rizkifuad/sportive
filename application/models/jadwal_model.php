<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jadwal_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * set jadwal untuk hari tertentu
	 */
	public function getJadwal($hari, $id_member){
		$this->db->select("*");
		$this->db->from("jadwal");
		$this->db->where("hari",$hari);
		$this->db->where("id_member",$id_member);

		$query = $this->db->get();
		$result = $query->result();

		return $result[0];
	}


	/**
	 * set jadwal untuk semua hari
	 */
	public function getSemuaJadwal($id_member){
		$this->db->select("*");
		$this->db->from("jadwal");
		$this->db->where("id_member",$id_member);

		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

	}
	/**
	 * Get hari jadwal berdasarkan id member
	 */
	public function getJadwalByHari($hari,$id_member){
		$this->db->select('*');
		$this->db->from('jadwal');
		$this->db->where('hari', $hari);
		$this->db->where('id_member',$id_member);
		$this->db->where('status',1);

		$query = $this->db->get();
		$result = $query->result();

		return $result[0];

	}

	/**
	 * simpan jadwal
	 */

	public function saveJadwal($data){
		$this->db->insert("jadwal",$data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}


	/**
	 * update data jadwal
	 */
	public function updateJadwal($data, $hari, $id_member){
		$this->db->where('id_member', $id_member);
		$this->db->where('hari', $hari);
		$this->db->update('jadwal', $data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}


	/**
	 * hapus jadwal
	 */
	public function hapusJadwal($id,$data){
		$this->db->where('id_jadwal', $id);
		$this->db->delete('jadwal',$data);

		if($this->db->affected_rows() > 0)
		{
			return true;
		}
		else{
			return false;
		}
	}

	public function fixJadwal($id_member){
		$this->db->select("id_jadwal");
		$this->db->from("jadwal");
		$this->db->where("id_member",$id_member);

		$query = $this->db->get();

		if($query->num_rows() == 7){
			
		}else{
			$this->db->where("id_member",$id_member);
			$this->db->delete("jadwal");

			for($i=0;$i<7;$i++){
	        	$jadwal = array();
	        	$jadwal['hari']      = $i;
	        	$jadwal['jam_buka']  = "08:00:00";
	        	$jadwal['jam_tutup ']= "20:00:00";
	        	$jadwal['status']    = 1;
	        	$jadwal['id_member'] = $id_member;
	        	$this->db->insert('jadwal', $jadwal);
	        }
	    }
	}

}


/* End of file jadwal_model.php */
/* Location: ./application/models/jadwal_model.php */