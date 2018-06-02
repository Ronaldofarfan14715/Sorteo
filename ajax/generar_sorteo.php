<?php


require("../model/conexion.php");
$con=new Conexion();
$cn=$con->Conexion();

$tipo=$_POST['tip'];
$dia=$_POST['day'];
$hora=$_POST['hour'];

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
INNER JOIN docentes on docentes.DNI=supervision_docente.DNI WHERE registro_docentes.tipoexamen='$campo'  AND turnos.id_turno='$fecha' AND registro_docentes.asistencia='1' ORDER BY RAND() ";

/*$sql="SELECT turnos.dia,
turnos.hora,
 registro_docentes.tipoexamen,
 registro_docentes.asistencia,
 docentes.DNI,
 concat(docentes.APELLIDO_PATERNO, docentes.APELLIDO_MATERNO, docentes.NOMBRE) as nombres FROM turnos
INNER JOIN registro_docentes on turnos.id_turno=registro_docentes.id_turno 
INNER JOIN supervision_docente on supervision_docente.id_sup_doc=registro_docentes.id_sup_doc 
INNER JOIN docentes on docentes.DNI=supervision_docente.DNI";*/


$res=mysqli_query($cn,$sql);

$sorteoquery="SELECT cursoexamen.idExamen,agrupaciones.codCursofk from agrupaciones INNER JOIN cursoexamen ON agrupaciones.idCursoSeccion = cursoexamen.idExamen WHERE idTurnofk='$fecha' ORDER BY agrupaciones.codCursofk";

$arrays= array();

$res2=mysqli_query($cn,$sorteoquery);

while($fila2=$res2->fetch_row()){

	array_push($arrays,$fila2[0]);
}


$num=$res->num_rows;
if ($num>0) {
	$cont=0;
	while ($fila=$res->fetch_row()) {
		$cont++;
	$indiceSorteado = array_rand($arrays,1);
	$queryinfos = "SELECT cursoexamen.idExamen,agrupaciones.codCursofk,agrupaciones.seccion,cursoexamen.codAulafk from agrupaciones INNER JOIN cursoexamen ON agrupaciones.idCursoSeccion = cursoexamen.idExamen WHERE cursoexamen.idExamen = $arrays[$indiceSorteado]";
		$resinfo = mysqli_query($cn,$queryinfos);
		if($resinfo){
			$fila3=$resinfo->fetch_row();
		}else{
			$estado="REM";
		}
echo "<tr>";

	if(sizeof($arrays)>0){
		echo "<td>".$cont."</td>";
		echo "<td nowrap>".$fila3[3]."</td>";
		echo "<td>".$fila3[1]."</td>";
		echo "<td>".$fila3[2]."</td>";
	}else{
		echo "<td colspan='4'>REMPLAZO</td>";
	}
	
	
	echo "
		<td>".$fila[4]."</td>
		<td>".$fila[5]."</td>
		<td>".$fila[3]."</td>
		<td>".$fila[0]."</td>
		<td>".$fila[1]."</td>
		<td>".$fila[2]."</td>
		</tr>
		
	";
	unset($arrays[$indiceSorteado]);

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