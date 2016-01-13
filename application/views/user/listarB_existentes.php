<div class="container">
	<!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div>
                <h1 class="page-header">Listar
                    <small>Boletas</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Listar</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->
    <div class="panel panel-default">
    <div class="panel-heading"><b>Lista de boletas</b></div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nro boleta</th>
                <th>Estudio</th>
                <th>Imp. Cap.</th>
                <th>Fcha. vto</th>
                <th>Fcha. pago</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($boletas as $boleta) { ?>
                <tr>
                    <td><?php echo $boleta->id_boleta;?></td>
                    <td><?php echo $boleta->est_nombre;?></td>
                    <td>$ <?php echo $boleta->importe_capital;?>-</td>
                    <td>
                        <?php
                            $f_vto = $boleta->f_vto;
                            $f_vto=date("d-m-Y",strtotime($f_vto)); 
                            echo $f_vto
                        ?>
                    </td>
                    <td>
                        <?php
                            $f_v_pago = $boleta->f_v_pago;
                            $f_v_pago=date("d-m-Y",strtotime($f_v_pago)); 
                            echo $f_v_pago
                        ?>
                    </td>
                    <td>$ <?php echo $boleta->total_pagar;?>-</td>
                    <td><a href="<?php echo base_url();?>user/ver_boletaById/<?php echo $boleta->id_boleta?>"><input type="button" class="btn btn-success" value="Ver"></a></td>
                        <?php if ($boleta->paga == 0) {?>
                            <td><a href="<?php echo base_url();?>user/verMod_boletaById/<?php echo $boleta->id_boleta?>"><input type="button" class="btn btn-warning" value="Modificar"></a></td>
                        <?}?>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
</div>
<hr>