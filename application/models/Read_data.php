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
				'id_solicitud'=>$query->row(0)->id_solicitud,
				'fec_solicitud'=>$query->row(0)->fec_solicitud,
				'nombre'=>$query->row(0)->nombre,
				'ape_pat'=>$query->row(0)->ape_pat,
				'ape_mat'=>$query->row(0)->ape_mat,
				'sexo'=>$query->row(0)->sexo,
				'fec_nac'=>$query->row(0)->fec_nac,
				'estado_civil_solicitante'=>$query->row(0)->estado_civil_solicitante,
				'hijos'=>$query->row(0)->hijos,
				'calle'=>$query->row(0)->calle,
				'num_casa'=>$query->row(0)->num_casa,
				'colonia'=>$query->row(0)->colonia,
				'entre_calle_1'=>$query->row(0)->entre_calle_1,
				'entre_calle_2'=>$query->row(0)->entre_calle_2,
				'cerca_de'=>$query->row(0)->cerca_de,
				'ciudad'=>$query->row(0)->ciudad,
				'tel'=>$query->row(0)->tel,
				'cel'=>$query->row(0)->cel,
				'correo'=>$query->row(0)->correo,
				'facebook'=>$query->row(0)->facebook,
				'padre_nombre'=>$query->row(0)->padre_nombre,
				'padre_ape_pat'=>$query->row(0)->padre_ape_pat,
				'padre_ape_mat'=>$query->row(0)->padre_ape_mat,
				'padre_edad'=>$query->row(0)->padre_edad,
				'padre_nivel_educativo'=>$query->row(0)->padre_nivel_educativo,
				'padre_ocupacion'=>$query->row(0)->padre_ocupacion,
				'padre_vivo_muerto'=>$query->row(0)->padre_vivo_muerto,
				'madre_nombre'=>$query->row(0)->madre_nombre,
				'madre_ape_pat'=>$query->row(0)->madre_ape_pat,
				'madre_ape_mat'=>$query->row(0)->madre_ape_mat,
				'madre_edad'=>$query->row(0)->madre_edad,
				'madre_nivel_educativo'=>$query->row(0)->madre_nivel_educativo,
				'madre_ocupacion'=>$query->row(0)->madre_ocupacion,
				'madre_vivo_muerto'=>$query->row(0)->madre_vivo_muerto,
				'edo_civil_padres'=>$query->row(0)->edo_civil_padres,
				'vive_con'=>$query->row(0)->vive_con,
				'personas_dependen_ingreso'=>$query->row(0)->personas_dependen_ingreso,
				'familia_estudian'=>$query->row(0)->familia_estudian,
				'niveles_estudian'=>$query->row(0)->niveles_estudian,
				'periodo'=>$query->row(0)->periodo,
				'nivel_educativo'=>$query->row(0)->nivel_educativo,
				'escuela'=>$query->row(0)->escuela,
				'carrera'=>$query->row(0)->carrera,
				'grado'=>$query->row(0)->grado,
				'turno'=>$query->row(0)->turno,
				'promedio'=>$query->row(0)->promedio,
				'estado'=>$query->row(0)->estado,
				'res1'=>$query->row(0)->res1,
				'res2'=>$query->row(0)->res2,
				'res3'=>$query->row(0)->res3,
				'res4'=>$query->row(0)->res4,
				'res5'=>$query->row(0)->res5,
				'res6'=>$query->row(0)->res6,
				'res7'=>$query->row(0)->res7,
				'res8'=>$query->row(0)->res8,
				'res9'=>$query->row(0)->res9,
				'res10'=>$query->row(0)->res10,
				'cal1'=>$query->row(0)->cal1,
				'cal2'=>$query->row(0)->cal2,
				'cal3'=>$query->row(0)->cal3,
				'cal4'=>$query->row(0)->cal4,
				'cal5'=>$query->row(0)->cal5,
				'cal6'=>$query->row(0)->cal6,
				'cal7'=>$query->row(0)->cal7,
				'cal8'=>$query->row(0)->cal8,
				'cal9'=>$query->row(0)->cal9,
				'cal10'=>$query->row(0)->cal10,
				'puntaje'=>$query->row(0)->puntaje,
				'nivel'=>$query->row(0)->nivel,
				//'observaciones'=>$query->row(0)->observaciones,
				//'proceso'=>$query->row(0)->proceso
				'proceso'=>1
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