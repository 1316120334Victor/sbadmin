<?php 
	include('../Configuracion/conexion.php');
	include('../datos/carrera.php');
	$carrera = new Carrera($conn);

	$Nombre=$_POST["Nombre"];
	$Direccion=$_POST["Direccion"];
	$Telefono=$_POST["Telefono"];
	$Correo=$_POST["Correo"];
	$Titulacion=$_POST["Titulacion"];
	$idtipo=$_POST["idtipo"];

	$codigo=$carrera->create($Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo);

	if ($codigo>0) {
		# code...
		//encrptar el codigo y pasarlo a la aplicacion
		echo $codigo;
	}else{
		echo $codigo;
	}

 ?>