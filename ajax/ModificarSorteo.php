<?php



require('../model/conexion.php');
$con=new Conexion();
$cn=$con->Conexion();

$turno = $_POST['turno'];
$tipo = $_POST['tipo'];

$periodo=$_POST['periodo'];



$rs=json_decode($_POST['data']);

//print_r($rs->{1}->{"c"});
$array = [];

function objToArray($obj, &$arr){

    if(!is_object($obj) && !is_array($obj) ){

        $arr = $obj;
        return $arr;
    }



    foreach($obj as $key => $value)
    {

        if(!empty($value))
        {
            $arr[$key] = array();
            objToArray($value, $arr[$key]);
        }
        else{
            $arr[$key] = $value;
        }
    }

    return $arr;
}


$resu=objToArray($rs,$array);
$num=sizeof($resu);
//print_r($resu);
//print_r($num);

updateTabla($resu,$num,$turno,$tipo,$periodo);
//$consulta = "UPDATE ";

function updateTabla($datos,$contador,$turno,$tipo,$periodo){

    $con=new Conexion();
    $cn=$con->Conexion();

    

    //print_r($datos);
    
    foreach($datos as $a)
    {   
        //print_r("arreglo");
        //print_r($a);
       // print_r("/n");
        $sql="UPDATE registro_sorteo SET Docente='".$a['d']."', Curso='".$a['c']."', Aula='".$a['a']."', Reemplazo='".$a['r']."', NumSorteo='".$a['s']."', Turno='$turno',tipoexamen='$tipo',periodo='$periodo' WHERE idregSorteo='".$a['cod']."'";

        $rs = $cn->query($sql);

       
        
    }
    echo "<script>alertify.success('Exito al Modificar');</script>";

}

?>


