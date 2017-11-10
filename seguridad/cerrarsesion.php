<?php

	require_once("C:\\xampp\\htdocs\\documental\\config\\systemConfig.php");

	require_once($dirApp."seguridad".$comodin."sesion.class.php");
	
	$sesion = new sesion();
	$usuario = $sesion->get("usuario");	
	if( $usuario == false )
	{	
		header("Location: ../login.php");
	}
	else 
	{
		$usuario = $sesion->get("usuario");	
		$sesion->termina_sesion();	
		header("location: ../login.php");
	}
?>