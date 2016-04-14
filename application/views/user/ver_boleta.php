<div class="container tabla_imprimir">
	<div class="encabezado-tabla">
		<h3>Asociación de Trabajadores de la Sanidad Argentina</h3>			
		<p>Filial San Nicolás</p>
		<p>Aporte Sindical 2%</p>
		<p>Nro de Boleta <input hidden id="nro_boleta" name="nro_boleta" value="<?php echo $data->id_boleta;?>"><?php echo $data->id_boleta;?></p>	
	</div>

<table style="font-size:10px;">
	<tbody>
	<!-- Seccion data -->
		<tr>
			<td>
				<p><b>Empleador: </b></p>
			</td>
			<td>
				<p><b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspCUIT:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</b></p>
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
<tr><td><hr></td></tr>
		<tr>
			<td class="bordeado">
				<input hidden id="empleador" name="empleador" value="<?php echo $emple->empleador?>"><?php echo $emple->empleador?>
			</td>
			<td class="bordeado">
				<input hidden id="cuit" name="cuit" value="<?php echo $emple->cuit;?>"><?php echo $emple->cuit;?>
			</td>
			<td class="bordeado">
				<input hidden id="direccion" name="direccion" value="<?php echo $emple->direccion;?>"><?php echo $emple->direccion;?>
			</td>
			<td class="bordeado">
				<input hidden id="prov" name="prov" value="<?php echo $prov->id;?>"><?php echo $prov->provincia_nombre;?>
			</td>
			<td class="bordeado">
				<input hidden id="loc" name="loc" value="<?php echo $localidad->id;?>"><?php echo $localidad->ciudad_nombre;?>
			</td>
		</tr>
<tr><td><hr></td></tr>
		<tr>
			<td>
				<p><b>Aporte del mes:</b></p>
			</td>
			<td>
				<p><b>A&ntildeo:</b></p>
			</td>
			<td>
				<p><b>Fecha de Vencimiento de aporte:</b></p>
			</td>
			<td>
				<p><b>Fecha de generacion de boleta:</b></p>
			</td>
			<td>
				<p><b>Vencimiento para el pago:</b></p>
			</td>
		</tr>
<tr><td><hr></td></tr>
		<tr>
			<td class="bordeado">
				<p>
					<?php
            echo $data->a_mes;
          ?>
				</p>
			</td>
			<td class="bordeado">
				<p>
					<?php
              echo $data->anio;
          ?>
				</p>
			</td>
			<td class="bordeado">
				<p>
					<?php
              $f_vto = $data->f_vto;
              $f_vto=date("d-m-Y",strtotime($f_vto)); 
              echo $f_vto
          ?>
				</p>
			</td>
			<td class="bordeado">
				<p>
					<?php
	          $f_pago = $data->f_gener_boleta;
	          $f_pago=date("d-m-Y",strtotime($f_pago)); 
	          echo $f_pago
	      	?>
				</p>
			</td>
			<td class="bordeado">
				<p>
					<?php
              $f_pago = $data->f_v_pago;
              $f_pago=date("d-m-Y",strtotime($f_pago)); 
              echo $f_pago;
          ?>
				</p>
			</td>
		</tr>
	<!-- /Seccion data -->

<tr><td><hr></td></tr>

	<!-- Seccion impositiva -->
		<tr>
			<td>
				<div><b>Cant. empleados afiliados:</b>
			</td>
			<td class="bordeado">
				<p><?php echo $data->cant_empleados;?></p>
			</td>
		</tr>
		<tr>
			<td>
				<p><b>Total de Remuneraciones de afiliados(Jornada por 8 hs):</b></p>
			</td>
			<td class="bordeado">
				<p>$ <?php echo $data->importe_capital;?></p>
			</td>
		</tr>
		<tr>
			<td>
				<b>2% de las remuneraciones:</b>
			</td>
			<td class="bordeado">
				<b>$ </b><?php echo $data->int_pagar_2porc;?>-
			</td>
		</tr>
		<tr>
			<td>
				<b>Intereses:</b>
			</td>
			<td class="bordeado">
				<b>$ </b><?php echo $data->int_pagar_3porc;?>-
			</td>
		</tr>

		<tr>
			<td>
				<b>Total a Pagar:</b>
			</td>
			<td class="bordeado">
				<b>$ </b><?php echo $data->total_pagar;?>-
			</td>
		</tr>
		<tr><td><hr></td></tr>
		<tr>
			<td>
				<b>Abonar en la sede de A.T.S.A San Nicolás</b><br>
				<b>Lavalle 267, San Nicolás, Pcia Buenos Aires</b>
			</td>
			<td>
				
			</td>
			<td>
				IMPRIMIR 2 COPIAS
			</td>
			<td></td>
			<td style="border-style: none;">
				<b>FIRMA Y SELLO POR CAJERO:</b>
			</td>
		</tr>

	</tbody>
	
</table>

<hr>

<button type="button" id="imprimir" name="imprimir" class="btn btn-primary">Imprimir</button>
</div>