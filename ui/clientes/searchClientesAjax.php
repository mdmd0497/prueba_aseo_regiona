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
			<th nowrap>Apellido</th>
			<th nowrap>Correo</th>
			<th nowrap>State</th>
			<th>Rutas</th>
			<th nowrap></th>
		</tr>
	</thead>
	</tbody>
		<?php
		$clientes = new Clientes();
		$clientess = $clientes -> search($_GET['search']);
		$counter = 1;
		foreach ($clientess as $currentClientes) {
			echo "<tr><td>" . $counter . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentClientes -> getNombre()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentClientes -> getApellido()) . "</td>";
			echo "<td>" . str_ireplace($_GET['search'], "<mark>" . $_GET['search'] . "</mark>", $currentClientes -> getCorreo()) . "</td>";
						echo "<td>" . ($currentClientes -> getState()==1?"Habilitado":"Deshabilitado") . "</td>";
			echo "<td>" . $currentClientes -> getRutas() -> getNombre() . "</td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalClientes.php?idClientes=" . $currentClientes -> getIdClientes() . "'  data-toggle='modal' data-target='#modalClientes' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Ver mas información' ></span></a> ";
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/updateClientes.php") . "&idClientes=" . $currentClientes -> getIdClientes() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Clientes' ></span></a> ";
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/updateFotoClientes.php") . "&idClientes=" . $currentClientes -> getIdClientes() . "&attribute=foto'><span class='fas fa-camera' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar foto'></span></a> ";
						}
						if($_GET['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/selectAllClientes.php") . "&idClientes=" . $currentClientes -> getIdClientes() . "&action=delete' onclick='return confirm(\"Confirm to delete Clientes: " . $currentClientes -> getNombre() . " " . $currentClientes -> getApellido() . "\")'><span class='fas fa-backspace' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Delete Clientes' ></span></a> ";
						}
						echo "</td>";
			echo "</tr>";
			$counter++;
		}
		?>
	</tbody>
</table>
</div>
<div class="modal fade" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" >
		<div class="modal-content" id="modalContent">
		</div>
	</div>
</div>
<script>
	$('body').on('show.bs.modal', '.modal', function (e) {
		var link = $(e.relatedTarget);
		$(this).find(".modal-content").load(link.attr("href"));
	});
</script>
