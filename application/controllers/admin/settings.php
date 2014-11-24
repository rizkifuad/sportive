<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends App_controller {

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * halaman settings untuk pengaturan info basic
	 */
	public function info(){
		
		$data["title"] = "Info";

		$content = $this->load->view('admin/settings/info', $data, true);
		$this->render($content);

	}

	/**
	 * halaman pengaturan untuk jadwal
	 */

	public function jadwal(){

	}


	/**
	 * pengaturan harga dan dp minimal
	 */
	public function harga(){

	}


	/**
	 * Pengaturan untuk data lapangan
	 */
	public function lapangan(){

	}
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */