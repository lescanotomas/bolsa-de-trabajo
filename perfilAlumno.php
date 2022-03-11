<?php
include('conexion.php');

       $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
       $nombre = $_POST['nombre'];
       $descripcion = $_POST['descripcion'];
       $email = $_POST['email'];
       $especialidad = $_POST['especialidad'];
       $promedio = $_POST['promedio'];

       $query = "INSERT INTO usuarios (imagen, nombre, descripcion, email, especialidad, promedio) VALUES ('$imagen','$nombre','$descripcion','$email','$especialidad','$promedio')";


       $envio = $conexion->query($query);
    


       header("Location:inicio2.php");
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      ?>