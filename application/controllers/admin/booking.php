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
	public function cek_booking(){
		$this->load->model("booking_model");
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}
		$data["title"] = "Cek reservasi";
		$data["token"] = "";
		if($this->input->get("token")){
			$search = array();
			$data["token"]     = $this->input->get('token');
			$data["data_book"] = $this->booking_model->getBookingByToken($data["token"],$id_member);
			
		}
		$content = $this->load->view("admin/booking/cek_booking",$data,true);
		$this->render($content);
	}
	/**
	 * Cek jadwal booking
	 */
	public function cek_jadwal(){
		$data["title"] = "Info";

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}
		$data["current"] =false;
		$this->load->model('lapangan_model');
		// $this->registerHeadScript('js/plugins/moment.min.js');

		$this->registerScript('js/plugins/datatables/jquery.dataTables.js');
        $this->registerScript('js/plugins/datatables/dataTables.bootstrap.js');
		$this->registerScript('js/page/app-checkJadwal.js');
		$this->registerScript('js/plugins/datepicker/bootstrap-datepicker.js');

		$this->registerCss('css/dataTables/dataTables.bootstrap.css');
		$this->registerCss('css/datepicker/datepicker35.css');

		$nama_lapangan = $this->lapangan_model->getLapanganByMember($id_member);
		
		//menampilkan list lapangan untuk table header
		foreach ($nama_lapangan as $key => $value) {
			$data['nama_lapangan'][$key] = $value->nama_lapangan;

		}

		$content = $this->load->view('admin/booking/checkJadwal_view', $data, true);
		$this->render($content);
	}

	public function checking(){
		$data["title"] = "Info";
		$this->load->model('booking_model');
		$this->load->model('lapangan_model');
		$this->load->model('jadwal_model');

		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$nama_lapangan = $this->lapangan_model->getLapanganByMember($id_member);
		
		//menampilkan list lapangan untuk table header
		foreach ($nama_lapangan as $key => $value) {
			$data['nama_lapangan'][$key] = $value->nama_lapangan;

		}
		// $this->registerHeadScript('js/plugins/moment.min.js');
		$tanggal = $this->input->post("tanggal");		
		
		// $hari_start = explode(" ",$arr);
		$_tanggal  = strtotime($tanggal." 00:00");
		$num_week  = date('w',  $_tanggal);
		$lapangan  = $this->lapangan_model->getLapanganByMember($id_member);
		// print_r($lapangan);
		$start = $tanggal." 08:00:00";
		$end   = $tanggal." 22:00:00";

		if($lapangan):
$data['book'] = array();
		foreach ($lapangan as $key => $lap) {

			$booking = $this->booking_model->getBookingByLapanganIdTanggal2($lap->id_lapangan,$tanggal,$id_member);
			// $info[''] $lap->nama_lapangan."<br>";
			/* get jadwal */
			$book   = array();
			$durasi = array();
			foreach ($booking as $key => $dat) {
				array_push($book, $dat->jadwal);
				array_push($durasi,$dat->durasi);
			}
			

			$jml =  ( strtotime($end) - strtotime($start) )/3600;

			$current = strtotime($start);
			$i = 0;
			$data['book'][$key] = array();
			while ($i <= $jml) {
				$new = array();
				$_current = strtotime("+$i hours",$current);
				$time = date('Y-m-d H:i:s',$_current);
				$data['current'][$i] = date('H:i:s',$_current);
				if(!in_array($time, $book)){
					$data['book'][$key][$i] = date('H:i:s',$_current);
				}else{
					// echo "<strong>".date('H:i:s',$_current)."</strong><br>";
					// $data['booked'][$i] = date("H:i:s",$_current);
					$index = array_search($time, $book);

					for($j=1;$j<$durasi[$index];$j++){
						$_cur = strtotime("+$i hours",$current);
						// echo "<strong>".date('H:i:s',$_cur)."</strong><br>";
						$data['durasi'][$i] = date("H:i:s",$_current);
						$i++;
					}
				}
				$i++;
			}

		}
		endif;
		
		$content = $this->load->view('admin/booking/checkJadwal_view', $data, true);
		$this->render($content);
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
        $this->registerScript('js/plugins/datatables/dataTables.bootstrap.js');
		$this->registerCss('css/dataTables/dataTables.bootstrap.css');
		$this->registerScript('js/page/app-bayar.js');

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

	public function pelunasan(){
		$this->load->model('booking_model');
		if($this->session->userdata('logged_in')){
			$session_data = $this->session->userdata('logged_in');
			$id_member = $session_data->id_member;
		}

		$id_booking = $this->input->post("id_booking");
		$kekurangan = $this->input->post("kekurangan");

		$data = array(
			'status' => 3 , 
		);

		$pelunasan = $this->booking_model->pelunasan($data,$id_booking,$id_member,$kekurangan);
		redirect("admin/booking/bayar");

	}
}

/* End of file booking.php */
/* Location: ./application/controllers/booking.php */