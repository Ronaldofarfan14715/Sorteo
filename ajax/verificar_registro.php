
						<?php 
						require('../model/conexion.php');
						$id=$_POST['id'];
							$cn=new Conexion();
							$conec=$cn->Conexion();
							$ss="SELECT registro FROM supervision_docente WHERE DNI=".$id."  ";
							$registro=mysqli_query($conec,$ss);

							$row=$registro->fetch_row();
								if ($row[0]<=0) {
									echo 100;
								}else{

									echo "<h2 class='h2 mt-3 text-center text-danger' id='turnos_mostrar'>NOTA : Ya esta registrado <button id='boton-ver' data-dni='$id'>Ver</button></h2>";
								}
								//var_dump($registro);
						

						//include "../ajax/turnos_registrados.php"; ?>