<?php

Class Solicitud_db extends CI_Model {

public function set_calif($data){
	$this->db->trans_begin();

	$this->db->where('id_solicitud',$data['id_solicitud']);
	$this->db->update('solicitud',$data['proceso']);


		$this->db->select('id_encuesta');
		$this->db->where('id_solicitud',$data['id_solicitud']);
		$query=$this->db->get('solicitud');
		if($query->num_rows()>0){
			$this->db->where('id_encuesta',$query->row(0)->id_encuesta);
			$this->db->update('encuesta_p1',$data['encuesta_cal']);
				$this->db->trans_commit();
				return TRUE;
		}else{
			$this->db->trans_rollback();
			return FALSE;
		}
}

public function delete_solicitud($id_solicitud){
	$this->db->trans_begin();

	$this->db->where('id_solicitud',$id_solicitud);
	$query=$this->db->get('solicitud');
	if($query->num_rows()>0){
		$id_dpersonales=$query->row(0)->id_dpersonales;
		$id_dfamiliares=$query->row(0)->id_dfamiliares;
		$id_descolares=$query->row(0)->id_descolares;
		$id_encuesta=$query->row(0)->id_encuesta;

		$this->db->where('id_dpersonales',$id_dpersonales);
		$this->db->delete('datos_personales');
		if($this->db->affected_rows()==0){
			$this->db->trans_rollback();
			return FALSE;
		}

		$this->db->where('id_dfamiliares',$id_dfamiliares);
		$this->db->delete('datos_familiares');
		if($this->db->affected_rows()==0){
			$this->db->trans_rollback();
			return FALSE;
		}

		$this->db->where('id_descolares',$id_descolares);
		$this->db->delete('datos_escolares');
		if($this->db->affected_rows()==0){
			$this->db->trans_rollback();
			return FALSE;
		}

		$this->db->where('id_encuesta',$id_encuesta);
		$this->db->delete('encuesta_p1');
		if($this->db->affected_rows()==0){
			$this->db->trans_rollback();
			return FALSE;
		}

		$this->db->where('id_solicitud',$id_solicitud);
		$this->db->delete('solicitud');
		if($this->db->affected_rows()>0){
			$this->db->trans_commit();
			return TRUE;
		}else{
			$this->db->trans_rollback();
			return FALSE;
		}
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}
}

public function registrar_solicitud($data){
	$this->db->trans_begin();

	$this->db->insert('datos_personales',$data['datos_personales']);
	if($this->db->affected_rows()>0){
		$id_datos_personales=$this->db->insert_id();
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}

	$this->db->insert('datos_familiares',$data['datos_familiares']);
	if($this->db->affected_rows()>0){
		$id_datos_familiares=$this->db->insert_id();
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}

	$this->db->insert('datos_escolares',$data['datos_escolares']);
	if($this->db->affected_rows()>0){
		$id_datos_escolares=$this->db->insert_id();
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}

	$this->db->insert('encuesta_p1',$data['encuesta_p1']);
	if($this->db->affected_rows()>0){
		$id_encuesta_p1=$this->db->insert_id();
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}

	$ins=array(
		'fec_solicitud'=>date('d-m-Y'),
		'id_dpersonales'=>$id_datos_personales,
		'id_dfamiliares'=>$id_datos_familiares,
		'id_descolares'=>$id_datos_escolares,
		'id_encuesta'=>$id_encuesta_p1
		);
	$this->db->insert('solicitud',$ins);
	if($this->db->affected_rows()>0){
		$this->db->trans_commit();

		return $this->db->insert_id();
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}
}



public function get_spinner_datas(){
	$niveles_educativos=$this->db->get('nivel');
	$edos_civiles=$this->db->get('estado_civil');
	$turnos=$this->db->get('turno');
	$escuelas=$this->db->get('escuela');

	$data=array();

	if($niveles_educativos->num_rows()>0){
		$temp=array();
		foreach ($niveles_educativos->result() as $nivel) {
			$temp[]=array(
				'id_nivel'=>$nivel->id_niveledu,
				'nombre'=>$nivel->nombre
				);
		}
		$data['niveles_educativos']=$temp;
	}

	if($edos_civiles->num_rows()>0){
		$temp=array();
		foreach ($edos_civiles->result() as $edo_civil) {
			$temp[]=array(
				'id_edo_civil'=>$edo_civil->id_edo_civil,
				'nombre'=>$edo_civil->nombre
				);
		}
		$data['edos_civiles']=$temp;
	}

	if($turnos->num_rows()>0){
		$temp=array();
		foreach ($turnos->result() as $turno) {
			$temp[]=array(
				'id_turno'=>$turno->id_turno,
				'nombre'=>$turno->nombre
				);
		}
		$data['turnos']=$temp;
	}

	if($escuelas->num_rows()>0){
		$temp=array();
		foreach ($escuelas->result() as $escuela) {
			$temp[]=array(
				'id_escuela'=>$escuela->id_escuela,
				'nombre'=>$escuela->nombre,
				'id_nivel_educativo'=>$escuela->id_niveledu
			);
		}
		$data['escuelas']=$temp;
	}

	return $data;
}

}

?>