<?php 




session_start();

if(isset($_SESSION["id"])){
session_destroy();
	
echo "<script> window.location.href = '../view/index.html' </script>";
}else{
echo "mal";
}





?>