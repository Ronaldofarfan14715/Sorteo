<?php 


include("../model/ValidarLogin.php");

	$id=htmlentities(addslashes($_POST['id']));
	$pass=htmlentities(addslashes($_POST['pass']));

	if($id!=null && $pass!=null){
		$obj= new Validar();
		$rs=$obj->validar_logins($id,$pass);
		echo $rs;
}
?>