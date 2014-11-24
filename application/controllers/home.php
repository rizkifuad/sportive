<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_controller {
	protected $layout = 'layout/empty';
	protected $javascripts = array("js/jquery2-1-1.min.js","bootstrap/js/bootstrap.min.js");
	protected $stylesheets = array();

	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$data['username'] 	= $session_data->username;
			$data['id_member'] 	= $session_data->id_member;
			$data['first_name'] = $session_data->first_name;
			$data['last_name'] 	= $session_data->last_name;


		}
	}

	public function index()
	{
		$data['title'] = "Beranda";
		if($this->session->userdata('logged_in')){
			redirect("main");
		}
		$this->registerCss("css/bootstrap.min.css");
		$this->registerCss("css/page/home.css");
		$this->registerScript("js/page/app-home.js");
		
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
				$result->url = base_url("main/index");
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
		redirect('home');

	}

	public function register(){

	}

	public function cek_jadwal(){

	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */