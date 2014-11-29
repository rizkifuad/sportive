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
		$this->registerScript('js/plugins/datatables/dataTables.bootstrap.js');
		$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
		$this->registerCss('css/datatables/dataTables.bootstrap.css');
		// $this->registerScript('js/plugins/highcharts.js');
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['title'] = 'Manajemen';
			$data['subtitle'] = 'Daftar Reservasi Hari ini';
			$data['tampil_graph'] = FALSE;
			$data['subtitle_graph'] = '';
			$data['tahun'] = $this->Manajemen_Model->getYearLaporan($session_data->id_member);
			$data['laporan_harian'] = $this->Manajemen_Model->getJadwalHarian($session_data->id_member);
			$data['thead'] = "<th>Jadwal</th><th>Durasi</th><th>Nama</th><th>Lapangan</th><th>Status</th><th>Jumlah Uang</th>";
			$content = $this->load->view('admin/manajemen/manajemen', $data, true);
			$this->render($content);
		}
	}

	public function review_laporan()
	{
		$this->load->model('Manajemen_Model');
		$this->registerScript('js/plugins/highcharts.js');
		$this->registerScript('js/plugins/datatables/dataTables.bootstrap.js');
		$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
		$this->registerCss('css/datatables/dataTables.bootstrap.css');

		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$this->load->model('Manajemen_Model');
			$sort = $this->input->post('sortir_date');
			$data['title'] = 'Manajemen';
			$data['subtitle'] = 'Review Manajemen';
			$data['tampil_graph'] = TRUE;
			$data['subtitle_graph'] = '';
			$data['thead'] = "<th>Jadwal</th><th>Durasi</th><th>Nama</th><th>Lapangan</th><th>Status</th><th>Jumlah Uang</th>";
			$data['tahun'] = $this->Manajemen_Model->getYearLaporan($session_data->id_member);
			if($sort == '2')
			{
				$data['subtitle_graph'] = 'Tahunan';
				$data['sortir'] = $this->Manajemen_Model->getSortedLaporanByTahun($session_data->id_member);
			}
			elseif($sort == '1')
			{
				$tahun = $this->input->post('select_tahun');
				$data['subtitle_graph'] = 'Bulanan pada tahun '.$tahun;
				$data['sortir'] = $this->Manajemen_Model->getSortedLaporanByBulan($tahun, $session_data->id_member);
			}
			$data['laporan_harian'] = $data['sortir'][2];
			// var_dump($data['laporan_harian']);
			$content = $this->load->view('admin/manajemen/manajemen', $data, true);
			$this->render($content);
		}
	}
	
}

/* End of file manajemen.php */
/* Location: ./application/controllers/manajemen.php */