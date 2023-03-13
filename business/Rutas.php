<?php
require_once ("persistence/RutasDAO.php");
require_once ("persistence/Connection.php");

class Rutas {
	private $idRutas;
	private $nombre;
	private $codigo;
	private $rutasDAO;
	private $connection;

	function getIdRutas() {
		return $this -> idRutas;
	}

	function setIdRutas($pIdRutas) {
		$this -> idRutas = $pIdRutas;
	}

	function getNombre() {
		return $this -> nombre;
	}

	function setNombre($pNombre) {
		$this -> nombre = $pNombre;
	}

	function getCodigo() {
		return $this -> codigo;
	}

	function setCodigo($pCodigo) {
		$this -> codigo = $pCodigo;
	}

	function __construct($pIdRutas = "", $pNombre = "", $pCodigo = ""){
		$this -> idRutas = $pIdRutas;
		$this -> nombre = $pNombre;
		$this -> codigo = $pCodigo;
		$this -> rutasDAO = new RutasDAO($this -> idRutas, $this -> nombre, $this -> codigo);
		$this -> connection = new Connection();
	}

	function insert(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> insert());
		$this -> connection -> close();
	}

	function update(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> update());
		$this -> connection -> close();
	}

	function select(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> select());
		$result = $this -> connection -> fetchRow();
		$this -> connection -> close();
		$this -> idRutas = $result[0];
		$this -> nombre = $result[1];
		$this -> codigo = $result[2];
	}

	function selectAll(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> selectAll());
		$rutass = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rutass, new Rutas($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $rutass;
	}

	function selectAllOrder($order, $dir){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> selectAllOrder($order, $dir));
		$rutass = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rutass, new Rutas($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $rutass;
	}

	function search($search){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> search($search));
		$rutass = array();
		while ($result = $this -> connection -> fetchRow()){
			array_push($rutass, new Rutas($result[0], $result[1], $result[2]));
		}
		$this -> connection -> close();
		return $rutass;
	}

	function delete(){
		$this -> connection -> open();
		$this -> connection -> run($this -> rutasDAO -> delete());
		$success = $this -> connection -> querySuccess();
		$this -> connection -> close();
		return $success;
	}
}
?>
