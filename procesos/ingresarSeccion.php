<?php 
	include('../Configuracion/conexion.php');
	include('../datos/seccion.php');
	$seccion = new Seccion($conn);

	$Descripcion=$_POST["Descripcion"];

	$codigo=$seccion->create($Descripcion);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}




 ?>