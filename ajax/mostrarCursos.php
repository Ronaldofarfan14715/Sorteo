<?php 

require('../model/conexion.php');
$con=new Conexion();
$cn=$con->Conexion();

$tipo=$_POST['tipo'];
$dia=$_POST['dia'];
$hora=$_POST['hora'];

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


$query= "SELECT curso.codCurso, curso.nombre , agrupaciones.seccion,cursoexamen.idTurnofk, cursoexamen.codAulafk,cursoexamen.tipoexamen from curso inner join agrupaciones on curso.codCurso = agrupaciones.codCursofk inner join cursoexamen on agrupaciones.idCursoSeccion=cursoexamen.idAgrupacionfk where cursoexamen.idTurnofk='$fecha' and cursoexamen.tipoexamen='$campo'";




$rs=$cn->query($query);

$num=$rs->num_rows;

if($num>0){
	while($row=$rs->fetch_row()){
	
?>
<tr>
							
							<td><?php echo $row[0]; ?></td>
							<td><?php echo $row[2]; ?></td>
							<td><?php echo $row[4]; ?></td>
							<td  style="font-size: 12px;"><?php echo $row[1]; ?> </td>
						</tr>
<?php 
}
?>
<?php 
}else{
	echo "<tr><td colspan='4'> NO HAY CURSOS SELECCIONADOS PARA ESTE HORARIO</td></tr>";
} 
$cn->close();



?>

