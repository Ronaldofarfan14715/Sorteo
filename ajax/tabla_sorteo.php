<?php 

$tipo=$_POST['tipo'];
$dia=$_POST['dia'];
$hora=$_POST['hora'];

$fecha = $dia . $hora;

$contador=0;
$contar=0;
$array_docente=array();



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
 ?>

<div class="table-responsive">
       		<?php require_once("../model/sorteo.php");


       			$curso = MostrarCurso($fecha,$campo);
                            $docente = MostrarDocente($fecha,$campo);

                            while ($datos2=$docente->fetch_array()) {

                                   $array_docente[$contador]=$datos2[0];
                                   $contador++;
                            }


       		 ?>
       <table class="table table-bordered text-center table-hover">
       		<tr>
       			<th>CURSO</th>
       			<th>AULA</th>
       			<th>DOCENTE</th>
       			<th>REEMPLAZO</th>
       		</tr>
       		<?php

       			$num = $curso->num_rows;
                            $num2= $docente->num_rows;

       			if($num>0){
       			while($datos=$curso->fetch_array()){

                            

                     ?>
                            <tr>
                                   <td><input type="text" name="" value="<?php echo $datos[1]; ?>"></td>
                                   <td><input type="text" name="" value="<?php echo $datos[4]." ".$datos[2]; ?>"></td>
                                   <td><input type="text" name="" value="<?php echo $array_docente[$contar]; ?>"></td>
                                   <?php if($contar+$num<$num2)
                                   {
                                    ?>
                                   <td><input type="text" name="" value="<?php echo $array_docente[$contar+$num]; ?>"></td>
                                   <?php 
                                    }
                                          $contar++;    
                                    ?>                           
                            </tr>          
                     <?php 
              			}
                            }
              		

       		 ?>



       </table>
</div>