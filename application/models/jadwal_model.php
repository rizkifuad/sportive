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
	public function updateJadwal($id,$data){
		$this->db->where('id_jadwal', $id);
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

}


/* End of file jadwal_model.php */
/* Location: ./application/models/jadwal_model.php */