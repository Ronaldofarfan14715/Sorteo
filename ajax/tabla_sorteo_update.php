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

?>

  <table class="table table-bordered text-center table-hover">
       		<tr>
       			<th>CURSO</th>
       			<th>AULA</th>
       			<th>DOCENTE</th>
       			<th>REEMPLAZO</th>
       		</tr>
<?php


if($num>0){

    $n=0;
    while($row=$rs->fetch_array()){



        $n++;

    ?>
    
    <div class="form-group">
    
    <tr>
        <td><input class="form-control" type="text" id="<?php echo "c".$n; ?>" value="<?php echo $row[2]; ?>" ></td>
        <td><input class="form-control" type="text" id="<?php echo "a".$n; ?>" value="<?php echo $row[3]; ?>"></td>
        <td><input class="form-control" type="text" id="<?php echo "d".$n; ?>" value="<?php echo $row[1]; ?>"></td>
        <td><input class="form-control" type="text" id="<?php echo "r".$n; ?>" value="<?php echo $row[4]; ?>"></td>
        <td><input  class="form-control" type="hidden" id="<?php echo "s".$n; ?>" value="<?php echo $row[5]; ?>"></td>
        <td><input  class="form-control" type="hidden" id="<?php echo "cod".$n; ?>" value="<?php echo $row[0]; ?>"></td>

    </tr>
    </div>
<?php
    }

    
}

?>

</table>
</div>