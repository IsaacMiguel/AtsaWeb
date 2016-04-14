<?php 
/**
* 
*/

//Contiene todas las operaciones correspondientes al empleador

class User extends CI_Controller
{
	public function index(){}

	//Registrarse como empleador
	public function registrar()
	{
		if ($this->session->userdata('id')) {
			$this->load->model('prov_localidad');
			$data['prov'] = $this->prov_localidad->getProv();

			$this->load->view('user/header');
			$this->load->view('user/registrar', $data);
			$this->load->view('user/footer');
		}else{
			header('Location: ' . base_url());
		}	
	}

	//Carga del empleador a la base de datos
	public function cargar_emple()
	{
		if ($this->session->userdata('id')) {
			$id_usuario = $this->session->userdata('id');
			$emple = $this->input->post('empleador');
			$cuit = $this->input->post('cuit');
			$direccion = $this->input->post('direccion');
			$prov = $this->input->post('prov');
			$loc = $this->input->post('loc');
			$telefono = $this->input->post('telefono');
			$email = $this->input->post('email');

			$this->load->model('usuario');
			$insersion = $this->usuario->setEmple($id_usuario, $emple, $cuit, $direccion, $prov, $loc, $telefono, $email);

			if ($insersion == null) {
				$this->load->view('user/header');
				echo "error en la base";
				$this->load->view('layout/footer');
			}else{
				$this->session->set_userdata('registrado', '1');
				$this->usuario->upUser($id_usuario);

				$this->load->view('user/header');
				$this->load->view('user/registro_completo');
				$this->load->view('layout/footer');
			}
		}else{
			header('Location: ' . base_url());
		}
	}

	//Envia a la vista por .post jquery las localidades de la prov seleccionada 
	public function cargar_localidad()
	{
		if ($this->session->userdata('id')) {
			$prov = $this->input->post('prov');

			if ($prov) {
				$this->load->model('prov_localidad');
				$ciudades = $this->prov_localidad->getLocalidadByProv($prov);

				echo '<option value="0">Localidades</option>';

				foreach ($ciudades as $fila) {
					echo '<option value="' . $fila->id . '">' . $fila->ciudad_nombre . '</option>';
				}
			}else{
				echo '<option value="0">Localidades</option>';
			}
		}else{
			header('Location: ' . base_url());
		}
	}

	//Envia a la vista previa a la carga de creacion de boleta
	public function boleta()
	{
		if ($this->session->userdata('id')) {
			if ($this->session->userdata('id')) {
				$this->load->view('user/header');
				$this->load->view('user/boleta');
				$this->load->view('layout/footer');
		}
		}else{
			header('Location: ' . base_url());
		}
	}

	//Carga la vista de crear boleta con datos del empleador
	public function crear_boleta()
	{
		if ($this->session->userdata('id')) {
			$id = $this->session->userdata('id');
			$this->load->model('usuario');
			//se selecciona el empleador respecto al id del usuario logueado
			$data['data'] = $this->usuario->getEmple($id);
			//se obtiene el numero de boletas
			$data['boleta'] = $this->usuario->getCantBoletas();

			$this->load->model('prov_localidad');
			$data['prov'] = $this->prov_localidad->getProv();

			$id_prov = $data['data']->id_provincia;
			$id_loc = $data['data']->id_localidad;
			$this->load->model('prov_localidad');
			$data['emp_prov'] = $this->prov_localidad->getProvById($id_prov);
			$data['emp_localidad'] = $this->prov_localidad->getLocalidadById($id_loc);

			if ($data != null) {
				$this->load->view('user/header');
				$this->load->view('user/cargar_boleta', $data);
				$this->load->view('user/footer');
			}else{
				echo "No esta registrado como empleador aun";
			}
		}else{
			header('Location: ' . base_url());
		}
	}

	//Vista de pedido de registrar en caso de que no lo este
	public function imp_boleta()
	{
		if ($this->session->userdata('id')) {
			$this->load->view('user/header');
			$this->load->view('user/imp_boleta');
			$this->load->view('user/footer');
		}else{
			header('Location: ' . base_url());
		}
	}

