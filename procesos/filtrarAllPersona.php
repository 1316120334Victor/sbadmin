<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carpersonarera.php');
    $persona = new Persona($conn);

	$nombre=$_POST["buscar"];
	
	echo $carrera->filtrar($Nombre);


 ?>