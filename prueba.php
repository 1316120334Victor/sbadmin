<?php 

	include('Configuracion/conexion.php');
	include('datos/carrera.php');
	$carrera = new Carrera($conn);
	//echo $carrera->update(2,'ESPMA','LIMON','df@.COM','ING','s',1);
	//echo $carrera->create('ab4','ad','df','df','s',1);
	//echo $carrera->delete(9);
	echo $carrera->filtrar("abcd");
	

	

 ?>