<?php
require("business/Administrador.php");
require("business/Rutas.php");
require("business/Clientes.php");
require_once("persistence/Connection.php");
$idClientes = $_GET ['idClientes'];
$clientes = new Clientes($idClientes);
$clientes -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Clientes</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $clientes -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Apellido</th>
			<td><?php echo $clientes -> getApellido() ?></td>
		</tr>
		<tr>
			<th>Correo</th>
			<td><?php echo $clientes -> getCorreo() ?></td>
		</tr>
		<tr>
			<th>Foto</th>
				<td><img class="rounded" src="<?php echo $clientes -> getFoto() ?>" height="300px" /></td>
		</tr>
		<tr>
			<th>Documento</th>
			<td><?php echo $clientes -> getDocumento() ?></td>
		</tr>
		<tr>
			<th>Telefono</th>
			<?php if($clientes -> getTelefono() != ""){ ?>
				<td><?php echo $clientes -> getTelefono() ?></td>
			<?php }else{ ?>
				<td></td>
			<?php } ?>
		</tr>
		<tr>
			<th>Latitud</th>
			<?php if($clientes -> getLatitud() != ""){ ?>
				<td><?php echo $clientes -> getLatitud() ?></td>
			<?php }else{ ?>
				<td></td>
			<?php } ?>
		</tr>
		<tr>
			<th>Longitud</th>
			<?php if($clientes -> getLongitud() != ""){ ?>
				<td><?php echo $clientes -> getLongitud() ?></td>
			<?php }else{ ?>
				<td></td>
			<?php } ?>
		</tr>

		<tr>
			<th>State</th>
			<td><?php echo ($clientes -> getState()==1?"Habilitado":"Deshabilitado") ?> </td>
		</tr>
		<tr>
			<th>Rutas</th>
			<td><?php echo $clientes -> getRutas() -> getNombre() ?></td>
		</tr>
	</table>
</div>
