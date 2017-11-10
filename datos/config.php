<?php
	require_once('seccion.php');
	require_once('carrera.php');
	require_once("../Configuracion/conexion.php");

	$carrera = new Carrera($conn);
	$seccion = new Seccion($conn);
		
?>