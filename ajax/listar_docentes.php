<?php


require("../model/conexion.php");
$con=new Conexion();
$cn=$con->Conexion();

/*$tipo=null;
$dia=null;
$hora=null;
$campo=null;*/


$tipo=$_POST['tipos'];
$dia=$_POST['dias'];
$hora=$_POST['horas'];

$fecha = $dia . $hora;





switch ($tipo) {
	case 'parciales':
		$campo='PARCIAL';
		break;
	
	case 'finales':
		$campo='FINAL';
		break;

	case 'sustitutorios':
		$campo='SUSTI';
	break;
}


$sql="SELECT turnos.dia,
turnos.hora,
 registro_docentes.tipoexamen,
 registro_docentes.asistencia,
 docentes.DNI,
 concat(docentes.APELLIDO_PATERNO, docentes.APELLIDO_MATERNO, docentes.NOMBRE) as nombres FROM turnos
INNER JOIN registro_docentes on turnos.id_turno=registro_docentes.id_turno 
INNER JOIN supervision_docente on supervision_docente.id_sup_doc=registro_docentes.id_sup_doc 
INNER JOIN docentes on docentes.DNI=supervision_docente.DNI WHERE registro_docentes.tipoexamen='$campo'  AND turnos.id_turno='$fecha' AND registro_docentes.asistencia='1'";

$res=mysqli_query($cn,$sql);
$array=array();
$num=$res->num_rows;
if ($num>0) {
	while ($fila=$res->fetch_row()) {

	$total= "
	
		<tr>
		<td>".$fila[4]."</td>
		<td>".$fila[5]."</td>
		<td>".$fila[3]."</td>
		<td>".$fila[0]."</td>
		<td>".$fila[1]."</td>
		<td>".$fila[2]."</td>
		</tr>
		
	";

	echo $total;

	//$array[]=$fila;
 	//$contador=count($array);
 	

	
}
}else{
	echo "
		<tr>
		<td colspan ='6'>No hay registros </td>
		</tr>

	";
}




?>