<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends App_Controller {
	
	function __construct() {
		parent::__construct();

		
		if($this->session->userdata('logged_in')){

			$session_data = $this->session->userdata('logged_in');
			
			$data['username'] = $session_data->username;
			$data['id_member'] = $session_data->id_member;
			$data['first_name'] = $session_data->first_name;
			$data['last_name'] = $session_data->last_name;


		}else{
			redirect("home");
		}
	}

	public function index()
	{
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



	public function schedule(){
		$data['admin']="Admin Panel";
		$data['title']="Scheduling";


		$this->registerCss('css/fullcalendar/fullcalendar.css');
		$this->registerCss('css/page/schedule.css');
		$this->registerCss('css/datepicker/datepicker35.css');
		$this->registerCss('css/timepicker/bootstrap-timepicker.min.css');

		$this->registerHeadScript('js/plugins/timepicker/bootstrap-timepicker.min.js');
		$this->registerScript('js/plugins/moment.min.js');
		$this->registerScript('js/plugins/fullcalendar/fullcalendar.js');
		$this->registerScript('js/plugins/datepicker/bootstrap-datepicker.js');
		$this->registerScript('js/page/app/app-schedule.js');

		$content = $this->load->view('main/schedule',$data,true);
		$this->render($content);
	}

	public function publish(){
		$session_data = $this->session->userdata('logged_in');
		$this->load->model("member_model");
		$member = $this->member_model->get_member_by_meta("id_member", $session_data->id_member);

		$data['admin']="Admin Panel";
		$data['title']="Publish";
		$data['channel_id']= $member->channel_id;

		$this->registerCss("css/docs.css");


		$content = $this->load->view('main/publish',$data,true);
		$this->render($content);
	}

	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
