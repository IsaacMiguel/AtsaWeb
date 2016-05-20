<?php
/**
* 
*/
class Admin extends CI_Controller
{
	public function index(){}

	public function registrar_usuario()
	{
		if ($this->session->userdata('cuit') == 'admin@atsa.com') {
			$this->load->view('admin/header');
			$this->load->view('admin/registrar_usuario');
			$this->load->view('layout/footer');
		}else{
			header('Location: ' . base_url());
		}
	}

	//carga el usuario que pidio registrarse y utilizar la plataforma (previo envio y recepción por parte del administrador de un email con los datos correspondientes - email y cuit del empleador)
	public function cargar_usuario()
	{
		//cuit y email del empleador cargados por el administrador
		$cuit = $this->input->post('cuit');
		$email = $this->input->post('email');

		$this->load->model('administrador');
		$data['dato'] = $this->administrador->getUserCuit($cuit);

		$ext = false;

		//comprueba si el cuit no existe ya en la BD
		foreach ($data['dato'] as $d) {
			$data = $d->cuit;
			if ($data == $cuit) {
				$ext = true;
			}
		}


		if ($ext == true) {
			$this->load->view('admin/header');
			echo "<h4 style='text-align:center;'>Ya existe un usuario con ese CUIT!</h4>";
			$this->load->view('admin/footer');
		}else{

		//Se define una cadena de caractares. Te recomiendo que uses esta.
	    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	    //Obtenemos la longitud de la cadena de caracteres
	    $longitudCadena=strlen($cadena);
	     
	    //Se define la variable que va a contener la contraseña
	    $pass = "";
	    //Se define la longitud de la contraseña, en mi caso 10, pero puedes poner la longitud que quieras
	    $longitudPass=10;
	     
	    //Creamos la contraseña
	    for($i=1 ; $i<=$longitudPass ; $i++){
	        //Definimos numero aleatorio entre 0 y la longitud de la cadena de caracteres-1
	        $pos=rand(0,$longitudCadena-1);
	     
	        //Vamos formando la contraseña en cada iteraccion del bucle, añadiendo a la cadena $pass la letra correspondiente a la posicion $pos en la cadena de caracteres definida.
	        $pass .= substr($cadena,$pos,1);
	    }

				$this->load->model('administrador');
				$this->administrador->setUser($cuit, $pass, $email);

				//se envia por correo al usuario su cuenta y pass
					$cuit = $this->input->post('cuit');
					$emailATSA = "atsasannicolas@hotmail.com";

					$this->email->from($emailATSA, $cuit);
					$this->email->to($email);

					$this->email->subject('Ha sido dado de alta en la web de ATSA San Nicolás');

					$body =	"Su cuenta de usuario es: " . $cuit . "\n\n" .
								"Su Contraseña es: " .$pass . "\n\n" .
								"Guarde este correo para conservar su contraseña en caso de olvidarla.";

					$this->email->message($body);	

					if($this->email->send()) {
            $this->load->view('admin/header');
						echo "<h4 style='text-align:center;'>Usuario registrado con exito!</h4>";
						$this->load->view('admin/registrar_usuario');
						$this->load->view('admin/footer');
		      } else {
		          echo 'Hubo un error procesando lo solicitado. Intente nuevamente mas tarde';
		          redirect('/welcome');
		      }
        }
	}

	public function resetearPassUsuario($id_usuario){
	    $cadena = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
	    $longitudCadena=strlen($cadena);
	    $pass = "";
	    $longitudPass=10;
	     
	    for($i=1 ; $i<=$longitudPass ; $i++){
	        $pos=rand(0,$longitudCadena-1);
	        $pass .= substr($cadena,$pos,1);
	    }

	    $this->load->model('administrador');
	    $this->administrador->resetearPassUsuario($id_usuario, $pass);

	    $data = $this->administrador->getUser($id_usuario);

	    $cuit = $data->cuit;
	    $emailUser = $data->email;

	    //se envia por correo al usuario su cuenta y pass
			$emailATSA = "atsasannicolas@hotmail.com";

			$this->email->from($emailATSA, $cuit);
			$this->email->to($emailUser);

			$this->email->subject('Ha sido dado de alta en la web de ATSA San Nicolás');

			$body = "Su cuenta de usuario es: " . $cuit . "\n\n" .
				"Su Nueva contraseña es: " .$pass . "\n\n" .
				"Guarde este correo para conservar su contraseña en caso de olvidarla.";

			$this->email->message($body);	

			if($this->email->send()) {
        $this->load->view('admin/header');
				echo "<h4 style='text-align:center;'>Se ha reseteado la contraseña del usuario!</h4>";
				$this->load->view('admin/listar');
				$this->load->view('admin/footer');
      }else{
        echo 'Hubo un error procesando lo solicitado. Intente nuevamente mas tarde';
        redirect('/welcome');
      }
	}

	public function salir()
	{
		$this->session->sess_destroy();
		header('Location: ' . base_url());
	}

