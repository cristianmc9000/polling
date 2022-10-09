<?php 

$conexion = new mysqli('localhost','root','','polling'); //base localhost
$conexion->query("SET NAMES 'utf8'");

if($conexion->connect_error) { 
	die( 'Error: ('. $conexion->connect_errno .' )'. $conexion->connect_error); 
}
//agregando
?>
