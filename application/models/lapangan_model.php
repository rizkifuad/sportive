<?php if ( ! defined("BASEPATH")) exit("No direct script access allowed");

class lapangan_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	/**
	 * GET data lapangan sesuai ID lapangan
	 */
	public function getLapanganById($id){
		$this->db->select("*");
		$this->db->from("lapangan");
		$this->db->where("id_lapangan",$id);

		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->result();
		}

		return false;
	}



	/**
	 * GET semua lapangan sesuai dengan ID member
	 */
	public function getLapanganByMember($id_member){
		$this->db->select("*");
		$this->db->from("lapangan");
		$this->db->where("id_member",$id_member);

		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->result();
		}

		return false;
	}


	/**
	 * simpan data lapangan
	 */
	public function saveLapangan($data){
		$this->db->insert("lapangan", $data);
        $insert_id = $this->db->insert_id();

        return $insert_id;
	}


	/**
	 * update data lapangan
	 */
	public function updateLapangan($data,$id_lapangan){
		$this->db->where("id_lapangan", $id_lapangan);
		$query = $this->db->update("lapangan", $data);
		
		if($query)
			return true;
		return false;
	}


	/**
	 * hapus data lapangan
	 */
	public function deleteLapangan($id_lapangan){
		$query = $this->db->delete("lapangan", array("id_lapangan" => $id_lapangan));
		if($query)
			return true;
		return false;
	}


}

/* End of file lapangan_model.php */
/* Location: ./application/models/lapangan_model.php */