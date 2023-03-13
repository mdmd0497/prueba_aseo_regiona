<?php
$processed=false;
$nombre="";
if(isset($_POST['nombre'])){
	$nombre=$_POST['nombre'];
}
$apellido="";
if(isset($_POST['apellido'])){
	$apellido=$_POST['apellido'];
}
$correo="";
if(isset($_POST['correo'])){
	$correo=$_POST['correo'];
}
$clave="";
if(isset($_POST['clave'])){
	$clave=$_POST['clave'];
}
$documento="";
if(isset($_POST['documento'])){
	$documento=$_POST['documento'];
}
$telefono="";
if(isset($_POST['telefono'])){
	$telefono=$_POST['telefono'];
}
$latitud="";
if(isset($_POST['latitud'])){
	$latitud=$_POST['latitud'];
}
$longitud="";
if(isset($_POST['longitud'])){
	$longitud=$_POST['longitud'];
}
$dblp="";
if(isset($_POST['dblp'])){
	$dblp=$_POST['dblp'];
}
$linkedIn="";
if(isset($_POST['linkedIn'])){
	$linkedIn=$_POST['linkedIn'];
}
$twitter="";
if(isset($_POST['twitter'])){
	$twitter=$_POST['twitter'];
}
$state="";
if(isset($_POST['state'])){
	$state=$_POST['state'];
}
$rutas="";
if(isset($_POST['rutas'])){
	$rutas=$_POST['rutas'];
}
if(isset($_GET['idRutas'])){
	$rutas=$_GET['idRutas'];
}
if(isset($_POST['insert'])){
	$newClientes = new Clientes("", $nombre, $apellido, $correo, $clave, "", $documento, $telefono, $latitud, $longitud, $dblp, $linkedIn, $twitter, $state, $rutas);
	$newClientes -> insert();
	$objRutas = new Rutas($rutas);
	$objRutas -> select();
	$nameRutas = $objRutas -> getNombre() ;
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
	
	$processed=true;
}
?>
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Crear Clientes</h4>
				</div>
				<div class="card-body">
					<?php if($processed){ ?>
					<div class="alert alert-success" >Datos Ingresados
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php } ?>
					<form id="form" method="post" action="index.php?pid=<?php echo base64_encode("ui/clientes/insertClientes.php") ?>" class="bootstrap-form needs-validation"   >
						<div class="form-group">
							<label>Nombre*</label>
							<input type="text" class="form-control" name="nombre" value="<?php echo $nombre ?>" required />
						</div>
						<div class="form-group">
							<label>Apellido*</label>
							<input type="text" class="form-control" name="apellido" value="<?php echo $apellido ?>" required />
						</div>
						<div class="form-group">
							<label>Correo*</label>
							<input type="email" class="form-control" name="correo" value="<?php echo $correo ?>"  required />
						</div>
						<div class="form-group">
							<label>Clave*</label>
							<input type="password" class="form-control" name="clave" value="<?php echo $clave ?>" required />
						</div>
						<div class="form-group">
							<label>Documento</label>
							<input type="text" class="form-control" name="documento" value="<?php echo $documento ?>"/>
						</div>
						<div class="form-group">
							<label>Telefono</label>
							<input type="text" class="form-control" name="telefono" value="<?php echo $telefono ?>"/>
						</div>
						<div class="form-group">
							<label>Latitud</label>
							<input type="text" class="form-control" name="latitud" value="<?php echo $latitud ?>"/>
						</div>
						<div class="form-group">
							<label>Longitud</label>
							<input type="text" class="form-control" name="longitud" value="<?php echo $longitud ?>"/>
						</div>
						<div class="form-group">
							<label>State*</label>
						<div class="form-check">
							<input type="radio" class="form-check-input" name="state" value="1" checked />
							<label class="form-check-label">Habilitado</label>
						</div>
						<div class="form-check form-check-inline">
							<input type="radio" class="form-check-input" name="state" value="0" />
							<label class="form-check-label" >Deshabilitado</label>
						</div>
						</div>
					<div class="form-group">
						<label>Rutas*</label>
						<select class="form-control" name="rutas">
							<?php
							$objRutas = new Rutas();
							$rutass = $objRutas -> selectAllOrder("nombre", "asc");
							foreach($rutass as $currentRutas){
								echo "<option value='" . $currentRutas -> getIdRutas() . "'";
								if($currentRutas -> getIdRutas() == $rutas){
									echo " selected";
								}
								echo ">" . $currentRutas -> getNombre() . "</option>";
							}
							?>
						</select>
					</div>
						<button type="submit" class="btn btn-info" name="insert">Crear</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
