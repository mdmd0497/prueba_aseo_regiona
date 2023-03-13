<?php 
require("business/Administrador.php");
require("business/Rutas.php");
require("business/Clientes.php");
$pid=base64_decode($_GET['pid']);
include($pid);
?>