	public function listar()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/listar');
		$this->load->view('admin/footer');
	}

	public function cargar_contenido()
	{
		if ($this->session->userdata('login')) {
			$filtrar = $this->input->post('filtro');
			$opcion = $this->input->post('fil');

			if ($filtrar == 0) {
				header("Location: " . base_url());
			}else{
				switch ($filtrar) {
				case '1':
					if ($opcion == 1) {
						//opcion filtro usuario y todos
						$this->load->model('administrador');
						$data['data'] = $this->administrador->getAllUsers();

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_user', $data);
						$this->load->view('admin/footer');

					}elseif ($opcion == 2) {
						//opcion filtro usuario por email
						$this->load->model('administrador');
						$dato = $this->input->post('txt_busqueda');
						$data['data'] = $this->administrador->getUserByCuit($dato);

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_user', $data);
						$this->load->view('admin/footer');
					}else{
						$this->load->view('admin/header');
						echo "<h3 style='text-align: center;'>Debe ingresar una opcion</h3>";
						$this->load->view('admin/listar');
						$this->load->view('admin/footer');
					}

					break;

				case '2':
					if ($opcion == 1) {
						//opcion filtro emple y todos
						$this->load->model('administrador');
						$data['data'] = $this->administrador->getAllEmple();

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_emple', $data);
						$this->load->view('admin/footer');
					}elseif ($opcion == 2) {
						//opcion filtro emple por email
						$this->load->model('administrador');
						$dato = $this->input->post('txt_busqueda');
						$data['data'] = $this->administrador->getEmpleByCuit($dato);

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_emple', $data);
						$this->load->view('admin/footer');
					}else{
						$this->load->view('admin/header');
						echo "<h3 style='text-align: center;'>Debe ingresar una opcion</h3>";
						$this->load->view('admin/listar');
						$this->load->view('admin/footer');
					}

					break;

				case '3':
						if ($opcion == 1) {
						//opcion filtro boletas y todas
						$this->load->model('administrador');
						$data['data'] = $this->administrador->getAllBoletas();

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_boletas', $data);
						$this->load->view('admin/footer');
					}elseif ($opcion == 2) {
						$this->load->model('administrador');
						$dato = $this->input->post('txt_busqueda');
						$data['data'] = $this->administrador->getBoletaByCuit($dato);

						$this->load->view('admin/header');
						$this->load->view('admin/contenido_boletas', $data);
						$this->load->view('admin/footer');
					}else{
						$this->load->view('admin/header');
						echo "<h3 style='text-align: center;'>Debe ingresar una opcion</h3>";
						$this->load->view('admin/listar');
						$this->load->view('admin/footer');
					}

						break;

				default:
					# code...
					break;
				}
			}
		}else{
			$this->load->view('layout/header');
			echo "<h3 style='text-align: center;'>Debe estar logueado</h3>";
			$this->load->view('index');
			$this->load->view('layout/footer');
		}
	}

	public function eliminar_usuario($id_usuario)
	{
		$this->load->model('administrador');
		$this->administrador->deleteUser($id_usuario);

		$data['data'] = $this->administrador->getAllUsers();

		$this->load->view('admin/header');
		$this->load->view('admin/contenido_user', $data);
		$this->load->view('admin/footer');
	}

	public function eliminar_emple($cuit)
	{
		$this->load->model('administrador');
		$this->administrador->deleteEmple($cuit);

		$data['data'] = $this->administrador->getAllEmple();

		$this->load->view('admin/header');
		$this->load->view('admin/contenido_emple', $data);
		$this->load->view('admin/footer');
	}

	public function ver_boleta($id_boleta)
	{
			$this->load->model('usuario');
			$data['data'] = $this->usuario->getBoletaById($id_boleta);

			$id = $data['data']->cuit;

			$data['emple'] = $this->usuario->getEmpleById($id);

			$id_prov = $data['emple']->id_provincia;
			$id_loc = $data['emple']->id_localidad;
			$this->load->model('prov_localidad');
			$data['prov'] = $this->prov_localidad->getProvById($id_prov);
			$data['localidad'] = $this->prov_localidad->getLocalidadById($id_loc);

			//busca y guarda los nombres de prov y loc del estudio contable segun los ids guardados
			$est_provID = $data['data']->est_prov;
			$est_locID = $data['data']->est_loc;

			$data['est_prov'] = $this->prov_localidad->getProvById($est_provID);
			$data['est_loc'] = $this->prov_localidad->getLocalidadById($est_locID);
			
			//guardando importes para pasar decimales por puntos a comas
			$i_capital = $data['data']->importe_capital;
			$t_pagar = $data['data']->total_pagar;
			
			//reemplazando puntos por comas
			$imp_capital = str_replace(".", ",", $i_capital);
			$tot_pagar = str_replace(".", ",", $t_pagar);

			//reemplazando los importes para la vista
			$data['data']->importe_capital = $imp_capital;
			$data['data']->total_pagar = $tot_pagar;

			$this->load->view('admin/header');
			$this->load->view('admin/ver_boleta', $data);
			$this->load->view('admin/imp_footer');
	}

	public function alta_boleta($id_boleta)
	{
		$this->load->model('administrador');
		$this->administrador->updateBoleta($id_boleta);

		$data['data'] = $this->administrador->getAllBoletas();

		$this->load->view('admin/header');
		$this->load->view('admin/contenido_boletas', $data);
		$this->load->view('admin/footer');
	}

	public function eliminar_boleta($id_boleta)
	{
		$this->load->model('administrador');
		$this->administrador->deleteBoletaById($id_boleta);

		$data['data'] = $this->administrador->getAllBoletas();

		$this->load->view('admin/header');
		$this->load->view('admin/contenido_boletas', $data);
		$this->load->view('admin/footer');
	}
}
?>