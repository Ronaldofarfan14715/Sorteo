<?php
class Conexion{
		private $localhost="localhost";
		private $usuario="root";
		private $contra="";
		private	$bd="supervisionfim";
		public $cn;
	function Conexion(){
		$this->cn=new mysqli(
			$this->localhost,
			$this->usuario,
			$this->contra,
			$this->bd) or die("Error al conectar");
		$this->cn->set_charset("utf8");
		return $this->cn;
	}
}

/*
$probar=new conectar();

if($probar->conexion()){
	echo "conecto";
}else{
	echo "Error";
}*/
?>