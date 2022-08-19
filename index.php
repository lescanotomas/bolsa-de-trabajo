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
            $perfilCreado['perfilCreado'] = $row['perfilCreado'];

						if($_SESSION['tipousuario'] == 'empresa'){
							header("Location:inicio.php");
						}
						if($_SESSION['tipousuario'] == 'alumno' && $perfilCreado['perfilCreado'] == 0){
							header("Location:inicio2.php");
						} else {
              header("Location:verofertas.php");
            }
						
						}
	else{
    echo"<div class='alert alert-danger' role='alert'>Datos incorrectos y/o inexistentes. Intente de nuevo.</div>";
  }

}
?>






<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php
      include("conexion.php");
     ?>
      
      <form style="width:30%;margin-left:50%;margin-top:5%; position:absolute;"  method="POST">
      <h1>Iniciar Sesion</h1><br><br>
          <div class="form-group">
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" class="form-control" placeholder="Ingrese su nombre" required>
          </div>
          <div class="form-group">
            <label for="pwd">Contraseña</label>
            <input type="password" name="pwd" class="form-control" placeholder="Ingrese su contraseña" required>
          </div>
          <button type="submit" class="btn btn-primary" style="width:100%;">Iniciar Sesion</button>
      </form>

      <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title>Registros</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">

      </li>
      <li class="nav-item">
 
      </li>
      <li class="nav-item">
      </li>
    </ul>
   </div>
  </nav>
  <h3 style="font-size: 54px;
    margin-left: 5%;
    margin-bottom: 4%;
    float: none;">Registrarse</h3>
    <form style="width:30%; margin-left:5%; margin-top:5%; border:1px solid #006cff; padding:2%;" method="post" action="guardarUsuario.php">
      <div class="form-group">
        <label>Usuario </label>
        <input type="text" name="usuario" id='usuario' class="form-control">
      </div>
      <div>
        <label>Correo</label>
        <input type="text" name="email" class="form-control" id='email'>
      </div>
      <div>
        <label>Contraseña</label>
        <input type="password" name="pwd" class="form-control" id='pwd'>
      </div>
      <br>
      <label for="tipo" >Tipo de Usuario:</label>
                        <select id="tipo" name="tipousuario">
                        <option value="alumno">Alumno</option>
                        <option value="empresa">Empresa</option>
                        
                        </select>
      <br>
      <br>
      <button type="submit" class="btn btn-primary">Registrarse</button>
    </form>
  </body>
</html>


<?php?>


