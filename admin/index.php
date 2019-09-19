<?php
	session_start();
	if(isset($_SESSION['usuario'])){
		header("location: inicio.php");
		exit;
	}

	if($_POST){
		//solo ingresamos aqui si hay POST 
		include "inc/conexion.php";
		
		$usuario = $_POST['usuario'];
		$clave = md5($_POST['clave']);

		//verificamos si existe en base de datos [user y pass]
		$sql = "SELECT * FROM admin 
					WHERE admin_usuario = '$usuario' 
					AND admin_clave = '$clave'";

		$existe = $conexion->query($sql);
		$total = count(mysqli_fetch_assoc($existe));

		if($total > 0){
			$_SESSION['usuario'] = $usuario;
			header("location: inicio.php");
			exit;
		}else{
			echo "no existe el usuario. verifique la clave ingresada";
		}

	}
?>
<html>
<head>
	<title>ABM - Gobo</title>
	<meta charset="utf-8">
	<style type="text/css">
		body{text-align: center; background: #ddd;}
		h2{
			padding: 150px 0 20px; 
			font-size: 40px; 
			background: #fff;
			border-bottom: 2px solid #dadada;
		}
	</style>
</head>
<body>
	<h2>Iniciar sesión</h2>
	<form action="" method="post">
		<label for="usuario">Usuario</label><br>
		<input type="text" name="usuario">
			<br><br>
		<label for="clave">Clave</label><br>
		<input type="password" name="clave">
			<br><br>
		<input type="submit" value="Iniciar">
	</form>
</body>
</html>