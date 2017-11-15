<?php 


	/***********************************\
	* *
	* Clase que permite realizar las operaciones CRUD de la tabla persona *
	* Create, Read, Update, Delete*
	* *
	\************************************/

	Class Persona{

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
		function create($identificacion,$nombre,$apellido,$usuario,$fechanacimiento,$idtipo)
		{
			$sql="INSERT INTO `persona`( 
 `identificacion`, `nombre`, `apellido`, `usuario`, `fechanacimiento`, `idtipo`)
				 VALUES (:identificacion,
						 :nombre,
						 :apellido,
						 :usuario,
						 :fechanacimiento,
						 :idtipo)";
			try 
			{
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':identificacion',$identificacion, PDO::PARAM_STR);
				$sentencia->bindParam(':nombre',$nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':apellido',$apellido, PDO::PARAM_STR);
				$sentencia->bindParam(':usuario',$usuario, PDO::PARAM_STR);
				$sentencia->bindParam(':fechanacimiento',$fechanacimiento, PDO::PARAM_STR);
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


			$consulta="	SELECT `idpersona`, `identificacion`, `nombre`, `apellido`, `usuario`, `fechanacimiento`, `idtipo` FROM `persona` ";

			try 
			{
				$sentencia=$this->db->prepare($consulta,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objPersona=array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){

					$persona=array();
					$persona['idpersona']=$fila[0];
					$persona['identificacion']=$fila[1];
					$persona['nombre']=$fila[2];
					$persona['apellido']=$fila[3];
					$persona['usuario']=$fila[4];
					$persona['fechanacimiento']=$fila[5];
					$persona['idtipo']=$fila[6];
					$objPersona[]=$persona;
				}
				 $sentencia=null;  //NO TIENE CONSTANCIA
				 return json_encode($objPersona);
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

		function update($idpersona,$identificacion,$nombre,$apellido,$usuario,$fechanacimiento,$idtipo)
		{
			
			$sql= "UPDATE `persona` 
					SET `identificacion`=:identificacion,
						`nombre`=:nombre,
						`apellido`=:apellido,
						`usuario`=:usuario,
						`fechanacimiento`=:fechanacimiento,
						`idtipo`=:idtipo 
					where idpersona=:idpersona ";

			try {
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':idpersona',$idpersona, PDO::PARAM_STR);
				$sentencia->bindParam(':identificacion',$identificacion, PDO::PARAM_STR);
				$sentencia->bindParam(':nombre',$nombre, PDO::PARAM_STR);
				$sentencia->bindParam(':apellido',$apellido, PDO::PARAM_STR);
				$sentencia->bindParam(':usuario',$usuario, PDO::PARAM_STR);
				$sentencia->bindParam(':fechanacimiento',$fechanacimiento, PDO::PARAM_STR);
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

		function delete($idpersona)
		{
			$sql="DELETE FROM `persona` where idpersona=:idpersona";

			try {
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':idpersona',$idpersona, PDO::PARAM_STR);
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
			$sql=" SELECT persona.idpersona, persona.identificacion,persona.nombre, persona.apellido, persona.usuario, persona.fechanacimiento, persona.idtipo,tipopersona.descripcion FROM `persona` 
						INNER JOIN tipopersona ON persona.idtipo=tipopersona.idtipo  
						where persona.idpersona=$id";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objPersona= array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					$persona=array();
					$persona['idpersona']=$fila[0];
					$persona['identificacion']=$fila[1];
					$persona['nombre']=$fila[2];
					$persona['apellido']=$fila[3];
					$persona['usuario']=$fila[4];
					$persona['fechanacimiento']=$fila[5];
					$persona['idtipo']=$fila[6];
					$objPersona[]=$persona;
				}

				$sentencia= null;
				return json_encode($objPersona);
				
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
			$sql=" SELECT `idpersona`, `identificacion`, `nombre`, `apellido`, `usuario`, `fechanacimiento`, tipopersona.descripcion FROM `persona` 
						INNER JOIN tipopersona ON persona.idtipo=tipopersona.idtipo   
						where nombre like '%".$buscar."%'";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=> PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objPersona= array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT)) {
					$persona=array();
					$persona['idpersona']=$fila[0];
					$persona['identificacion']=$fila[1];
					$persona['nombre']=$fila[2];
					$persona['apellido']=$fila[3];
					$persona['usuario']=$fila[4];
					$persona['fechanacimiento']=$fila[5];
					$persona['idtipo']=$fila[6];
					$objPersona[]=$persona;
				}

				$sentencia= null;
				return json_encode($objPersona);
				
			} catch (Exception $e) {
				echo $e->getMessage();
			}
		}
	}

 ?>