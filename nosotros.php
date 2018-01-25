<?php include 'header.php'; ?>

<script>

    $(document).ready(function() {

        $('#contenido_empresa').load('informacion_empresa.php?type=1');
    });

    function informacion(valor) {
        $('#contenido_empresa').load('informacion_empresa.php?type=' + valor);

        if (valor == 1) {
            $("#link1").removeClass("active").addClass("text-success");
            $("#link2,#link3").removeClass("text-success").addClass("active");
        }
        if (valor == 2) {
            $("#link2").removeClass("active").addClass("text-success");
            $("#link1,#link3").removeClass("text-success").addClass("active");
        }
        if (valor == 3) {
            $("#link3").removeClass("active").addClass("text-success");
            $("#link2,#link1").removeClass("text-success").addClass("active");
        }

    }
</script>
<div class="container">

    <div class="row">

        <div class="col-lg-12">
            <h1 class="page-header">Nuestra Empresa</h1>
            <ol class="breadcrumb">
                <li><a href="javascript:void(0)" onclick="informacion('1');" style="cursor: pointer" class="text-success" id="link1">Descripci&oacute;n</a></li>
                <li><a href="javascript:void(0)" onclick="informacion('2');" style="cursor: pointer" id="link2">Misi&oacute;n</a></li>
                <li><a href="javascript:void(0)" onclick="informacion('3');" style="cursor: pointer" id="link3">Visi&oacute;n</a></li>
            </ol>
        </div>

    </div>

    <div class="row" id="contenido_empresa"></div>

    <!-- Team Member Profiles -->

    <div class="row">

        <div class="col-lg-12">
            <h2 class="page-header">Nuestro Producto</h2>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6461.jpg">
            <h3>Herramienta de Carpinter&iacute;a</h3>
            <p>Herramientas y equipos para el Carpintero en general: Taladros, Cerraduras, Trompos Electrico y Accesorios.</p>
            <ul class="list-unstyled list-inline list-social-icons">
            </ul>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6499.jpg">
            <h3>Materia de Construcci&oacute;n</h3>
            <p>Materiales para la construcción en general: Cabillas, Tubo Estructural, Cemento, Cal, Pego, Cemento Blanco.</p>
            <ul class="list-unstyled list-inline list-social-icons">
                
            </ul>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6505.jpg">
            <h3>Envios Nacionales en Todo el Pa&iacute;s</h3>
            <p>Costos Bajos para sus envios, segun se la compra o alquiler de su necesidad.</p>
            <ul class="list-unstyled list-inline list-social-icons">
            </ul>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6467.jpg">
            <h3>Herramienta de Herrer&iacute;a</h3>
            <p>Herramientas y equipos para el soldador en general: Electrodos y Accesorios para Equipos de Soldar, Máquinas de Soldar y Equipos de Corte, Puertas, Ventanas, Marcos, Cerraduras, Accesorios.</p>
            <ul class="list-unstyled list-inline list-social-icons">
            </ul>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6448.jpg">
            <h3>Innovando en maquinarias</h3>
            <p>Hormigoneras y Mezcladora, Compresores, Bomba de Achique, Andamios, Demolici&oacute;n con Herramientas de Mano.</p>
            <ul class="list-unstyled list-inline list-social-icons">
            </ul>
        </div>

        <div class="col-sm-4">
            <img class="img-responsive" src="img/750x450/IMG_6516.jpg">
            <h3>Material de Pintura</h3>
            <p>Amplia gama de pinturas de marcas reconocidos y accesorios en general: Fondos, Pinturas, Solventes, Brochas y Accesorios.</p>
            <ul class="list-unstyled list-inline list-social-icons">
            </ul>
        </div>

    </div>

    <!-- Our Customers -->

    <div class="row">

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6484.jpg">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6493.jpg">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6508.jpg">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6510.jpg">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6528.jpg">
        </div>

        <div class="col-md-2 col-sm-4 col-xs-6">
            <img class="img-responsive img-customer" src="img/500x300/IMG_6470.jpg">
        </div>

    </div>
<script>
			// Activate Google Prettify in this page
				addEventListener('load', prettyPrint, false);

			$(document).ready(function(){

				// Add prettyprint class to pre elements
					$('pre').addClass('prettyprint linenums');

			});

		</script>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-22151549-3']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
</div><!-- /.container -->
<?php include 'footer.php'; ?>