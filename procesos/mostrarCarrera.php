<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);
	$codigo=$carrera->read();

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>