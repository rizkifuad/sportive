<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class settings extends App_controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$data['username'] = $session_data->username;
			$data['id_member'] = $session_data->id_member;
			$data['nama'] = $session_data->nama_pemilik;

		}else{
			redirect("home");
		}
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
		$data["title"] = "Lapangan";

		$content = $this->load->view('admin/settings/lapangan', $data, true);
		$this->render($content);
	}
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */