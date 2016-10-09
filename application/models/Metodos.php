<?php

Class Metodos extends CI_Model {

//falta calarlo
public function change_periodo($periodo_nuevo){
	$this->db->where('ciclo',$periodo_nuevo['ciclo']);
	$this->db->where('anio',$periodo_nuevo['anio']);
	if($this->db->count_all_results('periodo') == 0){
		$this->db->trans_begin();

		$this->db->insert('periodo',array("ciclo"=>$periodo_nuevo['ciclo'],"anio"=>$periodo_nuevo['anio'],"status"=>0));
		if($this->db->affected_rows()>0){
			$id_periodo_nuevo = $this->db->insert_id();

			$becados=$this->db->get('becado');
			if($becados->num_rows()>0){
				$this->load->model('read_data');
				$periodo_actual = $this->read_data->periodo_actual_id();

				foreach ($becados->result() as $becado) {
					$this->db->where('id_becado',$becado->id_becado);
					$this->db->where('id_periodo',$periodo_actual);
					$horas = $this->db->get('horas');
					if($horas->num_rows()>0){
						$horas_totales=0;
						foreach ($horas->result() as $hora) {
							$horas_totales+=$hora->hora;
						}
						if($horas_totales > 30){
							$insert_horas = array(
								'id_becado'=>$becado->id_becado,
								'id_periodo'=>$id_periodo_nuevo,
								'evento'=>'Horas acumuladas del periodo anterior',
								'hora'=>$horas_totales-30,
								'fecha'=>date('YYYY-mm-dd'),
								'observacion'=>'Horas acumuladas del periodo pasado',
								'id_usuario'=>1);
							$this->db->insert('horas',$insert_horas);
							if($this->db->affected_rows()<=0){
								$this->db->trans_rollback();
								return FALSE;
							}
						}
					}
				}

				$this->db->where('id_periodo',$periodo_actual);
				$this->db->update('periodo',array('status'=>0));
				if($this->db->affected_rows()>0){
					$this->db->where('id_periodo',$id_periodo_nuevo);
					$this->db->update('periodo',array('status'=>1));
					if($this->db->affected_rows() > 0){
						$this->db->trans_commit();
						return TRUE;
					}
				}
				$this->db->trans_rollback();
				return FALSE;

			}

		}else{
			$this->db->trans_rollback();
			return FALSE;		
		}
		
	}else{
		return FALSE;
	}
}

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