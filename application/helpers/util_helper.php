<?php

class U {


	function asset_url($url=""){
	   return base_url().'assets/'.$url;
	}

	function data_url($url=""){
	   return base_url().'public/data/'.$url;
	}

	function loadStyles($stylesheets) {
		foreach ($stylesheets as $stylesheet) {
			echo '<link rel="stylesheet" type="text/css" href="'.U::asset_url($stylesheet).'">'."\n";		

		}	
	}

	function loadScripts($javascripts) {
		foreach ($javascripts as $javascript) {
			echo '<script type="text/javascript" src="'.U::asset_url($javascript).'"></script>'."\n";		

		}	
	}
	function pre_test($data){
		echo "<pre>";
		print_r($data);
		echo "</pre";
	}

	function arrayToObject($array) {
		error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		foreach ($array as $key => $value)
		{
		    $object->$key = $value;
		}
		return $object;
	}

	function getOtherKategori(){
		$this->load->model('Product','product');
		
		return $this->product->getKategori(null,null,true);

	}
	function generateToken(){
		$str = "";
		for($i=1;$i<=7;$i++){
			$str .= rand(0,9);
		}

		return $str;
	}
}