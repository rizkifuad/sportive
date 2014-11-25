<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends App_controller {

	public function __construct(){
		parent::__construct();
	}

	/**
	 * Cek jadwal booking
	 */
	public function cek_jadwal(){

	}

	/**
	 * booking offline
	 */
	public function booking_offline(){
		$data["title"] = "Info";
		$this->load->model('lapangan_model');
		$this->load->model('member_model');

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$data['lapangan'] = $this->lapangan_model->getLapanganByMember($id_member);
		$data['dp'] = $this->member_model->getMember("uang_muka",$id_member);

		$this->registerScript('js/page/booking.js');
		$this->registerScript('js/plugins/datepicker/bootstrap-datepicker.js');
		$this->registerScript('js/plugins/timepicker/bootstrap-timepicker.min.js');

		$this->registerCss('css/datepicker/datepicker35.css');
		$this->registerCss('css/timepicker/bootstrap-timepicker.min.css');



		$content = $this->load->view('admin/booking/booking_view', $data, true);
		$this->render($content);
	}

	/**
	 *	Menyimpan semua booking offline pada menu booking
	 */
	public function save_booking(){
		$this->load->model('booking_Model');
		$this->load->model('lapangan_model');

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$nama = $this->input->post("nama");
		$telepon = $this->input->post("telepon");
		$tanggal = $this->input->post("tanggal");
		$jam = $this->input->post("jam");
		$durasi = $this->input->post("durasi");
		$dp = $this->input->post("dp");
		
		$nama_lapangan = $this->input->post("lapangan");
		$id_lapangan = $this->lapangan_model->getLapanganByNameAndMember($id_member,$nama_lapangan);

		$token = time();
		$jadwal = $tanggal." ".$jam;


		$data = array(
			'nama' =>$nama ,
			'telp' =>$telepon ,
			'token' => $token,
			'type' => 0,
			'jadwal' =>$jadwal ,
			'durasi' =>$durasi ,
			'jml_uang' =>$dp ,
			'id_lapangan' =>$id_lapangan[0]->id_lapangan ,
			'id_member'=>$id_member

		);
		$id_booking = $this->booking_Model->saveBooking($data);
		
		if($id_booking){
			redirect('admin/main/index','refresh');
		}

	}

	/**
	 * halaman digunakan untuk melakukan pelunasan pembayaran
	 */
	public function bayar(){

	}
}

/* End of file booking.php */
/* Location: ./application/controllers/booking.php */