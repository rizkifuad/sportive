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
	 * Halaman untuk laporan
	 */
	public function laporan(){
		$this->load->model('Manajemen_Model');
		if($this->session->userdata('logged_in'))
		{
			$data['title'] = 'Manajemen';
			$session_data = $this->session->userdata('logged_in');


			$data['laporan_harian'] = $this->Manajemen_Model->getJadwalHarian($session_data->id_member);
			$data['thead'] = "<th>Jadwal</th><th>Durasi</th><th>Nama</th><th>Lapangan</th><th>Status</th>";
			// $this->registerScript('js/plugins/highcharts.js');
			$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
			$this->registerCss('css/datatables/dataTables.bootstrap.css');

			$content = $this->load->view('admin/manajemen/manajemen', $data, true);
			$this->render($content);
		}
	}
	
}

/* End of file manajemen.php */
/* Location: ./application/controllers/manajemen.php */