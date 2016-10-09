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
$this->load->model('read_data');

}

public function prueba(){
	$this->load->view('prueba');
	//print_r($this->read_data->get_becados_hours());
	//echo $this->callback_date_valid("2012-13-10")?'tru':'fols';
}

public function prueba2(){
	$this->load->model('metodos');
	$this->metodos->apuntar_imagen($this->session->userdata['logged_in']['id_becado'],"asd");
}

public function prueba3(){
}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->load->view('admin');
		}else if($this->session->userdata['logged_in']['privilegios']>0){
			$this->asignar_horas();
		}else{
			$user_info=$this->read_data->get_user_info($this->session->userdata['logged_in']['id_becado']);
			$user_info['comprobantes']=$this->read_data->get_comprobantes_info($this->session->userdata['logged_in']['id_becado']);

			$this->load->view('user',$user_info);
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function listas(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
				$this->load->model('read_data');

				$data=array();
				$periodos = $this->read_data->get_periodos();
				if($periodos!=FALSE){
					$data['periodos']=$periodos;
				}
				$this->load->view('listas',$data);
			}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function administrador(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){

			$this->load->model('user');
			$usuarios=$this->user->get_users();
			if($usuarios!=FALSE)
				$data['usuarios'] = $usuarios;
			//$this->load->model('user');
			$periodo = $this->read_data->periodo_actual_array();
			if($periodo!=FALSE){
				$data['periodo']=array(
					'ciclo'=>$periodo->ciclo,
					'anio'=>$periodo->anio
				);
			}
			$this->load->view('admin_administrador',$data);
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function administrador_create_user(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){

			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ape_pat', 'Apellido Paterno', 'trim|required|xss_clean');
			$this->form_validation->set_rules('ape_mat', 'Apellido Materno', 'trim|required|xss_clean');
			$this->form_validation->set_rules('privilegios', 'Privilegios', 'trim|required|xss_clean|numeric');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación de campos";
			}else{
				$data= array(
					'usuario'=>$this->input->post('usuario'),
					'password'=>$this->input->post('password'),
					'nombre'=>$this->input->post('nombre'),
					'apellido_paterno'=>$this->input->post('ape_pat'),
					'apellido_materno'=>$this->input->post('ape_mat'),
					'privilegios'=> ( $this->input->post('password') == 99 ? 99 : 50 ),
					'id_becado' => -1
					);

				$this->load->model('user');
				if($this->user->create_user($data)){
					$response['success']=1;
					$response['message']="Usuario ".$this->input->post('usuario')." creado correctamente";
				}else{
					$response['success']=0;
					$response['message']="Usuario ".$this->input->post('usuario')." ya existe";
				}
			}

			$this->session->set_flashdata('message', $response['message']);
			$this->administrador();
			//die(json_encode($response));
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function administrador_delete_user(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){

			$this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación de campos";
				
			}else{

				$this->load->model('user');
				if($this->user->delete_user($this->input->post('usuario'))){
					$response['success']=1;
					$response['message']="Usuario ".$this->input->post('usuario')." eliminado correctamente";
				}else{
					$response['success']=0;
					$response['message']="Usuario ".$this->input->post('usuario')." no se ha podido eliminar";
				}
			}

			//die(json_encode($response));
			$this->session->set_flashdata('message', $response['message']);
			$this->administrador();
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function becar(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_solicitud', 'Solicitud', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('recomendado', 'Recomendado', 'trim|xss_clean');
			$this->form_validation->set_rules('observacion', 'Observacion', 'trim|xss_clean');
			$this->form_validation->set_rules('car_compromiso', 'Carta Compromiso', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('formulario_IB', 'Formulario IB', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('facebook', 'Facebook', 'trim|xss_clean');
			$this->form_validation->set_rules('h_artisticas', 'Habilidades Artisticas', 'trim|xss_clean');
			$this->form_validation->set_rules('h_deportivas', 'Habilidades Deportivas', 'trim|xss_clean');
			$this->form_validation->set_rules('h_civicas', 'Habilidades Civicas', 'trim|xss_clean');
			$this->form_validation->set_rules('h_lenguaje', 'Habilidades Lenguaje', 'trim|xss_clean');
			$this->form_validation->set_rules('puntaje', 'Puntaje', 'trim|xss_clean');
			$this->form_validation->set_rules('v', 'V', 'trim|xss_clean');
			$this->form_validation->set_rules('diagnostico_social', 'Diagnostico Social', 'trim|xss_clean');
			$this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean');
			$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');
			$this->form_validation->set_rules('confirm_password', 'Confirm Contraseña', 'trim|required|xss_clean');

			
			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Fallo en la validación de campos";
			}else{
				$this->load->model('login_database');
				if($this->login_database->user_exists($this->input->post('username'))){
					$response['success']=0;
					$response['message']="El usuario ".$this->input->post('username')." ya existe";
				}else if($this->input->post('password')!=$this->input->post('confirm_password')){
					$response['success']=-1;
					$response['message']="Los campos de contraseña no coinciden";
				}else{
					$data=array(
						'id_solicitud'=>$this->input->post('id_solicitud'),
						'recomendado'=>$this->input->post('recomendado')==null?'':$this->input->post('recomendado'),
						'observacion'=>$this->input->post('observacion')==null?'':$this->input->post('observacion'),
						'car_compromiso'=>$this->input->post('car_compromiso'),
						'formulario_IB'=>$this->input->post('formulario_IB'),
						'facebook'=>$this->input->post('facebook')==null?'':$this->input->post('facebook'),
						'h_artisticas'=>$this->input->post('h_artisticas')==null?'':$this->input->post('h_artisticas'),
						'h_deportivas'=>$this->input->post('h_deportivas')==null?'':$this->input->post('h_deportivas'),
						'h_civicas'=>$this->input->post('h_civicas')==null?'':$this->input->post('h_civicas'),
						'h_lenguaje'=>$this->input->post('h_lenguaje')==null?'':$this->input->post('h_lenguaje'),
						'v'=>$this->input->post('v')==null?'':$this->input->post('v'),
						'diagnostico_social'=>$this->input->post('diagnostico_social')==null?'':$this->input->post('diagnostico_social'),
						'puntaje'=>$this->input->post('puntaje')==null?'':$this->input->post('puntaje'),
						'username'=>$this->input->post('username'),
						'password'=>$this->input->post('password')
					);
					$this->load->model('user');
					$result=$this->user->becar($data);
					if($result!=FALSE){
						$response['success']=1;
						$response['message']="Becado agregado correctamente";	
					}else{
						$response['success']=0;
						$response['message']="No se ha podido registrar el becado";
					}
				
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

public function becados(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$data=array();
			$becados=$this->read_data->get_becados();
			if($becados!=FALSE) $data['becados_tabla']=$becados;
			$data['campos_data']=$this->read_data->get_becados_fields();
			$this->load->view('admin_becados',$data);
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}

}

public function solicitudes(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$data=array();
			$solicitudes=$this->read_data->get_solicitudes();
			if($solicitudes!=FALSE) $data['solicitudes_tabla']=$solicitudes;
			$this->load->view('admin_solicitudes',$data);
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

public function set_solicitud_info(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_solicitud', 'Solicitud', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal1', 'Calificación 1', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal2', 'Calificación 2', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal3', 'Calificación 3', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal4', 'Calificación 4', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal5', 'Calificación 5', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal6', 'Calificación 6', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal7', 'Calificación 7', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal8', 'Calificación 8', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal9', 'Calificación 9', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('cal10', 'Calificación 10', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('nivel', 'Nivel', 'trim|xss_clean');
			$this->form_validation->set_rules('observaciones', 'Observaciones', 'trim|xss_clean');
			$this->form_validation->set_rules('proceso', 'Proceso', 'trim|required|xss_clean');
			
			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Todos los campos son necesarios";
			}else{
				$this->load->model('solicitud_db');
				if($this->input->post('proceso')==3){
					if($this->solicitud_db->delete_solicitud($this->input->post('id_solicitud'))){
						$response['success']=1;
						$response['message']="Solicitud eliminada correctamente";
					}else{
						$response['success']=0;
						$response['message']="No se ha podido eliminar la Solicitud";
					}
				}else{
					$puntaje=$this->input->post('cal1')+$this->input->post('cal2')+$this->input->post('cal3')+$this->input->post('cal4')+$this->input->post('cal5')+$this->input->post('cal6')+$this->input->post('cal7')+$this->input->post('cal8')+$this->input->post('cal9')+$this->input->post('cal10');
					$send['id_solicitud']=$this->input->post('id_solicitud');
					$send['encuesta_cal']=array(
						'cal1'=>$this->input->post('cal1'),
						'cal2'=>$this->input->post('cal2'),
						'cal3'=>$this->input->post('cal3'),
						'cal4'=>$this->input->post('cal4'),
						'cal5'=>$this->input->post('cal5'),
						'cal6'=>$this->input->post('cal6'),
						'cal7'=>$this->input->post('cal7'),
						'cal8'=>$this->input->post('cal8'),
						'cal9'=>$this->input->post('cal9'),
						'cal10'=>$this->input->post('cal10'),
						'puntaje'=>$puntaje,
						'nivel'=>$this->input->post('nivel')!=null?$this->input->post('nivel'):''
						);
					$send['proceso']=array(
						'proceso'=>$this->input->post('proceso'),
						'observaciones'=>$this->input->post('observaciones')!=null?$this->input->post('observaciones'):''
						);
					$result=$this->solicitud_db->set_calif($send);
					if($result!=FALSE){
						$response['success']=1;
						$response['message']="Datos cambiados correctamente";
					}else{
						$response['success']=0;
						$response['message']="No se pudo realizar tu petición";
					}
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

public function get_solicitud_info(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']==99){
			$this->form_validation->set_rules('id_solicitud', 'Solicitud', 'trim|required|xss_clean|numeric');
			
			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Todos los campos son necesarios";
			}else{
				$solicitud_info=$this->read_data->get_solicitud_info($this->input->post('id_solicitud'));
				if($solicitud_info!=FALSE){
					$response['success']=1;
					$response['message']="Exito";
					$response['data']=$solicitud_info;
				}else{
					$response['success']=0;
					$response['message']="No se encontró al solicitante";
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

public function asignar_horas(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']>0){
			$data['becados_tabla']=$this->read_data->get_becados_hours();
			$this->load->view('asignar_horas',$data);
		}else{
			redirect(base_url().'dashboard/','refresh');
		}
	}else{
		redirect(base_url(),'refresh');
	}
}

function date_valid($date=0) {
	 $this->form_validation->set_message($date);
	if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
	if(checkdate(substr($date, 5, 2), substr($date, 8, 2), substr($date, 0, 4)))
	return true;
	else
	return false;
	} else {
	return false;
	}
} 

public function agregar_horas(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']>0){

			$this->form_validation->set_rules('id_becado_hddn', 'Becado', 'trim|required|xss_clean|numeric');
			$this->form_validation->set_rules('evento', 'Evento', 'trim|required|xss_clean');
			$this->form_validation->set_rules('horas', 'Horas', 'trim|required|xss_clean|numeric|greater_than_equal_to[0]');
			$this->form_validation->set_rules('fecha', 'Fecha', 'trim|required|xss_clean|callback_date_valid');
			$this->form_validation->set_rules('observacion', 'Observacion', 'trim|xss_clean');

			if ($this->form_validation->run() == FALSE) {
				$response['success']=-1;
				$response['message']="Todos los campos son necesarios";
			}else{
				$this->load->model('user');
				$id_usuario=$this->user->get_id($this->session->userdata['logged_in']['username']);
				if($id_usuario!=FALSE){
					$data=array(
						'id_becado'=>$this->input->post('id_becado_hddn'),
						'id_periodo'=>$this->read_data->periodo_actual_id(),
						'evento'=>$this->input->post('evento'),
						'hora'=>$this->input->post('horas'),
						'fecha'=>$this->input->post('fecha'),
						'observacion'=>$this->input->post('observacion')!=null?$this->input->post('observacion'):'',
						'id_usuario'=>$id_usuario
					);
					$result=$this->user->add_hours($data);
					if($result){
						$response['success']=1;
						$response['message']="Horas agregadas correctamente";
					}else{
						$response['success']=0;
						$response['message']="No se han podido agregar las horas";
					}
				}else{
					$response['success']=0;
					$response['message']="No tienes permisos para realizar esta acción";
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

public function modify_user(){
	if(isset($this->session->userdata['logged_in'])){
		$this->form_validation->set_rules('mod_tel', 'Teléfono', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('mod_cel', 'Celular', 'trim|required|xss_clean|numeric');
		$this->form_validation->set_rules('mod_correo', 'Correo', 'trim|required|xss_clean|valid_email');
		$this->form_validation->set_rules('mod_face', 'Facebook', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			$response['success']=-1;
			$response['message']="Todos los campos son necesarios";
		}else{
			$data=array(
				'id_becado'=>$this->session->userdata['logged_in']['id_becado'],
				'tel'=>$this->input->post('mod_tel'),
				'cel'=>$this->input->post('mod_cel'),
				'correo'=>$this->input->post('mod_correo'),
				'facebook'=>$this->input->post('mod_face')
			);
			$this->load->model('user');
			$result=$this->user->modify_data($data);
			if($result){
				$response['success']=1;
				$response['message']="Datos actualizados correctamente";
			}else{
				$response['success']=0;
				$response['message']="No se han podido actualizar tus datos";
			}
		}
		die(json_encode($response));
	}else{
		redirect(base_url(),'refresh');
	}
}

public function upload_comprobante(){
	if(isset($this->session->userdata['logged_in'])){
		$this->upload_file("pago");
	}else{
		redirect(base_url(),'refresh');
	}
}

public function upload_boleta(){
	if(isset($this->session->userdata['logged_in'])){
		$this->upload_file("boleta");
	}else{
		redirect(base_url(),'refresh');
	}
}

private function upload_file($upload_type){
	$this->load->model('metodos');
	$table=$upload_type=="pago"?"comprobante_pago":"comprobante_boleta";
	if(isset($this->session->userdata['logged_in'])&&
		!empty($_FILES['userfile']['name'])&&
		$this->metodos->valid_upload_file($this->session->userdata['logged_in']['id_becado'],$table)){
		
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		
		for($i=0; $i<$cpt; $i++){           
            /*$_FILES['userfile']['name']= $files['userfile']['name'][$i];
            $_FILES['userfile']['type']= $files['userfile']['type'][$i];
            $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
            $_FILES['userfile']['error']= $files['userfile']['error'][$i];
            $_FILES['userfile']['size']= $files['userfile']['size'][$i];*/

            $this->upload->initialize($this->set_upload_options());
            if(!$this->upload->do_upload('userfile')){
            	$response["img_success"] = 0;
        		$response["img_message"] = $this->upload->display_errors();
            }else{
            	$file_info = $this->upload->data();
				$dataimg['imagen_url']=$file_info['file_name'];
				//$response["img_success"]=1;
				//$response["img_message"] = "Imagen subida correctamente";
				if($this->metodos->apuntar_imagen($this->session->userdata['logged_in']['id_becado'],$dataimg['imagen_url'],$table)==TRUE){
					$response["img_success"]=1;
					$response["img_message"] = "Imagen subida correctamente, espere a su verificación";
					$response["img_url"]="uploads/".$dataimg['imagen_url'];
				}else{
					$response["img_success"]=0;
					$response["img_message"]="Falló al subir la imagen";
				}
            }
        }
	}else{
		$response["img_success"]=-1;
		$response["img_message"] = "Archivo no subido";
	}
	die(json_encode($response));
}

private function set_upload_options()
    {   
        //upload an image options
        $config = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '3264';
        $config['max_height'] = '2448';
        $config['encrypt_name'] = TRUE;

        return $config;
    }


}
?>