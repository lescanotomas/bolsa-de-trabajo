<?php
  session_start();
  if(empty($_SESSION['usuario'])){
    echo "error";
  }else{
  }
  ?>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"       aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"></li>
            </ul>
            <a style="margin-right:1%;" class="btn btn-primary" href="verofertas.php" role="button">Ver Ofertas</a>
            <a   class="btn btn-primary" href="inicio2.php" role="button">Modificar Perfil</a>
            <form class="form-inline my-2 my-lg-0">
                
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </form>
        </div>         
    </nav>


<?php


        ?>

            

<?php
include("conexion.php");

$query = "SELECT * FROM usuarios WHERE usuario = '".$_SESSION['usuario']."'";
$envio = $conexion->query($query);
$row = $envio->fetch_assoc();
//}
/**
* This example shows making an SMTP connection with authentication.
*/
//Import the PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
require './src/Exception.php';
require './src/PHPMailer.php';
require './src/SMTP.php';
$mail = new PHPMailer();
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
// SMTP::DEBUG_CLIENT = client messages
// SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = SMTP::DEBUG_OFF;
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 25;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = 'trabajoeiai@gmail.com';
//Password to use for SMTP authentication
$mail->Password = 'Et32TR@B4J0';
//Set who the message is to be sent to
$mail->addAddress('trabajoeiai@gmail.com', 'John Doe');
//Set the subject line
$mail->Subject = 'DATOS DEL ALUMNO';
//$mail->Body = "Hola, esta es tu contraseña. Si deseas cambiarla, podés hacerlo desde la página." . "$clave"; // Mensaje a enviar
$mail->Body =" Hola, estos son los datos del alumno ".$row['nombre']." de la especialidad ".$row['especialidad'].", quien posee un promedio de ".$row['promedio']; // Mensaje a enviar



if (!$mail->send()) {
echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
  echo  '<h1 style="width:50%;margin-left:2%;margin-top:2%" >Te postulaste correctamente!!!</h1> 
    </div>';
}
