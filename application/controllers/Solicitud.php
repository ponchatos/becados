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

public function prueba(){
	echo date('Y-m-d');
}

public function index(){
	$this->load->model('solicitud_db');
	//$this->load->model('leer_datos');
	$data=$this->solicitud_db->get_spinner_datas();
	$this->load->view('barra_nav');
	$this->load->view('solicitud',$data);
}

public function registrar_solicitud(){
	$this->form_validation->set_rules('nivel_educativo', 'Nivel educativo', 'trim|required|xss_clean|numeric');

	$this->form_validation->set_rules('nombre', 'Nombre del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ape_pat', 'Apellido paterno del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ape_mat', 'Apellido materno del solicitante', 'trim|required|xss_clean');
	$this->form_validation->set_rules('fec_nac', 'Fecha de nacimiento', 'trim|required|xss_clean');
	$this->form_validation->set_rules('sexo', 'Sexo', 'trim|required|xss_clean');
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
	$this->form_validation->set_rules('celular', 'Celular', 'trim|required|xss_clean');
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
	$this->form_validation->set_rules('cuantas_estudian', 'Cuantas personas estudian', 'trim|required|xss_clean|numeric');	
	$this->form_validation->set_rules('en_que_niveles', 'En que niveles educativos', 'trim|xss_clean');

	$this->form_validation->set_rules('escuela', 'Escuela', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('carrera', 'Carrera', 'trim|required|xss_clean');
	$this->form_validation->set_rules('turno', 'Turno', 'trim|required|xss_clean|numeric');
	$this->form_validation->set_rules('grado', 'Semestre o grado escolar', 'trim|required|xss_clean');
	$this->form_validation->set_rules('promedio', 'Promedio', 'trim|required|xss_clean');
	$this->form_validation->set_rules('ingreso', 'Nuevo ingreso o reingreso', 'trim|required|xss_clean|numeric');

	$this->form_validation->set_rules('p1', 'Pregunta 1', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p2', 'Pregunta 2', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p3', 'Pregunta 3', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p4', 'Pregunta 4', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p5', 'Pregunta 5', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p6', 'Pregunta 6', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p7', 'Pregunta 7', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p8', 'Pregunta 8', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p9', 'Pregunta 9', 'trim|required|xss_clean');
	$this->form_validation->set_rules('p10', 'Pregunta 10', 'trim|required|xss_clean');

	if ($this->form_validation->run() == FALSE) {
		$this->load->view('validation_errors');
	}else{
		$data['datos_personales']=array(
			'nombre'=>$this->input->post('nombre'),
			'ape_pat'=>$this->input->post('ape_pat'),
			'ape_mat'=>$this->input->post('ape_mat'),
			'fec_nac'=>$this->input->post('fec_nac'),
			'sexo'=>$this->input->post('sexo'),
			'id_edo_civil'=>$this->input->post('edo_civil'),
			'hijos'=>$this->input->post('hijos'),
			'calle'=>$this->input->post('calle'),
			'num_casa'=>$this->input->post('num_casa'),
			'colonia'=>$this->input->post('colonia'),
			'entre_calle_1'=>$this->input->post('entre_calle_1'),
			'entre_calle_2'=>$this->input->post('entre_calle_2'),
			'cerca_de'=>$this->input->post('cerca_de'),
			'ciudad'=>$this->input->post('ciudad'),
			'tel'=>$this->input->post('telefono'),
			'cel'=>$this->input->post('celular'),
			'correo'=>$this->input->post('correo')
			);
		$data['datos_familiares']=array(
			'padre_nombre'=>$this->input->post('padre_nombre'),
			'padre_ape_pat'=>$this->input->post('padre_ape_pat'),
			'padre_ape_mat'=>$this->input->post('padre_ape_mat'),
			'padre_edad'=>$this->input->post('padre_edad'),
			'padre_nivel_educativo'=>$this->input->post('padre_escolaridad'),
			'padre_ocupacion'=>$this->input->post('padre_ocupacion'),
			'padre_vivo_muerto'=>$this->input->post('padre_vivo_muerto'),
			'madre_nombre'=>$this->input->post('madre_nombre'),
			'madre_ape_pat'=>$this->input->post('madre_ape_pat'),
			'madre_ape_mat'=>$this->input->post('madre_ape_mat'),
			'madre_edad'=>$this->input->post('madre_edad'),
			'madre_nivel_educativo'=>$this->input->post('madre_escolaridad'),
			'madre_ocupacion'=>$this->input->post('madre_ocupacion'),
			'madre_vivo_muerto'=>$this->input->post('madre_vivo_muerto'),
			'edo_civil_padres'=>$this->input->post('edo_civil_padres'),
			'vive_con'=>$this->input->post('vive_con'),
			'personas_dependen_ingreso'=>$this->input->post('personas_dependen_ingreso'),
			'familia_estudian'=>$this->input->post('cuantas_estudian'),
			'niveles_estudian'=>$this->input->post('en_que_niveles')
			);
		$data['datos_escolares']=array(
			'id_nivel_educativo'=>$this->input->post('nivel_educativo'),
			'id_escuela'=>$this->input->post('escuela'),
			'carrera'=>$this->input->post('carrera'),
			'turno'=>$this->input->post('turno'),
			'grado'=>$this->input->post('grado'),
			'promedio'=>$this->input->post('promedio'),
			'estado'=>$this->input->post('ingreso')
			);
		$data['encuesta_p1']=array(
			'fec_solicitud'=>date('Y-m-d'),
			'res1'=>$this->input->post('p1'),
			'res2'=>$this->input->post('p2'),
			'res3'=>$this->input->post('p3'),
			'res4'=>$this->input->post('p4'),
			'res5'=>$this->input->post('p5'),
			'res6'=>$this->input->post('p6'),
			'res7'=>$this->input->post('p7'),
			'res8'=>$this->input->post('p8'),
			'res9'=>$this->input->post('p9'),
			'res10'=>$this->input->post('p10')
			);
		/*$data=array(
			'id_nivel_educativo'=>$this->input->post('nivel_educativo'),
			'nombre'=>$this->input->post('nombre'),
			'ape_pat'=>$this->input->post('ape_pat'),
			'ape_mat'=>$this->input->post('ape_mat'),
			'fec_nac'=>$this->input->post('fec_nac'),
			'sexo'=>$this->input->post('sexo'),
			'id_edo_civil'=>$this->input->post('edo_civil'),
			'hijos'=>$this->input->post('hijos'),
			'calle'=>$this->input->post('calle'),
			'num_casa'=>$this->input->post('num_casa'),
			'colonia'=>$this->input->post('colonia'),
			'entre_calle_1'=>$this->input->post('entre_calle_1'),
			'entre_calle_2'=>$this->input->post('entre_calle_2'),
			'cerca_de'=>$this->input->post('cerca_de'),
			'ciudad'=>$this->input->post('ciudad'),
			'tel'=>$this->input->post('telefono'),
			'cel'=>$this->input->post('celular'),
			'correo'=>$this->input->post('correo'),
			'padre_nombre'=>$this->input->post('padre_nombre'),
			'padre_ape_pat'=>$this->input->post('padre_ape_pat'),
			'padre_ape_mat'=>$this->input->post('padre_ape_mat'),
			'padre_edad'=>$this->input->post('padre_edad'),
			'padre_nivel_educativo'=>$this->input->post('padre_escolaridad'),
			'padre_ocupacion'=>$this->input->post('padre_ocupacion'),
			'padre_vivo_muerto'=>$this->input->post('padre_vivo_muerto'),
			'madre_nombre'=>$this->input->post('madre_nombre'),
			'madre_ape_pat'=>$this->input->post('madre_ape_pat'),
			'madre_ape_mat'=>$this->input->post('madre_ape_mat'),
			'madre_edad'=>$this->input->post('madre_edad'),
			'madre_escolaridad'=>$this->input->post('madre_escolaridad'),
			'madre_ocupacion'=>$this->input->post('madre_ocupacion'),
			'madre_vivo_muerto'=>$this->input->post('madre_vivo_muerto'),
			'edo_civil_padres'=>$this->input->post('edo_civil_padres'),
			'vive_con'=>$this->input->post('vive_con'),
			'personas_dependen_ingreso'=>$this->input->post('personas_dependen_ingreso'),
			'familia_estudian'=>$this->input->post('cuantas_estudian'),
			'niveles_estudian'=>$this->input->post('en_que_niveles'),
			'id_escuela'=>$this->input->post('escuela'),
			'carrera'=>$this->input->post('carrera'),
			'turno'=>$this->input->post('turno'),
			'grado'=>$this->input->post('grado'),
			'promedio'=>$this->input->post('promedio'),
			'estado'=>$this->input->post('ingreso'),
			'p1'=>$this->input->post('p1'),
			'p2'=>$this->input->post('p2'),
			'p3'=>$this->input->post('p3'),
			'p4'=>$this->input->post('p4'),
			'p5'=>$this->input->post('p5'),
			'p6'=>$this->input->post('p6'),
			'p7'=>$this->input->post('p7'),
			'p8'=>$this->input->post('p8'),
			'p9'=>$this->input->post('p9'),
			'p10'=>$this->input->post('p10')
			);*/
		$this->load->model('solicitud_db');
		$result=$this->solicitud_db->registrar_solicitud($data);
		if($result==FALSE){
			echo "falsee";
		}else{
			$this->session->set_flashdata("message", $data['datos_personales']['nombre']." ".$data['datos_personales']['ape_pat']." ".$data['datos_personales']['ape_mat']." Registrado Correctamente.");
			redirect(base_url(),'refresh');
		}
	}
}

}
?>