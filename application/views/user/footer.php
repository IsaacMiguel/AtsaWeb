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
            <div>
                <p>Sitio soportado por Internet Explorer 10 o superior, FireFox y Google Chrome en sus ultimas versiones</p>
            </div>
        </div>

    <!-- jQuery -->
    <script src="<?php echo base_url();?>../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>../js/bootstrap.min.js"></script>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function (){
            $('#prov').change(function (){
                $('#prov option:selected').each(function (){
                    var prov = $('#prov').val();
                    $.post("<?php echo base_url();?>user/cargar_localidad" ,
                    {
                        prov : prov
                    }, function(data) {
                        $('#loc').html(data);
                    }
                    );
                });
            });

            $('#imprimir').click(function() {
                window.print();
                return false;
            });

            if(history.forward(1)){
                location.replace(history.forward(1))
            }

            
            function changeDate(date){
            // input: dd/mm/yyyy
            fechaus = date.substring(6,10) + "-" + date.substring(3,5) + "-" + date.substring(0,2);
            return fechaus;
            // output: yyyy/mm/dd
            }

            $('.calc_vencimiento').keyup(function() {
                var mes = "01";
                var anio = "2015";
                var mes = $('#a_mes').val();
                var anio = $('#anio').val();
                var fvto = $('#f_vto').val();
                mes = parseInt(mes);
                mes = mes + 1;

                anio = parseInt(anio);

                if (mes == 13) {
                    anio = anio + 1;
                    mes = "01";
                    var fvto = "15/"+mes+"/"+anio;
                    console.log(fvto)
                    var fch_vto = changeDate(fvto);
                    $('#f_vto').val(fch_vto);
                }else{
                    if (mes < 10) {
                        mes = "0" + mes;
                        var fvto = "15/" + mes + "/" + anio;
                        var fch_vto = changeDate(fvto);
                        $('#f_vto').val(fch_vto);
                    }else{
                        var fvto = "15/"+mes+"/"+anio;
                        var fch_vto = changeDate(fvto);
                        $('#f_vto').val(fch_vto);
                    }
                }
            });
        });
    </script>
</body>

</html>