<?php
$clientes = new Clientes($_SESSION['id']);
$clientes -> select();
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark" >
	<a class="navbar-brand" href="index.php?pid=<?php echo base64_encode("ui/sessionClientes.php") ?>"><span class="fas fa-home" aria-hidden="true"></span></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"> <span class="navbar-toggler-icon"></span></button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		</ul>
		<ul class="navbar-nav">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#"  data-toggle="dropdown">Clientes: <?php echo $clientes -> getNombre() . " " . $clientes -> getApellido() ?><span class="caret"></span></a>
				<div class="dropdown-menu" >
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clientes/updateProfileClientes.php") ?>">Editar Perfil</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clientes/updatePasswordClientes.php") ?>">Editar Clave</a>
					<a class="dropdown-item" href="index.php?pid=<?php echo base64_encode("ui/clientes/updateProfilePictureClientes.php") ?>">Editar Foto</a>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="index.php?logOut=1">Salir</a>
			</li>
		</ul>
	</div>
</nav>
