<?php 
	include('../Configuracion/conexion.php');
	include('../datos/persona.php');
    $persona = new Persona($conn);

	$idpersona=$_POST["codigo"];

	$codigo=$persona->delete($idpersona);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>