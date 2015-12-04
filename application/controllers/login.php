<?php
Class Login extends CI_Controller{
	
	public function index(){
		$cuit = $this->input->post('cuit');
		$password = $this->input->post('password');

		$this->load->model('usuario');
		$fila = $this->usuario->getUser($cuit);

		if ($fila != null) {
			if ($fila->password == $password) {
				if ($fila->cuit == 'admin@atsa.com') {
					$usuario = array(
					'cuit' => $cuit,
					'id' => $fila->id_usuario,
					'login' => true
					);

					$this->session->set_userdata($usuario);
					
					$this->load->view('admin/header');
					$this->load->view('index');
					$this->load->view('layout/footer');
				}else{
					$usuario = array(
					'cuit' => $cuit,
					'id' => $fila->id_usuario,
					'registrado' => $fila->regist_emple
					);

					$this->session->set_userdata($usuario);
					
					$this->load->view('user/header');
					$this->load->view('index');
					$this->load->view('layout/footer');
					}
			}else{
				header('Location:' . base_url());
			}
		}else{
			header('Location:' . base_url());
		}
	}

	public function registrar(){
		$this->load->view('layout/header');
		$this->load->view('user_counts/registrar');
		$this->load->view('layout/footer');
	}

	public function pedidoRegistro(){
		$cuit = $this->input->post('cuit');
		$correo = $this->input->post('email');

		$this->email->from($correo, $cuit);
		$this->email->to('atsasannicolas@hotmail.com');

		$this->email->subject('Pedido de registro de nuevo usuario');

		$body = 	"Cuit: " . $cuit . "\n\n" .
					"Email: " . $correo;

		$this->email->message($body);	

		if($this->email->send()) {
            $this->load->view('layout/header');
			echo "<h3>Su correo fue enviado. Luego de ser aprobada la solicitud se le enviará un correo con la información y pasos a seguir.</h3>";
			$this->load->view('layout/footer');
       	} else {
            echo 'Hubo un error procesando lo solicitado. Intente nuevamente mas tarde';
            redirect('/welcome');
        }
	}

	public function recordar(){
		$this->load->view('layout/header');
		$this->load->view('user_counts/recordar');
		$this->load->view('layout/footer');
	}


	public function pedidoRecordarPass(){
		$cuit = $this->input->post('cuit');
		$correo = $this->input->post('email');

		$this->email->from($correo, $cuit);
		$this->email->to('atsasannicolas@hotmail.com');

		$this->email->subject('Pedido de recordar contraseña');

		$body = 	"Cuit: " . $cuit . "\n\n" .
					"Email: " . $correo;

		$this->email->message($body);	

		if($this->email->send()) {
            $this->load->view('layout/header');
			echo "<h3>Su correo fue enviado. Luego de ser aprobada la solicitud se le enviará un correo con la información y pasos a seguir.</h3>";
			$this->load->view('layout/footer');
       	} else {
            echo 'Hubo un error procesando lo solicitado. Intente nuevamente mas tarde';
            redirect('/welcome');
        }
	}

	public function salir()
	{
		$this->session->sess_destroy();
		header('Location:' . base_url());
	}
}
?>