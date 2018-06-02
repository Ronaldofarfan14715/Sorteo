<?php 
    session_start();
    if($_SESSION["id"]==0){
        header("location:index.html");
    }else{
        
    }
    ?>

	<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script >

</script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script>
		function MostrarHora(){
		var Digital=new Date();
			var hours=Digital.getHours();
			var minutes=Digital.getMinutes();
			var seconds=Digital.getSeconds();
			var dn="AM";
			if (hours>12){
			dn="PM";
			hours=hours-12;
			}
			if (hours==0)
			hours=12;
			if (minutes<=9)
			minutes="0"+minutes;
			if (seconds<=9)
			seconds="0"+seconds;

$("#hora-reloj").html(hours+":"+minutes+":"+seconds+" "+dn);
console.log("hola");

}
	$(document).ready(function(){
		MostrarHora();
		setInterval("MostrarHora()",1000);
function MostrarCursos(){

	let tipo=$("#tipoexa").val();
	let dia=$("#dia").val();
	let hora=$("#hora").val();

	if(tipo!='' && dia!='' && hora!=''){

		$.ajax({
			type:'post',
			url:'../ajax/mostrarCursos.php',
			data:{tipo:tipo,dia:dia,hora:hora},
			success: function(re){

				$("#tabla-cur-list").html(re)
			},
			error:function(r){
				console.log("error",r);
			}
		});
	}
}
function MostrarDocAsistidos(){

	let tipo=$("#tipoexa").val();
	let dia=$("#dia").val();
	let hora=$("#hora").val();

	if(tipo!='' && dia!='' && hora!=''){

		$.ajax({
			type:'post',
			url:'../ajax/mostrarDocAsis.php',
			data:{tipo:tipo,dia:dia,hora:hora},
			success: function(rew){

				$("#tabla-doc-asis").html(rew)
			},
			error:function(rr){
				console.log("error",rr);
			}
		});
	}
	
}

function MostraDocAsistencia(){

		let tipo=$("#tipoexa").val();
	let dia=$("#dia").val();
	let hora=$("#hora").val();

		if(tipo!='' && dia!='' && hora!=''){

			//alert(tipo);

				$.ajax(  {

					type: 'post',
					url: '../ajax/asistencia.php',
					data: {tipo:tipo,dia:dia,hora:hora},
					success :function(resp){
						$("#tabla-doc-list").html(resp);
						MostrarDocAsistidos();
					},
					error: function(respuesta){
						console.log("error",respuesta);
					}

				});
}else{
	alert("DEBE SELECCIONAR EL TURNO Y EL TIPO DE EXAMEN");
}

}

$("#listar-doc").click(function(e){

	valordnitotal=[];
	e.preventDefault();
	MostraDocAsistencia();
	MostrarCursos();
	MostrarDocAsistidos();
	

});

let valordnitotal=[];
$(document).on('change','input[type=checkbox]',function(){
		if($(this).prop('checked')==true){
			valordnitotal.push($(this).val());
		}else{
			let pos = valordnitotal.indexOf($(this).val());
			valordnitotal.splice(pos,1);
		}
		console.log(valordnitotal);
});

$('#GuardarAsistencia').click(function(e){

		e.preventDefault();
		const condicion="1";
		let valorturno=$("#turno-modal").val();
		
		if(valordnitotal!=""){

			$.ajax({

					method:'post',
					data: {dni:valordnitotal,condicion:condicion,turno:valorturno},
					url: '../ajax/updateA.php',
					success: function(res){
						alert(res);
						valordnitotal=[];
						MostraDocAsistencia();

					}


			});
		}else{
			alert("seleccione algun profesor");
		}

});



});

function MostrarSorteo(){

	let tipo=$("#tipoexa").val();
	let dia=$("#dia").val();
	let hora=$("#hora").val();

		if(tipo!='' && dia!='' && hora!=''){

			//alert(tipo);

				$.ajax(  {

					type: 'post',
					url: '../ajax/tabla_sorteo.php',
					data: {tipo:tipo,dia:dia,hora:hora},
					success :function(resp){
						$("#tabla-sorteo").html(resp);
					},
					error: function(respuesta){
						console.log("error",respuesta);
					}

				});
}else{
	alert("VACIO");
}

}







	</script>

</head>

