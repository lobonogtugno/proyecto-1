<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Tlaxiaco De Mil Sabores</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top_header">
			</div>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
			<div id="main_header">
			</div>
				<div id="cmp" class="alert alert-success" style="display:none" role="alert">
					<strong>SE HA AGREGADO UN NUEVO PRODUCTO A SU CANASTA</strong>
				</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->
            <div id='contenedor_principal'>

            </div>

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/index.js"></script>
	</body>
</html>
<script>

$(document).ready(function () {
	cargar_top_header();
    cargar_main_header();
    cargar_contenido();
	 
});
function cargar_top_header() {
    console.log('adsf');
    $.ajax({
        url:'controlador/top_header.php',
        type:'POST',
		dataType:'html',
        data:{
		},
        success:function (msj) {

		  $('#top_header').html(msj);   
  
        }
    }) 
}
function cargar_main_header() {
    $.ajax({
        url:'controlador/main_header.php',
        type:'POST',
		dataType:'html',
        data:{
		},
        success:function (msj) {

		  $('#main_header').html(msj);   
  
        }
    }) 
}
function cargar_contenido() {
    $.ajax({
        url:'controlador/container.php',
        type:'POST',
		dataType:'html',
        data:{
		},
        success:function (msj) {

		  $('#contenedor_principal').html(msj);   
			reload_d();
			reload();
        }
    })
}

</script>