	//Se cargan los datos de la boleta generada a la base de datos y va al controlador "ver_boleta"
	public function cargar_boleta()
	{
		if ($this->session->userdata('id')) {
			//carga de los inputs de la vista
			$id_boleta = $this->input->post('nro_boleta');

			//Cargar cuit
			$this->load->model('usuario');
			$id = $this->session->userdata('id');
			$id_emp = $this->usuario->getIdEmple($id);
			$cuit = $id_emp->cuit;

			$a_mes = $this->input->post('a_mes');
			$anio = $this->input->post('anio');
			$importe_capital = $this->input->post('importe_capital');
			$cant_empleados = $this->input->post('cant_empleados');
			$f_vto = $this->input->post('f_vto');

			//$f_vto=date('Y-m-d',strtotime($f_hoy));

			$f_gener_boleta = date('Y-m-d');


			$actual = date('d-m-Y');
      $date1 = strtotime($actual);
      $date2 = date("l", $date1);
      $date3 = strtolower($date2);

      if ($date3 == 'wednesday' || $date3 == 'thursday' || $date3 == 'friday') {
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 5 days'));
      }elseif ($date3 == 'saturday') {
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 4 days'));
      }else{
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 3 days'));
      }


			$est_nombre = $this->input->post('est_nombre');
			$est_direccion = $this->input->post('est_direccion');
			$est_prov = $this->input->post('prov');
			$est_loc = $this->input->post('loc');
			$est_tel = $this->input->post('est_tel');
			$est_email = $this->input->post('est_email');


			//Redonda a dos decimales el aporte del mes
			$importe_capital = str_replace(",", ".", $importe_capital);
			$importe_capital = round($importe_capital, 2);


			//Saca el porcentaje del interes resarcitorio AFIP
			$this->load->model('intereses');
			$int_data = $this->intereses->getInteres();
			$inter = $int_data->tasa;


			//diferencia entre fechas

				//diferencia en dias entre dias interes resarcitorio
				$fecha1 = new DateTime($f_vto);
				$fecha2 = new DateTime($f_gener_boleta);
				$int_Resarcitorio = $fecha1->diff($fecha2);
				$YearInt_Res = $int_Resarcitorio->y;
				$MonthInt_Res = $int_Resarcitorio->m;
				$fecha1_Days = date("d", strtotime($f_vto));
				$fecha2_Days = date("d", strtotime($f_gener_boleta));


				$diasFecha1 = 0;
				$diasFecha2 = 0;
				//fecha1 hasta 30 ++
				for ($i=$fecha1_Days; $i < 30; $i++) { 
					$diasFecha1++;
				}

				//fecha2 hasta 0 --
				for ($z=$fecha2_Days; $z > 0; $z--) { 
					$diasFecha2++;
				}

				$difDias = $diasFecha1 + $diasFecha2;


				$D_year = $YearInt_Res * 360;
				$D_month = $MonthInt_Res * 30;
				$D_days = $difDias + 1;

				$tot_dias = $D_year + $D_month + $D_days;

				if ($fecha1 > $fecha2) {
					$tot_dias = 0;
				}

				$int_atraso = $tot_dias * $inter;


			//calculo de la tasa de interes y calculo de intereses
				//tasa interes 2%
				$int_pagar_2porc = ($importe_capital * 2)/100;

				//tasa interes resarcitorio 3%
				$int_pagar_3porc = ($int_pagar_2porc * $int_atraso)/100;

				//interes resarcitorio
				//redondeamos a dos decimales
				$int_pagar_2porc = round($int_pagar_2porc, 2);

				//interes resarcitorio capitalizado
				//redondeamos a dos decimales
				$int_pagar_3porc = round($int_pagar_3porc, 2);

			//formatea fecha para guardar en BD
				$f_vto=date("Y-m-d",strtotime($f_vto));

			//TOTAL A PAGAR
			$total_pagar = $int_pagar_2porc + $int_pagar_3porc;	

			$this->load->model('usuario');
			$this->usuario->crear_boleta($cuit,$a_mes,$anio,$f_vto,$f_gener_boleta,$f_v_pago,$cant_empleados,$importe_capital,$int_pagar_2porc,$int_pagar_3porc,$total_pagar,$est_nombre,$est_direccion,$est_prov,$est_loc,$est_tel,$est_email);

			header('Location: ' . base_url() . 'user/ver_boleta');
		}else{
			header('Location: ' . base_url());
		}
	}

	//Vista de la boleta ya cargada y lista para imprimir
	public function ver_boleta()
	{
		if ($this->session->userdata('id')) {
			$this->load->model('usuario');
			$id = $this->session->userdata('id');

			$id_emple = $this->usuario->getIdEmple($id);
			$cuit = $id_emple->cuit;

			$data['data'] = $this->usuario->ultima_boleta($cuit);

			

			$data['emple'] = $this->usuario->getEmple($id);
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


			$this->load->view('user/header');
			$this->load->view('user/ver_boleta', $data);
			$this->load->view('user/footer_imprimir');
		}else{
			header('Location: ' . base_url());
		}
	}

