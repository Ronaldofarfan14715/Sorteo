<?php


require_once("../model/conexion.php");

$con=new Conexion();
$cn=$con->Conexion();

$id=$_POST['dni'];
$tipo=$_POST['tipo'];
switch ($tipo) {
	case 'PARCIAL':
		$campo='turno_parcial';
		break;
	
	case 'FINAL':
		$campo='turno_final';
		break;

	case 'SUSTI':
		$campo='turno_susti';
	break;
}


$query="SELECT ".$campo." from supervision_docente where DNI='$id'";
$rs=$cn->query($query);
$row=$rs->fetch_row();
$num=$row[0];
if($num>0){
	echo $num;
}else{
	echo "0";
}
$cn->close();

?>
