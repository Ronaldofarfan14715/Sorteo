<?php 




require_once("../model/conexion.php");


$con = new Conexion();
//array
$valdni = $_POST['dni'];
$condicion = $_POST['condicion'];
$valturno = $_POST['turno'];

if($valdni){

	for ($i=0; $i <count($valdni) ; $i++) { 
	$cn=$con->Conexion();
	$query = "UPDATE registro_docentes SET asistencia='$condicion' , fecha_asistencia=CURRENT_TIMESTAMP WHERE id_sup_doc='$valdni[$i]' and id_turno='$valturno'";

	$rs=$cn->query($query);
	$cn->close();
}

	if($rs == true){
		echo "Todo OK";
	}else{
		echo "Hubo un error";
	}

}else{
	echo "Ningun Profesor";
}


?>