	public function listar()
	{
		if ($this->session->userdata('id')) {
			$this->load->model('prov_localidad');
			$data['prov'] = $this->prov_localidad->getProv();

			$this->load->view('user/header');
			$this->load->view('user/registrar', $data);
			$this->load->view('user/footer');
		}else{
			header('Location: ' . base_url());
		}
	}

	public function listarB_existentes()
	{
		if ($this->session->userdata('id')) {
			$this->load->model('usuario');
			$id = $this->session->userdata('id');

			$id_emp = $this->usuario->getIdEmple($id);
			$cuit = $id_emp->cuit;

			$data['boletas'] = $this->usuario->getBoletasByIdEmple($cuit); 

			$this->load->view('user/header');
			$this->load->view('user/listarB_existentes', $data);
			$this->load->view('user/footer');
		}else{
			header('Location: ' . base_url());
		}
	}

	public function ver_boletaById($id_boleta)
	{
		if ($this->session->userdata('id')) {
			$this->load->model('usuario');
			$id = $this->session->userdata('id');

			$id_emple = $this->usuario->getIdEmple($id);
			$cuit = $id_emple->cuit;

			$data['data'] = $this->usuario->getBoletaById($id_boleta);

			$data['emple'] = $this->usuario->getEmple($id);
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

			$this->load->view('user/header');
			$this->load->view('user/ver_boleta', $data);
			$this->load->view('user/footer_imprimir');
		}else{
			header('Location: ' . base_url());
		}
	}

	public function verMod_boletaById($id_boleta)
	{
		if ($this->session->userdata('id')) {

			$id = $this->session->userdata('id');
			$this->load->model('usuario');
			//se selecciona el empleador respecto al id del usuario logueado
			$data['data'] = $this->usuario->getEmple($id);
			//se obtiene el numero de boletas
			$data['boleta'] = $id_boleta;

			$this->load->model('prov_localidad');
			$data['prov'] = $this->prov_localidad->getProv();

			$id_prov = $data['data']->id_provincia;
			$id_loc = $data['data']->id_localidad;
			$this->load->model('prov_localidad');
			$data['emp_prov'] = $this->prov_localidad->getProvById($id_prov);
			$data['emp_localidad'] = $this->prov_localidad->getLocalidadById($id_loc);

			$this->load->view('user/header');
			$this->load->view('user/modificar_boleta', $data);
			$this->load->view('user/footer_imprimir');

		}else{
			header('Location: ' . base_url());
		}
	}

