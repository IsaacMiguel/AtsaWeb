<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cargar
                    <small>Boleta</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Cargar</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->
    <div class="col-lg-2">
        
    </div>
        <div class="col-lg-12">
            <form method="post" action="<?php echo base_url();?>user/mod_boleta" validate>
                <div class="row">
                    <div id="encabezado" style="text-align: center; border-style: solid; border-width: 2px;">
                        <h3>Asociación de Trabajadores</h3>
                        <h3>de la Sanidad Argentina</h3>
                        <H4>- FILIAL SAN NICOLAS 2% -</H4>
                        <p>OPERACIONES PENDIENTES</p>
                        <p><input hidden id="nro_boleta" name="nro_boleta" value="<?php echo $boleta->id_boleta?>"><?php echo $boleta->id_boleta?></p>
                    </div>
                </div>
                <table class="table table-hover col-sm-3">
                    <tbody>
                        <tr>
                            <td>Empleador: </td>
                            <td><input hidden id="empleador" name="empleador" value="<?php echo $data->cuit?>"><?php echo $data->empleador?></td>
                        </tr>
                        <tr>
                            <td>Dirección: </td>
                            <td><?php echo $data->direccion?></td>
                        </tr>
                        <tr>
                            <td>Telefono: </td>
                            <td><?php echo $data->telefono?></td>
                        </tr>
                        <tr>
                            <td>Provincia: </td>
                            <td><input hidden id="id_provincia" name="prov" value="<?php echo $emp_prov->id?>" required><?php echo $emp_prov->provincia_nombre?></td>
                        </tr>
                        <tr>
                            <td>Localidad: </td>
                            <td><input hidden id="id_loc" name="loc" value="<?php echo $emp_localidad->id?>" required><?php echo $emp_localidad->ciudad_nombre?></td>
                        </tr>
                        <tr>
                            <td>Importe a pagar:</td>
                            <td><input id="importe_capital" name="importe_capital" type="number" step="any" min="0" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Aporte del mes</td>
                            <td><input class="calc_vencimiento form-control" id="a_mes" name="a_mes" type="number" min="1" max="12" required></td>
                        </tr>
                        <tr>
                            <td>Año</td>
                            <td><input class="calc_vencimiento form-control" id="anio" name="anio" type="number" min="2014" placeholder="aaaa"></td>
                        </tr>
                        <tr>
                            <td>Fecha de vencimiento:</td>
                            <td><input id="f_vto" name="f_vto" type="date" class="form-control" readonly required></td>
                        </tr>
                        <tr>
                            <td>Fecha de Pago:</td>
                            <td><input id="f_pago" name="f_pago" type="date" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Cantidad de Empleados Afiliados: </td>
                            <td><input id="cant_empleados" name="cant_empleados" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required></td>
                        </tr>
                        <tr>
                            <td>Estudio Contable:</td>
                            <td><input class="form-control" type="text" id="est_nombre" name="est_nombre" required></td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td><input class="form-control" type="text" id="est_direccion" name="est_direccion" required></td>
                        </tr>
                        <tr>
                            <td>Provincia:</td>
                            <td>
                                <select class="form-control" id="prov" name="prov" required>
                                    <option value="0">Seleccione una provincia</option>
                                        <?php foreach ($prov->result() as $row) { ?>
                                            <option value="<?php echo $row->id ?>"><?php echo $row->provincia_nombre ?></option>
                                        <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Localidad:</td>
                            <td>
                                <select class="form-control" id="loc" name="loc" required>
                                    <option value="0">Debe seleccionar una prov primero</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Telefono:</td>
                            <td><input class="form-control" type="text" id="est_tel" name="est_tel" required></td></td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input class="form-control" type="email" id="est_email" name="est_email" required></td>
                        </tr>
                    </tbody>
                </table>
                <hr>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Modificar</button>
                </form>
        </div>
</div>
<hr>