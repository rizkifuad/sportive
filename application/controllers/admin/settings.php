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

		$this->load->model('Member_Model');

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
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$username = $session_data->username;
			$id_member = $session_data->id_member;
			$nama = $session_data->nama_pemilik;

		}

		$data["title"] = "Harga";
		$data['default_data'] = $this->Member_Model->getMember('harga_per_jam, uang_muka', $id_member);
		
		$content = $this->load->view('admin/settings/harga', $data, true);
		$this->render($content);
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