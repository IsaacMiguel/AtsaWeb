<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registrar
                    <small>Empleador</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Registrar</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" method="post" name="sentMessage" id="cargar_emple" action="cargar_emple" validate>
                    <div class="control-group form-group">
                        <label class="col-sm-2">Empleador:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="empleador" id="empleador" required data-validation-required-message="Please enter your name.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label class="col-sm-2">CUIT:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="cuit" id="cuit" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label class="col-sm-2">Dirección:</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="direccion" id="direccion" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label class="col-sm-2">Provincia:</label>
                        <div class="col-sm-4">
                            <select class="form-control" id="prov" name="prov">
                                <option value="0">Seleccione una provincia</option>
                                <?php foreach ($prov->result() as $row) { ?>
                                    <option value="<?php echo $row->id ?>"><?php echo $row->provincia_nombre ?></option>
                                <?php }?>
                            </select>
                        </div>
                        </div>
                        <div class="control-group form-group">
                            <label class="col-sm-2">Localidad:</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="loc" name="loc">
                                    <option value="0">Debe seleccionar una prov</option>
                                </select>
                            </div>
                        </div>
                    <div class="control-group form-group">
                        <label class="col-sm-2">Telefono:</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="telefono" id="telefono" required data-validation-required-message="Por favor, ingrese su telefono.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label class="col-sm-2">Email:</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" name="email" id="email" required data-validation-required-message="Por favor, ingrese su email.">
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </form>
            <hr>
        </div>
    </div>
</div>
<hr>