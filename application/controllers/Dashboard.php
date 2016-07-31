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
	//$this->load->view('prueba');
	$data=array(
				'id_becado'=>1,
				'tel'=>555,
				'cel'=>555,
				'correo'=>"update@update.com",
				'facebook'=>"new fb"
			);
	$this->load->model('user');
	echo $this->user->modify_data($data)?'tru':'fols';
}

public function prueba2(){
	$this->load->model('metodos');
	$this->metodos->apuntar_imagen($this->session->userdata['logged_in']['id_becado'],"asd");
}

public function prueba3(){

}

public function index(){
	if(isset($this->session->userdata['logged_in'])){
		if($this->session->userdata['logged_in']['privilegios']>0){
			$this->load->view('admin');
		}else{
			$user_info=$this->read_data->get_user_info($this->session->userdata['logged_in']['id_becado']);
			$user_info['comprobantes']=$this->read_data->get_comprobantes_info($this->session->userdata['logged_in']['id_becado']);

			$this->load->view('user',$user_info);
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
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['max_width'] = '2024';
        $config['max_height'] = '2008';
        $config['encrypt_name'] = TRUE;

        return $config;
    }


}
?>