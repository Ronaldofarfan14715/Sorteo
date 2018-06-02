<?php 

include_once("conexion.php");

class Validar extends Conexion
{
	
	public function validar_logins($id,$pass){

		$query ="SELECT * FROM supervision_docente where DNI='$id' and contrasena='$pass' ";

		$rs = mysqli_query($this->cn,$query);


		$fila=$rs->num_rows;

		if($fila>0){
			$array=$rs->fetch_array();
			session_start();
			$_SESSION['rol']=$array['tipo'];
			$_SESSION['id']=$array['DNI'];

			if($_SESSION['rol']==1){
				return header('location:../view/administrador.php');
			}else{
				return header('location:../view/administrador.php');
			}

		}else{
				return header('location:../view/index.html');

			
		}
	}
	
	}



?>