<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin
                    <small>Listado de usuarios</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Listado</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <form class="form-horizontal" method="post" name="sentMessage">
                <div class="control-group form-group contenido" id="selector">
                    <table class="table table-striped">
                        <thead>
                            <th>id Usuario</th>
                            <th>cuit</th>
                            <th>registrado como empleador</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?php echo $d->id_usuario;?></td>
                                    <td><?php echo $d->cuit;?></td>
                                    <td>
                                        <?php if ($d->regist_emple == 1) {
                                                echo 'Si';
                                            }else{
                                                echo 'No';
                                            }?>
                                    </td>
                                    <td><a href="<?php echo base_url();?>admin/resetearPassUsuario/<?php echo $d->id_usuario?>"><input type="button" class="btn btn-danger" value="Resetear Pass"></a></td>
                                </tr>        
                            <?}?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>