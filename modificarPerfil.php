<?php
// 7 de marzo - falta corregir imagenes que se suben aunque no haya nada

if( $_SESSION["loggin"] = false){
    header("login.php");
}else{
include('conexion.php');




        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $especialidad = $_POST['especialidad'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $promedio = $_POST['promedio'];

        $query = "UPDATE usuarios SET nombre='$nombre',descripcion='$descripcion',especialidad='$especialidad',promedio='$promedio' WHERE email='$email' and pwd='$pwd'";
        $envio = $conexion->query($query);
}


/*



        $target_dir = "assets/img/";
        $target_file = $target_dir . basename($_FILES["imagen"]["name"]);
        $uploadOk = 1;
        $archivo_nombre = basename($_FILES["imagen"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Verifica la imagen
        if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagen"]["tmp_name"]);
        if($check !== false) {
            echo "El Archivo es una imagen - " . $check["mime"] . ".";
            $uploadOk = 1;
            // Crea la conexion con la base de datos
        $sql = "INSERT INTO usuarios SET imagen ='$archivo_nombre' WHERE email='$email' and pwd='$pwd'";
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
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $target_file)) {
            echo "El archivo ". htmlspecialchars( basename( $_FILES["imagen"]["name"])). " Se subió correctamente.";


        } else {
            echo "Hubo un error al subir el archivo.";
        }
    }
*/
?>

<script type="text/javascript">
    var contador = 6; // Segundos
    var redirecciona = "inicio2.php";
     
    function temporizador(){
        var mensaje = document.getElementById("mensaje");
        if(contador > 0){
            contador--;
            mensaje.innerHTML = "Redireccionando en "+contador+" segundos.";
            setTimeout("temporizador()", 1000);
        }else{
            window.location.href = redirecciona;
        }
    }
</script>
    Su información ha sido actualizada.
<br>
<span id="mensaje">
    <script type="text/javascript">temporizador();</script>
</span>


















<?php /*
    include("basededatos.php");

    $correo = $_REQUEST['correo'];
    $pwd = $_REQUEST['contraseña'];

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    //$imagen = $_FILES['imagen']['tmp_name'];
    //$imagen = addslashes(file_get_contents($imagen));


    
    $query = "UPDATE user SET nombre='$nombre',descripcion='$descripcion' WHERE correo='$correo' and contraseña='$pwd'";

    $envio = $conexion->query($query);
    

    */
?>