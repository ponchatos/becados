<?php

Class Metodos extends CI_Model {

public function valid_upload_file($id_becado,$table){
	$id_periodo=$this->periodo_actual();
	$this->db->where('id_becado',$id_becado);
	$this->db->where('id_periodo',$id_periodo);
	$query=$this->db->get($table);
	if($query->num_rows()>0){
		return $query->row(0)->validacion==0;
	}else{
		return TRUE;
	}
}

public function apuntar_imagen($id_becado,$url,$table){
		$id_periodo=$this->periodo_actual();
		if($this->already_image($id_becado,$table)){
			if(!$this->delete_image($id_becado,$id_periodo,$table)){
				return FALSE;
			}
		}
		$data=array(
			'id_becado'=>$id_becado,
			'id_periodo'=>$id_periodo,
			'url'=>$url,
			'validacion'=>0
			);
		$this->db->insert($table,$data);
		if($this->db->affected_rows()>0){
			$this->db->trans_commit();
			return TRUE;
		}else{
			$this->db->trans_rollback();
			return FALSE;
		}
}

public function periodo_actual(){
	$this->db->where('status',1);
	$query=$this->db->get('periodo');
	if($query->num_rows()>0){
		return $query->row(0)->id_periodo;
	}else{
		return -1;
	}
}

public function already_image($id_becado,$table){
	$this->db->where('id_periodo',$this->periodo_actual());
	$this->db->where('id_becado',$id_becado);
	$query=$this->db->get($table);
	if($query->num_rows()>0){
		return true;
	}else{
		return false;
	}
}


public function delete_image($id_becado,$id_periodo,$table){
	$this->db->trans_begin();
	$this->db->where('id_becado',$id_becado);
	$this->db->where('id_periodo',$id_periodo);
	$query=$this->db->get($table);
	if($query->num_rows()>0){
		$this->db->delete($table,array('id_comprobante'=>$query->row(0)->id_comprobante));
		if($this->db->affected_rows()>0){
			$delete='./uploads/'.$query->row(0)->url;
			$unlink=unlink($delete);
			if($unlink){
				return TRUE;
			}else{
				$this->db->trans_rollback();
				return FALSE;
			}
		}else{
			$this->db->trans_rollback();
			return FALSE;
		}
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}
}

}

?>