<body>

	<nav class="navbar navbar-expand-lg  navbar-dark bg-dark sticky-top ">

		<a class="navbar-brand" href="administrador.php">
			<img src="../img/logo.png" width="40" height="40" class="d-inline-block align-top float-left" alt="">
			<span class="navbar-brand text-muted">OERAAE</span>
		</a>



		<button class="navbar-toggler navbar-toggler-right" data-toggle="collapse" data-target="#navbarTogglerDemo01" type="button">

			<span class="navbar-toggler-icon"></span>


		</button>

		<div class="collapse navbar-collapse text-center" id="navbarTogglerDemo01">

			<div class="navbar-nav">
				<?php if ($_SESSION['rol']==1){?>
				<a href="RegistroDeSupervision.php" class="nav-item nav-link  ">Registro de Supervision</a>
				<?php }?>
				<a href="RegistroProfesores.php " class="nav-item nav-link ">Registro de Profesores</a>
				
				<a href="../model/logout.php" class="nav-item nav-link">Cerrar Sesion</a>

			</div>

		</div>

	</nav>



	<div class="container">
	


		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">CONTROL DE SUPERVISION DE EXAMENES-PERIODO ACADEMICO 2018-1</h5>

				</div>
				<div class="modal-body ">


					<label class=" font-weight-bold" for="">Miembro de la comision de examenes:</label>
					<label class="" for="">Ronaldo farfan ayma</label>
					<br>
					
		


					<div class="form-group row m-0">
						<label for="" class="col-sm-4 col-form-label text-center ">TIPO DE EXAMEN:</label>
						<div class="col-sm-5 ml-4 mt-2 ">
							<select id="tipoexa" name="tipoex" class="custom-select custom-select-sm">
								<option selected  value="">Tipo de examenes</option>
								<option value="finales">FINALES</option>
								<option  value="parciales">PARCIALES</option>
								<option value="sustitutorios">SUSTITUTORIOS</option>
							</select>
						</div>
					</div>


					

					<div class="form-group row m-0">
						<label for="" class="col-sm-4 col-form-label text-center ">DIA:</label>
						<div class="col-sm-5 ml-4 mt-2 ">
							<select id="dia" name="diax" class="custom-select custom-select-sm">
								<option selected  value="">DIA</option>
								<option value="1">LUNES</option>
								<option  value="2">MARTES</option>
								<option value="3">MIERCOLES</option>
								<option value="4">JUEVES</option>
								<option value="5">VIERNES</option>
							</select>
						</div>
					</div>

					<div class="form-group row m-0">
						<label for="" class="col-sm-4 col-form-label text-center ">HORA:</label>
						<div class="col-sm-5 ml-4 mt-2 ">
							<select id="hora" name="horax" class="custom-select custom-select-sm">
								<option selected value="">HORA</option>
								<option  value="8">8:00 A 10:00</option>
								<option value="10">10:00 A 12:00</option>
								<option value="12">12:00 A 2:00</option>
								<option value="14">14:00 A 16:00</option>
						
							</select>
						</div>
					</div>

				</div>
				<div class="modal-body">
					
					<div class="form-group d-flex justify-content-center m-2">
						<input type="submit" id="listar-doc" type="button" class="btn btn-outline-danger" value="Enviar" name="listar-doc">
					</div>
				</div>
			
			
			</div>

		</div>
</div>
<div class="d-flex justify-content-center flex-wrap m-5">



<div class="col-sm-8 col-md-8 col-lg-7 mb-sm-4   " role="document">





	<div class="modal-content ">
		<div class="modal-header">
			<h5 >ASISTENCIA</h5>
			
				<input id="GuardarAsistencia" type="submit" id="Registrar-asistencia" type="button" class="btn btn-outline-info btn-lg" value="Asistencia">
			
		</div>

		<div class="modal-body m-2 p-0">
			
			<div class="table-responsive">
				<table class="table text-center table-bordered">
					
					<thead class="thead-dark ">
						<tr>
							<th>ASISTENCIA DE DOCENTES</th>
							<th>Docente</th>
							<th>Hora</th>
						</tr>
					</thead>
					<tbody id="tabla-doc-list">
						

						<?php 
						if (isset($_POST['listar-doc'])) {
						
							include('../ajax/asistencia.php');

						}
						


						?>
							
					
					</tbody>



				</table>
					
			</div>
		</div>





	</div>
	
</div>
	


<div class="col-sm-7 col-md-8 col-lg-6 mb-sm-4" role="document">

	<div class="modal-content">
		<div class="modal-header text-center">
			<h5>EXAMEN</h5>
			<h5 class="modal-title col-xs-4 text-center  " id="hora-reloj"></h5>
		</div>

		<div class="modal-body m-2 p-0">
			<div class="table-responsive">
				<table class="table text-center table-bordered">
					
					<thead class="thead-dark ">
						<tr>
							
							<th >Codigo Curso</th>
							<th>Seccion</th>
							<th>aula</th>
							<th style="">Curso</th>
						</tr>
					</thead>
					<tbody id="tabla-cur-list">
						<?php 
						if (isset($_POST['listar-doc'])) {
						
							include('../ajax/mostrarCursos.php');

						}
						


						?>
					</tbody>
				
				</table>
			</div>
		</div>
	


	</div>
	
</div>

<div class="col-sm-5 col-md-4 col-lg-6  mb-sm-4" role="document">

	<div class="modal-content">
		<div class="modal-header text-center">
			<h5>DOCENTES</h5>

		</div>

		<div class="modal-body m-2 p-0">
			<div class="table-responsive">
				<table class="table text-center table-bordered">
					
					<thead class="thead-dark">
						<tr>
							<th>DNI</th>
							<th>Docente</th>
							<th>Reemplazo</th>
						</tr>
					</thead>
					<tbody id="tabla-doc-asis">
						
					</tbody>
				
				</table>
			</div>
		</div>



	</div>
	
</div>

<div class="d-flex justify-content-center">
<input type="submit" id="" type="button" class="btn btn-outline-success btn-lg" value="GENERAR SORTEO" data-toggle="modal" data-target="#sorteo" onclick="MostrarSorteo();">

</div>

</div>

<!-- modal del sorteo-->
<div class="modal fade" id="sorteo" tabindex="-1" role="dialog" aria-labelledby="sorteo" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">SORTEO DE DOCENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div id="tabla-sorteo">
				
		</div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-danger" onclick="MostrarSorteo();">SORTEAR DE NUEVO</button>
        <button type="button" class="btn btn-primary">GUARDAR CAMBIOS</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>