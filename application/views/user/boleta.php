<!-- Page content -->
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div>
                <h1 class="page-header">Imprimir
                    <small>Boleta</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Imprimir</li>
                </ol>
            </div>
        </div>
    <!-- /.row -->
        <div>
            <div class="row">
                    <div id="encabezado">
                        <h1>Sr. Empleador</h1>
                        <h3>S/D</h3>
                    </div>
            </div>

            <div>
            <form action="crear_boleta">
                <p>Por el medio de la presente se informa que a partir del dia de la fecha las boletas sindicales
                del aporte del 2% A.T.S.A tendrán que ser generadas en www.atsasannicolas.com.ar y seguir abonándolas
                en la sede de Lavalle 267, acompañado de la siguiente documentación:</p>

                <p>-. Formulario 931.</p>
                <p>-. Nomina de personal con el detalle de afiliados y no afiliados.</p>
                <p>-. Pago de Contribución Extraordinaria.</p>
                <p>-. Pago FATSA.</p>
                <p>-. En caso de no haber afiliados a ATSA, pago de Cuota Solidaridad.</p>
                <p>-. Planilla de aportes a Obra Social.</p>
                <hr>
                <p>Se recuerda que no se tomará el pago en caso de faltar la documentación solicitada.</p>
                <p>Sin otro particular, saludos atte.</p>
                <hr>
                <h3>¡La boleta deberá ser abonada dentro de los 3 dias hábiles de ser generada!</h3>
            </div>
            <hr>
                <input type="submit" class="btn btn-success" value="Crear boleta">
            </form>
        </div>
</div>
<hr>