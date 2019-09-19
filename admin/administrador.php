<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}



	if(isset($_GET['elimina'])){

		//conecta a base de datos
		include "inc/conexion.php";

		//definir sentencia sql
		$sql = "DELETE FROM admin WHERE admin_id = ".$_GET['elimina'];

		//ejecutar sentencia
		$conexion->query($sql);

		//recargar pagina
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
		<p>Listado de Administradores.</p>


		<a href="administrador_add.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</a>
		<br><br>

		<?php
			include "inc/conexion.php";
			$listado = mysqli_query($conexion,"SELECT * FROM admin");
			if(count(mysqli_query($conexion,"SELECT * FROM admin")) > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th class='bg-primary'>ID</th>
					<th class='bg-primary'>Nombre</th>
					<th class='bg-primary'>Usuario</th>
					<th class='bg-primary'>Creado</th>
					<th class='bg-primary' style="width:15%;"> </th>
				</tr>	
			</thead>
			<tbody>
				<?php while($lista = mysqli_fetch_assoc($listado)){?>
					<tr>
						<td><?php echo $lista["admin_id"]?></td>
						<td><?php echo $lista["admin_nombre"]?></td>
						<td><?php echo $lista["admin_usuario"]?></td>
						<td><?php echo $lista["admin_timestamp"]?></td>
						<td> 
							<a href="administrador_edit.php?id=<?php echo $lista['admin_id'];?>"><i class="fa fa-pencil"></i></a>
							<a href="" onclick="elimina(<?php echo $lista['admin_id']?>);return!1;"><i class="fa fa-close"></i></a>
						</td>
					</tr>	
				<?php } ?>
			</tbody>
		</table>
		<?php }else{ ?>
			<p class="alert alert-info">No se encontraron resultados.</p>
		<?php } ?>
	</div>


	<script type="text/javascript">
		function elimina(id){
			if(confirm("Esta seguro que desea eliminar?")){
				location.href = "?elimina="+id;
			}
		}
	</script>

</body>
</html>