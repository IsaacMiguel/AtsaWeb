<?php
/**
* 
*/
class Usuario extends CI_Model{
	public function getUser($cuit = '')
	{
		$result = $this->db->query('select * from usuarios where cuit = "' . $cuit . '" limit 1');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return null;
		}
	}

	public function setUser($cuit, $pass)
	{
			$data = array(
			'cuit' => $cuit,
			'password' => $pass,
			'regist_emple' => '0'
			);

		$this->db->insert('usuarios', $data);
	}

	public function upUser($id_usuario)
	{
		$this->db->query('update usuarios set regist_emple=1 where id_usuario = ' . $id_usuario);
	}

	public function getEmple($id = '')
	{
		$result = $this->db->query('select * from empleadores where id_usuario_fk = "' . $id . '" limit 1');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return null;
		}
	}

	public function getEmpleById($cuit)
	{
		$data = $this->db->query('select * from empleadores where cuit = "' . $cuit .'"');

		return $data->row();
	}

	public function getIdEmple($id = '')
	{
		$result = $this->db->query('select cuit from empleadores where id_usuario_fk = "' . $id . '" limit 1');

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return null;
		}
	}

	public function setEmple($id_usuario, $emple, $cuit, $direccion, $prov, $loc, $telefono, $email)
	{
		$data = array(
			'id_usuario_fk' => $id_usuario,
			'empleador' => $emple,
			'cuit' => $cuit,
			'direccion' => $direccion,
			'id_localidad' => $loc,
			'id_provincia' => $prov,
			'telefono' => $telefono,
			'email' => $email
			);

		$this->db->insert('empleadores', $data);

		if ($this->db->_error_message()) {
			return null;
		}else{
			return "success";
		}
	}

	public function getCantBoletas()
	{
		$result = $this->db->query('select max(id_boleta) as ult_boleta from boletas');
		
		return $result->row();
	}

	public function crear_boleta($cuit,$a_mes,$anio,$f_vto,$f_gener_boleta,$f_v_pago,$cant_empleados,$importe_capital,$int_pagar_2porc,$int_pagar_3porc,$total_pagar,$est_nombre,$est_direccion,$est_prov,$est_loc,$est_tel,$est_email)
	{
		$data = array(
			'cuit' => $cuit,
			'a_mes' => $a_mes,
			'anio' => $anio,
			'f_vto' => $f_vto,
			'f_gener_boleta' => $f_gener_boleta,
			'f_v_pago' => $f_v_pago,
			'cant_empleados' => $cant_empleados,
			'importe_capital' => $importe_capital,
			'int_pagar_2porc' => $int_pagar_2porc,
			'int_pagar_3porc' => $int_pagar_3porc,
			'total_pagar' => $total_pagar,
			'est_nombre' => $est_nombre,
			'est_direccion' => $est_direccion,
			'est_prov' => $est_prov,
			'est_loc' => $est_loc,
			'est_tel' => $est_tel,
			'est_email' => $est_email
			);

		$this->db->insert('boletas', $data);
	}

	public function ultima_boleta($cuit)
	{
		$result = $this->db->query('select * from boletas where cuit = "' . $cuit . '" order by id_boleta desc limit 1');
		
		return $result->row();
	}

	public function getBoletasByIdEmple($cuit)
	{
		$result = $this->db->query('select * from boletas where cuit = "' . $cuit . '" order by id_boleta desc');

		return $result->result();
	}

	public function getBoletaById($id_boleta)
	{
		$query = $this->db->query('select * from boletas where id_boleta = ' . $id_boleta);

		return $query->row();
	}

	public function modificar_boleta($id_boleta,$cuit,$a_mes,$anio,$f_vto,$f_gener_boleta,$f_v_pago,$cant_empleados,$importe_capital,$int_pagar_2porc,$int_pagar_3porc,$total_pagar,$est_nombre,$est_direccion,$est_prov,$est_loc,$est_tel,$est_email)
	{
		$data = array(
			'cuit' => $cuit,
			'a_mes' => $a_mes,
			'anio' => $anio,
			'f_vto' => $f_vto,
			'f_gener_boleta' => $f_gener_boleta,
			'f_v_pago' => $f_v_pago,
			'cant_empleados' => $cant_empleados,
			'importe_capital' => $importe_capital,
			'int_pagar_2porc' => $int_pagar_2porc,
			'int_pagar_3porc' => $int_pagar_3porc,
			'total_pagar' => $total_pagar,
			'est_nombre' => $est_nombre,
			'est_direccion' => $est_direccion,
			'est_prov' => $est_prov,
			'est_loc' => $est_loc,
			'est_tel' => $est_tel,
			'est_email' => $email 
			);

		$this->db->where('id_boleta', $id_boleta);
		
		return $this->db->update('boletas', $data);
	}

	public function getPaga($id_boleta)
	{
		$data = $this->db->query('select paga from boletas where id_boleta=' . $id_boleta);

		return $data->row();
	}

	public function delBoletaById($id_boleta)
	{
		$this->db->delete('boletas', array('id_boleta' => $id_boleta));
	}
}
?>