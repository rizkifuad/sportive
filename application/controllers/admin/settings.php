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
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}
		$data["title"] = "Info";

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
		$data['default_data'] = $this->Member_Model->getMember('harga_per_jam, uang_muka', $id_member);
		
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