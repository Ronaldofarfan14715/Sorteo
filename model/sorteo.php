<?php 

require_once("../model/conexion.php");




function MostrarCurso($fecha,$campo){

	$cn = new Conexion();
	$con = $cn->Conexion();
	$res=$con->query("SELECT curso.codCurso, curso.nombre , agrupaciones.seccion,cursoexamen.idTurnofk, cursoexamen.codAulafk,cursoexamen.tipoexamen from curso inner join agrupaciones on curso.codCurso = agrupaciones.codCursofk inner join cursoexamen on agrupaciones.idCursoSeccion=cursoexamen.idAgrupacionfk where cursoexamen.idTurnofk='$fecha' and cursoexamen.tipoexamen='$campo' ORDER BY RAND()");
/*
	SELECT curso.codCurso, curso.nombre , agrupaciones.seccion,cursoexamen.idTurnofk, cursoexamen.codAulafk,cursoexamen.tipoexamen from curso inner join agrupaciones on curso.codCurso = agrupaciones.codCursofk inner join cursoexamen on agrupaciones.idCursoSeccion=cursoexamen.idAgrupacionfk where cursoexamen.idTurnofk='$fecha' and cursoexamen.tipoexamen='$campo'

*/
	return $res;

}

function MostrarDocente($fecha,$campo){
	$cn = new Conexion();
	$con = $cn->Conexion();
	$res=$con->query("SELECT CONCAT(docentes.NOMBRE, ' ', docentes.APELLIDO_PATERNO)as NOMBREC, docentes.DNI from docentes inner join supervision_docente on docentes.DNI = supervision_docente.DNI inner join registro_docentes on supervision_docente.id_sup_doc = registro_docentes.id_sup_doc where registro_docentes.asistencia = '1' and registro_docentes.tipoexamen='$campo' and registro_docentes.id_turno='$fecha' ORDER BY RAND() ");
	return $res;
}

?>