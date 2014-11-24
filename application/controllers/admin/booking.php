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
		$this->registerScript('js/page/booking.js');
		$this->registerScript('js/plugins/datepicker/bootstrap-datepicker.js');
		$this->registerScript('js/plugins/timepicker/bootstrap-timepicker.min.js');

		$this->registerCss('css/datepicker/datepicker35.css');
		$this->registerCss('css/timepicker/bootstrap-timepicker.min.css');



		$content = $this->load->view('admin/booking/booking_view', $data, true);
		$this->render($content);
	}

	public function save_booking(){
		$this->load->model('booking_Model');

		$nama = $this->input->post("nama");
		$telepon = $this->input->post("telepon");
		$tanggal = $this->input->post("tanggal");
		$jam = $this->input->post("jam");
		$durasi = $this->input->post("durasi");
		$dp = $this->input->post("dp");
		$lapangan = $this->input->post("lapangan");
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
			'id_lapangan' =>$lapangan ,
			'id_member'=>2

		);
		$id_booking = $this->booking_Model->saveBooking($data);
		echo ($tanggal);
		echo ($id_booking);

	}

	/**
	 * halaman digunakan untuk melakukan pelunasan pembayaran
	 */
	public function bayar(){

	}
}

/* End of file booking.php */
/* Location: ./application/controllers/booking.php */