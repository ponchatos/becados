<?php

Class Read_data extends CI_Model {

public function get_solicitudes(){
	$this->db->select('id_solicitud,fec_solicitud,nombre,ape_pat,ape_mat,promedio,nivel_educativo,puntaje');
	$query=$this->db->get('vista_solicitud2');
	if($query->num_rows()>0){
		$return=array();
		foreach ($query->result() as $row) {
			$return[]=array(
				'id_solicitud'=>$row->id_solicitud,
				'fec_solicitud'=>$row->fec_solicitud,
				'nombre'=>$row->nombre,
				'ape_pat'=>$row->ape_pat,
				'ape_mat'=>$row->ape_mat,
				'promedio'=>$row->promedio,
				'nivel_educativo'=>$row->nivel_educativo,
				'puntaje'=>$row->puntaje
				);
		}
		return $return;
	}else{
		return FALSE;
	}
}

public function get_solicitud_info($id_solicitud){
	$this->db->where('id_solicitud',$id_solicitud);
	$query=$this->db->get('vista_solicitud2');
	if($query->num_rows()>0){
		$return=array(
				'id_solicitud'=>$row->id_solicitud,
				'fec_solicitud'=>$row->fec_solicitud,
				'nombre'=>$row->nombre,
				'ape_pat'=>$row->ape_pat,
				'ape_mat'=>$row->ape_mat,
				'sexo'=>$row->sexo,
				'fec_nac'=>$row->fec_nac,
				'estado_civil_solicitante'=>$row->estado_civil_solicitante,
				'hijos'=>$row->hijos,
				'calle'=>$row->calle,
				'num_casa'=>$row->num_casa,
				'colonia'=>$row->colonia,
				'entre_calle_1'=>$row->entre_calle_1,
				'entre_calle_2'=>$row->entre_calle_2,
				'cerca_de'=>$row->cerca_de,
				'ciudad'=>$row->ciudad,
				'tel'=>$row->tel,
				'cel'=>$row->cel,
				'correo'=>$row->correo,
				'facebook'=>$row->facebook,
				'padre_nombre'=>$row->padre_nombre,
				'padre_ape_pat'=>$row->padre_ape_pat,
				'padre_ape_mat'=>$row->padre_ape_mat,
				'padre_edad'=>$row->padre_edad,
				'padre_nivel_educativo'=>$row->padre_nivel_educativo,
				'padre_ocupacion'=>$row->padre_ocupacion,
				'padre_vivo_muerto'=>$row->padre_vivo_muerto,
				'madre_nombre'=>$row->madre_nombre,
				'madre_ape_pat'=>$row->madre_ape_pat,
				'madre_ape_mat'=>$row->madre_ape_mat,
				'madre_edad'=>$row->madre_edad,
				'madre_nivel_educativo'=>$row->madre_nivel_educativo,
				'edo_civil_padres'=>$row->edo_civil_padres,
				'vive_con'=>$row->vive_con,
				'personas_dependen_ingreso'=>$row->personas_dependen_ingreso,
				'familia_estudian'=>$row->familia_estudian,
				'periodo'=>$row->periodo,
				'nivel_educativo'=>$row->nivel_educativo,
				'escuela'=>$row->escuela,
				'carrera'=>$row->carrera,
				'grado'=>$row->grado,
				'turno'=>$row->turno,
				'promedio'=>$row->promedio,
				'estado'=>$row->estado,
				'res1'=>$row->res1,
				'res2'=>$row->res2,
				'res3'=>$row->res3,
				'res4'=>$row->res4,
				'res5'=>$row->res5,
				'res6'=>$row->res6,
				'res7'=>$row->res7,
				'res8'=>$row->res8,
				'res9'=>$row->res9,
				'res10'=>$row->res10,
				'cal1'=>$row->cal1,
				'cal2'=>$row->cal2,
				'cal3'=>$row->cal3,
				'cal4'=>$row->cal4,
				'cal5'=>$row->cal5,
				'cal6'=>$row->cal6,
				'cal7'=>$row->cal7,
				'cal8'=>$row->cal8,
				'cal9'=>$row->cal9,
				'cal10'=>$row->cal10,
				'puntaje'=>$row->puntaje,
				'nivel'=>$row->nivel,
				'observaciones'=>$row->observaciones,
				'proceso'=>$row->proceso
			);
		return $return;
	}else{
		return FALSE;
	}
}

//PENDIENTE
public function get_becados_hours(){
	$this->db->select('id_becado,nombre,ape_pat,ape_mat');
	$query_becados=$this->db->get('vista_becado');
	$return=array();
	foreach ($query_becados->result() as $row) {
		$horas=$this->get_user_hours($row->id_becado);
		$return[]=array(
			'id_becado'=>$row->id_becado,
			'nombre'=>$row->nombre,
			'ape_pat'=>$row->ape_pat,
			'ape_mat'=>$row->ape_mat,
			'horas'=>$horas
		);
	}
	return $return;
}

public function get_comprobantes_info($id_becado){
	$id_periodo=$this->periodo_actual_id();

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

public function get_user_hours($id_becado,$periodo=-1){
	if($periodo==-1) $periodo=$this->periodo_actual_id();
	$this->db->select('hora');
	$this->db->where('id_becado',$id_becado);
	$this->db->where('id_periodo',$periodo);
	$query_horas=$this->db->get('horas');
	$horas=0;
	if($query_horas->num_rows()>0){
		foreach ($query_horas->result() as $row) {
			$horas+=$row->hora;
		}
	}
	$this->db->select('horas_acumuladas');
	$this->db->where('id_becado',$id_becado);
	$query_periodos=$this->db->get('becado');
	$horas_acumuladas=$query_periodos->row(0)->horas_acumuladas;
	return $horas+$horas_acumuladas;
}

public function get_user_info($id_becado){
	$this->db->where('id_becado',$id_becado);

	$query=$this->db->get('vista_becado');
	if($query->num_rows()==1){
		/*$this->db->where('id_becado',$id_becado);
		$this->db->where('periodo',$query->row(0)->periodo);
		$query_horas=$this->db->get('vista_horas');
		$horas=0;
		if($query_horas->num_rows()>0){
			foreach ($query_horas->result() as $row) {
				$horas+=$row->hora;
			}
		}*/
		$horas=$this->get_user_hours($id_becado,$query->row(0)->periodo);

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

public function periodo_actual_nombre(){
	$this->db->where('status',1);
	$query=$this->db->get('periodo');
	if($query->num_rows()>0){
		return $query->row(0)->nombre;
	}else{
		return -1;
	}
}

public function periodo_actual_id(){
	$this->db->where('status',1);
	$query=$this->db->get('periodo');
	if($query->num_rows()>0){
		return $query->row(0)->id_periodo;
	}else{
		return -1;
	}
}

}

?>