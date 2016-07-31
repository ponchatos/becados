<?php

Class User extends CI_Model {

public function modify_data($data){
	$this->db->select('tel,cel,correo,facebook');
	$this->db->where('id_becado',$data['id_becado']);
	$query=$this->db->get('vista_becado');
	if($query->num_rows()==1){
		$update=array();
		if($query->row(0)->tel!=$data['tel']){
			$update['tel']=$data['tel'];
		}
		if($query->row(0)->cel!=$data['cel']){
			$update['cel']=$data['cel'];
		}
		if($query->row(0)->correo!=$data['correo']){
			$update['correo']=$data['correo'];
		}
		if($query->row(0)->facebook!=$data['facebook']){
			$update['facebook']=$data['facebook'];
		}
		$this->db->select('id_dpersonales');
		$this->db->where('id_becado',$data['id_becado']);
		$query_dpersonales=$this->db->get('becado');
		if($update!=null&&$query_dpersonales->num_rows()==1){
			$id_dpersonales=$query_dpersonales->row(0)->id_dpersonales;

			$this->db->where('id_dpersonales',$id_dpersonales);
			$this->db->update('datos_personales',$update);
			return $this->db->affected_rows()>0;
		}else{
			return FALSE;
		}
	}else{
		return FALSE;
	}

}


}

?>