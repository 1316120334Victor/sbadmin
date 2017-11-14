<?php 
	include('../Configuracion/conexion.php');
	include('../datos/persona.php');
    $persona = new Persona($conn);

	$identificacion=$_POST["identificacion"];
	$nombre=$_POST["nombre"];
	$apellido=$_POST["apellido"];
	$usuario=$_POST["usuario"];
	$fechanacimiento=$_POST["fechanacimiento"];
	$idtipo=$_POST["idtipo"];

	$codigo=$persona->create($identificacion,$nombre,$apellido,$usuario,$fechanacimiento,$idtipo);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>