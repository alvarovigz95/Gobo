<<?php 
	session_start();
	if(!isset($_SESSION['usuario'])){
		header("location: ./");
		exit;
	}



	if(isset($_GET['elimina'])){

		//conecta a base de datos
		include "inc/conexion.php";

		//definir sentencia sql
		$sql = "DELETE FROM contacto WHERE contacto_id = ".$_GET['elimina'];

		//ejecutar sentencia
		$conexion->query($sql);

		//recargar pagina
		header("location: contacto.php");
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
		<p>Listado de Contactos.</p>


		<a href="contacto_add.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</a>
		<br><br>

		<?php
			include "inc/conexion.php";
			$listado = mysqli_query($conexion,"SELECT * FROM contacto");
			if(count(mysqli_query($conexion,"SELECT * FROM contacto")) > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th class='bg-primary'>ID</th>
					<th class='bg-primary'>Nombre</th>
					<th class='bg-primary'>Email</th>
					<th class='bg-primary'>Telefono</th><th class='bg-primary'>ID</th>
					<th class='bg-primary'>Ciudad</th>
					<th class='bg-primary'>Mensaje</th>
					<th class='bg-primary' style="width:15%;"> </th>
				</tr>	
			</thead>
			<tbody>
				<?php while($lista = mysqli_fetch_assoc($listado)){?>
					<tr>
						<td><?php echo $lista["contacto_id"]?></td>
						<td><?php echo $lista["contacto_nombre"]?></td>
						<td><?php echo $lista["contacto_email"]?></td>	
						<td><?php echo $lista["contacto_telefono"]?></td>
						<td><?php echo $lista["contacto_ciudad"]?></td>
						<td><?php echo $lista["contacto_mensaje"]?></td>
						<td><?php echo $lista["contacto_timestamp"]?></td>
						<td> 
							<a href="contacto_edit.php?id=<?php echo $lista['contacto_id'];?>"><i class="fa fa-pencil"></i></a>
							
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