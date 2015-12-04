<!-- Header -->
<header>

</header>

<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Admin
                    <small>Listado de boletas</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Lista</li>
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
                            <th>id Boleta</th>
                            <th>CUIT</th>
                            <th>Importe capital</th>
                            <th>Fch Vto</th>
                            <th>Fcha Pago</th>
                            <th>Total a pagar</th>
                            <th>Estudio</th>
                            <th>Paga</th>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $d) { ?>
                                <tr>
                                    <td><?php echo $d->id_boleta;?></td>
                                    <td><?php echo $d->cuit;?></td>
                                    <td><?php echo $d->importe_capital;?></td>
                                    <td>
                                        <?php
                                            $f_vto = $d->f_vto;
                                            $f_vto=date("d-m-Y",strtotime($f_vto)); 
                                            echo $f_vto;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $f_capital = $d->f_pago;
                                            $f_capital=date("d-m-Y",strtotime($f_capital)); 
                                            echo $f_capital;
                                        ?>
                                    </td>
                                    <td><?php echo $d->total_pagar;?></td>
                                    <td><?php echo $d->est_nombre;?></td>
                                    <td><?php if ($d->paga == 1) {
                                            echo "Si";
                                        }else{
                                            echo "No";
                                        }
                                        ?></td>
                                <td><a href="<?php echo base_url();?>admin/ver_boleta/<?php echo $d->id_boleta?>"><input type="button" class="btn btn-success" value="Ver"></a></td>
                                    <?php if ($d->paga != 1) { ?>                        
                                        <td><a href="<?php echo base_url();?>admin/alta_boleta/<?php echo $d->id_boleta?>"><input type="button" class="btn btn-warning" value="Dar de alta"></a></td>
                                    <?}?>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>