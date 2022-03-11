<?php 
    include("conexion.php");

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $tipousuario = $_POST['tipousuario'];

    
    $query = "INSERT INTO usuarios (usuario, pwd, tipousuario, email) VALUES ('$usuario','$pwd','$tipousuario','$email')";
    $envio = $conexion->query($query);
    

    header("Location:index.php");
?>
