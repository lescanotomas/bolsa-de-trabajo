<?php
if($_SESSION['empresa'] = false){
    header("login.php");
}else{

include("conexion.php");

    $puesto = $_POST['puesto'];
    $ubicacion = $_POST['ubicacion'];
    $descripcion = $_POST['descripcion'];
    $contacto = $_POST['contacto'];
    $remuneracion = $_POST['remuneracion'];
    $imagen = $_POST['imagen'];
    $usuario= $_POST['usuario'];


    
    $query = "INSERT INTO ofertas (puesto, ubicacion, descripcion, contacto, remuneracion, imagen, usuario) VALUES ('$puesto','$ubicacion','$descripcion','$contacto','$remuneracion','$imagen','$usuario')";
    $envio = $conexion->query($query);

    $target_dir = "assets/img/";
    $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
    $uploadOk = 1;
    $archivo_nombre = basename($_FILES["imagen"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imagen"]["tmp_name"]);
    if($check !== false) {
        echo "El Archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
        // Create connection
    $usuario = $_SESSION['empresa'];
    $sql = "INSERT INTO ofertas (imagen) VALUES ('$imagen')";
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
    if ($_FILES["imagen"]["size"] > 50000000) {
    echo "El archivo es demasiado grande.";
    $uploadOk = 0;
    }

   

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    echo "El archivo no fue subido .";
    // if everything is ok, try to upload file
    } else {
    if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
        echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " Se subió correctamente.";
        header("refresh:5;url=home.php");

    } else {
        echo "Hubo un error al subir el archivo.";
    }
}
}

    header("Location:verofertas2.php");
?>

