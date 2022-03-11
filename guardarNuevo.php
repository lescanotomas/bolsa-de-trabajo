<?php 
    include("conexion.php");

    $puesto = $_POST['puesto'];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $contacto = $_POST['contacto'];
    $email= $_POST['email'];
    $remuneracion = $_POST['remuneracion'];
    $tipodemoneda = $_POST['tipodemoneda'];
    $query = "INSERT INTO ofertas (puesto, imagen, ubicacion, descripcion, contacto, email, remuneracion, tipodemoneda) VALUES ('$puesto','$imagen', '$ubicacion','$descripcion','$contacto','$email', '$remuneracion','$tipodemoneda')";
    //echo $query;
    $envio = $conexion->query($query);
    

    header("Location:verofertas2.php");
?>
