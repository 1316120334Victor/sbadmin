<?php 
	include('../Configuracion/conexion.php');
	include('../datos/seccion.php');
	$seccion = new Seccion($conn);

	$codigo=$seccion->read();

	if ($codigo>0) {
		echo $codigo;
	} else {
		echo $codigo;
	}
	



 ?>