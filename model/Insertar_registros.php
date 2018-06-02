<?php
require_once("conexion.php");
class Insertar_profesores extends Conexion
{	
	public function Insertar($id_sup_doc,$id_turno,$tipo){
		$cn=new Conexion();
		$conec=$cn->Conexion();
		$sql="INSERT INTO registro_docentes(id_sup_doc, id_turno,tipoexamen) VALUES (".$id_sup_doc.",".$id_turno.",'".$tipo."')";

		$sql2="UPDATE turnos set contador=contador +1 where id_turno='$id_turno'";

		$sql3="SELECT (doce_max) as total FROM turnos where id_turno=".$id_turno."";
		//$sql3="SELECT (doce_max + adicional) as total FROM turnos where id_turno=".$id_turno."";

		//var_dump($sql3);
		$resultado=mysqli_query($conec,$sql3);
		$total=$resultado->fetch_row();
	
		$sql4="SELECT contador FROM turnos where id_turno=".$id_turno."";

		$resultado=mysqli_query($conec,$sql4);
		$contador=$resultado->fetch_row();

		$sql5="UPDATE supervision_docente set registro=1 where id_sup_doc=".$id_sup_doc."";
		

		if($contador[0]<$total[0]) {
			
		$resultado=mysqli_query($conec,$sql);
		$resultado=mysqli_query($conec,$sql2);
		$resultado=mysqli_query($conec,$sql5);
		echo "<script>alertify.success('Registro Insertado en turno: ".$id_turno."');</script>";
		}
		else{
		echo "<script>alertify.error('Resgistos llenos en ".$id_turno."');</script>";

		}

	
	}
}


	
		


?>



















