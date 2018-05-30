<?php
	session_start();

	if(isset($_SESSION["carnet"])){

	
?>
<html>
<head>
	<title>CDA Por Mi Barrio Las Viñas</title>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/sb-admin-2.css">
	<link rel="stylesheet" type="text/css" href="boots/css/proyecto.css">

	<script type="text/javascript" src="boots/js/jquery-1.9.1.js"></script>
	<script type="text/javascript" src="boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="boots/js/proyecto.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
</head>
<script>
$(document).ready(function(evento){
	$('#cont').click(function(evento){
		flotante(2);
	});

	setTimeout(function() {
        $(".alert").fadeOut(1000);
    },1500);

	$('#limpiar').click(function(evento){
		document.getElementById("idAula").readOnly = false;
		document.getElementById("updAula").disabled = true;
		document.getElementById("addAula").disabled = false;
	});

	$(".table tr td").hover(function (evento){
  		var x = $(this).parent("tr");
 		x.addClass("selected");
 		$(".table tr .noTh").addClass("selected");
	});

	$(".no").click(function(evento){
		//no hace nada
	});
	$(".no").hover(function(evento){
		var x = $(this).parent("tr");
 		x.removeClass("selected");
		$(this).addClass("no");
		
	});
	$(".table tr td").mouseleave(function(evento){
		var x = $(this).parent("tr");
 		x.removeClass("selected");
 		$(".table tr Th").removeClass("selected");

	});
});
	
</script>
<body style="margin-top: 70px; text-align: center;" background="./imagenes/fondo1.png">
	<div class="container">
		<div class="row">
			<?php
				include("menuAdmin.php");
			?>
		</div>
		
		<?php
		include("conn.php");
		include("logins.php");
				if (isset($_GET['nh'])) {
					include($_GET['nh']);
				}else{
			?>
		<div class="row">
			
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div> 
			<div class="col-sm-10 col-md-10 col-lg-10">
				<img src="imagenes/logo.jpg">
				<h3>Sistema para el Control de Notas<br>CDA "Por Mi Barrio" Las Viñas</h3>
				<div class="panel panel-info">
					<div class="panel-heading">
						Administrador
					</div>
					<div class="panel-body" style="text-align: justify;">
						<center><img class="img img-responsive" src="imagenes/bienvenido.png"></center>
						<div style="float: left;"><img class="img img-responsive" src="imagenes/admin.jpg"></div>
						<div style=""><br><br><center><h2>Acceda a las opciones de administración desde el menú</h2></center></div>
					</div>
					<div class="panel-footer">
						Espacio exclusivo del administrador
					</div>
				</div>
			</div>
			<div class="col-sm-1 col-md-1 col-lg-1">
				&nbsp;
			</div>
		</div>
		<?php } ?>
	</div>
	<footer style="width: 100%; height: 50px; background-color: #222222; color: #9d9d9d; text-align: center; padding-top:15px;">
		<a style="color: #9d9d9d;">CDA "Por mi Barrio" Las Viñas</a>
		
	</footer>
</body>
</html>
<?php

	}else{
		echo "<script>window.location='./';</script>";
	}

?>