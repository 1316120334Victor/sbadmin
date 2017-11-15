<?php 
	include('../Configuracion/conexion.php');
	include('../datos/persona.php');
    $persona = new Persona($conn);

	$campo=$_POST["buscarP"];
	
	echo $persona->filtrar($campo);


 ?>