	public function mod_boleta()
	{
		if ($this->session->userdata('id')) {
			//carga de los inputs de la vista
			$id_boleta = $this->input->post('nro_boleta');

			//Cargar cuit
			$this->load->model('usuario');
			$id = $this->session->userdata('id');
			$id_emp = $this->usuario->getIdEmple($id);
			$cuit = $id_emp->cuit;

			$a_mes = $this->input->post('a_mes');
			$anio = $this->input->post('anio');
			$importe_capital = $this->input->post('importe_capital');
			$cant_empleados = $this->input->post('cant_empleados');
			$f_vto = $this->input->post('f_vto');

			//$f_vto=date('Y-m-d',strtotime($f_hoy));

			$f_gener_boleta = date('Y-m-d');


			$actual = date('d-m-Y');
      $date1 = strtotime($actual);
      $date2 = date("l", $date1);
      $date3 = strtolower($date2);

      if ($date3 == 'wednesday' || $date3 == 'thursday' || $date3 == 'friday') {
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 5 days'));
      }elseif ($date3 == 'saturday') {
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 4 days'));
      }else{
          $f_v_pago = date('Y-m-d', strtotime($date3. ' + 3 days'));
      }


			$est_nombre = $this->input->post('est_nombre');
			$est_direccion = $this->input->post('est_direccion');
			$est_prov = $this->input->post('prov');
			$est_loc = $this->input->post('loc');
			$est_tel = $this->input->post('est_tel');
			$est_email = $this->input->post('est_email');


			//Redonda a dos decimales el aporte del mes
			$importe_capital = str_replace(",", ".", $importe_capital);
			$importe_capital = round($importe_capital, 2);


			//Saca el porcentaje del interes resarcitorio AFIP
			$this->load->model('intereses');
			$int_data = $this->intereses->getInteres();
			$inter = $int_data->tasa;


			//diferencia entre fechas

				//diferencia en dias entre dias interes resarcitorio
				$fecha1 = new DateTime($f_vto);
				$fecha2 = new DateTime($f_gener_boleta);
				$int_Resarcitorio = $fecha1->diff($fecha2);
				$YearInt_Res = $int_Resarcitorio->y;
				$MonthInt_Res = $int_Resarcitorio->m;
				$fecha1_Days = date("d", strtotime($f_vto));
				$fecha2_Days = date("d", strtotime($f_gener_boleta));


				$diasFecha1 = 0;
				$diasFecha2 = 0;
				//fecha1 hasta 30 ++
				for ($i=$fecha1_Days; $i < 30; $i++) { 
					$diasFecha1++;
				}

				//fecha2 hasta 0 --
				for ($z=$fecha2_Days; $z > 0; $z--) { 
					$diasFecha2++;
				}

				$difDias = $diasFecha1 + $diasFecha2;


				$D_year = $YearInt_Res * 360;
				$D_month = $MonthInt_Res * 30;
				$D_days = $difDias + 1;

				$tot_dias = $D_year + $D_month + $D_days;

				if ($fecha1 > $fecha2) {
					$tot_dias = 0;
				}

				$int_atraso = $tot_dias * $inter;


			//calculo de la tasa de interes y calculo de intereses
				//tasa interes 2%
				$int_pagar_2porc = ($importe_capital * 2)/100;

				//tasa interes resarcitorio 3%
				$int_pagar_3porc = ($int_pagar_2porc * $int_atraso)/100;

				//interes resarcitorio
				//redondeamos a dos decimales
				$int_pagar_2porc = round($int_pagar_2porc, 2);

				//interes resarcitorio capitalizado
				//redondeamos a dos decimales
				$int_pagar_3porc = round($int_pagar_3porc, 2);

			//formatea fecha para guardar en BD
				$f_vto=date("Y-m-d",strtotime($f_vto));

			//TOTAL A PAGAR
			$total_pagar = $int_pagar_2porc + $int_pagar_3porc;	

			$this->load->model('usuario');
			
			$this->usuario->modificar_boleta($id_boleta,$cuit,$a_mes,$anio,$f_vto,$f_gener_boleta,$f_v_pago,$cant_empleados,$importe_capital,$int_pagar_2porc,$int_pagar_3porc,$total_pagar,$est_nombre,$est_direccion,$est_prov,$est_loc,$est_tel,$est_email);

			header('Location: ' . base_url() . 'user/verBoleta_mod/'. $id_boleta);
		}else{
			header('Location: ' . base_url());
		}
	}

	public function verBoleta_mod($id_boleta)
	{
		if ($this->session->userdata('id')) {
			$this->load->model('usuario');
			$id = $this->session->userdata('id');

			$id_emple = $this->usuario->getIdEmple($id);
			$cuit = $id_emple->cuit;

			$data['data'] = $this->usuario->getBoletaById($id_boleta);

			$data['emple'] = $this->usuario->getEmple($id);
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

			$this->load->view('user/header');
			$this->load->view('user/ver_boleta', $data);
			$this->load->view('user/footer');
		}else{
			header('Location: ' . base_url());
		}
	}

	public function eliminar_boletaById($id_boleta)
	{
		if ($this->session->userdata('id')) {
			$this->load->model('usuario');
			$pagada = $this->usuario->getPaga($id_boleta);

			$ok = $pagada->paga;

			if ($ok == '1')
			{
				//listamos boletas
				$this->load->model('usuario');
				$id = $this->session->userdata('id');

				$id_emp = $this->usuario->getIdEmple($id);
				$cuit = $id_emp->cuit;

				$data['boletas'] = $this->usuario->getBoletasByIdEmple($cuit);

				$this->load->view('user/header');
				echo "<h3 style='text-align: center;'>Boleta ya paga, no puede ser eliminada.</h3>";
				$this->load->view('user/listarB_existentes', $data);
				$this->load->view('user/footer');
			}else{
				$this->usuario->delBoletaById($id_boleta);

				//listamos boletas
				$this->load->model('usuario');
				$id = $this->session->userdata('id');

				$id_emp = $this->usuario->getIdEmple($id);
				$cuit = $id_emp->cuit;

				$data['boletas'] = $this->usuario->getBoletasByIdEmple($cuit);

				$this->load->view('user/header');
				$this->load->view('user/listarB_existentes', $data);
				$this->load->view('user/footer');
			}
		}else{
			header('Location: ' . base_url());
		}
	}
}
?>