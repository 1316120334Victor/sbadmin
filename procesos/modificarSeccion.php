<?php 
	include('../Configuracion/conexion.php');
	include('../datos/seccion.php');
	$seccion = new Seccion($conn);

	$idseccion=$_POST["idseccion"];
	$Descripcion=$_POST["Descripcion"];

	$codigo=$seccion->update($idseccion,$Descripcion);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}



 ?>