<?php
Class Ajax_post extends CI_Controller {

public function __construct() {
parent::__construct();

// Load form helper library
$this->load->helper('form');

// Load form validation library
$this->load->library('form_validation');

// Load session library
$this->load->library('session');

// Load database
$this->load->model('read_data');

}


public function change_periodo(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('semestre', 'Semestre', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('anio', 'Año', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$periodo_actual = $this->read_data->periodo_actual_array();
				$periodo_actual_ciclo_number = ( strtolower($periodo_actual->ciclo)=="ene-jun" ? 1 : 2 );
				if($this->input->post('anio') <= $periodo_actual->anio && $this->input->post('semestre') <= $periodo_actual_ciclo_number){
					$response['success']=0;
					$response['message']="El periodo tiene que ser mayor al actual (".$periodo_actual->ciclo." ".$periodo_actual->anio.")";
				}else{
					$periodo_nuevo = array(
						"ciclo"=>( $this->input->post('semestre') == 1 ? "ENE-JUN" : "AGO-DIC" ),
						"anio"=>$this->input->post('anio')
					);

					$this->load->model('metodos');
					$change_periodo = $this->metodos->change_periodo($periodo_nuevo);
					if($change_periodo != FALSE){
						$response['success']=1;
						$response['message']="Periodo cambiado correctamente";
					}else{
						$response['success']=0;
						$response['message']="No se pudo cambiar el periodo";
					}
				}
			}
			die(json_encode($response,true));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function update_pago_realizado(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			
			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$this->load->model('read_data');

				$id_becado = $this->input->post('id_becado');
				$id_periodo = $this->read_data->periodo_actual_id();
				$fecha = date('Y-m-d');
				$importe = $this->read_data->get_user_pago_importe($id_becado);

				$data=array(
					'id_becado'=>$id_becado,
					'id_periodo'=>$id_periodo,
					'fecha'=>$fecha,
					'importe'=>$importe
				);


				if($this->read_data->is_becado_valid($id_becado)){
					$result=$this->db->insert('pagos',$data);
					if($this->db->affected_rows()>0){
						$response['success']=1;
						$response['message']="Pago confirmado correctamente";

						$pagos_realizados = $this->read_data->get_user_pagos_realizados($id_becado);
						if($pagos_realizados != null){
							$response['pagos_realizados']=$pagos_realizados;
						}
					}else{
						$response['success']=-1;
						$response['message']="Error al confirmar el pago";	
					}
				}else{
					$response['success']=-1;
					$response['message']="El pago del becado no puede ser confirmado, revise comprobantes";
				}

			}
			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function get_pagos_autorizados(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_periodo', 'Becado', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$result=$this->read_data->get_pagos_autorizados($this->input->post('id_periodo'));
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Lista becados";
					$response['data']=$result;
				}else{
					$response['success']=0;
					$response['message']="No se encontraron becados";
				}
			}

			die(json_encode($response,true));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function update_data_escolares(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			//$this->form_validation->set_rules('periodo', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('nivel_educativo', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('escuela', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('carrera', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('grado', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('turno', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('promedio', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('estado', 'Becado', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$data=array(
					'id_becado'=>$this->input->post('id_becado'),
					'id_nivel_educativo'=>$this->input->post('nivel_educativo'),
					'id_escuela'=>$this->input->post('escuela'),
					'carrera'=>$this->input->post('carrera'),
					'grado'=>$this->input->post('grado'),
					'turno'=>$this->input->post('turno'),
					'promedio'=>$this->input->post('promedio'),
					'estado'=>$this->input->post('estado'),
				);

				$this->load->model('user');
				$result=$this->user->update_data_escolares($data);
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Becado actualizado correctamente";
				}else{
					$response['success']=0;
					$response['message']="No se pudo actualizar al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}


//falta calar
public function update_data_familiares(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('padre_nombre', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('padre_ape_pat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('padre_ape_mat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('padre_edad', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('padre_nivel_educativo', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('padre_ocupacion', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('padre_vivo_muerto', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('madre_nombre', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('madre_ape_pat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('madre_ape_mat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('madre_edad', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('madre_nivel_educativo', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('madre_ocupacion', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('madre_vivo_muerto', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('edo_civil_padres', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('vive_con', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('personas_dependen_ingreso', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('familia_estudian', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('niveles_estudian', 'Becado', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$data=array(
					'id_becado'=>$this->input->post('id_becado'),
					'padre_nombre'=>$this->input->post('padre_nombre'),
					'padre_ape_pat'=>$this->input->post('padre_ape_pat'),
					'padre_ape_mat'=>$this->input->post('padre_ape_mat'),
					'padre_edad'=>$this->input->post('padre_edad'),
					'padre_nivel_educativo'=>$this->input->post('padre_nivel_educativo'),
					'padre_ocupacion'=>$this->input->post('padre_ocupacion'),
					'padre_vivo_muerto'=>$this->input->post('padre_vivo_muerto'),
					'madre_nombre'=>$this->input->post('madre_nombre'),
					'madre_ape_pat'=>$this->input->post('madre_ape_pat'),
					'madre_ape_mat'=>$this->input->post('madre_ape_mat'),
					'madre_edad'=>$this->input->post('madre_edad'),
					'madre_nivel_educativo'=>$this->input->post('madre_nivel_educativo'),
					'madre_ocupacion'=>$this->input->post('madre_ocupacion'),
					'madre_vivo_muerto'=>$this->input->post('madre_vivo_muerto'),
					'edo_civil_padres'=>$this->input->post('edo_civil_padres'),
					'vive_con'=>$this->input->post('vive_con'),
					'personas_dependen_ingreso'=>$this->input->post('personas_dependen_ingreso'),
					'familia_estudian'=>$this->input->post('familia_estudian'),
					'niveles_estudian'=>$this->input->post('niveles_estudian')
				);

				$this->load->model('user');
				$result=$this->user->update_data_familiares($data);
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Becado actualizado correctamente";
				}else{
					$response['success']=0;
					$response['message']="No se pudo actualizar al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function update_data_personales(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('nombre', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ape_pat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ape_mat', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('sexo', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('fec_nac', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('estado_civil_solicitante', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('hijos', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('calle', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('num_casa', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('colonia', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('entre_calle_1', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('entre_calle_2', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('cerca_de', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('ciudad', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('tel', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cel', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('correo', 'Becado', 'trim|required|xss_clean');
			$this->form_validation->set_rules('facebook', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('h_artisticas', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('h_civicas', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('h_deportivas', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('h_lenguaje', 'Becado', 'trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$data=array(
					'id_becado'=>$this->input->post('id_becado'),
					'nombre'=>$this->input->post('nombre'),
					'ape_pat'=>$this->input->post('ape_pat'),
					'ape_mat'=>$this->input->post('ape_mat'),
					'sexo'=>$this->input->post('sexo'),
					'fec_nac'=>$this->input->post('fec_nac'),
					'id_edo_civil'=>$this->input->post('estado_civil_solicitante'),
					'hijos'=>$this->input->post('hijos'),
					'calle'=>$this->input->post('calle'),
					'num_casa'=>$this->input->post('num_casa'),
					'colonia'=>$this->input->post('colonia'),
					'entre_calle_1'=>$this->input->post('entre_calle_1'),
					'entre_calle_2'=>$this->input->post('entre_calle_2'),
					'cerca_de'=>$this->input->post('cerca_de'),
					'ciudad'=>$this->input->post('ciudad'),
					'tel'=>$this->input->post('tel'),
					'cel'=>$this->input->post('cel'),
					'correo'=>$this->input->post('correo'),
					'facebook'=>$this->input->post('facebook'),
					'h_artisticas'=>$this->input->post('h_artisticas'),
					'h_civicas'=>$this->input->post('h_civicas'),
					'h_deportivas'=>$this->input->post('h_deportivas'),
					'h_lenguaje'=>$this->input->post('h_lenguaje'),
				);

				$this->load->model('user');
				$result=$this->user->update_data_personales($data);
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Becado actualizado correctamente";
				}else{
					$response['success']=0;
					$response['message']="No se pudo actualizar al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}


//pendientes la validacion de campos
public function update_data_becado(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('status', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('notas', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('recomendado', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('observacion', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('car_compromiso', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('formulario_IB', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('puntaje_encuesta_p1', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('nivel', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('diagnostico_social', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('puntaje_encuesta_p2', 'Becado', 'trim|xss_clean');
			$this->form_validation->set_rules('v', 'Becado', 'trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				$this->load->model('user');
				$data_enc_1=array(
					'id_becado'=>$this->input->post('id_becado'),
					'puntaje'=>$this->input->post('puntaje_encuesta_p1'),
					'nivel'=>$this->input->post('nivel')
					);
				$this->user->update_encuesta_p1($data_enc_1);

				$data_enc_2=array(
					'id_becado'=>$this->input->post('id_becado'),
					'v'=>$this->input->post('v'),
					'diagnostico_social'=>$this->input->post('diagnostico_social'),
					'puntaje'=>$this->input->post('puntaje_encuesta_p2')
					);
				$this->user->update_encuesta_p2($data_enc_2);

				$data=array(
					'id_becado'=>$this->input->post('id_becado'),
					'status'=>$this->input->post('status'),
					'notas'=>$this->input->post('notas'),
					'recomendado'=>$this->input->post('recomendado'),
					'observacion'=>$this->input->post('observacion'),
					'car_compromiso'=>$this->input->post('car_compromiso'),
					'formulario_IB'=>$this->input->post('formulario_IB')
				);

				
				$result=$this->user->update_data_becado($data);
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Becado actualizado correctamente";
				}else{
					$response['success']=0;
					$response['message']="No se pudo actualizar al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function update_comprobantes(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){

			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('pago', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('boleta', 'Becado', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación";
			}else{
				
				$data=array(
					'id_becado'=>$this->input->post('id_becado'),
					'pago'=>$this->input->post('pago'),
					'boleta'=>$this->input->post('boleta')
				);

				$this->load->model('user');
				$result=$this->user->update_comprobantes($data);
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Becado actualizado correctamente";
				}else{
					$response['success']=0;
					$response['message']="No se pudo actualizar al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function get_data_becado(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_becado', 'Becado', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="El campo de becado es obligatorio";
			}else{
				$result=$this->read_data->get_becado_info($this->input->post('id_becado'));
				if($result!=FALSE){
					$response['success']=1;
					$response['message']="Exito";
					$response['data']=$result;
				}else{
					$response['success']=0;
					$response['message']="No se encontró al becado";
				}
			}

			die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

}
?>