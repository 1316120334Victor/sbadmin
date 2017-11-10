<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);

	$idcarrera=$_POST["codigo"];
	
	echo $carrera->getId($idcarrera);


 ?>