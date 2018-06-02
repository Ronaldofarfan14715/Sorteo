<?php

/*
$Nombre_profe=$_POST['nombre_profesores'];
$N_turnos=$_POST['N_turnos'];

for ($i=1; $i <21 ; $i++) { 
if (isset($_POST[$i])) {
	echo "insert into " . $i . " El nombre es ". $Nombre_profe. " N° turnos ". $N_turnos;

	echo "<hr>";
}
}
*/
require_once("../model/conexion.php");

require_once('../model/Insertar_registros.php');

$id=$_REQUEST['id'];
$tipo=$_REQUEST['tipo_examen'];
//var_dump($id);

 $cn=new Conexion();
		$conec=$cn->Conexion();
		$consulta="SELECT id_sup_doc FROM supervision_docente WHERE dni='$id'";
		$resultado=mysqli_query($conec,$consulta);
		 $row=$resultado->fetch_row();

if (isset($_POST['btnenviar'])) {
	$Insert= new Insertar_profesores();
	$checkbox=$_POST['chk'];
	$num=count($checkbox);
	for ($i=0; $i <$num ; $i++) { 
		//$checkbox[$i];				
		$Insert->Insertar($row[0],$checkbox[$i],$tipo);
	}
}

?>