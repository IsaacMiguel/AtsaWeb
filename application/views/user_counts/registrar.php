<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h3>Ingrese su cuit y correo al que se le enviará los datos necesarios para registrarse y poder ingresar a nuestro sitio.</h3>		
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-10 col-md-offset-2">
		<form method="post" action="<?php echo base_url();?>login/pedidoRegistro">
			<div class="row">
				<div class="col-md-2">
					CUIT:
				</div>
				<div class="col-md-3">
					<input class="form-control" id="cuit" name="cuit" type="text">
				</div>
				<div class="col-md-2">
					CORREO:
				</div>
				<div class="col-md-3">
					<input class="form-control" id="email" name="email" type="email">
				</div>	
			</div>
	<hr>
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<button type="submit" class="btn btn-primary">Enviar</button>
				</div>
			</div>
		</form>		
	</div>
</div>

<hr>