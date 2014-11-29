<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_controller {
	protected $layout = 'layout/home';
	protected $javascripts = array("js/jquery2-1-1.min.js","bootstrap/js/bootstrap.min.js");
	protected $stylesheets = array("css/bootstrap.min.css","css/page/homepage.css");

	public function __construct()
	{
		parent::__construct();

	}
	public function index(){
		$this->load->model("wilayah_model");
		$data["title"] = "Beranda";
	
		$this->registerCss("css/chosen/chosen.css");
		$this->registerScript("js/plugins/chosen/chosen.jquery.js");
		$this->registerScript("js/page/homepage.js");

		$data["default_prov"] = 16;
		$data["provinsi"]     = $this->wilayah_model->getProvinsi();
		$data["kota"]         = $this->wilayah_model->getKotaByProvinsi($data["default_prov"]);

		$content = $this->load->view('home/homepage', $data, true);

		$this->render($content);
	}
	public function login(){
		$data['title'] = "Sign in";
		if($this->session->userdata('logged_in')){
			redirect("admin/main");
		}
		
		$this->registerScript("js/page/app-login.js");
		$content = $this->load->view('home/login', $data, true);

		$this->render($content);
	}

	public function auth(){
		$this->load->model('member_model');
		$username 		= $this->input->post('username');
		$password_real 	= $this->input->post('password');
		$password 		= md5($password_real);

		$check = $this->member_model->check_login($username,$password);

		$result 		= new stdclass();
		$result->error 	= false;

		/* Empty value */
		if($username == ""){
			$result->error = true;
			$result->msg[] = "<b>Username</b> cannot be empty";
		}

		if($password_real == ""){
			$result->error = true;
			$result->msg[] = "<b>Password</b> cannot be empty";
		}
		/* Mismatch value */
		if($username != "" && $password_real != ""){
			if($check){
				$this->session->set_userdata('logged_in',$check[0]);
				$result->url = base_url("admin/main/index");
			}else{
				$result->error = true;
				$result->msg[] = "Incorrect <b>username</b> or <b>password</b>";
			}
		}

		echo json_encode($result);

	}

	public function register(){
		$this->load->model('member_model');

		$username 	= $this->input->post('username');
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		$password2 	= $this->input->post('password2');

		$result = new stdclass();
		$result->error = false;

		/* Empty value */
		if($username == ""){
			$result->error = true;
			$result->msg[] = "<b>Username</b> cannot be empty";
		}

		if($email == ""){
			$result->error = true;
			$result->msg[] = "<b>Email</b> cannot be empty";
		}

		if($password == ""){
			$result->error = true;
			$result->msg[] = "<b>Password</b> cannot be empty";
		}
		/* Mismatch value */
		if($password != $password2){
			$result->error = true;
			$result->msg[] = "<b>Password</b> doesn't match";
		}

		if($this->member_model->check_same_user('email',$email) ){
			$result->error = true;
			$result->msg[] = "This <b>email</b> already been registered";
		}

		if($this->member_model->check_same_user('username',$username) ){
			$result->error = true;
			$result->msg[] = "Username already registered. Choose different <b>username</b>";
		}

		$channel_flag 		= false;
		$channel_code_count = 5;

		while($channel_flag == false){
			/* Generate channel id code*/
			$code  = "";
			for($i = 1; $i <= $channel_code_count; $i++){
				$code .=  chr(rand(97,122));
			}
			if(!( $this->member_model->channel_exist($code) ) ){
				$channel_flag = true;
			}
			
		}


		if( !$result->error ){
			$data_register = array(
				"username"	=> $username,
				"email"		=> $email,
				"password"	=> md5($password),
				"status"	=> 1,
				"join_date"	=> date('Y-m-d'),
				"channel_id"=> $code

			);

			$this->member_model->register($data_register);

			$result->msg[] = "Registration complete. Please login bellow";
		}

		echo json_encode($result);


	}

	public function logout(){
		$this->session->set_userdata('logged_in',null);
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('home/login');

	}


	public function registrasi_pemilik(){
		$paket        = $this->uri->segment(3);
		$daftar_paket = array("free","premium","ultimate");
		if($paket == "" || !( in_array($paket, $daftar_paket) )){
			redirect("home/paket_harga");
		}
		$this->registerCss("css/chosen/chosen.css");
		$this->registerScript("js/plugins/chosen/chosen.jquery.js");
		$this->registerScript("js/page/registrasi.js");

		$this->load->model("wilayah_model");
		$data["id_provinsi"] = 16;
		$data["membership"]  = array_search( $paket,$daftar_paket);
		$data["title"]       = "Registrasi pemilik";
		$data["provinsi"]    = $this->wilayah_model->getProvinsi();
		$data["kota"]        = $this->wilayah_model->getKotaByProvinsi($data["id_provinsi"]);
		$content       = $this->load->view("home/registrasi_pemilik",$data,true);

		$this->render($content);
	}

	public function save_register(){		
		$this->load->model("member_model");
		if($this->input->post("submit")) {			
			$data["membership"] 		  = $this->input->post("id_membership");
		    $data["nama_tempat"] 		  = $this->input->post("nama_sport");
		    $data["type"] 		  		  = $this->input->post("type");
		    $data["alamat_lapangan"] 	  = $this->input->post("alamat_sport");
		    $data["provinsi"] 			  = $this->input->post("prov_sport");
		    $data["kota"] 				  = $this->input->post("kota_sport");
		    $data["telp_lapangan"] 		  = $this->input->post("telp_sport");
		    $data["nama_pemilik"] 		  = $this->input->post("nama_pemilik");
		    $data["email"] 				  = $this->input->post("email_pemilik");
		    $data["telp_pemilik"] 		  = $this->input->post("telp_pemilik");
		    $data["username"] 			  = $this->input->post("username_pemilik");
		    $password = $data["password"] = $this->input->post("pass_pemilik");
		    $confirm_password 			  = $this->input->post("konf_pass");
		    
		}
		
		$data["password"] = md5($password);
		$register = $this->member_model->register($data);
		if($register){
			redirect("home/login");
		}

	}

	public function paket_harga(){
		$data["title"] = "Registrasi Pemilik";
		$this->registerCss("css/table_pricing.css");

		$content       = $this->load->view("home/paket_harga",$data,true);

		$this->render($content);
	}

	public function join_now(){
		$data["title"] = "Bergabung bersama kami";

		$content = $this->load->view("home/join_now",$data,true);
		$this->render($content);


	}

	public function cari_sportcenter(){
		$this->load->model("member_model");
		$this->load->model("wilayah_model");
		
		$this->registerCss("css/chosen/chosen.css");
		$this->registerScript("js/plugins/chosen/chosen.jquery.js");
		$this->registerScript("js/page/homepage.js");

		$data["sel_provinsi"] = 16;
		$data["sel_kota"] = null;
		$data["sel_type"] = 1;
		$data["sel_nama_sportcenter"] = "";

		$search = array();
		if($this->input->get('provinsi')){
			$search["provinsi"]      = $data["sel_provinsi"] =  $this->input->get('provinsi');
		}
		if($this->input->get('kota'))
			$search["kota"]          = $data["sel_kota"] =  $this->input->get('kota');
		if($this->input->get('type'))
			$search["type"]          = $data["sel_type"] = $this->input->get('type');

		$nama_sportcenter = null;
		if($this->input->get('nama_sportcenter')){
			$nama_sportcenter   = $data["sel_nama_sportcenter"]  = $this->input->get('nama_sportcenter');
		}
		$data["provinsi"]     = $this->wilayah_model->getProvinsi();
		$data["kota"]         = $this->wilayah_model->getKotaByProvinsi($data["sel_provinsi"]);
		$data["sportcenter"]  = $this->member_model->find_sportcenter($search,$nama_sportcenter);
		$data["title"]        = "Cari sportcenter";
		// U::pre_test($data);
		$content = $this->load->view("home/cari_sportcenter",$data,true);

		$this->render($content);

	}

	public function sportcenter(){
		$id_member = $this->uri->segment(3);
		$book = array(
			"2014-11-29 10:00:00",
			"2014-11-29 15:00:00",
			"2014-11-29 17:00:00"
			);
		$durasi = array(
			1,
			1,
			4

			);

		$start = "2014-11-29 08:00:00";
		$end   = "2014-11-29 22:00:00";

		$jml =  ( strtotime($end) - strtotime($start) )/3600;

		$current = strtotime($start);
		$i = 0;
		while ($i <= $jml) {
			$_current = strtotime("+$i hours",$current);
			$time = date('Y-m-d H:i:s',$_current);


			if(!in_array($time, $book)){
				echo date('H:i:s',$_current)."<br>";
			}else{
				echo "<strong>".date('H:i:s',$_current)."</strong><br>";
				$index = array_search($time, $book);

				for($j=1;$j<$durasi[$index];$j++){
					$_cur = strtotime("+$i hours",$current);
					echo "<strong>".date('H:i:s',$_cur)."</strong><br>";

					$i++;
				}
			}
			$i++;
		}
	}

	public function cek_booking(){
		$this->load->model("booking_model");
		$data["title"] = "Cek reservasi";
		$data["token"] = "";
		if($this->input->get("token")){
			$search = array();
			$data["token"]     = $this->input->get('token');
			$data["data_book"] = $this->booking_model->getBookingByToken($data["token"]);
			
		}
		$content = $this->load->view("home/cek_booking",$data,true);
		$this->render($content);
	}	

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
