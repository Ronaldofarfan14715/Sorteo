<?php 



/*

*/

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

$query= "SELECT CONCAT(docentes.NOMBRE, ' ', docentes.APELLIDO_PATERNO)as NOMBREC, docentes.DNI from docentes inner join supervision_docente on docentes.DNI = supervision_docente.DNI inner join registro_docentes on supervision_docente.id_sup_doc = registro_docentes.id_sup_doc where registro_docentes.asistencia = '1' and registro_docentes.tipoexamen='$campo' and registro_docentes.id_turno='$fecha' ";



$rs = $cn->query($query);
$num=$rs->num_rows;

if($num>0){
	while ($row=$rs->fetch_row()) {
		?>
		<tr>
<td><?php echo $row[1]; ?></td>
<td style="font-size: 12px;"><?php echo $row[0];?></td>
<td>---------------</td>
</tr>

<?php

 } 

?>
<?php 
}else{
	echo "<tr><td colspan='3'>No hay registros</td></tr>";
}
$cn->close();
?>
	
