<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin
                    <small>Listar</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Listar</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" method="post" name="sentMessage" id="cargar_contenido" action="cargar_contenido" validate>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="control-group form-group col-lg-6" id="selector">
                            <p>Filtrar:</p>
                                <select class="form-control cont50" id="filtro" name="filtro">
                                    <option value="0" selected>Seleccionar</option>
                                    <option value="1">Usuario</option>
                                    <option value="2">Empleador</option>
                                    <option value="3">Boletas</option>
                                </select>
                        </div>
                        <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="col-lg-3"></div>
                        <div class="control-group form-group col-lg-6" id="filtrar">
                            
                        </div>
                    <div class="col-lg-3"></div>
                </div>
                <div class="row">
                    <div class="control-group form-group" id="contenido">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5"></div>
                        <div class="col-lg-2">
                            <button type="submit" class="btn btn-primary">Cargar</button>
                        </div>
                    <div class="col-lg-5"></div>
                </div>
                    
                </form>
        </div>
    </div>
</div>