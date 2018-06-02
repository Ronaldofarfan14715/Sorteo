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


$query="SELECT CONCAT(docentes.NOMBRE, ' ', docentes.APELLIDO_PATERNO)as NOMBREC, registro_docentes.id_sup_doc, registro_docentes.id_turno,registro_docentes.asistencia, registro_docentes.fecha_asistencia from docentes inner join supervision_docente on docentes.DNI = supervision_docente.DNI INNER JOIN registro_docentes on supervision_docente.id_sup_doc = registro_docentes.id_sup_doc where registro_docentes.id_turno = '$fecha'  and registro_docentes.tipoexamen='$campo'";

$rs=$cn->query($query);
$num=$rs->num_rows;
if($num>0){ 
	while ($row=$rs->fetch_row()) {
		?>

		
				
					<tr>
						
				
					<td>
					
					 <div class="custom-control custom-checkbox mr-md-3 mt-2 mt-sm-0 mt-md-0 mt-lg-0 ">
        				<input  value="<?php echo $row[1]?>" type="checkbox" class="custom-control-input" id="<?php echo $row[1]?>" data-turno="<?php echo $row[2] ?>" 
        				<?php echo ($row[3]==1) ? " checked='true' disabled='true'":" "; ?> >
        					<label class="custom-control-label text-center"  for="<?php echo $row[1]?>">ASISTENCIA</label>
					 </label>

      				</div>	

					</td>

					<td><label class="col-8 col-form-label text-center  "><?php echo $row[0]?></label></td>
					<td><?php echo $row[4] ?></td>
					<td hidden="true"><?php echo $row[3] ?></td>
     				</tr>

      				
    			


	<?php
	}
	?>
<tr style="display: none;">
	<td>	
	<input type="text" value="<?php echo $fecha ?>" id="turno-modal">
	</td>
</tr>
	<?php
}else{
	echo "<tr><td colspan='3'>No hay registros
	</td></tr>";
}
$cn->close();


?>