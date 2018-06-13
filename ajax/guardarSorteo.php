<?php 

require('../model/conexion.php');
$con=new Conexion();
$cn=$con->Conexion();

$turno = $_POST['turno'];
$tipo = $_POST['tipo'];

$periodo=$_POST['periodo'];


//echo $turno;
$rs=json_decode($_POST['data']);
//print_r($rs->{1}->{"c"});
$array = [];

function objToArray($obj, &$arr){

    if(!is_object($obj) && !is_array($obj)){
        $arr = $obj;
        return $arr;
    }

    foreach ($obj as $key => $value)
    {
        if (!empty($value))
        {
            $arr[$key] = array();
            objToArray($value, $arr[$key]);
        }
        else
        {
            $arr[$key] = $value;
        }
    }
    return $arr;
}

$resu=objToArray($rs,$array);

$sql0= "SELECT max(NumSorteo) from registro_sorteo where Turno=$turno";
$rs=$cn->query($sql0);
$rscol = $rs->fetch_row();

for($i =1; $i<= sizeof($resu); $i++){
//print_r($resu[$i]['c']);22
	if(isset($resu[$i]['r'])){
        $r = "'".$resu[$i]['r']."'";
	}else{
		$r = "null";
    }
    
if($rscol[0] == null){
    $n =1;
}else{
    
    $n = $rscol[0]+1;
}
$sql = "INSERT INTO registro_sorteo values (NULL,'".$resu[$i]['d']."','".$resu[$i]['c']."','".$resu[$i]['a']."',".$r.",$n,$turno,'".$tipo."','".$periodo."')";
$rs=$cn->query($sql);

if($rs){
    echo "<script>alertify.success('Exito al insertar');</script>";
}else{
    echo $sql;
}
}

?>