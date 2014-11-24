<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends App_Controller {
	
	function __construct() {
		parent::__construct();

		
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$data['username'] = $session_data->username;
			$data['id_member'] = $session_data->id_member;
			$data['nama'] = $session_data->nama_pemilik;
			


		}else{
			redirect("home");
		}
	}

	public function index(){
		$data['title']="Beranda";

		$this->registerScript('js/plugins/moment.min.js');
		$this->registerScript('js/AdminLTE/dashboard.js');
		$this->registerCss('css/datepicker/datepicker35.css');
		$this->registerScript('js/plugins/datepicker/bootstrap-datepicker.js');
		$this->registerScript('js/swfobject.js');
		$this->registerScript('js/page/app/app-home.js');

		$data['admin']="Admin Panel";


		$content = $this->load->view('main/beranda',$data,true);
		$this->render($content);
	}


	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
