<!DOCTYPE HTML>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Maveca la ferreteria mas grande del centro de Maracay, con mas de 40 aÃ±os y la mas extensa variedad de productos para el electricista, pintor y constructor">
        <meta name="author" content="Roger Medina">
        <link rel="shortcut icon" href="img/favicon.ico">

        <title>Maveca - TODO PARA CONSTRUIR</title>

        <link href="css/style.css" rel="stylesheet">

    </head>

    <body>
        <table class="formulario_index" align="center" style="width: 60%" border="0px;">
            <tr>
                <td align="left"><img src="img/MavecaLogo.jpg" width="350" height="65"/></td>
            </tr>
            <tr>
                <td style="text-align: center; color: #000000; "><h1>CONTACTO CLIENTE</h1></br></br><?php echo 'Fecha ' . date("d/m/Y"); ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>NOMBRE: <?PHP echo $_REQUEST['contact_name'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>T&Eacute;LEFONO: <?PHP echo $_REQUEST['contact_phone'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>EMAIL: <?PHP echo $_REQUEST['contact_email'] ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>COMENTARIO: <?PHP echo $_REQUEST['contact_message'] ?></td>
            </tr>
        </table>

    </body>
</html>
