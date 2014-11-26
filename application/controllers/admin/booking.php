<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends App_controller {

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
		$data['dp'] = $this->member_model->getMemberById("uang_muka",$id_member);

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
		$this->load->model('member_model');

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

		/**
		 * Check uang muka lunas atau tidak
		 */
		$harga = $this->member_model->getMemberById("harga_per_jam",$id_member);
		if($dp == $harga['harga_per_jam']*$durasi){
			$status = 2;
		}
		else{
			$status = 1;
		}

		/**
		 * Get list lapangan
		 */
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
			'status' =>$status,
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
		$this->load->model('member_model');
		$this->load->model('booking_model');

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$data["title"] = "Info";
		
		
		$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
		$this->registerScript('js/plugins/datatables/datatables.bootstrap.js');
		$this->registerCss('css/dataTables/dataTables.bootstrap.css');
		$this->registerScript('js/page/booking.js');

		$data['booking'] = $this->booking_model->getBookingTodayById($id_member);
		$total = $this->member_model->getMemberById("harga_per_jam",$id_member);

		foreach ($data['booking'] as $key => $value) {
			$hasil = (int)$value->durasi*(int)$total['harga_per_jam'];
			$data["booking"][$key]->pelunasan = (int)$hasil - (int)$value->jml_uang;
			$hasil = 0;
		}
		$content = $this->load->view('admin/booking/bayar_view', $data, true);
		$this->render($content);
	}
}

/* End of file booking.php */
/* Location: ./application/controllers/booking.php */