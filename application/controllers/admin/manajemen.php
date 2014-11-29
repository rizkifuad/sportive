<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen extends App_controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$data['username'] = $session_data->username;
			$data['id_member'] = $session_data->id_member;
			$data['nama'] = $session_data->nama_pemilik;

		}else{
			redirect("home/login");
		}
	}

	/**
	 * tampilkan grafik penjualan
	 */
	public function grafik(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$this->registerScript('js/plugins/highcharts.js');
		}
	}

	/**
	 * tampilkan data keuangan dan booking
	 */
	public function keuangan(){

	}

	/**
	 * Halaman untuk laporan
	 */
	public function laporan(){
		
	}
	
}

/* End of file manajemen.php */
/* Location: ./application/controllers/manajemen.php */