<?php

Class User extends CI_Model {

//pendiente de calar
public function update_data_escolares($data){
	$this->db->select('id_descolares');
	$this->db->where('id_becado',$data['id_becado']);
	$query_id_descolares=$this->db->get('becados');
	if($query_id_descolares->num_rows()>0){
		$this->db->where('id_descolares',$query_id_descolares->row(0)->id_descolares);
		$this->db->update('datos_escolares',$data);
		return $this->db->affected_rows()>0;
	}else{
		return FALSE
	}
}

//pendiente de calar
public function update_data_familiares($data){
	$this->db->select('id_dfamiliares');
	$this->db->where('id_becado',$data['id_becado']);
	$query_id_dfamiliares=$this->db->get('becados');
	if($query_id_dfamiliares->num_rows()>0){
		$this->db->where('id_dpersonales',$query_id_dfamiliares->row(0)->id_dfamiliares);
		$this->db->update('datos_familiares',$data);
		return $this->db->affected_rows()>0;
	}else{
		return FALSE
	}
}

//pendiente de calar
public function update_data_personales($data){
	$this->db->select('id_dpersonales');
	$this->db->where('id_becado',$data['id_becado']);
	$query_id_dpersonales=$this->db->get('becados');
	if($query_id_dpersonales->num_rows()>0){
		$this->db->where('id_dpersonales',$query_id_dpersonales->row(0)->id_dpersonales);
		$this->db->update('datos_personales',$data);
		return $this->db->affected_rows()>0;
	}else{
		return FALSE
	}
}

//pendiente de calar
public function update_data_becado($data){
	$this->db->where('id_becado',$data['id_becado']);
	$this->db->update('becado',$data);
	return $this->db->affected_rows()>0;
}

public function becar($data){
	$this->db->trans_begin();
	$id_solicitud=$data['id_solicitud'];

	$encuesta_p2=array(
		'v'=>$data['v'],
		'diagnostico_social'=>$data['diagnostico_social'],
		'puntaje'=>$data['puntaje']
	);
	$this->db->insert('encuesta_p2',$encuesta_p2);
	if($this->db->affected_rows()>0){
		$id_encuesta_p2=$this->db->insert_id();

		$this->db->select('id_dpersonales,id_dfamiliares,id_descolares,id_encuesta');
		$this->db->where('id_solicitud',$id_solicitud);
		$query=$this->db->get('solicitud');
		if($query->num_rows()>0){
			$id_dpersonales=$query->row(0)->id_dpersonales;
			$id_dfamiliares=$query->row(0)->id_dfamiliares;
			$id_descolares=$query->row(0)->id_descolares;
			$id_encuesta=$query->row(0)->id_encuesta;

			$becado=array(
				'status'=>1,
				'notas'=>1,
				'id_dpersonales'=>$id_dpersonales,
				'id_dfamiliares'=>$id_dfamiliares,
				'id_descolares'=>$id_descolares,
				'id_encuesta'=>$id_encuesta,
				'id_encuesta_p2'=>$id_encuesta_p2,
				'recomendado'=>$data['recomendado'],
				'observacion'=>$data['observacion'],
				'car_compromiso'=>$data['car_compromiso'],
				'formulario_IB'=>$data['formulario_IB'],
				'contador'=>1,
				'horas_acumuladas'=>0
			);
			$this->db->insert('becado',$becado);
			if($this->db->affected_rows()>0){
				$id_becado=$this->db->insert_id();

				$this->db->where('id_solicitud',$id_solicitud);
				$this->db->delete('solicitud');
				if($this->db->affected_rows()>0){
					$datos_personales=array(
						'facebook'=>$data['facebook'],
						'h_artisticas'=>$data['h_artisticas'],
						'h_civicas'=>$data['h_civicas'],
						'h_deportivas'=>$data['h_deportivas'],
						'h_lenguaje'=>$data['h_lenguaje']
					);
					$this->db->where('id_dpersonales',$id_dpersonales);
					$this->db->update('datos_personales',$datos_personales);

					$this->db->select('nombre,ape_pat,ape_mat');
					$this->db->where('id_dpersonales',$id_dpersonales);
					$query_nombres=$this->db->get('datos_personales');
					if($query_nombres->num_rows()>0){
						$user=array(
							'usuario'=>$data['username'],
							'password'=>$data['password'],
							'nombre'=>$query_nombres->row(0)->nombre,
							'apellido_paterno'=>$query_nombres->row(0)->ape_pat,
							'apellido_materno'=>$query_nombres->row(0)->ape_mat,
							'privilegios'=>0,
							'id_becado'=>$id_becado
						);
						$this->db->insert('usuarios',$user);
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
	}else{
		$this->db->trans_rollback();
		return FALSE;
	}
}

public function add_hours($data){
	$this->db->insert('horas',$data);
	return $this->db->affected_rows()>0;
}

public function get_id($username){
	$this->db->select('id_usuario');
	$this->db->where('usuario',$username);
	$query=$this->db->get('usuarios');
	if($query->num_rows()==1){
		return $query->row(0)->id_usuario;
	}else{
		return FALSE;
	}
}

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