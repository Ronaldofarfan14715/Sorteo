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
	<link rel="stylesheet" type="text/css" href="../js/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../js/css/themes/default.css">

	
	<script src="../js/alertify.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
	<script type="text/javascript">
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




</html>