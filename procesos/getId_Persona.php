<?php 
	include('../Configuracion/conexion.php');
	include('../datos/persona.php');
	$persona = new persona($conn);

	$idpersona=$_POST["codigo"];
	
	echo $persona->getId($idpersona);


 ?>