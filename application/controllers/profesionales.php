<?php
/**
* 
*/
class Profesionales extends CI_Controller
{
	
	public function index(){}

	public function odontologicos(){
		$data = file_get_contents("<?php echo base_url();?>/../files/CirculoOdontologico.doc");
		$name = 'CirculoOdontologico.doc';

		force_download($name, $data);
	}

	public function bioquimicos(){
		$data = file_get_contents("<?php echo base_url();?>/../files/ListadoBioq.xlsx");
		$name = 'ListadoBioq.xlsx';

		force_download($name, $data);
	}

	public function profesional(){
		$data = file_get_contents("<?php echo base_url();?>/../files/ListadoProfesionales.xlsx");
		$name = 'ListadoProfesionales.xlsx';

		force_download($name, $data);
	}
}
?>