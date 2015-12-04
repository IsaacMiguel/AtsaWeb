<?php
/**
* 
*/
class intereses extends CI_Model
{
	public function getInteres()
	{
		$result = $this->db->query('select * from intereses');

		return $result->row();
	}
}
?>