<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function getKotaByProvinsi(){
		$this->load->model("wilayah_model");
		$result 		  = new stdclass();
		$result->error    = 0;
		$id_provinsi  = $this->input->get('id_provinsi');

		if($id_provinsi == "" || $id_provinsi == null || $id_provinsi == false){
			$result->error   = 1;
			$result->message = "Missing parameter id_provinsi";
		}

		if(!($result->error)){
			$kota   = $this->wilayah_model->getKotaByProvinsi($id_provinsi);
			if(! ($kota) ){
				$result->error   = 1;
				$result->message = "No kota found";
			}else{
				$result->kota = $kota;
			}
		}


		echo json_encode($result);
	}

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */