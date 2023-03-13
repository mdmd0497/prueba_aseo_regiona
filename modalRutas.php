<?php
require("business/Administrador.php");
require("business/Rutas.php");
require("business/Clientes.php");
require_once("persistence/Connection.php");
$idRutas = $_GET ['idRutas'];
$rutas = new Rutas($idRutas);
$rutas -> select();
?>
<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	}); 
</script>
<div class="modal-header">
	<h4 class="modal-title">Rutas</h4>
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
</div>
<div class="modal-body">
	<table class="table table-striped table-hover">
		<tr>
			<th>Nombre</th>
			<td><?php echo $rutas -> getNombre() ?></td>
		</tr>
		<tr>
			<th>Codigo</th>
			<td><?php echo $rutas -> getCodigo() ?></td>
		</tr>
	</table>
</div>
