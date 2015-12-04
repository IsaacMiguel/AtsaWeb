<?php
/**
* 
*/
class Prov_localidad extends CI_Model
{
	public function getProv()
	{
		$result = $this->db->query('select * from provincia');

		if($result->num_rows() > 0){
			return $result;
		}else{
			return null;
		}
	}

	public function getProvById($id_prov = '')
	{
		$result = $this->db->query('select * from provincia where id = '. $id_prov);

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return null;
		}
	}

	public function getLocalidadById($id_loc = '')
	{
		$result = $this->db->query('select * from ciudad where id = '. $id_loc);

		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return null;
		}
	}

	public function getLocalidadByProv($prov)
	{
		$ciudades = $this->db->query("select * from ciudad where provincia_id = " . $prov . " order by ciudad_nombre ASC");

		if ($ciudades->num_rows() > 0) {
			return $ciudades->result();
		}
	}
}
?>