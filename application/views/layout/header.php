<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>ATSA - Asociación de trabajadores argentinos - Filial San Nicolás</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url();?>../css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>../css/modern-business.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url();?>../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom CSS -->
        <link href="<?php echo base_url();?>../css/main.css" rel="stylesheet">

        <!-- Christmas CSS -->
        <link href="<?php echo base_url();?>../css/christmas.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    
    <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>welcome">ATSA - San Nicolás</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?php echo base_url(); ?>nosotros">Nosotros</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>beneficios">Beneficios</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>contactanos">Contactanos</a>
                    </li>
                    <li>
                        <a class='dropdown-toggle' href="#" data-toggle='dropdown'>Secretarias</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>secretarias/gremial">Secretaria Gremial</a></li>
                            <li><a href="<?php echo base_url(); ?>secretarias/turismo">Turismo y Recreación</a></li>
                            <li><a href="<?php echo base_url(); ?>secretarias/cultura_capacitacion">Cultura y Capacitación</a></li>
                            <li><a href="<?php echo base_url(); ?>secretarias/deporte">Deporte y Juventud</a></li>
                            <li><a href="<?php echo base_url(); ?>secretarias/igualdad">Igualdad de Oportunidades y Género</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class='dropdown-toggle' href="#" data-toggle='dropdown'>Profesionales OSPSA</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url(); ?>profesionales/odontologicos">Desc. Circ. Odontológico</a></li>
                            <li><a href="<?php echo base_url(); ?>profesionales/bioquimicos">Desc. Bioquímicos</a></li>
                            <li><a href="<?php echo base_url(); ?>profesionales/profesional">Desc. Profesionales</a></li>
                        </ul>
                    </li>
                    <?php if ($this->session->userdata('login')) { ?>
                        <li class='dropdown'>
                            <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Aportes<b class='caret'></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="<?php echo base_url(); ?>imprimir">Imprimir boleta</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>boletas">Listado de boletas</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>login/salir">Salir</a>
                                </li>
                            </ul>
                    <?php }else{ ?>
                    <li class='dropdown'>
                      <a class='dropdown-toggle' href='#' data-toggle='dropdown' style="background: none;">Aportes<strong class='caret'></strong></a>
                      <div class='dropdown-menu' style='padding: 10px; padding-bottom: 0px; background: none; width: 400px;'>
                        <form method="POST" action="login/">
                          <div class='form-group'>
                            <input class='form-control large' style='text-align: center;' type='text' name='cuit' placeholder='cuit'/>
                          </div>
                          <div class='form-group'> 
                            <input class='form-control large' style='text-align: center;' type='password' name='password' placeholder='contraseña' />
                          </div>
                          <div class='form-group'>
                            <a href="<?php echo base_url();?>login"><input class='btn btn-primary' style='width: 380px;' type='submit' value="INGRESAR"></a>
                          </div>
                        </form>
                        <div class='form-group'>
                            <a href="<?php echo base_url();?>login/registrar"><input class='btn btn-success' style='width: 380px;' type='submit' value="REGISTRARME"></a>
                          </div>
                          <div class='form-group'>
                            <a href="<?php echo base_url();?>login/recordar"><input class='btn btn-danger' style='width: 380px;' type='submit' value="RECORDAR CONTRASEÑA"></a>
                          </div>
                      </div>
                    </li>
                    <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>