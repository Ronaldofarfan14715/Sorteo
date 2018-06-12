<?php 


require("../model/conexion.php");
$con=new Conexion();
$cn=$con->Conexion();


$dia=$_POST['dia'];
$hora=$_POST['hora'];

$fecha = $dia . $hora;

$periodo= $_POST['periodo'];


//echo $fecha;
$sql = "SELECT * FROM registro_sorteo where Turno=$fecha and periodo=$periodo";


$rs = $cn->query($sql);

$num=$rs->num_rows;

$sorteo = 0;

if($num>0){
    $sorteo = 1;
}else{
    $sorteo = 0;
}

echo json_encode($sorteo);



?>