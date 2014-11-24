<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	protected $layout = 'layout/main';
	protected $stylesheets = array();
	protected $javascripts = array();

	protected $local_stylesheets = array();
	protected $local_javascripts = array();

	protected $main_title = "Sportive";


	protected function render($content,$template=NULL) {
		
		$view_data = array(
			'content' => $content,
		  	'stylesheets' => $this->get_stylesheets(),
			'javascripts' => $this->get_javascripts(),
			'local_javascripts' => $this->local_javascripts,
			'main_title' => $this->main_title
			
		);
		
		$this->load->view($this->layout,$view_data);

	}

	protected function registerCss($cssFile) {
		array_push($this->local_stylesheets,$cssFile);
	}

	protected function registerScript($scriptFile) {
		array_push($this->local_javascripts,$scriptFile);
	}

	protected function registerHeadScript($scriptFile) {
		array_push($this->javascripts,$scriptFile);
	}

	protected function get_stylesheets() {
		return array_merge($this->stylesheets,$this->local_stylesheets);
	}

	protected function get_javascripts() {
		return $this->javascripts;
	}


}

class App_Controller extends MY_controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	/* Style list
		bootstrap 3.0.2
         font Awesome
         Ionicons
         Morris chart
         jvectormap
         Date Picker
         Daterange picker
         bootstrap wysihtml5 - text editor
         Theme style */
	protected $javascripts = array(
		'js/jquery.js',
        'js/jquery2-1-1.min.js',
        'bootstrap/js/bootstrap.min.js',
		'js/jquery-ui-1.10.3.min.js',
		'js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
		'js/plugins/iCheck/icheck.min.js',
        'js/AdminLTE/app.js',
        

        );

	 /*	Javascript List
	 	jQuery 2.0.2
         jQuery UI 1.10.3
         Bootstrap
         Morris.js charts
         Sparkline
         jvectormap
         jQuery Knob Chart
         daterangepicker
         datepicker
         Bootstrap WYSIHTML5
         iCheck
         AdminLTE App
         AdminLTE dashboard demo (This is only for demo purposes)
         AdminLTE for demo purposes */

	protected $stylesheets = array(
        'css/page/dashboard.css',
        'css/bootstrap.min.css',
        'css/font-awesome.min.css',
		'css/ionicons.min.css',
		'css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css',
        'css/AdminLTE.css');

	protected function render($content,$template=NULL) {
		$session_data = $this->session->userdata('logged_in');
		$view_data = array(
			'content' => $content,
		  	'stylesheets' => $this->get_stylesheets(),
			'javascripts' => $this->get_javascripts(),
			'local_javascripts' => $this->local_javascripts,
			'main_title' => $this->main_title,
			'nama_pemilik' => $session_data->nama_pemilik,
			'username' => $session_data->username,
			'id_member' => $session_data->id_member

		);

		$this->load->view($this->layout,$view_data);

	}

}