<?php
                        require_once("seguridad.php");
                        require_once("sesion.class.php");
                      //  require_once("conexion_pdo.php");

                        $sesion = new sesion();
                        $perfil = $sesion->get("type"); 
                         if ($perfil!='AD') {
                             header("Location: login.php");   

                         }



                       
                    ?>