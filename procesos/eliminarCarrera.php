<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);

	$idcarrera=$_POST["codigo"];

	$codigo=$carrera->delete($idcarrera);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>