<div class="col-md-3 bg-info">
	<h5>Bienvenido, <?php echo $_SESSION['usuario'];?></h5>
	<a href="ajax/cerrar.php" class="btn btn-danger">Cerrar sesión</a>

	<hr>
	<h6>Sessiones administrables</h6>
	<hr>
	<ul class="list-group">
		<li class="list-group-item active"><a href="./">Inicio</a></li>
		<li class="list-group-item"><a href="administrador.php">Administradores</a></li>
		<li class="list-group-item"><a href="banner.php">Banner</a></li>
		<li class="list-group-item"><a href="noticia.php">Noticias</a></li>
		<li class="list-group-item"><a href="">Servicios</a></li>
		<li class="list-group-item"><a href="">Contactos</a></li>
	</ul>
</div>