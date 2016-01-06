<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Registrar
                    <small>Usuario</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Registración</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form method="post" class="form-inline" name="sentMessage" id="contactForm" action="cargar_usuario" validate>
                <div class="control-group form-group col-sm-4">
                    <div class="controls">
                        <label>Cuit:</label>
                        <input type="text" class="form-control" name="cuit" id="cuit" required>
                    </div>
                </div>
                <div class="control-group form-group col-sm-6">
                    <div class="controls">
                        <label>Correo</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                </div>
                <div id="success"></div>
                <!-- For success/fail messages -->
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
<hr>
        </div>
    </div>
</div>