<?php 

	include('Configuracion/conexion.php');
	include('datos/carrera.php');
	include('datos/persona.php');
	include('datos/tipopersona.php');
	$carrera = new Carrera($conn);
	$persona = new Persona($conn);
	$tipopersona = new Tipopersona($conn);


	//echo $carrera->update(2,'ESPMA','LIMON','df@.COM','ING','s',1);
	//echo $carrera->create('ab4','ad','df','df','s',1);
	//echo $carrera->delete(9);
	echo $carrera->filtrar("es");
	

	//echo $persona->read();
	//echo $persona->update(5,654,'LIMON','ab','ING','2016-09-19','1');
	//echo $persona->create(654,'LIMON','sd','ING','2016-09-19','1');
	//echo $persona->delete(5);
	//echo $persona->filtrar();


//echo $tipopersona->read();


//echo $persona->getId(2);

 ?>