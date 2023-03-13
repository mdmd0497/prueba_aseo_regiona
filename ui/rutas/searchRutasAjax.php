<script charset="utf-8">
	$(function () { 
		$("[data-toggle='tooltip']").tooltip(); 
	});
</script>
<div class="table-responsive">
<table class="table table-striped table-hover">
	<thead>
		<tr><th></th>
			<th nowrap>Nombre</th>
			<th nowrap>Codigo</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$rutas = new Rutas();
		$rutass = $rutas -> search($_GET['search']);
		$counter = 1;
		foreach ($rutass as $currentRutas) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentRutas -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentRutas -> getCodigo()) . "</td>";
						echo "<td class='text-right' nowrap>";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/rutas/updateRutas.php") . "&idRutas=" . $currentRutas -> getIdRutas() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Rutas' ></span></a> ";
						}
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/rutas/selectAllRutas.php") . "&idRutas=" . $currentRutas -> getIdRutas() . "&action=delete' onclick='return confirm(\"Confirm to delete Rutas: " . $currentRutas -> getNombre() . "\")'><span class='fas fa-backspace' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Delete Rutas' ></span></a> ";
						}
						echo "<a href='index.php?pid=" . base64_encode("ui/clientes/selectAllClientesByRutas.php") . "&idRutas=" . $currentRutas -> getIdRutas() . "'><span class='fas fa-search-plus' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Consultar Clientes' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/insertClientes.php") . "&idRutas=" . $currentRutas -> getIdRutas() . "'><span class='fas fa-pen' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Crear Clientes' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
