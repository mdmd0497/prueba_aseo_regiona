<?php
$clientes = new Clientes($_SESSION['id']);
$clientes -> select();
?>
<div class="container">
	<div>
		<div class="card-header">
			<h3>Perfil</h3>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-3">
					<img src="<?php echo ($clientes -> getFoto()!="")?$clientes -> getFoto():"http://icons.iconarchive.com/icons/custom-icon-design/silky-line-user/512/user2-2-icon.png"; ?>" width="100%" class="rounded">
				</div>
				<div class="col-md-9">
					<div class="table-responsive-sm">
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
								<th>Documento</th>
								<td><?php echo $clientes -> getDocumento() ?></td>
							</tr>
							<tr>
								<th>Telefono</th>
								<?php if($clientes -> getTelefono() != ""){ ?>
									<td><a href="<?php echo $clientes -> getTelefono() ?>" target="_blank"><span class='fas fa-external-link-alt' data-placement='left' data-toggle='tooltip' class='tooltipLink' data-original-title='<?php echo $clientes -> getTelefono() ?>' ></span></a></td>
								<?php }else{ ?>
									<td></td>
								<?php } ?>
							</tr>
							<tr>
								<th>Latitud</th>
								<?php if($clientes -> getLatitud() != ""){ ?>
									<td><a href="<?php echo $clientes -> getLatitud() ?>" target="_blank"><span class='fas fa-external-link-alt' data-placement='left' data-toggle='tooltip' class='tooltipLink' data-original-title='<?php echo $clientes -> getLatitud() ?>' ></span></a></td>
								<?php }else{ ?>
									<td></td>
								<?php } ?>
							</tr>
							<tr>
								<th>Longitud</th>
								<?php if($clientes -> getLongitud() != ""){ ?>
									<td><a href="<?php echo $clientes -> getLongitud() ?>" target="_blank"><span class='fas fa-external-link-alt' data-placement='left' data-toggle='tooltip' class='tooltipLink' data-original-title='<?php echo $clientes -> getLongitud() ?>' ></span></a></td>
								<?php }else{ ?>
									<td></td>
								<?php } ?>
							</tr>
							<tr>
								<th>State</th>
								<td><?php echo ($clientes -> getState()==1)?"Habilitado":"Deshabilitado"; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="card-footer">
		<p><?php echo "Su rol es: Clientes"; ?></p>
		</div>
	</div>
</div>
