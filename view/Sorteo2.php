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
	<link rel="stylesheet" type="text/css" href="../js/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../js/css/themes/default.css">

	
	<script src="../js/alertify.js"></script>
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
//console.log("hola");

}
function ModificarSorteo(){

	var data = new Object();
	var t = $("#tabla-sorteo-update tr").length;
	
	for( let i = 1; i<t; i++){
		data[i]= new Object();
		data[i]["c"]=$("#c"+i).val();
		data[i]["a"]=$("#a"+i).val();
		data[i]["d"]=$("#d"+i).val();
		data[i]["r"]=$("#r"+i).val();
		data[i]["s"]=$("#s"+i).val();
		data[i]["cod"]=$("#cod"+i).val();
	}
	

	var newData = JSON.stringify(data);
	let dia=$("#dia").val();
	let hora=$("#hora").val();
	let tipo=$("#tipoexa").val();
	let periodo =$("#periodo").val();
	let turno = dia+hora;

	$.ajax({

		type: 'post',
		data: {data:newData,turno:turno,tipo:tipo,periodo:periodo},
		url: '../ajax/ModificarSorteo.php',
		success: function(hol){

			//$("#div-alertify").html(hol);
			$("#div-alertify").html(hol);
		}
		
	});


}
function GuardarSorteo(){
	var data = new Object();
	var t = $("#tabla-sorteo tr").length;
	for( let i = 1;i<t;i++){
		data[i]=new Object();
		data[i]["c"]=$("#c"+i).val();
		data[i]["a"]=$("#a"+i).val();

		data[i]["d"]=$("#d"+i).val();

		if($("#r"+i).length){
			data[i]["r"]=$("#r"+i).val();
		}
	}

	var newData = JSON.stringify(data);
	//console.log(newData);
	let dia=$("#dia").val();
	let hora=$("#hora").val();
	let tipo=$("#tipoexa").val();
	let periodo =$("#periodo").val();
	let turno = dia+hora;

	$.ajax({
		type: 'post',
		data: {data:newData,turno:turno,tipo:tipo,periodo:periodo},
		url: '../ajax/guardarSorteo.php',
		success: function(res){
			//console.log(res);
			
			$("#div-alertify").html(res);
			ComprobarSorteo();
		}
	});
}

