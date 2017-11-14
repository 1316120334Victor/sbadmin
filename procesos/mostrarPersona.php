<?php 
	include('../Configuracion/conexion.php');
	include('../datos/persona.php');
    $persona = new Persona($conn);
	$codigo=$persona->read();

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>