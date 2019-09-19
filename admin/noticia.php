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
		$sql = "DELETE FROM noticias WHERE noticia_id = ".$_GET['elimina'];

		//ejecutar sentencia
		$conexion->query($sql);

		//recargar pagina
		header("location: noticia.php");
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
		<p>Listado de Noticias.</p>


		<a href="noticia_add.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Nuevo</a>
		<br><br>

		<?php
			include "inc/conexion.php";
			$listado = mysqli_query($conexion,"SELECT * FROM noticias");
			if(count(mysqli_query($conexion,"SELECT * FROM noticias")) > 0){
		?>
		<table class="table">
			<thead>
				<tr>
					<th class='bg-primary'>ID</th>
					<th class='bg-primary'>Titulo</th>
					<th class='bg-primary'>Imagen</th>
					<th class='bg-primary'>Creado</th>
					<th class='bg-primary' style="width:15%;"> </th>
				</tr>	
			</thead>
			<tbody>
				<?php while($lista = mysqli_fetch_assoc($listado)){?>
					<tr>
						<td><?php echo $lista["noticia_id"]?></td>
						<td><?php echo $lista["noticia_titulo"]?></td>
						<td><?php echo $lista["noticia_imagen"]?></td>
						<td><?php echo $lista["noticia_timestamp"]?></td>
						<td> 
							<a href="noticia_edit.php?id=<?php echo $lista['noticia_id'];?>"><i class="fa fa-pencil"></i></a>
							<a href="" onclick="elimina(<?php echo $lista['noticia_id']?>);return!1;"><i class="fa fa-close"></i></a>
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