function ComprobarSorteo(){

let dia=$("#dia").val();
let hora=$("#hora").val();
let tipo=$("#tipoexa").val();
let periodo=$("#periodo").val();
if (dia!='' && hora!='' && periodo!='' && tipo!=''){

	$.ajax({
		type:'post',
		url:'../ajax/ComprobarSorteo.php',
		data:{dia:dia,hora:hora,periodo:periodo,tipo:tipo},
		success: function(data){

		var resultado=JSON.parse(data);
		if(resultado==0)
		{
			$("#sorte").addClass("btn-outline-success");
			$("#sorte").removeClass("btn-dark");
			$( "#sorte" ).prop( "disabled", false );
			
		}
		else
		{	
			$("#sorte").removeClass("btn-outline-success");
			$("#sorte").addClass("btn-dark");
			$( "#sorte" ).prop( "disabled", true );
		}
		}
		
	});



}



}


		$(document).ready(function(){
			MostrarHora();
			setInterval("MostrarHora()",1000);



		$("#GuardarSorteo").click(function(){

			ComprobarSorteo();
			GuardarSorteo();
			
			
		});

		$("#updateSorteo").click(function(){
			ModificarSorteo();
		});



		function llamarModalSor(){

			$("#modal-sorteo").modal('show');
			
		}

		function MostrarSorteoUpd(){

			let tipo=$("#tipoexa").val();
			let dia=$("#dia").val();
			let hora=$("#hora").val();
			let periodo=$("#periodo").val();
			

			if(tipo!='' && dia!='' && hora!='' && periodo!=''){



				$.ajax({

					type:'post',
					url:'../ajax/tabla_sorteo_update.php',
					data: {tipo:tipo,dia:dia,hora:hora,periodo:periodo},
					success: function(de){
					//tabla-update-sorteo
					$("#tabla-sorteo-update").html(de);
				
					},
					error: function(rew){
						console.log("error",rew);
					},
				});

			}
		}
		
		function MostrarSorteo(){
			let tipo=$("#tipoexa").val();
			let dia=$("#dia").val();
			let hora=$("#hora").val();
			let periodo=$("#periodo").val();

			if(tipo!='' && dia!='' && hora!='' &&periodo!=''){
					$.ajax({

						type: 'post',
						url: '../ajax/tabla_sorteo.php',
						data: {tipo:tipo,dia:dia,hora:hora,periodo:periodo},
						beforeSend:function(){
					
						$("#tabla-sorteo").html("");
						$("#sor").html("<img width='270px' height='270px' src='../img/carga.gif' style='margin: auto;' />");
						
						},
						
						success :function(resp){

							
							
							setTimeout(function(){
							$("#tabla-sorteo").html(resp);
							$("#sor").html("");
							//$('#sor').hide();
							//$("#sor").html("");
						
							},2000);
			
						},
						error: function(respuesta){
							console.log("error",respuesta);
						},

					});
			}

		}

		$("#sorteupd").click(function(){
			MostrarSorteoUpd();
			llamarModalSorUp();

		});


		$("#sorte").click(function(e){

			e.preventDefault();
			
			MostrarSorteo();
			llamarModalSor();
			

		});
		$('#sornew').click(function(e){
			e.preventDefault();
			MostrarSorteo();
		});

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

				$.ajax({

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
	ComprobarSorteo();
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



function llamarModalSorUp(){

$("#modal-upd-sorteo").modal('show');
}


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





	function logout(){
			
			

			alertify.confirm("Salir del Sistema","¿Esta Seguro que desea Salir?",
		  function(){
					alertify.success('Ok');
				location.assign('../model/logout.php')
			},
			function(){
			alertify.error('Cancel');
			
			  });
				
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
				<a href="sorteo2.php" class="nav-item nav-link  ">Registro de Supervision</a>
				<?php }?>
				<a href="RegistroProfesores.php " class="nav-item nav-link ">Registro de Profesores</a>
				
				<span onclick="logout();" href="../model/logout.php" class="nav-item nav-link">Cerrar Sesion</span>

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
					<label class="" for=""><?php echo $_SESSION["id"]; ?></label>
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

					<div class="form-group row m-0">
					<label for="" class="col-sm-4 col-form-label text-center ">PERIODO:</label>
					<div class="col-sm-5 ml-4 mt-2 ">
							<select id="periodo" name="periodox" class="custom-select custom-select-sm">
								<option selected value="">PERIODO</option>
								<option  value="181">2018-1</option>
								<option value="182">2018-2</option>
								<option value="191">2019-1</option>
								<option value="192">2019-2</option>
						
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
	


<div class="col-sm-6 col-md-8 col-lg-6 mb-sm-4" role="document">

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
<div id="div-alertify"></div>
<div class="col-sm-6 col-md-4 col-lg-6  mb-sm-4" role="document">

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
<input type="submit" id="sorte" type="button" class="btn btn-outline-success btn-lg mr-sm-3" value="GENERAR SORTEO" data-toggle="modal" >
<input type="submit" id="sorteupd" type="button" class="btn btn-outline-warning btn-lg" value="MODIFICAR SORTEO"  >

</div>

</div>

<!-- modal del sorteo-->
<div class="modal fade" id="modal-sorteo" tabindex="-1" role="dialog" aria-labelledby="sorteo" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">SORTEO DE DOCENTES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
	  <div id="sor" width="100%" style="text-align: center;"></div>				
      	<table id="tabla-sorteo">
				
		</table>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button type="button" class="btn btn-danger" id="sornew">SORTEAR DE NUEVO</button>
        

        <button type="button" id="GuardarSorteo"  class="btn btn-primary">GUARDAR CAMBIOS</button>
      </div>
    </div>
  </div>
</div>

<!-- modelo de sorteo update-->
<div class="modal fade" id="modal-upd-sorteo" tabindex="-1" role="dialog" aria-labelledby="upd-sorteo" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">MODIFICACION DE SORTEO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive ">

		 <table id="tabla-sorteo-update">
				
		</table>		
     	 
      </div>
      <div class="modal-footer d-flex justify-content-center">
        
        

        <button type="button" id="updateSorteo"  class="btn btn-primary">GUARDAR CAMBIOS</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>