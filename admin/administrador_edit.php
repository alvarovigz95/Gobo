<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}

	//conectar a base de datos
	include "inc/conexion.php";

	//definir sentencia sql
	$sql = "SELECT * FROM admin WHERE admin_id = ".$_GET['id'];

	//ejecutar sentencia
	$datos = $conexion->query($sql);

	//guardo los valores en la variable dato
	$dato = mysqli_fetch_assoc($datos);


	if(isset($_POST['admin_nombre'])){

		//definir sentencia sql
		$nombre = $_POST['admin_nombre'];
		$usuario = $_POST['admin_usuario'];

		if(strlen($_POST['admin_clave']) == 0){
			$clave = $dato['admin_clave'];
		}else{
			$clave = md5($_POST['admin_clave']);	
		}

		

		if(!isset($_POST['admin_status'])){
			$_POST['admin_status'] = 0;
		}


		

		$sql = "UPDATE admin 
					SET admin_nombre = '$nombre',
					    admin_usuario = '$usuario',
					    admin_clave = '$clave',
					    admin_status = {$_POST['admin_status']}
					WHERE admin_id = {$_GET['id']}
		";

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
</head>
<body>
	<!-- columna izquierda -->
	<?php include "inc/sidebar.php";?>

	<!-- columna derecha -->
	<div class="col-md-9">
		<h1>Administrador de contenido GOBO</h1>
		<p>Nuevo Administrador.</p>


		<a href="administrador.php" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Volver</a>
		<br><br>

		<h3>Datos del nuevo administrador</h3>	
		<form action="" method="post">
			<div class="form-group pull-left col-xs-12">
				<label for="admin_nombre" class="col-md-3">Nombre</label>
				<div class="col-md-9">
					<input type="text" value="<?php echo $dato['admin_nombre']?>" class="form-control" name="admin_nombre" id="admin_nombre">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<label for="admin_usuario" class="col-md-3">Usuario</label>
				<div class="col-md-9">
					<input type="text" class="form-control" value="<?php echo $dato['admin_usuario'];?>" name="admin_usuario" id="admin_usuario">
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
					<?php 
						$activo = "";

						if($dato['admin_status'] == 1){
							$activo = "checked='checked'";
						}
					?>

					<input type="checkbox" value="1" <?php echo $activo;?> name="admin_status" id="admin_status">
				</div>
			</div>

			<div class="form-group pull-left col-xs-12">
				<button type="submit" class="btn bt-primary">Guardar</button>
				<a href="administrador.php" class="btn btn-default">Cancelar</a>
			</div>
		</form>

	</div>
</body>
</html>