<?php
$order = "apellido";
if(isset($_GET['order'])){
	$order = $_GET['order'];
}
$dir = "asc";
if(isset($_GET['dir'])){
	$dir = $_GET['dir'];
}
$rutas = new Rutas($_GET['idRutas']); 
$rutas -> select();
$error = 0;
if(!empty($_GET['action']) && $_GET['action']=="delete"){
	$deleteClientes = new Clientes($_GET['idClientes']);
	$deleteClientes -> select();
	if($deleteClientes -> delete()){
		$nameRutas = $deleteClientes -> getRutas() -> getNombre();
		$user_ip = getenv('REMOTE_ADDR');
		$agent = $_SERVER["HTTP_USER_AGENT"];
		$browser = "-";
		if( preg_match('/MSIE (\d+\.\d+);/', $agent) ) {
			$browser = "Internet Explorer";
		} else if (preg_match('/Chrome[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Chrome";
		} else if (preg_match('/Edge\/\d+/', $agent) ) {
			$browser = "Edge";
		} else if ( preg_match('/Firefox[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Firefox";
		} else if ( preg_match('/OPR[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Opera";
		} else if (preg_match('/Safari[\/\s](\d+\.\d+)/', $agent) ) {
			$browser = "Safari";
		}
		
	}else{
		$error = 1;
	}
}
?>
<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Consultar Clientes de Rutas: <em><?php echo $rutas -> getNombre() ?></em></h4>
		</div>
		<div class="card-body">
		<?php if(isset($_GET['action']) && $_GET['action']=="delete"){ ?>
			<?php if($error == 0){ ?>
				<div class="alert alert-success" >The registry was succesfully deleted.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php } else { ?>
				<div class="alert alert-danger" >The registry was not deleted. Check it does not have related information
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<?php }
			} ?>
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<thead>
					<tr><th></th>
						<th nowrap>Nombre 
						<?php if($order=="nombre" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=nombre&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="nombre" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=nombre&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Apellido 
						<?php if($order=="apellido" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=apellido&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="apellido" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=apellido&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>Correo 
						<?php if($order=="correo" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=correo&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="correo" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=correo&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th nowrap>State 
						<?php if($order=="state" && $dir=="asc") { ?>
							<span class='fas fa-sort-up'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Ascendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=state&dir=asc'>
							<span class='fas fa-sort-amount-up'></span></a>
						<?php } ?>
						<?php if($order=="state" && $dir=="desc") { ?>
							<span class='fas fa-sort-down'></span>
						<?php } else { ?>
							<a data-toggle='tooltip' class='tooltipLink' data-original-title='Ordenar Descendente' href='index.php?pid=<?php echo base64_encode("ui/clientes/selectAllClientesByRutas.php") ?>&idRutas=<?php echo $_GET['idRutas'] ?>&order=state&dir=desc'>
							<span class='fas fa-sort-amount-down'></span></a>
						<?php } ?>
						</th>
						<th>Rutas</th>
						<th nowrap></th>
					</tr>
				</thead>
				</tbody>
					<?php
					$clientes = new Clientes("", "", "", "", "", "", "", "", "", "", "", "", "", "", $_GET['idRutas']);
					if($order!="" && $dir!="") {
						$clientess = $clientes -> selectAllByRutasOrder($order, $dir);
					} else {
						$clientess = $clientes -> selectAllByRutas();
					}
					$counter = 1;
					foreach ($clientess as $currentClientes) {
						echo "<tr><td>" . $counter . "</td>";
						echo "<td>" . $currentClientes -> getNombre() . "</td>";
						echo "<td>" . $currentClientes -> getApellido() . "</td>";
						echo "<td>" . $currentClientes -> getCorreo() . "</td>";
						echo "<td>" . ($currentClientes -> getState()==1?"Habilitado":"Deshabilitado") . "</td>";
						echo "<td><a href='modalRutas.php?idRutas=" . $currentClientes -> getRutas() -> getIdRutas() . "' data-toggle='modal' data-target='#modalClientes' >" . $currentClientes -> getRutas() -> getNombre() . "</a></td>";
						echo "<td class='text-right' nowrap>";
						echo "<a href='modalClientes.php?idClientes=" . $currentClientes -> getIdClientes() . "'  data-toggle='modal' data-target='#modalClientes' ><span class='fas fa-eye' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Ver mas información' ></span></a> ";
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/updateClientes.php") . "&idClientes=" . $currentClientes -> getIdClientes() . "'><span class='fas fa-edit' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar Clientes' ></span></a> ";
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/updateFotoClientes.php") . "&idClientes=" . $currentClientes -> getIdClientes() . "&attribute=foto'><span class='fas fa-camera' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Editar foto'></span></a> ";
						}
						if($_SESSION['entity'] == 'Administrador') {
							echo "<a href='index.php?pid=" . base64_encode("ui/clientes/selectAllClientesByRutas.php") . "&idRutas=" . $_GET['idRutas'] . "&idClientes=" . $currentClientes -> getIdClientes() . "&action=delete' onclick='return confirm(\"Confirm to delete Clientes: " . $currentClientes -> getNombre() . " " . $currentClientes -> getApellido() . "\")'> <span class='fas fa-backspace' data-toggle='tooltip' data-placement='left' class='tooltipLink' data-original-title='Delete Clientes' ></span></a> ";
						}
						echo "</td>";
						echo "</tr>";
						$counter++;
					};
					?>
				</tbody>
			</table>
			</div>
		</div>
	</div>
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
