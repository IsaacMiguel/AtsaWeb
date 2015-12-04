    </div>
    <!-- /.container -->

    <!-- Footer -->
        <div class="footer">
            <div>
                <p>Lavalle 267, San Nicolás de los Arroyos - Buenos Aires - Argentina</p>
                <p>Teléfono: (0336) 4425537</p>
                <p>Correo: atsasannicolas@hotmail.com</p>
            </div>
            <p>Copyright &copy; <a href="http://www.sqldata.com.ar/">Leandro Dapello 2015</a></p>
        </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>../js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#filtro').change(function (){
                $('#filtro option:selected').each(function (){
                    var op = $('#filtro').val();

                    switch (op){
                        case ('1'):
                            $('#filtrar').html("<p>Buscar por:</p><select class='form-control cont50' id='fil' name='fil'></select>");
                            $('#fil').append("<option value='0'>Seleccionar</option>");
                            $('#fil').append("<option value='1'>Todos</option>");
                            $('#fil').append("<option value='2'>cuit</option>");
                            $('#filtrar').append("<input class='form-control cont50' type='text' id='txt_busqueda' name='txt_busqueda' placeholder='Ingresar correo'>");
                        break;

                        case ('2'):
                            $('#filtrar').html("<p>Buscar por:</p><select class='form-control cont50' id='fil' name='fil'></select>");
                            $('#fil').append("<option value='0'>Seleccionar</option>");
                            $('#fil').append("<option value='1'>Todos</option>");
                            $('#fil').append("<option value='2'>CUIT</option>");
                            $('#filtrar').append("<input class='form-control cont50' type='text' id='txt_busqueda' name='txt_busqueda' placeholder='Ingresar cuit'>");
                        break;

                        case ('3'):
                            $('#filtrar').html("<p>Buscar por:</p><select class='form-control cont50' id='fil' name='fil'></select>");
                            $('#fil').append("<option value='0'>Seleccionar</option>");
                            $('#fil').append("<option value='1'>Todas</option>");
                            $('#fil').append("<option value='2'>CUIT Empleador</option>");
                            $('#filtrar').append("<input class='form-control cont50' type='text' id='txt_busqueda' name='txt_busqueda' placeholder='Ingresar cuit'>");
                        break;
                    }

                });
            });

            $('#imprimir').click(function() {
                window.print();
                return false;
            });

            if(history.forward(1)){
            location.replace(history.forward(1))
            } 

        });
    </script>
    <script type="text/javascript">
    
    </script>

</body>

</html>