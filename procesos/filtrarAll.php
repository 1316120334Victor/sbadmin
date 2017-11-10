<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);

	$Nombre=$_POST["buscar"];
	
	echo $carrera->filtrar($Nombre);


 ?>