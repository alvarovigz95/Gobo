<?php

	$conexion = mysqli_connect('localhost','root','','aida_gobo');

	if(!$conexion){
		echo "No se pudo conectar a la base de datos";
		exit;
	}

?>