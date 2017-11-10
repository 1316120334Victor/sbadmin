<?php 
	/**
	* 
	*/
	class Seccion
	{
		private $db;
		
		function __construct($Par_db)
		{
			$this->db=$Par_db;
		}

		function create($Descripcion)
		{
			$sql="INSERT INTO `seccion`(
						`Descripcion`) 
				VALUES (
						:Descripcion)";

			try 
			{
				$sentencia=$this->db->prepare($sql);
				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':Descripcion',$Descripcion, PDO::PARAM_STR);
				//PDOStatement::execute - Ejecuta una sentencia preparada
				//Devuelve True en caso de exito o False en caso de error

				if ($sentencia->execute()) {
					return $this->db->lastInsertId();
				} else {
					return 0;
				}
				
				
			} catch (Exception $e) 
			{
				echo $e->getMessage();
			}
		}

		function read()
		{
			$sql="SELECT `IdSeccion`, `Descripcion` FROM `seccion` ";

			try 
			{
				$sentencia=$this->db->prepare($sql,array(PDO::ATTR_CURSOR=>PDO::CURSOR_SCROLL));
				$sentencia->execute();
				$objSeccion=array();

				while ($fila=$sentencia->fetch(PDO::FETCH_NUM,PDO::FETCH_ORI_NEXT))
				{
					$seccion=array();
					$seccion['IdSeccion']=$fila[0];
					$seccion['Descripcion']=$fila[1];
					$objSeccion[]=$seccion;
				}

				return json_encode($objSeccion);
				
			} catch (Exception $e) 
			{
				echo $e->getMessage();
				
			}
		}

		function update($IdSeccion,$Descripcion)
		{
			$sql="UPDATE `seccion` SET `Descripcion`=:Descripcion WHERE IdSeccion=:IdSeccion";

			try
			{
				$sentencia=$this->db->prepare($sql);

				//binmParam: vincuyla un parametro al nombre del variable especifica
				$sentencia->bindParam(':IdSeccion',$IdSeccion, PDO::PARAM_STR);
				$sentencia->bindParam(':Descripcion',$Descripcion, PDO::PARAM_STR);
				//PDOStatement::execute - Ejecuta una sentencia preparada
				//Devuelve True en caso de exito o False en caso de error
				if ($sentencia->execute()) {
					return 1;
				} else {
					return ;
				}
				
				
			} catch (Exception $e) 
			{
				echo $e->getMessage();
				
			}
		}

		function delete($IdSeccion)
		{
			$sql="DELETE FROM `seccion` WHERE IdSeccion=:IdSeccion";

			try 
			{
				$sentencia=$this->db->prepare($sql);
				$sentencia->bindParam('IdSeccion=:IdSeccion',PDO::PARAM_STR);

				if ($sentencia->execute()) {
					return 1;
				} else {
					return 0;
				}
				
				
			} catch (Exception $e) 
			{
				echo $e->getMessage();
				
			}

		}





	}//Fin clase Seccion

 ?>