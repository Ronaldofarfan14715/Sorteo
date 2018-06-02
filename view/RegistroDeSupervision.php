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
		function kevin(){
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

		
		kevin();
		setInterval("kevin()",1000);




function llamarmodal(){
	let tipo=$("#tipoexa").val();
			let dia=$("#dia").val();
			let hora=$("#hora").val();

		if(tipo!='' && dia!='' && hora!=''){

				$.ajax({

					type: 'post',
					url: '../ajax/asistencia.php',
					data: {tipo:tipo,dia:dia,hora:hora},
					success :function(resp){
						$("#respuesta-modal").html(resp);
						$("#asist-id").modal('show');
					},
					error: function(respuesta){
						console.log("error",respuesta);
					}



				});

			}else{

				alert("DEBE SELECCIONAR EL TURNO Y EL TIPO DE EXAMEN");
				
			}
}



$("#lista-doc").click(function(e){
			e.preventDefault();
			let tipos=$("#tipoexam").val();
			

			let dias=$("#dias").val();
			let horas=$("#horas").val();

		if(tipos!='' && dias!='' && horas!=''){

			//alert(tipo);

				$.ajax(  {

					type: 'post',
					url: '../ajax/listar_docentes.php',
					data: {tipos:tipos,dias:dias,horas:horas},
					success :function(resp){
						$("#tabla-id").html(resp);
					},
					error: function(respuesta){
						console.log("error",respuesta);
					}

				});
}
			});


$("#sorteo-doc").click(function(e){
			e.preventDefault();
			let tip=$("#tipoexam").val();
			

			let day=$("#dias").val();
			let hour=$("#horas").val();

		if(tip!='' && day!='' && hour!=''){

			//alert(tipo);

				$.ajax(  {

					type: 'post',
					url: '../ajax/generar_sorteo.php',
					data: {tip:tip,day:day,hour:hour},
					success :function(resp){
						setTimeout(function(){
							$("#tabla-id").html(resp);
							$("#sorteo").html("");
						},2000)
						
					},
					error: function(respuesta){
						console.log("error",respuesta);
					},

					beforeSend:function(){
						$("#tabla-id").html("");
						$("#sorteo").html("<img width='270px' height='270px' src='../img/carga.gif' style='margin: auto;' />");
					}

				});
}
			});






















		$("#hola").click(function(e){
			valordnitotal=[];
			e.preventDefault();
			llamarmodal();
		});

		let valordnitotal= [];
		$(document).on('change','input[type=checkbox]',function(){
			if($(this).prop('checked')==true){
				valordnitotal.push($(this).val());
			}else{
				let pos = valordnitotal.indexOf($(this).val());
				valordnitotal.splice(pos,1);
			}
			console.log(valordnitotal);

		});


		$("#hola2").click(function(e){

			e.preventDefault();
			const condicion="1";
			let valorturno=$("#turno-modal").val();
			if(valordnitotal!=""){
				$.ajax({
					method: 'post',
					data: {dni:valordnitotal,condicion:condicion,turno:valorturno},
					url: '../ajax/updateA.php',
					success: function(res){
						alert(res);
						valordnitotal=[];
						llamarmodal();
					}
			});
			}else{
				alert("Seleccione algun profesor");
			}


		});
	});


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
					
		<form  name="form_asistencia" method="POST" >


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


					<!-- <div class="form-group row m-0 ">
						<label for="" class="col-sm-4 col-form-label text-center">TURNO:</label>
						<div class="col-sm-5 ml-4">
							<input type="text" class="form-control " name="turno" id="turnos">
						</div>
					</div>-->

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
						<input type="submit" id="hola" type="button" class="btn btn-outline-warning" data-toggle="modal" value="Asistencia de docentes">
					</div>
				</div>
			</form>	
			
			</div>

		</div>



 <!-- hMODAL QUE SE APARECE PARA TOMAR ASISTENCIA-->
