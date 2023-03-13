<?php
class RutasDAO{
	private $idRutas;
	private $nombre;
	private $codigo;

	function __construct($pIdRutas = "", $pNombre = "", $pCodigo = ""){
		$this -> idRutas = $pIdRutas;
		$this -> nombre = $pNombre;
		$this -> codigo = $pCodigo;
	}

	function insert(){
		return "insert into Rutas(nombre, codigo)
				values('" . $this -> nombre . "', '" . $this -> codigo . "')";
	}

	function update(){
		return "update Rutas set 
				nombre = '" . $this -> nombre . "',
				codigo = '" . $this -> codigo . "'	
				where idRutas = '" . $this -> idRutas . "'";
	}

	function select() {
		return "select idRutas, nombre, codigo
				from Rutas
				where idRutas = '" . $this -> idRutas . "'";
	}

	function selectAll() {
		return "select idRutas, nombre, codigo
				from Rutas";
	}

	function selectAllOrder($orden, $dir){
		return "select idRutas, nombre, codigo
				from Rutas
				order by " . $orden . " " . $dir;
	}

	function search($search) {
		return "select idRutas, nombre, codigo
				from Rutas
				where nombre like '%" . $search . "%' or codigo like '%" . $search . "%'";
	}

	function delete(){
		return "delete from Rutas
				where idRutas = '" . $this -> idRutas . "'";
	}
}
?>
