<?php

require("../model/conexion.php");
$con=new Conexion();
$cn=$con->Conexion();


$dia=$_POST['dia'];
$hora=$_POST['hora'];

$fecha = $dia . $hora;
$periodo= $_POST['periodo'];
$tipo=$_POST['tipo'];


$sql="SELECT * FROM registro_sorteo where turno='$fecha' and tipoexamen='$tipo' and periodo='$periodo'";

$rs=$cn->query($sql);

$num=$rs->num_rows;


if($num>0){



    
}

?>