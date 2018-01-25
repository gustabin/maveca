<?php
include 'header.php';
if ($_REQUEST['action'] == 'send') {
    require_once('recaptcha-php-1.11/recaptchalib.php');
    include ('PHPMailer-5.0.0/class.phpmailer.php');
    
   $privatekey = "6Le50-oSAAAAAGmqkENakxIKjnTv0skHStNhcf06";
       $resp = recaptcha_check_answer ($privatekey,
            gethostbyname($_SERVER["REMOTE_ADDR"]),
            $_POST["recaptcha_challenge_field"],
            $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        die("El c&oacute;digo introducido no es correcto.");
        #die ("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: " . $resp->error . ")");
    } else {
        // Your code here to handle a successful verification

        ##Envio de la vaina al fin:
        $mail = new PHPMailer();
        # Correo quien envia:
        $mail->From = $_REQUEST['contact_email'];
        # Nombre de quien envia:
        $mail->FromName = $_REQUEST['contact_name'];
        #Direcciones a quienes se les envia:
        $mail->AddAddress("jss.reyes2@gmail.com", "Nombre Destinatario");
        #$mail->AddAddress("destino2@ejemplo.com");  // El nombre es opcional
        #A quien se responde:
        $mail->AddReplyTo($_REQUEST['contact_email'], $_REQUEST['contact_name']);

        $mail->WordWrap = 50;
        #$mail->AddAttachment(�/ruta/al/archivo/documento.zip�);         // A�adimos Documentos
        #$mail->AddEmbeddedImage(�/ruta/al/archivo/logo.jpg�, �logo�, �logo.jpg�); //Imagen embebida en el mensaje
        $mail->IsHTML(true); // Activamos el formato HTML
        #Asunto:
        $mail->Subject = "Comentarios y/o Sugerencias";
        #Cuerpo:
        $mail->Body = "<b>" . $_REQUEST['contact_message'] . "</b>"."</br></br>".$_REQUEST['contact_phone'];
        #Cuerpo alternativo:
        $mail->AltBody = $_REQUEST['contact_message'];

        if (!$mail->Send()) {
            echo "Se ha producido un error al enviar el correo.";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        echo "Tu comentario ha sido enviado con Exito.";
        #var_dump ($_REQUEST);
        die('');
    }
}
?>

<!-- Page Content -->
<script>
    $(document).ready(function() {
        //MASCARA EN EL INPUT	
        $("#contact_phone").mask("(9999)999-99-99");

        $('#contact-form').validate(
                {
                    rules: {
                        name: {
                            minlength: 2,
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        subject: {
                            minlength: 2,
                            required: true
                        },
                        message: {
                            minlength: 2,
                            required: true
                        }
                    },
                    highlight: function(element) {
                        $(element).closest('.control-group').removeClass('success').addClass('error');
                    },
                    success: function(element) {
                        element
                                .text('OK!').addClass('valid')
                                .closest('.control-group').removeClass('error').addClass('success');
                    }
                });
    }); // end document.ready

    var RecaptchaOptions = {
        theme: 'clean'
    };

    function formToAjax() {
        var url = "contacto_copia.php?action=send";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#contact-form").serialize(), // serializes the form's elements.
            success: function(data)
            {
                $("#respuesta").html(data); // show response from the php script.
                setTimeout("$('#respuesta').hide();", 2000);
            }
        });

        return false; // avoid to execute the actual submit of the form.

    }
</script>
<style>
    #recaptcha_response_field{
        height: 36px;
    }
    </style>
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Cont&aacute;ctenos</h1>
<!--            <div class="col-lg-12">
                 Embedded Google Map using an iframe - to select your location find it on Google maps and paste the link as the iframe src. If you want to use the Google Maps API instead then have at it! 
                <iframe width="640" height="480" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.es/maps?f=q&amp;source=s_q&amp;hl=es&amp;geocode=&amp;q=maracay+aragua&amp;sll=40.396764,-3.713379&amp;sspn=9.818189,19.599609&amp;ie=UTF8&amp;hq=&amp;hnear=Maracay,+Girardot,+Aragua,+Venezuela&amp;t=m&amp;ll=10.248624,-67.597675&amp;spn=0.040541,0.054932&amp;z=14&amp;output=embed"></iframe><br /><small><a href="https://maps.google.es/maps?f=q&amp;source=embed&amp;hl=es&amp;geocode=&amp;q=maracay+aragua&amp;sll=40.396764,-3.713379&amp;sspn=9.818189,19.599609&amp;ie=UTF8&amp;hq=&amp;hnear=Maracay,+Girardot,+Aragua,+Venezuela&amp;t=m&amp;ll=10.248624,-67.597675&amp;spn=0.040541,0.054932&amp;z=14" style="color:#0000FF;text-align:left">Ver mapa más grande</a></small>
            </div>-->

            <div class="row">
                <div class="col-sm-8">
                    <h3>Formulario de Contacto</h3>
                    <p>&nbsp;</p>
                    <form role="form" method="POST" id="contact-form" onsubmit="return formToAjax()" action="?action=send">
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="input1">Nombre / Raz&oacute;n Social</label>
                                <div class="controls">
                                    <input type="text" name="contact_name" class="form-control required" id="contact_name">
                                </div>
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="input2">Email</label>
                                <input type="email" name="contact_email" class="form-control required" id="contact_email">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="input3">Tel&eacute;fono</label>
                                <input type="text" name="contact_phone" class="form-control required" id="contact_phone">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label for="input4">Mensaje</label>
                                <textarea name="contact_message" class="form-control required" rows="6" id="contact_message"></textarea>
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                               	<div style="width: 530px; margin-left:0px">
<?php
require_once('recaptcha-php-1.11/recaptchalib.php');
$publickey = "6Le50-oSAAAAAFu65HHcA9EEY42MZHy3lozLdgZx";
echo recaptcha_get_html($publickey);
?>
                                </div>
                            <div class="form-group col-lg-12">
                                <div id='respuesta' align="left" style='color:#FF0000'></div>
                            </div>
                        </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <input type="hidden" name="save" value="contact">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-4">
                    <h3>Nuestra Direcci&oacute;n</h3>
                    <p>
                        Calle Cajigal Nº 5.  Maracay, Estado Aragua.<br>
                    </p>
                    <p><i class="fa fa-phone"></i> <abbr title="Phone">Tel&eacute;fonos </abbr>: (0243) 2456144 / 2456544 / 2454942</p>
                    <p><i class="fa fa-envelope-o"></i> <abbr title="Email">E</abbr>: <a href="mailto:mail@maveca.com.ve">mail@maveca.com.ve</a></p>
                    <p><i class="fa fa-clock-o"></i> <abbr title="Hours">RIF.</abbr>J-07508496-9</p>
                    <ul class="list-unstyled list-inline list-social-icons">
                        <li class="tooltip-social facebook-link"><a href="#facebook-page" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook-square fa-2x"></i></a></li>
                        <li class="tooltip-social linkedin-link"><a href="#linkedin-company-page" data-toggle="tooltip" data-placement="top" title="LinkedIn"><i class="fa fa-linkedin-square fa-2x"></i></a></li>
                        <li class="tooltip-social twitter-link"><a href="#twitter-profile" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
                        <li class="tooltip-social google-plus-link"><a href="#google-plus-page" data-toggle="tooltip" data-placement="top" title="Google+"><i class="fa fa-google-plus-square fa-2x"></i></a></li>
                    </ul>
                </div>

            </div><!-- /.row -->

        </div><!-- /.container -->

<?php include 'footer.php'; ?>