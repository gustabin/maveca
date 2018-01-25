<?php

if ($_REQUEST['action'] == 'send') {
    require_once('recaptcha-php-1.11/recaptchalib.php');
    include ('PHPMailer-5.0.0/class.phpmailer.php');

    $privatekey = "6Le50-oSAAAAAGmqkENakxIKjnTv0skHStNhcf06";
    $resp = recaptcha_check_answer($privatekey, gethostbyname($_SERVER["REMOTE_ADDR"]), $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

    if (!$resp->is_valid) {
        // What happens when the CAPTCHA was entered incorrectly
        die("El c&oacute;digo introducido no es correcto.");
        #die ("The reCAPTCHA wasn't entered correctly. Go back and try it again."."(reCAPTCHA said: " . $resp->error . ")");
    } else {
        // Your code here to handle a successful verification



        $fecha = date("d/m/Y");
        // Your code here to handle a successful verification
        ##Envio de la vaina al fin:
        $mail = new PHPMailer();
        $Contacto_Name=utf8_decode($_REQUEST['contact_name']);
        # Correo quien envia:
        $mail->From = $_REQUEST['contact_email'];
        # Nombre de quien envia:
        $mail->FromName = $Contacto_Name;
        #Direcciones a quienes se les envia:
        $mail->AddAddress("cotizacion@maveca.com.ve", "Nombre Destinatario");
        #CLAVE DE EMAIL :Mavecapbn4CA
        #$mail->AddAddress("destino2@ejemplo.com");  // El nombre es opcional
        #A quien se responde:
        $mail->AddReplyTo($_REQUEST['contact_email'], $Contacto_Name);

        $mail->WordWrap = 50;
        #$mail->AddAttachment(�/ruta/al/archivo/documento.zip�);         // A�adimos Documentos
        #$mail->AddEmbeddedImage(�/ruta/al/archivo/logo.jpg�, �logo�, �logo.jpg�); //Imagen embebida en el mensaje
        $mail->IsHTML(true); // Activamos el formato HTML
        #Asunto:
        $mail->Subject = "Comentarios y/o Sugerencias";
        #Cuerpo:
        $mail->Body = "<html>
<head>
  <title>Contacto Cliente</title>
</head>
<body>
  <table>
   <tr>
   <td align='left'><img src='http://www.maveca.com.ve/bootstrap/img/MavecaLogo.jpg' width='350' height='65'/></td>
   </tr>
    <tr>
     <td style='text-align: center'>
     <h11>CONTACTO CLIENTE</h11></br></br>
    </td>
    </tr>
     <tr>
                <td> Fecha " . $fecha .
                "</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='color: #000000;'>NOMBRE:  " . utf8_decode($_REQUEST['contact_name']) . "</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='color: #000000;'>TEL&Eacute;FONO:  " . $_REQUEST['contact_phone'] . "</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='color: #000000;'>EMAIL:  " . $_REQUEST['contact_email'] . "</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='color: #000000;'>COMENTARIO:  " . utf8_decode($_REQUEST['contact_message']) . "</td>
            </tr>
  </table>
</body>
</html>
";

        #Cuerpo alternativo:
        $mail->AltBody = $_REQUEST['contact_message'];

        if (!$mail->Send()) {
            echo "Se ha producido un error al enviar el correo.";
            echo "Mailer Error: " . $mail->ErrorInfo;
            exit;
        }

        echo "Tu comentario ha sido enviado con Exito, Gracias .";
        #var_dump ($_REQUEST);
        die('');
    }
}
?>