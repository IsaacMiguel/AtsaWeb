<div class="container tabla_imprimir">
	<div class="encabezado-tabla">
		<h3>Asociación de Trabajadores de la Sanidad Argentina</h3>			
		<p>Filial San Nicolás</p>
		<p>Operaciones pendientes</p>
		<p><input hidden id="nro_boleta" name="nro_boleta" value="<?php echo $data->id_boleta;?>"><?php echo "Nro boleta " . $data->id_boleta;?></p>	
	</div>

<table class="table-bordered">
	<tbody>
	<!-- Seccion data -->
		<tr>
			<td>
				<p><b>Empleador: </b></p>
			</td>
			<td>
				<p><b>CUIT: </b></p>
			</td>
			<td>
				<p><b>Dirección: </b></p>
			</td>
			<td>
				<p><b>Provincia: </b></p>
			</td>
			<td>
				<p><b>Localidad: </b></p>
			</td>
		</tr>

		<tr>
			<td>
				<input hidden id="empleador" name="empleador" value="<?php echo $emple->empleador?>"><?php echo $emple->empleador?>
			</td>
			<td>
				<input hidden id="cuit" name="cuit" value="<?php echo $emple->cuit;?>"><?php echo $emple->cuit;?>
			</td>
			<td>
				<input hidden id="direccion" name="direccion" value="<?php echo $emple->direccion;?>"><?php echo $emple->direccion;?>
			</td>
			<td>
				<input hidden id="prov" name="prov" value="<?php echo $prov->id;?>"><?php echo $prov->provincia_nombre;?>
			</td>
			<td>
				<input hidden id="loc" name="loc" value="<?php echo $localidad->id;?>"><?php echo $localidad->ciudad_nombre;?>
			</td>
		</tr>

		<tr>
			<td>
				<p><b>Fecha de Vencimiento:</b></p>
			</td>
			<td>
				<p><b>Fecha de Pago:</b></p>
			</td>
		</tr>

		<tr>
			<td>
				<p>
					<?php
                        $f_vto = $data->f_vto;
                        $f_vto=date("d-m-Y",strtotime($f_vto)); 
                        echo $f_vto
                    ?>
				</p>
			</td>
			<td>
				<p>
					<?php
                        $f_pago = $data->f_pago;
                        $f_pago=date("d-m-Y",strtotime($f_pago)); 
                        echo $f_pago
                    ?>
				</p>
			</td>
		</tr>
	<!-- /Seccion data -->


	<!-- Seccion impositiva -->
		<tr>
			<td>
				<p><b>Importe de Capital:</b></p>
			</td>
			<td>
				<p><?php echo $data->importe_capital;?></p>
			</td>
		</tr>
		<tr>
			<td>
				<div><b>Cant. empleados:</b>
			</td>
			<td>
				<p><?php echo $data->cant_empleados;?></p>
			</td>
		</tr>
		<tr>
			<td>
				<b>2% de las remuneraciones:</b>
			</td>
			<td>
				<b>$ </b><?php echo $data->int_pagar_2porc;?>-
			</td>
		</tr>
		<tr>
			<td>
				<b>Intereses:</b>
			</td>
			<td>
				<b>$ </b><?php echo $data->int_pagar_3porc;?>-
			</td>
		</tr>

		<tr>
			<td>
				<b>Total a Pagar:</b>
			</td>
			<td>
				<b>$ </b><?php echo $data->total_pagar;?>-
			</td>
		</tr>

		<!-- Datos contador -->

		<tr>
			<td>
				<b>Estudio contable</b>
			</td>
			<td>
				<b>Dirección:</b>
			</td>
			<td>
				<b>Provincia:</b>
			</td>
			<td>
				<b>Localidad:</b>
			</td>
		</tr>

		<tr>
			<td>
				<p><?php echo $data->est_nombre;?></p>
			</td>
			<td>
				<p><?php echo $data->est_direccion;?></p>
			</td>
			<td>
				<p><?php echo $est_prov->provincia_nombre;?></p>
			</td>
			<td>
				<p><?php echo $est_loc->ciudad_nombre;?></p>
			</td>
		</tr>

		<tr>
			<td>
				<b>Telefono:</b>
			</td>
			<td>
				<b>Email:</b>
			</td>
		</tr>

		<tr>
			<td>
				<p><?php echo $data->est_tel;?></p>
			</td>
			<td>
				<p><?php echo $data->email;?></p>
			</td>
		</tr>

		<tr>
			<td style="border-style: none;">
				FIRMA Y SELLO POR CAJERO:
			</td>
		</tr>
	</tbody>
	
</table>

<hr>

<button type="button" id="imprimir" name="imprimir" class="btn btn-primary">Imprimir</button>
</div>
<hr>