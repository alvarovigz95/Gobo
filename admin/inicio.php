<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - ABM GOBO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
	<!-- columna izquierda -->
	<div class="col-md-3 bg-info">
		<h5>Bienvenido, <?php echo $_SESSION['usuario'];?></h5>
		<a href="ajax/cerrar.php" class="btn btn-danger">Cerrar sesión</a>

		<hr>

		<h6>Sessiones administrables</h6>

		<hr>

		<ul class="list-group">
			<li class="list-group-item active"><a href="./">Inicio</a></li>
			<li class="list-group-item"><a href="administrador.php">Administradores</a></li>
			<li class="list-group-item"><a href="">Banner</a></li>
			<li class="list-group-item"><a href="">Noticias</a></li>
			<li class="list-group-item"><a href="">Servicios</a></li>
			<li class="list-group-item"><a href="">Contactos</a></li>
		</ul>
	</div>

	<!-- columna derecha -->
	<div class="col-md-9">
		<h1>Administrador de contenido GOBO</h1>
		<p>Bienvenido al administrador del sitio, elija las opciones del menu.</p>
	</div>

</body>
</html>