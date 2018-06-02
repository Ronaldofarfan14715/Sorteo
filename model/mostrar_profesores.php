<?php
require_once("conexion.php");
require_once("mostrar_profesores.php");
class Nombre_profesores{

public function mostrardatos($sql){

	$cn=new Conexion();
	$conec=$cn->Conexion();
	$resultado=mysqli_query($conec,$sql);
	return mysqli_fetch_all($resultado,MYSQLI_ASSOC);
}

}

	
?>