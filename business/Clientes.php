<?php
require_once ("persistence/ClientesDAO.php");
require_once ("persistence/Connection.php");

class Clientes {
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
	private $clientesDAO;
	private $connection;

	function getIdClientes() {
		return $this -> idClientes;
	}

	function setIdClientes($pIdClientes) {
		$this -> idClientes = $pIdClientes;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getApellido() {
		return $this -> apellido;
	}

	function setApellido($pApellido) {
		$this -> apellido = $pApellido;
	}

	function getCorreo() {
		return $this -> correo;
	}

	function setCorreo($pCorreo) {
		$this -> correo = $pCorreo;
	}

	function getClave() {
		return $this -> clave;
	}

	function setClave($pClave) {
		$this -> clave = $pClave;
	}

	function getFoto() {
		return $this -> foto;
	}

	function setFoto($pFoto) {
		$this -> foto = $pFoto;
	}

	function getDocumento() {
		return $this -> documento;
	}

	function setDocumento($pDocumento) {
		$this -> documento = $pDocumento;
	}

	function getTelefono() {
		return $this -> telefono;
	}

	function setTelefono($pTelefono) {
		$this -> telefono = $pTelefono;
	}

	function getLatitud() {
		return $this -> latitud;
	}

	function setLatitud($pLatitud) {
		$this -> latitud = $pLatitud;
	}

	function getLongitud() {
		return $this -> longitud;
	}

	function setLongitud($pLongitud) {
		$this -> longitud = $pLongitud;
	}

	function getDblp() {
		return $this -> dblp;
	}

	function setDblp($pDblp) {
		$this -> dblp = $pDblp;
	}

	function getLinkedIn() {
		return $this -> linkedIn;
	}

	function setLinkedIn($pLinkedIn) {
		$this -> linkedIn = $pLinkedIn;
	}

	function getTwitter() {
		return $this -> twitter;
	}

	function setTwitter($pTwitter) {
		$this -> twitter = $pTwitter;
	}

	function getState() {
		return $this -> state;
	}

	function setState($pState) {
		$this -> state = $pState;
	}

	function getRutas() {
		return $this -> rutas;
	}

	function setRutas($pRutas) {
		$this -> rutas = $pRutas;
	}

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
		$this -> clientesDAO = new ClientesDAO($this -> idClientes, $this -> nombre, $this -> apellido, $this -> correo, $this -> clave, $this -> foto, $this -> documento, $this -> telefono, $this -> latitud, $this -> longitud, $this -> dblp, $this -> linkedIn, $this -> twitter, $this -> state, $this -> rutas);
		$this -> connection = new Connection();
	}

	function logIn($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> logIn($email, $password));
		if($this -> connection -> numRows()==1){
			$result = $this -> connection -> fetchRow();
			$this -> idClientes = $result[0];
			$this -> nombre = $result[1];
			$this -> apellido = $result[2];
			$this -> correo = $result[3];
			$this -> clave = $result[4];
			$this -> foto = $result[5];
			$this -> documento = $result[6];
			$this -> telefono = $result[7];
			$this -> latitud = $result[8];
			$this -> longitud = $result[9];
			$this -> dblp = $result[10];
			$this -> linkedIn = $result[11];
			$this -> twitter = $result[12];
			$this -> state = $result[13];
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			$this -> rutas = $rutas;
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> update());
		$this -> connection -> close();
	}

	function updateClave($password){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> updateClave($password));
		$this -> connection -> close();
	}

	function existEmail($email){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> existEmail($email));
		if($this -> connection -> numRows()==1){
			$this -> connection -> close();
			return true;
		}else{
			$this -> connection -> close();
			return false;
		}
	}

	function recoverPassword($email, $password){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> recoverPassword($email, $password));
		$this -> connection -> close();
	}

	function updateImage($attribute, $value){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> updateImage($attribute, $value));
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idClientes = $result[0];
		$this -> nombre = $result[1];
		$this -> apellido = $result[2];
		$this -> correo = $result[3];
		$this -> clave = $result[4];
		$this -> foto = $result[5];
		$this -> documento = $result[6];
		$this -> telefono = $result[7];
		$this -> latitud = $result[8];
		$this -> longitud = $result[9];
		$this -> dblp = $result[10];
		$this -> linkedIn = $result[11];
		$this -> twitter = $result[12];
		$this -> state = $result[13];
		$rutas = new Rutas($result[14]);
		$rutas -> select();
		$this -> rutas = $rutas;
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> selectAll());
		$clientess = array();
		while ($result = $this -> connection -> fetchRow()){
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			array_push($clientess, new Clientes($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $rutas));
		}
		$this -> connection -> close();
		return $clientess;
	}

	function selectAllByRutas(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> selectAllByRutas());
		$clientess = array();
		while ($result = $this -> connection -> fetchRow()){
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			array_push($clientess, new Clientes($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $rutas));
		}
		$this -> connection -> close();
		return $clientess;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> selectAllOrder($order, $dir));
		$clientess = array();
		while ($result = $this -> connection -> fetchRow()){
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			array_push($clientess, new Clientes($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $rutas));
		}
		$this -> connection -> close();
		return $clientess;
	}

	function selectAllByRutasOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> selectAllByRutasOrder($order, $dir));
		$clientess = array();
		while ($result = $this -> connection -> fetchRow()){
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			array_push($clientess, new Clientes($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $rutas));
		}
		$this -> connection -> close();
		return $clientess;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> search($search));
		$clientess = array();
		while ($result = $this -> connection -> fetchRow()){
			$rutas = new Rutas($result[14]);
			$rutas -> select();
			array_push($clientess, new Clientes($result[0], $result[1], $result[2], $result[3], $result[4], $result[5], $result[6], $result[7], $result[8], $result[9], $result[10], $result[11], $result[12], $result[13], $rutas));
		}
		$this -> connection -> close();
		return $clientess;
	}

	function delete(){
		$this -> connection -> open();
		$this -> connection -> run($this -> clientesDAO -> delete());
		$success = $this -> connection -> querySuccess();
		$this -> connection -> close();
		return $success;
	}
}
?>
