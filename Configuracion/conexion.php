<?php 
/*
Permite definir los parametros de conexion con la base de datos
*/
  	$dsn='mysql:dbname=practicaweb;host=localhost;charset=utf8';
  	$dbuser='root';
  	$dbuserpw='';
  	try {

  			$conn=new PDO($dsn,$dbuser,$dbuserpw);
  			$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  		//echo "Conexion Exitosa";
  			
  		} catch (Exception $e) {
  			echo "	ERROR! se ha producido el siguiente error ". $e->getMessage();
  		}	
?>