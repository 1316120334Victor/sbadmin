<?php 


	/***********************************\
	* *
	* Clase que permite realizar las operaciones CRUD de la tabla persona *
	* Create, Read, Update, Delete*
	* *
	\************************************/

	Class Carrera{

		private $db;

		function __construct($Par_db){
			$this->db = $Par_db;
		}
		/***********************************\
		* *
		* Funcion que inserta un registro en la tabla carrera y retorna el identificador del registro insertado*
		* Parameter: $nombre VARCHAR*
		* 			 $direccion VARCHAR*
		* 			 $telefono VARCHAR*
		* 			 $correo VARCHAR*
		* 			 $titulacion DATE*
		* 			 $idtipo INTEGER Clave forenea de tabla seccion*
		* *
		\************************************/
		function create($Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo)
		{
			$sql="INSERT INTO `carrera`( 
						 `Nombre`,
						 `Direccion`,
						 `Telefono`, 
						 `Correo`,
						 `Titulacion`,
						 `idtipo`)
				 VALUES (:Nombre,
						 :Direccion,
						 :Telefono,
						 :Correo,
						 :Titulacion,
						 :idtipo)";
			try 
			{
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':Nombre',$Nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':Direccion',$Direccion, PDO::PARAM_STR);
				$sentencia->bindParam(':Telefono',$Telefono, PDO::PARAM_STR);
				$sentencia->bindParam(':Correo',$Correo, PDO::PARAM_STR);
				$sentencia->bindParam(':Titulacion',$Titulacion, PDO::PARAM_STR);
				$sentencia->bindParam(':idtipo',$idtipo, PDO::PARAM_STR);

				//PDOStatement::execute - Ejecuta una sentencia preparada
				//Devuelve True en caso de exito o False en caso de error

				if ($sentencia->execute()) {
					# code...
					return $this->db->lastInsertId();
				}
				else{
					return 0;
				}
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		 /***********************************\
	    * *
		* Funcion que retorna un JSON con todos los registros de la tabla carrera y la tabla seccion*
		* *
		* *
		\************************************/
		function readAll()
		{


			$sql="SELECT idcarrera,Nombre,`Direccion`, `Telefono`, `Correo`, `Titulacion`,seccion.IdSeccion,seccion.Descripcion FROM `carrera` 
						INNER JOIN seccion ON carrera.idtipo=seccion.IdSeccion
						";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objCarrera=array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)){

					$carrera=array();
					$carrera['idcarrera']=$fila[0];
					$carrera['Nombre']=$fila[1];
					$carrera['Direccion']=$fila[2];
					$carrera['Telefono']=$fila[3];
					$carrera['Correo']=$fila[4];
					$carrera['Titulacion']=$fila[5];
					$carrera['seccion.IdSeccion']=$fila[6];
					$carrera['seccion.Descripcion']=$fila[7];
					$objCarrera[]=$carrera;
				}
				// $sentencia=null;  NO TIENE CONSTANCIA
				 return json_encode($objCarrera);
			} catch (PDOException $e) {
					echo $e->getMessage();		
			}
		}
    	/***********************************\
	    * *
		* Funcion que retorna un JSON con todos los registros de la tabla carrera *
		* *
		* *
		\************************************/
		function read()
		{


			$consulta="	SELECT `idcarrera`, `Nombre`, `Direccion`, `Telefono`, `Correo`, `Titulacion`, `idtipo` FROM `carrera` ";

			try 
			{
				$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objCarrera=array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){

					$carrera=array();
					$carrera['idcarrera']=$fila[0];
					$carrera['Nombre']=$fila[1];
					$carrera['Direccion']=$fila[2];
					$carrera['Telefono']=$fila[3];
					$carrera['Correo']=$fila[4];
					$carrera['Titulacion']=$fila[5];
					$carrera['idtipo']=$fila[6];
					$objCarrera[]=$carrera;
				}
				 $sentencia=null;  //NO TIENE CONSTANCIA
				 return json_encode($objCarrera);
			} catch (PDOException $e) {
					echo $e->getMessage();		
			}
		}
		/***********************************\
		* *
		* Funcion que actualiza un registro en la tabla carrear y retorna el 1 o 0 en caso de exito o fallo de la transaccion respectivamente*
		* Parameter: $idcarrear INTEGER Clave primaria de tabla carrera*
		* 			 $nombre VARCHAR*
		* 			 $direccion VARCHAR*
		* 			 $telefono VARCHAR*
		* 			 $correo VARCHAR*
		* 			 $titulacion DATE*
		* 			 $idtipo INTEGER Clave forenea de tabla seccion*
		* *
		\************************************/

		function update($idcarrera,$Nombre,$Direccion,$Telefono,$Correo,$Titulacion,$idtipo)
		{
			
			$sql= "UPDATE `carrera` 
					SET `Nombre`=:Nombre,
						`Direccion`=:Direccion,
						`Telefono`=:Telefono,
						`Correo`=:Correo,
						`Titulacion`=:Titulacion,
						`idtipo`=:idtipo 
					where idcarrera=:idcarrera ";

			try {
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':idcarrera',$idcarrera, PDO::PARAM_STR);
				$sentencia->bindParam(':Nombre',$Nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':Direccion',$Direccion, PDO::PARAM_STR);
				$sentencia->bindParam(':Telefono',$Telefono, PDO::PARAM_STR);
				$sentencia->bindParam(':Correo',$Correo, PDO::PARAM_STR);
				$sentencia->bindParam(':Titulacion',$Titulacion, PDO::PARAM_STR);
				$sentencia->bindParam(':idtipo',$idtipo, PDO::PARAM_STR);

				//PDOStatement::execute - Ejecuta una sentencia preparada
				//Devuelve 1 en caso de exito o 0 en caso de error

				if ($sentencia->execute()) {
					# code...
					return 1;
				}
				else{
					//echo "$idcarrera";
					return 0;
				}
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}

		/***********************************\
		* *
		* Funcion que elimina un registro identificado por el parametro $idcarrera, corresponde a la clave primaria de la tabla  carrera *
		* Parameter: $idcarrera INTEGER*
		* *
		\************************************/

		function delete($idcarrera)
		{
			$sql="DELETE FROM `carrera` where idcarrera=:idcarrera";

			try {
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':idcarrera',$idcarrera, PDO::PARAM_STR);
				if ($sentencia->execute()) {
					# code...
					return 1;
				}
				else{
					//echo "$idcarrera";
					return 0;
				}

				
			} catch (Exception $e)
			{
				echo $e->getMessage();
				
			}
		}

	/***********************************\
	* *
	* Funcion que obtiene un registro identificado por el parametro $id, corresponde a la clave primaria de la tabla carrera *
	* Parameter: $id INTEGER*
	* *
	\************************************/

		function getId($id)
		{
			$sql=" SELECT carrera.idcarrera, carrera.Nombre, carrera.Direccion, carrera.Telefono, carrera.Correo, carrera.Titulacion, 
			carrera.idtipo,seccion.idSeccion,seccion.Descripcion FROM carrera 
						INNER JOIN seccion ON carrera.idtipo=seccion.idSeccion  
						where carrera.idcarrera=$id";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objCarrera= array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					$carrera=array();
					$carrera['idcarrera']=$fila[0];
					$carrera['Nombre']=$fila[1];
					$carrera['Direccion']=$fila[2];
					$carrera['Telefono']=$fila[3];
					$carrera['Correo']=$fila[4];
					$carrera['Titulacion']=$fila[5];
					$carrera['idtipo']=$fila[6];
					$objCarrera[]=$carrera;
				}

				$sentencia= null;
				return json_encode($objCarrera);
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	/***********************************\
	* *
	* Funcion que obtiene un registro identificado por el parametro $id, corresponde a la clave primaria de la tabla carrera *
	* Parameter: $id INTEGER*
	* *
	\************************************/
		function filtrar($buscar)
		{
			$sql=" SELECT carrera.idcarrera, carrera.Nombre, carrera.Direccion, carrera.Telefono, carrera.Correo, carrera.Titulacion, 
			carrera.idtipo,seccion.idSeccion,seccion.Descripcion FROM carrera 
						INNER JOIN seccion ON carrera.idtipo=seccion.idSeccion  
						where carrera.Nombre like '%".$buscar."%' or carrera.Telefono like '%".$buscar."%' ";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objCarrera= array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					$carrera=array();
					$carrera['idcarrera']=$fila[0];
					$carrera['Nombre']=$fila[1];
					$carrera['Direccion']=$fila[2];
					$carrera['Telefono']=$fila[3];
					$carrera['Correo']=$fila[4];
					$carrera['Titulacion']=$fila[5];
					$carrera['idtipo']=$fila[6];
					$objCarrera[]=$carrera;
				}

				$sentencia= null;
				return json_encode($objCarrera);
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}

 ?>