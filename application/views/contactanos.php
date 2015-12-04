    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contacto</h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>welcome">Inicio</a>
                    </li>
                    <li class="active">Contacto</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Contact Form -->
        <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-8">
                <h3>Envianos un mensaje</h3>
                <form method="post" name="sentMessage" id="contactForm" action="contactanos/enviar" validate>
                    <div class="control-group form-group">
                        <label>Apellido y Nombre:</label>
                        <div class="controls" style="width: 60%">
                            <input type="text" class="form-control" name="ape_nomb" id="name" required data-validation-required-message="Please enter your name.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label>Telefono:</label>
                        <div class="controls" style="width: 60%">
                            <input type="tel" class="form-control" name="telefono" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label>Email:</label>
                        <div class="controls" style="width: 60%">
                            <input type="email" class="form-control" name="correo" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <label>Mensaje:</label>
                        <div class="controls">
                            <textarea rows="10" cols="100" class="form-control" name="mensaje" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <!-- Contact Details Column -->
            <div class="col-md-4">
                <h3>Detalles de contacto</h3>
                <p>
                    Lavalle 267<br>San Nicolás, Buenos Aires<br>
                </p>
                <p><i class="fa fa-phone"></i> 
                    <abbr title="Phone">Tel</abbr>: (0336) 4425537</p>
                    <abbr title="Phone">Tel-Fax</abbr>: (0336) 53805</p>
                <p><i class="fa fa-envelope-o"></i> 
                    <abbr title="Email">E</abbr>: <a href="mailto:name@example.com">atsasannicolas@hotmail.com</a>
                </p>
                <p><i class="fa fa-clock-o"></i> 
                    <abbr title="Hours">Horarios</abbr>: Lunes - Viernes: 8:00 Hs to 16:00 Hs</p>
            </div>
        </div>
        <!-- /.row -->

        <hr>