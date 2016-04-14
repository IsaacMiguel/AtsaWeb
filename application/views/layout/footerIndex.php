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
    <script src="../../js/jquery.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
	    $(document).ready(function () {
	    	$('.carousel').carousel({
		      interval: 5000 //changes the speed
		    })

		    if(history.forward(1)){
		      location.replace(history.forward(1))
		    }

			    $(".login-overlay").fadeIn(300);
			    $(".close").on('click', function(e) {
			      $(".login-overlay").fadeOut(300);  
			    });

	    });
    </script>

</body>

</html>