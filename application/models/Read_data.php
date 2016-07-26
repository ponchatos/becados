<?php

Class Read_data extends CI_Model {

public function get_comprobantes_info($id_becado){
	$this->load->model('metodos');
	$id_periodo=$this->metodos->periodo_actual();

	$return=array();
	$this->db->where('id_becado',$id_becado);
	$this->db->where('id_periodo',$id_periodo);
	$comprobante_boleta=$this->db->get('comprobante_boleta');
	if($comprobante_boleta->num_rows()>0){
		$return['boleta']=array(
			'url'=>'uploads/'.$comprobante_boleta->row(0)->url,
			'validacion'=>$comprobante_boleta->row(0)->validacion
			);
	}

	$this->db->where('id_becado',$id_becado);
	$this->db->where('id_periodo',$id_periodo);
	$comprobante_pago=$this->db->get('comprobante_pago');
	if($comprobante_pago->num_rows()>0){
		$return['pago']=array(
			'url'=>'uploads/'.$comprobante_pago->row(0)->url,
			'validacion'=>$comprobante_pago->row(0)->validacion
			);
	}
	return $return;

}


public function get_user_info($id_becado){
	$this->db->where('id_becado',$id_becado);

	$query=$this->db->get('vista_becado');
	if($query->num_rows()==1){
		$this->db->where('id_becado',$id_becado);
		$this->db->where('periodo',$query->row(0)->periodo);
		$query_horas=$this->db->get('vista_horas');
		$horas=0;
		if($query_horas->num_rows()>0){
			foreach ($query_horas->result() as $row) {
				$horas+=$row->hora;
			}
		}

		$this->db->where('id_becado',$id_becado);
		$this->db->where('id_periodo',$query->row(0)->periodo);
		$query_comprobante=$this->db->get('comprobante_pago');
		$comprobante="";
		if($query_comprobante->num_rows()>0){
			$comprobante=$query_comprobante->row(0)->comprobante_url!=null?$query_comprobante->row(0)->comprobante_url:'';
		}

		$this->db->where('id_becado',$id_becado);
		$this->db->where('id_periodo',$query->row(0)->periodo);
		$query_boleta=$this->db->get('comprobante_boleta');
		$boleta="";
		if($query_boleta->num_rows()>0){
			$comprobante=$query_boleta->row(0)->boleta_url!=null?$query_boleta->row(0)->boleta_url:'';
		}
		
		$return=array(
			'nombre'=>$query->row(0)->nombre,
			'escuela'=>$query->row(0)->escuela,
			'grado'=>$query->row(0)->grado,
			'tel'=>$query->row(0)->tel,
			'cel'=>$query->row(0)->cel,
			'correo'=>$query->row(0)->correo,
			'face'=>$query->row(0)->facebook,
			'periodo'=>$query->row(0)->periodo,
			'status'=>$query->row(0)->status,
			'horas'=>$horas,
			'comprobante_url'=>$comprobante,
			'boleta_url'=>$boleta
			);
		return $return;
	}else{
		return FALSE;
	}

}

}

?>