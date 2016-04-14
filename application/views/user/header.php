<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>A.T.S.A. - Asociación de trabajadores de la sanidad argentina - Filial San Nicolás</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>../css/modern-business.css" rel="stylesheet">

    <!-- Site CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>../css/main.css">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .bordeado{
            border-style: solid;   
        }
    </style>

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
                    <li class='dropdown'>
                        <a class='dropdown-toggle' href='#' data-toggle='dropdown'>Aportes<b class='caret'></b></a>
                        <ul class="dropdown-menu">
                        <?php 
                            if ($this->session->userdata('registrado') == '1') {
                        ?>
                                <li>
                                <a href="<?php echo base_url(); ?>user/boleta">Crear Boleta</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>user/listarB_existentes">Listado de boletas</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>login/salir">Salir</a>
                                </li>
                        <?php }else{ ?>
                            <li>
                                <a href="<?php echo base_url(); ?>user/registrar">Registrarme</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>user/imp_boleta">Imprimir boleta</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>user/listar">Listado de boletas</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>login/salir">Salir</a>
                            </li>
                        </ul>
                        <?php }?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>