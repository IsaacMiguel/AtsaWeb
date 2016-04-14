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
            <form method="post" name="sentMessage" id="cargaBoleta" action="cargar_boleta" validate>
                <div class="row">
                    <div id="encabezado" style="text-align: center; border-style: solid; border-width: 2px;">
                        <h3>Asociación de Trabajadores</h3>
                        <h3>de la Sanidad Argentina</h3>
                        <H4>- FILIAL SAN NICOLAS -</H4>
                        <p>Aporte Sindical 2%</p>
                        <p>Nro de Boleta <input hidden id="empleador" name="nro_boleta" value="<?php echo $boleta->ult_boleta + 1?>"><?php echo $boleta->ult_boleta + 1?></p>
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
                            <td>Localidad: </td>
                            <td><input hidden id="id_loc" name="loc" value="<?php echo $emp_localidad->id?>" required><?php echo $emp_localidad->ciudad_nombre?></td>
                        </tr>
                        <tr>
                            <td>Provincia: </td>
                            <td><input hidden id="id_provincia" name="prov" value="<?php echo $emp_prov->id?>" required><?php echo $emp_prov->provincia_nombre?></td>
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
                            <td>Fecha de vencimiento de Aporte:</td>
                            <td><input id="f_vto" name="f_vto" type="text" class="form-control" readonly required></td>
                        </tr>
                        <tr>
                            <td>Fecha de generacion de boleta:</td>
                            <td><input id="f_gener_boleta" value="<?php echo date('d/m/Y')?>" name="f_gener_boleta" type="text" class="form-control" readonly></td>
                        </tr>
                        <tr>
                            <td>Vencimiento para el pago:</td>
                                <?php 
                                    $actual = date('d-m-Y');
                                    $date1 = strtotime($actual);
                                    $date2 = date("l", $date1);
                                    $date3 = strtolower($date2);

                                    if ($date3 == 'wednesday' || $date3 == 'thursday' || $date3 == 'friday') {
                                        $fcha = date('d/m/Y', strtotime($date3. ' + 5 days'));
                                    }elseif ($date3 == 'saturday') {
                                        $fcha = date('d/m/Y', strtotime($date3. ' + 4 days'));
                                    }else{
                                        $fcha = date('d/m/Y', strtotime($date3. ' + 3 days'));
                                    }
                                ?>;
                            <td><input id="f_v_pago" name="f_v_pago" type="text" class="form-control" value="<?php echo $fcha;?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Cantidad de Empleados Afiliados: </td>
                            <td><input id="cant_empleados" name="cant_empleados" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required></td>
                        </tr>
                        <tr>
                            <td>Total de remuneraciones de afiliados (Jornada por 8 horas):</td>
                            <td><input class="form-control" id="importe_capital" name="importe_capital" step="any" type="number" min="0" required></td>
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
                    <input type="submit" class="btn btn-primary" value="Generar Boleta">
                </form>
        </div>    
</div>
<hr>      