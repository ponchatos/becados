<?php
Class Solicitud extends CI_Controller {

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

public function index(){
	$this->load->view('solicitud');
}

public function registrar_solicitud(){
	$this->form_validation->set_rules('nivel_educativo', 'Nivel educativo', 'trim|required|xss_clean|numeric');

	$this->form_validation->set_rules('nombre', 'Nombre del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ape_pat', 'Apellido paterno del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ape_mat', 'Apellido materno del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('edo_civil', 'Estado civil', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('hijos', 'Hijos', 'trim|required|xss_clean');
	$this->form_validation->set_rules('calle', 'Calle', 'trim|required|xss_clean');
	$this->form_validation->set_rules('num_casa', 'Numero de casa', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('colonia', 'Nombre del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('entre_calle_1', 'Entre calle 1', 'trim|required|xss_clean');
	$this->form_validation->set_rules('entre_calle_2', 'Entre calle 2', 'trim|required|xss_clean');
	$this->form_validation->set_rules('cerca_de', 'Cerca de', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ciudad', 'Ciudad', 'trim|required|xss_clean');
	$this->form_validation->set_rules('telefono', 'Teléfono', 'trim|required|xss_clean');
	$this->form_validation->set_rules('correo', 'Correo Electrónico', 'trim|required|xss_clean');

	$this->form_validation->set_rules('padre_nombre', 'Nombre del padre o tutor', 'trim|required|xss_clean');
	$this->form_validation->set_rules('padre_ape_pat', 'Apellido paterno del padre o tutor', 'trim|required|xss_clean');
	$this->form_validation->set_rules('padre_ape_mat', 'Apellido materno del padre o tutor', 'trim|required|xss_clean');
	$this->form_validation->set_rules('padre_edad', 'Edad del padre o tutor', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('padre_escolaridad', 'Escolaridad del padre', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('padre_ocupacion', 'Ocupación del padre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('padre_vivo_muerto', 'Padre vivo o finado', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('madre_nombre', 'Nombre de la madre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('madre_ape_pat', 'Apellido paterno de la madre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('madre_ape_mat', 'Apellido materno de la madre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('madre_edad', 'Edad de la madre', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('madre_escolaridad', 'Escolaridad de la madre', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('madre_ocupacion', 'Ocupación de la madre', 'trim|required|xss_clean');
	$this->form_validation->set_rules('madre_vivo_muerto', 'Madre vivo o finado', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('edo_civil_padres', 'Estado civil de los padres', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('vive_con', 'Vive con', 'trim|required|xss_clean');
	$this->form_validation->set_rules('personas_dependen_ingreso', 'Personas que dependen ingreso familiar', 'trim|required|xss_clean|numeric');
	

}

}
?>