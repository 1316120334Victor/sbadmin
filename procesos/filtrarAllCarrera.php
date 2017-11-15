<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);

	$campo=$_POST["buscarC"];
	
	echo $carrera->filtrar($campo);


 ?>