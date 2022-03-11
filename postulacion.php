<?php

include("conexion.php");

    $contacto = $_POST['contacto'];
    $email = $_POST['email'];
    
    



    
    $query = "INSERT INTO ofertas (puesto, ubicacion, descripcion, contacto, remuneracion, imagen) VALUES ('$puesto','$ubicacion','$descripcion','$contacto','$remuneracion','$imagen')";
    $envio = $conexion->query($query);


    header("Location:verofertas2.php");
?>
