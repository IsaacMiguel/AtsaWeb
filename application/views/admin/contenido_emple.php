<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin
                    <small>Listado de empleadores</small>
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
                            <th>CUIT</th>
                            <th>empleador</th>
                            <th>Direccion</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?php echo $d->cuit;?></td>
                                    <td><?php echo $d->empleador;?></td>
                                    <td><?php echo $d->direccion;?></td>
                                    <td><?php echo $d->email;?></td>
                                </tr>        
                            <?}?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>