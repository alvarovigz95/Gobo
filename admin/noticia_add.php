<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}


	if(isset($_FILES['noticia_imagen'])){
				
		//conectar a base de datos
		include "inc/conexion.php";

		//definir sentencia sql
		$imagen = $_FILES['noticia_imagen']['name'];
		
		move_uploaded_file($_FILES['noticia_imagen']['tmp_name'],"../upload/noticia/".$imagen);
		
		
	
		$estado = number_format($_POST['noticia_status']);

		$sql = "INSERT INTO noticia(noticia_imagen,noticia_status)
				VALUES('$imagen','$estado')";

		//ejecutar sentencia
		$conexion->query($sql);


		//direccionar a listado de banners
		header("location: banner.php");

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
		<p>Nuevo Banner.</p>


		<a href="noticia.php" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Volver</a>
		<br><br>

		<h3>Datos del nuevo banner</h3>	
		<form action="" method="post" enctype="multipart/form-data">
			<div class="form-group pull-left col-xs-12">
				<label for="banner_imagen" class="col-md-3">Imagen</label>
				<div class="col-md-9">
					<input type="file" class="form-control" name="banner_imagen" id="noticia_imagen">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<label for="banner_status" class="col-md-3">Activo</label>
				<div class="col-md-9">
					<input type="checkbox" value="1" name="noticia_status" id="noticia_status">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12 mt20">
				<button type="submit" class="btn bt-primary">Guardar</button>
				<a href="banner.php" class="btn btn-default">Cancelar</a>
			</div>
		</form>

	</div>
</body>
</html>