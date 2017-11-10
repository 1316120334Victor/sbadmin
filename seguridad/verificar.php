<?php
                        require_once("C:\\xampp\\htdocs\\documental\\config\\systemConfig.php");
                        require_once($dirApp."seguridad".$comodin."seguridad.php");
                        require_once($dirApp."seguridad".$comodin."sesion.class.php");
                      //  require_once("conexion_pdo.php");

                        $sesion = new sesion();
                        $usuario = $sesion->get("usuario");
                         if( $usuario == false )
                        {   
                            header("Location: ". $dominio);      
                        }
                       
                    ?>