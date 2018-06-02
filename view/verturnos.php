<?php 

    session_start();
    if($_SESSION["id"]==0){
        header("location:index.html");
    }else{
        header("Expires: Tue, 01 Jul 2001 06:00:00 GMT");
	header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	header("Cache-Control: no-store, no-cache, must-revalidate");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	 <script src="../js/validar.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="../js/chkvalidar.js"></script>
	<script src="../js/desabilita_div_horarios.js"></script>
	

	
	<link rel="stylesheet" type="text/css" href="../js/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../js/css/themes/default.css">

	
	<script src="../js/alertify.js"></script>
		

	<script>
		$(document).ready(function(){

			$('#doc').on('change', function(){
 			var val = $(this).val();
  			var name = $('#doc option:selected').text();
  			if($(this).val()==""){
  				$("#kevin").html(null);
  			}else{

  				$("#kevin").html(name);
  			}
  		});

		function getturnos(){
			for(let i = 1; i<6; i++){
				for (let j = 8; j<17; j+=2) {
				$("#"+i+j).prop("checked",false);
				$("#"+i+j).prop("disabled",true);
			}
			
		}
	
			let doc=$("#doc").val();
			let tipo=$("#tipo-id").val();
			if(doc!='' && tipo!=''){
				$.ajax({
				type:'post',
				url:'../ajax/turnos.php',
				data:{dni:doc,tipo:tipo},
				success:function(res){
					$('#turnos-id').val(res);}
				});
			}else{
				$('#turnos-id').val('');
			}
		}

		$(document).on("change","#doc",function(){
			getturnos();
			let turnoid = $('#doc').val();
					
			$.ajax({
				

				method: 'post',
				data: {id:turnoid},
				url: '../ajax/turnos_registrados.php',
				
				success: function(res){
					$("#tabla-id").html(res);
				},
				error: function(res){

					alert("error");
				}

					

			});
		});

});



	$(document).on('change','#doc',function(){

  			
			



		});
	</script>



</head>

<body>
<form id="noform"></form>
<?php

require_once("../model/conexion.php");
require_once("../model/mostrar_profesores.php");

$con=new Conexion();
$con->Conexion();


?>


	
	<nav class="navbar navbar-expand-lg  navbar-dark bg-dark sticky-top ">

		<a class="navbar-brand" href="administrador.php">
			<img src="../img/logo.png" width="40" height="40" class="d-inline-block align-top float-left" alt="">
			<span class="navbar-brand text-muted">OERAAE</span>
			<div id="alerta-id"></div>
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
		<h2 class="h2 mt-3 text-center text-danger">TURNOS DE PROFESORES</h2>



		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">DATOS</h5>

				</div>

				<div class="modal-body ">
				
<form class="was-validated" id='form-1' method="post" action="">
					<div class="form-group">
						<input type="text"  name="id"  hidden="" value="<?php echo $_SESSION["id"]; ?>">
					<label for="">DOCENTES</label>
					<select id="doc" class="custom-select" required disabled="true" name="nombre_profesores">



					<option value="">Abrir para ver todos los docentes</option>

				<?php
				$obj=new Nombre_profesores();
				$sql="SELECT * FROM docentes 
INNER JOIN supervision_docente ON docentes.DNI=supervision_docente.DNI WHERE supervision_docente.DNI= ".$_SESSION['id']." ";

				$datos=$obj->mostrardatos($sql);
				foreach ($datos as $key) {
				  
				?>
					<option value=<?php  echo $key['DNI'];?>>
				<?php 
				echo $key['APELLIDO_PATERNO'];
				echo $key['APELLIDO_MATERNO'];
				echo  ", ". $key['NOMBRE'];
				 ?>
				</option>			
					<?php
					}	  
				?>t

					</select>

					<div class="invalid-feedback">Elige uno de las opciones</div>
				</div>


						<div class="form-group">
							<label for="">TIPO DE EXAMEN</label>
							<select  class="custom-select" required id="tipo-id" name="tipo_examen">
								<option value="">Abrir para ver los tipo de examenes</option>
								<option value="FINAL">FINALES</option>
								<option value="PARCIAL" selected>PARCIALES</option>
								<option value="SUSTI">SUSTITUTORIOS</option>
							</select>
							<div class="invalid-feedback">Elegir un tipo de examen </div>
						</div>

						<div class="row col-12 d-flex justify-content-between ">
							<div class="custom-control custom-checkbox mb-3 ">
								<input type="checkbox" class="custom-control-input " id="habilitar" required form="noform">
								<label class="custom-control-label" for="habilitar">HABILITAR LISTA DE DOCENTE</label>


								<div class="invalid-feedback col-5">Habilitar para ver la lista de docentes</div>


							</div>
							<div class="col-2-md ml-3">
								<label class="text-center-sm ml-4" for="">TOTAL DE TURNOS:</label>
								<input  name="N_turnos" readonly="true" type="text"  value="" class="form-control" id='turnos-id' style="background: lightgray;" required>
							</div>

						</div>


				</div>

	
			</div>
		</div>


		<div class="modal-dialog modal-lg" role="document" id="div-horarios">
			<div class="modal-content">
				<div class="modal-header">

					<h2 class="text-center text-muted ">HORARIO</h2>

					<hr>
					<h5 id="kevin"> </h5>


				</div>

				<div class="modal-body">
					<div class="table-responsive-lg" id="tabla-id">

							
					</div>
				</div>
			</div>
		</div>

		<div class="form-group d-flex justify-content-center m-2">
			<input type="submit" class="btn btn-success m-2" value="GUARDAR" id="btn-submit" disabled="true" name="btnenviar">
			<a href='./imprimir.php'><button class="btn btn-success m-2" form="###">IMPRIMIR</button></a>
		</div>
	</div>
</form>
</body>

</html>