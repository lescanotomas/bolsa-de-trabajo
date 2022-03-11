<?php
if (isset($_POST["usuario"])&&isset($_POST["pwd"]))
{
	include("conexion.php");
	$query = "SELECT * FROM usuarios WHERE usuario='".$_POST["usuario"]."' and pwd='".$_POST["pwd"]."'";
	$envio = $conexion->query($query);
	if (($envio->num_rows)>0){
						$row = $envio->fetch_assoc();
						session_start();
						$_SESSION['usuario']=$_POST["usuario"];
						$_SESSION['tipousuario'] = $row['tipousuario'];

						if($_SESSION['tipousuario'] == 'empresa'){
							header("Location:inicio.php");
						}
						if($_SESSION['tipousuario'] == 'alumno'){
							header("Location:inicio2.php");
						}
						
						}
	else{
    header("Location:errorLogin.php");

	
  }
}

?>