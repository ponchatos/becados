<?php
Class Dashboard extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database


}

public function prueba(){
	$this->load->view('prueba');
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']>0){
			$this->load->view('admin');
		}else{
			$this->load->view('user');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

}
?>