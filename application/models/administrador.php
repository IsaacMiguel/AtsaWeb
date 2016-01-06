<?php 
/**
* 
*/
class Administrador extends CI_Model
{
	public function getAllUsers()
	{
		$data = $this->db->query('select * from usuarios');

		return $data->result();
	}

	public function getUserById($id_usuario){
		$data = $this->db->query('select * from usuarios where id_usuario =' . $id_usuario);

		return $data->result();	
	}

	public function getUserCuit($cuit){
		$data = $this->db->query("select * from usuarios where cuit ='" . $cuit . "'");

		return $data->result();	
	}

	public function getUser($id_usuario){
		$data = $this->db->query('select * from usuarios where id_usuario =' . $id_usuario);

		return $data->row();
	}

	public function getUserByCuit($dato)
	{
		$data = $this->db->query('select * from usuarios where cuit like "%' . $dato . '%"');

		return $data->result();
	}

	public function deleteUser($id_usuario)
	{
		$this->db->query('delete from usuarios where id_usuario = ' . $id_usuario);
	}

	public function getAllEmple()
	{
		$data = $this->db->query('select * from empleadores');

		return $data->result();
	}

	public function getEmpleByCuit($dato)
	{
		$data = $this->db->query('select * from empleadores where cuit like "%' . $dato . '%"');

		return $data->result();
	}

	public function deleteEmple($id_emple)
	{
		$this->db->query('delete from empleadores where cuit = ' . $id_emple);
	}

	public function getAllBoletas()
	{
		$data = $this->db->query('select * from boletas order by id_boleta desc');

		return $data->result();
	}

	public function getEmpleById($cuit)
	{
		$data = $this->db->query('select empleador from empleadores where cuit = "' . $cuit .'"');

		return $data->row();
	}

	public function deleteBoletaById($id_boleta)
	{
		$this->db->query('delete from boletas where id_boleta = '. $id_boleta);
	}

	public function updateBoleta($id_boleta)
	{
		$this->db->query('update boletas set paga=1 where id_boleta = ' . $id_boleta);
	}

	public function getBoletaByCuit($dato)
	{
		$data = $this->db->query('select * from boletas where cuit like "%' . $dato .'%"');

		return $data->result();
	}

	public function getBoletaById($id_boleta)
	{
		$data = $this->db->query('select * from boletas where id_boleta = ' . $id_boleta);

		return $data->row();
	}

	public function resetearPassUsuario($id_usuario, $pass){
		$data = $this->db->query("update usuarios set password='". $pass . "' where id_usuario= " . $id_usuario);
	}

	public function setUser($cuit, $password, $email){
		$data = array(
			'cuit' => $cuit,
			'password' => $password,
			'email' => $email );

		$this->db->insert('usuarios', $data);
	}
}
?>