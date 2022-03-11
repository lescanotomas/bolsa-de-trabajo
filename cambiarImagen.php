<?php
// 7 de marzo - falta corregir imagenes que se suben aunque no haya nada

if( $_SESSION["loggin"] = false){
    header("login.php");
}else{
include('conexion.php');
        //donde se van a guardar las imagenes
        $target = "assets/img/";
        $target = $target . basename( $_FILES['imagen']['name']);

        //obtiene nombre del archivo
        $pic=($_FILES['imagen']['name']);


        //sube el archivo al server
        if(move_uploaded_file($_FILES['imagen']['tmp_name'], $target))
        {

        //chequea si está todo ok
        echo "El archivo ". basename( $_FILES['imagen']['name']). " ha sido subido, y su información ha sido actualizada correctamente";
        }
        else {

        //error si hay algun problema
        echo "Se ha eliminado su imagen de presentación.";
        }



        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $query = "UPDATE usuarios SET imagen='$pic' WHERE email='$email' and pwd='$pwd'";
        $envio = $conexion->query($query);
}

?>

<script type="text/javascript">
    var contador = 6; // Segundos
    var redirecciona = "inicio2.php";
     
    function temporizador(){
        var mensaje = document.getElementById("mensaje");
        if(contador > 0){
            contador--;
            mensaje.innerHTML = "Esta ventana se cerrará en "+contador+" segundos.";
            setTimeout("temporizador()", 1000);
        }else{
            window.close();
        }
    }
</script>
<br>
<span id="mensaje">
    <script type="text/javascript">temporizador();</script>
</span>


















