<?php 
	include('../Configuracion/conexion.php');
	include('../datos/seccion.php');
	$seccion = new Seccion($conn);

	$idseccion=$_POST["idseccion"];

	$codigo=$seccion->delete($idseccion);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

	


 ?>