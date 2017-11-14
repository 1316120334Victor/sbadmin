<?php
	require_once('seccion.php');
	require_once('tipopersona.php');
	require_once('carrera.php');
	require_once('persona.php');
	require_once("../Configuracion/conexion.php");

	$carrera = new Carrera($conn);
	$seccion = new Seccion($conn);
	$persona = new Persona($conn);
	$tipopersona = new Tipopersona($conn);
		
?>