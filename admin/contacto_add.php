?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}


	if(isset($_POST['admin_nombre'])){
		
		//conectar a base de datos
		include "inc/conexion.php";

		//definir sentencia sql
		$nombre = $_POST['admin_nombre'];
		$usuario = $_POST['admin_usuario'];
		$clave = md5($_POST['admin_clave']);
		$estado = number_format($_POST['admin_status']);

		$sql = "INSERT INTO admin(admin_nombre,admin_usuario,admin_clave,admin_status)
				VALUES('$nombre','$usuario','$clave','$estado')";

		//ejecutar sentencia
		$conexion->query($sql);


		//direccionar a listado de administradores
		header("location: administrador.php");

	}

?>
<html>
<head>
	<meta charset="utf-8">
	<title>Home - ABM GOBO</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/mood.css">
</head>
<body>
	<!-- columna izquierda -->
	<?php include "inc/sidebar.php";?>

	<!-- columna derecha -->
	<div class="col-md-9">
		<h1>Administrador de contenido GOBO</h1>
		<p>Nuevo Administrador.</p>


		<a href="contacto.php" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Volver</a>
		<br><br>

		<h3>Datos del nuevo administrador</h3>	
		<form action="" method="post">
			<div class="form-group pull-left col-xs-12">
				<label for="contacto_nombre" class="col-md-3">Nombre</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="contacto_nombre" id="contacto_nombre">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<label for="contacto_usuario" class="col-md-3">Usuario</label>
				<div class="col-md-9">
					<input type="text" class="form-control" name="admin_usuario" id="admin_usuario">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<label for="admin_clave" class="col-md-3">Clave</label>
				<div class="col-md-9">
					<input type="password" class="form-control" name="admin_clave" id="admin_clave">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<label for="admin_status" class="col-md-3">Activo</label>
				<div class="col-md-9">
					<input type="checkbox" value="1" name="admin_status" id="admin_status">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12 mt20">
				<button type="submit" class="btn bt-primary">Guardar</button>
				<a href="administrador.php" class="btn btn-default">Cancelar</a>
			</div>
		</form>

	</div>
</body>
</html>