<div class="modal fade" id="asist-id" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
    	<div class="modal-header">
					<h5 class="modal-title">ASISTENCIA DE DOCENTES </h5>
					
		</div>


		<div class="modal-body">

				<form name="asistencia" method="post" action="/mimodal.php" >
				<div class="form-group row m-0" id="respuesta-modal">
					<!-- aqui se scribe la lista por ajax-->
				</div>
				<div class="form-group d-flex justify-content-center m-2">
						<input value="GUARDAR CAMBIOS" id="hola2" type="submit" class="btn btn-outline-success"  data-target=".asistenciaDocentes"></button>
						
					</div>
					</form>

		</div>
			</div></div>		

		
      	
  
	  </div>

		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header m-0 col-12">

					<h2 class="text-center text-muted col-xs-8 ">LISTA DE DOCENTES</h2>

					<h3 class="modal-title col-xs-4 text-center  " id="hora-reloj"></h3>


				</div>

				

				<div class="modal-body mt-1" style="display:flex;flex-wrap: wrap">	

					<div class="col-lg-3 ">

						<div class="form-group row m-0">
						<label for="" class=" col-form-label ml-3  ">TIPO DE EXAMEN:</label>
						<div class="col-12">
							<select id="tipoexam" name="tipoexm" class="custom-select custom-select-sm">
								<option selected  value="">Tipo de examenes</option>
								<option value="finales">FINALES</option>
								<option  value="parciales">PARCIALES</option>
								<option value="sustitutorios">SUSTITUTORIOS</option>
							</select>
						</div>
					</div>


					

					<div class="form-group row m-0">
						<label for="" class=" col-form-label ml-3 ">DIA:</label>
						<div class="col-12">
							<select id="dias" name="diax" class="custom-select custom-select-sm">
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
						<label for="" class=" col-form-label ml-3 ">HORA:</label>
						<div class="col-12 ">
							<select id="horas" name="horax" class="custom-select custom-select-sm">
								<option selected value="">HORA</option>
								<option  value="8">8:00 A 10:00</option>
								<option value="10">10:00 A 12:00</option>
								<option value="12">12:00 A 2:00</option>
								<option value="14">14:00 A 16:00</option>
						
							</select>
						</div>
					</div>


					<div class="form-group d-flex justify-content-center m-2">

						<input type="submit" id="lista-doc" type="button" class="btn btn-outline-success p-2 mr-3 ml-3 mt-3"  value="LISTAR  DOCENTES" name="lista-doc">

					</div>



					<div class="form-group d-flex justify-content-center">

						<input type="submit" id="sorteo-doc" type="button" class="btn btn-outline-success p-2 mr-3 ml-3 mt-3"  value="GENERAR SORTEO" name="sorteo-doc">
						
					</div>
		
					
					

					</div>

					<div class=" table-responsive table-bordered  col-lg-4  ">

							
						<table class="table text-center ">


							<thead class="thead-dark">
								
								<tr>
									<!--<th scope="col">N°</th><--></-->
									<th scope="col">N°</th>
									<th scope="col">AULA</th>
									
									<th scope="col">CURSO Y SECCION</th>
									


								</tr>

							</thead>


							<thead class="thead-dark" id="tabla-id">
									
								

								 <?php 
								 if (isset($_POST['lista-doc'])) {
								 	include("../ajax/listar_docentes.php");

					

								 } 
								 
								 if(isset($_POST['sorteo-doc'])) {
								 	include("../ajax/generar_sorteo.php");
								 }

								 ?>
							</thead>
							<tbody>
								
							</tbody>
							
						</table>

				</div>
						<div class="table-responsive table-bordered col-lg-5 ">

							
						<table class="table text-center ">


							<thead class="thead-dark ">
								
								<tr>
									<!--<th scope="col">N°</th><--></-->
									
									<th scope="col">DNI</th>
									<th scope="col">SUPERVISOR</th>
									<th scope="col">ASISTENCIA DOCENTE</th>
								


								</tr>

							</thead>


							<thead class="thead-dark" id="tabla-id">
									
								

								 <?php 
								 if (isset($_POST['lista-doc'])) {
								 	include("../ajax/listar_docentes.php");

					

								 } 
								 
								 if(isset($_POST['sorteo-doc'])) {
								 	include("../ajax/generar_sorteo.php");
								 }

								 ?>
							</thead>
							<tbody>
								
							</tbody>
							
						</table>

						</div>




				<div id="sorteo" width="100%" style="text-align: center;">
		
				</div>

					
				</div>


			</div>


		</div>
		</div>


	</div>
</body>

</html>