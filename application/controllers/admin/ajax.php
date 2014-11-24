<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function getLapanganByID(){
		$id = $this->input->get("id_lapangan");
		$this->load->model("lapangan_model");
		$lapangan = $this->lapangan_model->getLapanganByID($id);

		echo json_encode($lapangan[0]);
	}	

}

/* End of file ajax.php */
/* Location: ./application/controllers/ajax.php */