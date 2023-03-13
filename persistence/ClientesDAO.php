<?php
class ClientesDAO{
	private $idClientes;
	private $nombre;
	private $apellido;
	private $correo;
	private $clave;
	private $foto;
	private $documento;
	private $telefono;
	private $latitud;
	private $longitud;
	private $dblp;
	private $linkedIn;
	private $twitter;
	private $state;
	private $rutas;

	function __construct($pIdClientes = "", $pNombre = "", $pApellido = "", $pCorreo = "", $pClave = "", $pFoto = "", $pDocumento = "", $pTelefono = "", $pLatitud = "", $pLongitud = "", $pDblp = "", $pLinkedIn = "", $pTwitter = "", $pState = "", $pRutas = ""){
		$this -> idClientes = $pIdClientes;
		$this -> nombre = $pNombre;
		$this -> apellido = $pApellido;
		$this -> correo = $pCorreo;
		$this -> clave = $pClave;
		$this -> foto = $pFoto;
		$this -> documento = $pDocumento;
		$this -> telefono = $pTelefono;
		$this -> latitud = $pLatitud;
		$this -> longitud = $pLongitud;
		$this -> dblp = $pDblp;
		$this -> linkedIn = $pLinkedIn;
		$this -> twitter = $pTwitter;
		$this -> state = $pState;
		$this -> rutas = $pRutas;
	}

	function logIn($correo, $clave){
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where correo = '" . $correo . "' and clave = '" . md5($clave) . "'";
	}

	function insert(){
		return "insert into Clientes(nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas)
				values('" . $this -> nombre . "', '" . $this -> apellido . "', '" . $this -> correo . "', md5('" . $this -> clave . "'), '" . $this -> foto . "', '" . $this -> documento . "', '" . $this -> telefono . "', '" . $this -> latitud . "', '" . $this -> longitud . "', '" . $this -> dblp . "', '" . $this -> linkedIn . "', '" . $this -> twitter . "', '" . $this -> state . "', '" . $this -> rutas . "')";
	}

	function update(){
		return "update Clientes set 
				nombre = '" . $this -> nombre . "',
				apellido = '" . $this -> apellido . "',
				correo = '" . $this -> correo . "',
				documento = '" . $this -> documento . "',
				telefono = '" . $this -> telefono . "',
				latitud = '" . $this -> latitud . "',
				longitud = '" . $this -> longitud . "',
				dblp = '" . $this -> dblp . "',
				linkedIn = '" . $this -> linkedIn . "',
				twitter = '" . $this -> twitter . "',
				state = '" . $this -> state . "',
				rutas_idRutas = '" . $this -> rutas . "'	
				where idClientes = '" . $this -> idClientes . "'";
	}

	function updateClave($password){
		return "update Clientes set 
				clave = '" . md5($password) . "'
				where idClientes = '" . $this -> idClientes . "'";
	}

	function existEmail($email){
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where email = '" . $email . "'";
	}

	function recoverPassword($email, $password){
		return "update Clientes set 
				clave = '" . md5($password) . "'
				where correo = '" . $email . "'";
	}

	function updateImage($attribute, $value){
		return "update Clientes set "
				. $attribute . " = '" . $value . "'
				where idClientes = '" . $this -> idClientes . "'";
	}

	function select() {
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where idClientes = '" . $this -> idClientes . "'";
	}

	function selectAll() {
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes";
	}

	function selectAllByRutas() {
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where rutas_idRutas = '" . $this -> rutas . "'";
	}

	function selectAllOrder($orden, $dir){
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				order by " . $orden . " " . $dir;
	}

	function selectAllByRutasOrder($orden, $dir) {
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where rutas_idRutas = '" . $this -> rutas . "'
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idClientes, nombre, apellido, correo, clave, foto, documento, telefono, latitud, longitud, dblp, linkedIn, twitter, state, rutas_idRutas
				from Clientes
				where nombre like '%" . $search . "%' or apellido like '%" . $search . "%' or correo like '%" . $search . "%' or state like '%" . $search . "%'";
	}

	function delete(){
		return "delete from Clientes
				where idClientes = '" . $this -> idClientes . "'";
	}
}
?>
