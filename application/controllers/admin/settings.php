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
			redirect("home/login");
		}

		$this->load->model('Member_Model');
		$this->load->model('Wilayah_Model');
		$this->load->model('Jadwal_Model');

	}

	/**
	 * halaman settings untuk pengaturan info basic
	 */
	public function info(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}
		$data["title"] = "Info";
		$data['data_prov'] = $this->Wilayah_Model->getProvinsi();
		$data['data_kota'] = $this->Wilayah_Model->getKotaByProvinsi(16);
		$data['all_data'] = $this->Member_Model->getMemberById('*', $id_member);
		$content = $this->load->view('admin/settings/info', $data, true);
		$this->render($content);

	}

	/**
	 * halaman pengaturan untuk jadwal
	 */

	public function jadwal(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$this->Jadwal_Model->fixJadwal($id_member);

		$data["title"] = "Jadwal";
		$data['jadwal'] = $this->Jadwal_Model->getSemuaJadwal($id_member);
		$this->registerScript('js/page/jadwal.js');
		$this->registerScript('js/plugins/timepicker/bootstrap-timepicker.min.js');
		$this->registerCss('css/timepicker/bootstrap-timepicker.min.css');
		$this->registerCss('css/page/jadwal.css');

		$content = $this->load->view('admin/settings/jadwal', $data, true);
		$this->render($content);

	}

	/**
	 * halaman pengaturan untuk udpate jadwal
	 */

	public function updateJadwal(){
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;

			$checkbox = $this->input->post('checboxHari');
			$jam_buka = $this->input->post('jam_buka');
			$jam_tutup = $this->input->post('jam_tutup');
			$i = 0;

			var_dump($checkbox);
			var_dump($jam_buka);
			var_dump($jam_tutup);
			$index = 0;
			while($i < 7)
			{
				if(in_array($i, $checkbox))
				{
					$data['status'] = 1;
					$data['jam_buka'] = $jam_buka[$index];
					$data['jam_tutup'] = $jam_tutup[$index];
					$this->Jadwal_Model->updateJadwal($data, $i, $id_member);
					$index++;
				}
				else
				{
					$data['status'] = 0;
					$this->Jadwal_Model->updateJadwal($data, $i, $id_member);
				}
				$i++;
			}
			redirect('admin/settings/jadwal');
		}
	}


	/**
	 * pengaturan harga dan dp minimal
	 */
	public function harga(){
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$data["title"] = "Harga";
		$data['default_data'] = $this->Member_Model->getMemberById('harga_per_jam, uang_muka', $id_member);
		
		$content = $this->load->view('admin/settings/harga', $data, true);
		$this->render($content);
	}

	/**
	 * form simpan harga dp dan lapangan perjam
	 */

	public function simpanHarga()
	{
		if($this->session->userdata('logged_in'))
		{

			$session_data = $this->session->userdata('logged_in');
			
			$username = $session_data->username;
			$id_member = $session_data->id_member;
			$nama = $session_data->nama_pemilik;

			$data['uang_muka'] 	= $this->input->post('uang_muka');
			$data['harga_per_jam'] = $this->input->post('harga_perjam');

			$this->Member_Model->updateMember($data, $id_member);
			redirect('admin/settings/harga');
		}
	}

	/**
	 * form simpan data sport center
	 */

	public function simpanInfoSportCenter()
	{
		if($this->session->userdata('logged_in'))
		{

			$session_data = $this->session->userdata('logged_in');
			
			$username = $session_data->username;
			$id_member = $session_data->id_member;
			$nama = $session_data->nama_pemilik;

			$data['nama_tempat'] 		= $this->input->post('nama_sport');
			$data['alamat_lapangan'] 	= $this->input->post('alamat_sport');
			$data['provinsi'] 			= $this->input->post('prov_sport');
			$data['kota'] 				= $this->input->post('kota_sport');
			$data['telp_lapangan'] 		= $this->input->post('telp_sport');

			$this->Member_Model->updateMember($data, $id_member);
			redirect('admin/settings/info');
		}
	}

	/**
	 * form simpan data pemilik
	 */

	public function simpanInfoPemilik()
	{
		if($this->session->userdata('logged_in'))
		{

			$session_data = $this->session->userdata('logged_in');
			
			$username = $session_data->username;
			$id_member = $session_data->id_member;
			$nama = $session_data->nama_pemilik;

			$data['nama_pemilik'] 	= $this->input->post('nama_pemilik');
			$data['email'] 			= $this->input->post('email_pemilik');
			$data['telp_pemilik'] 	= $this->input->post('telp_pemilik');
			$data['username'] 		= $this->input->post('username_pemilik');
			$password 			= $this->input->post('pass_pemilik');
			$confirm_password   = $this->input->post('konf_pass');
			if($password != "" && $confirm_password != "" ){
				$data['password'] 		= md5($password);
				$konfirmasi_pass 		= md5($confirm_password);
			}
			
			if($password == "" || ( $password != "" && ( $password == $confirm_password ) ) )
				$this->Member_Model->updateMember($data, $id_member);
			redirect('admin/settings/info');
		}
	}

	/**
	 * Pengaturan untuk data lapangan
	 */
	public function lapangan(){
		$this->load->model("lapangan_model");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$data["title"] = "Lapangan";

		$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
        $this->registerScript('js/plugins/datatables/dataTables.bootstrap.js');
		$this->registerScript("js/page/app-lapangan.js");

		$data["lapangan"] = $this->lapangan_model->getLapanganByMember($id_member);

		$content = $this->load->view('admin/settings/lapangan', $data, true);
		$this->render($content);
	}

	public function simpan_lapangan(){
		$this->load->model("lapangan_model");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$data["id_member"] = $session_data->id_member;
		}

		if($this->input->post('simpan_lapangan')){
			$data["nama_lapangan"]      = $this->input->post("nama_lapangan");
			$data["deskripsi_lapangan"] = $this->input->post('deskripsi_lapangan');

			if($this->input->post("id_lapangan") != "" || $this->input->post("id_lapangan") != null){
				$id_lapangan = $this->input->post("id_lapangan");
				$update = $this->lapangan_model->updateLapangan($data,$id_lapangan);
			}else{
				$save = $this->lapangan_model->saveLapangan($data);
			}


			redirect("admin/settings/lapangan");
		}else{
			exit(0);
		}
	}
}

/* End of file settings.php */
/* Location: ./application/controllers/settings.php */