<?php
/**
* 
*/
class Contactanos extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('cuit') == 'admin@atsa.com') {
				$this->load->view('admin/header');
				$this->load->view('contactanos');
				$this->load->view('layout/footer');	
			}elseif ($this->session->userdata('id')) {
				$this->load->view('user/header');
				$this->load->view('contactanos');
				$this->load->view('layout/footer');
			}else{
				$this->load->view('layout/header');
				$this->load->view('contactanos');
				$this->load->view('layout/footer');
			}
	}

		public function enviar()
		{
			$ape_nomb = $this->input->post('ape_nomb');
			$telefono = $this->input->post('telefono');
			$correo = $this->input->post('correo');
			$mensaje = $this->input->post('mensaje');


			$this->email->from($correo, $ape_nomb);
			$this->email->to('isaacmiguel@gmail.com');

			$this->email->subject('Mensaje enviado desde ATSA/contactanos');

			$body = 	"Nombre y Apellido: " . $ape_nomb . "\n\n" .
						"Email: " .$correo. "\n\n" .
						"Telefono: " .$telefono. "\n\n" .
						"Mensaje: " .$mensaje;

			$this->email->message($body);	

			if($this->email->send()) {
	                echo "Su consulta fue enviada correctamente";
	                redirect('/welcome');
	            } else {
	                echo 'Hubo un error procesando lo solicitado. Intente nuevamente mas tarde';
	                redirect('/welcome');
	            }
		}
}
?>