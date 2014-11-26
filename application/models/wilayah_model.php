<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wilayah_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	/**
	 * dapatkan semua kota sesuai id provinsi
	 */
	public function getKotaByProvinsi($id_provinsi){
		$this->db->select("id_kota, nama_kota");
		$this->db->from("kota k");
		$this->db->join("provinsi p", "k.id_provinsi=p.id_provinsi");
		$this->db->where("p.id_provinsi",$id_provinsi);

		$query = $this->db->get();

		if($query->num_rows() >= 1){
			return $query->result_array();
		}

		return false;
	}

	/**
	 * dapatkan semua provinsi, atau jika $id_provinsi terset maka dapatkan hanya provinsi tertentu
	 */
	public function getProvinsi($id_provinsi=NULL){
		$this->db->select("*");

		if($id_provinsi != NULL)
			$this->db->where("id_provinsi",$id_provinsi);

		$query = $this->db->get('provinsi');

		if($id_provinsi != NULL)
			return $query->row_array();
		else
			return $query->result_array();
	}

	/**
	 * dapatkan kota berdasarkan id_kota
	 */
	public function getKotaById($id_kota){
		$this->db->select("*");
		$this->db->from("kota");
		$this->db->where("id_kota",$id_kota);
		
		$query = $this->db->get();

		if($query->num_rows() == 1){
			return $query->result();
		}

		return false;
	}



}

/* End of file wilayah_model.php */
/* Location: ./application/models/wilayah_model.php */