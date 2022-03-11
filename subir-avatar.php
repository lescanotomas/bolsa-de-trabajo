<?php
session_start();
if( $_SESSION["loggedin"] = false){
    header("error.php");
}else{
include('basededatos.php');
        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["avatar-file"]["name"]);
        $uploadOk = 1;
        $archivo_nombre = basename($_FILES["avatar-file"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["avatar-file"]["tmp_name"]);
        if($check !== false) {
            echo "El Archivo es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
            // Create connection
        $usuario = $_SESSION['username'];
        $sql = "UPDATE login_register SET imagen ='$archivo_nombre' WHERE correo = '$usuario';";
        echo $sql;
        if ($mysqli->query($sql) === TRUE) {
        echo "Se subió correctamente";
        } else {
        echo "Error al subir: " . $mysqli->error;
        }

        $mysqli->close();
    
        } else {
            echo "El archivo no es una imagen .";
            $uploadOk = 0;
        }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
        echo "El archivo ya existe.";
        $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["avatar-file"]["size"] > 500000) {
        echo "El archivo es demasiado grande.";
        $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Solo se permiten archivos tipo JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
        echo "El archivo no fue subido .";
        // if everything is ok, try to upload file
        } else {
        if (move_uploaded_file($_FILES["avatar-file"]["tmp_name"], $target_file)) {
            echo "El archivo ". htmlspecialchars( basename( $_FILES["avatar-file"]["name"])). " Se subió correctamente.";
        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
}
?>