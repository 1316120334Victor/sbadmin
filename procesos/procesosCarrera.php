<?php 

	// Motrar todos los errores de PHP
	//error_reporting(-1);

	require_once("../datos/config.php");
	require_once('../seguridad/cryptografia.php');   
	require_once("../seguridad/sesion.class.php"); 
	require_once('../datos/config.php');


	$opc = $_POST["opc"];


	/***********************************\
	* *
	* Inserta un nuevo registro en la tabla carrera *
	* opc=1 *
	* *
	\************************************/
	if ($opc==1) 
	{
		
		$Nombre=$_POST["Nombre"];
		$Direccion=$_POST["Direccion"];
		$Telefono=$_POST["Telefono"];
		$Correo=$_POST["Correo"];
		$Titulacion=$_POST["Titulacion"];
		$idtipo=$_POST["idtipo"];

		$codigo=$carrera->create($Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo);
		//$cod = encrypt_decrypt('encrypt',$codigo_);
		echo json_encode(array('codigo' => $codigo_));
	}

	/***********************************\
	* *
	* Modifica un registro en la tabla carrera *
	* opc=2 *
	* *
	\************************************/

	if ($opc==2)
	{
		$idtipo=$_POST["idtipo"];		
		$Nombre=$_POST["Nombre"];
		$Direccion=$_POST["Direccion"];
		$Telefono=$_POST["Telefono"];
		$Correo=$_POST["Correo"];
		$Titulacion=$_POST["Titulacion"];
		$idcarrera=$_POST["codigo"];
		

		if ($carrera->update($idcarrera,$Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo)) 
		{
			echo $carrera->read();
			
		};

		//$codigo=$carrera->update($idcarrera,$Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo);
	}

	/***********************************\
	* *
	* Elimina un registro en la tabla carrera *
	* opc= 3*
	* *
	\************************************/


	if ($opc==3)
	{
		$idcarrera=$_POST["codigo"];
		if ($carrera->delete($idcarrera)) 
		{
			echo 1;			
		}else
		{
			echo 0;
		};
		//$codigo=$carrera->delete($idcarrera);
	}
	/***********************************\
	* *
	* Selecciona todos los registros en la tabla carrera *
	* opc= 4*
	* *
	\************************************/

	if ($opc==4)
	{
		echo $carrera->read();
	}