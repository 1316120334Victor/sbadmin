<?php 
	include('../Configuracion/conexion.php');
	include('../datos/tipopersona.php');
	$tipopersona = new Tipopersona($conn);

	$codigo=$tipopersona->read();

	if ($codigo>0) {
		echo $codigo;
	} else {
		echo $codigo;
	}
	



 ?>