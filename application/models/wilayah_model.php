<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class wilayah_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	/**
	 * dapatkan semua kota sesuai id provinsi
	 */
	public function getKotaByProvinsi($id_provinsi){

	}

	/**
	 * dapatkan semua provinsi, atau jika $id_provinsi terset maka dapatkan hanya provinsi tertentu
	 */
	public function getProvinsi($id_provinsi=NULL){

	}

	/**
	 * dapatkan kota berdasarkan id_kota
	 */
	public function getKotaById($id_kota){

	}



}

/* End of file wilayah_model.php */
/* Location: ./application/models/wilayah_model.php */