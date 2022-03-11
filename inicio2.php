<?php
  session_start();
  if(empty($_SESSION['usuario'])){
    echo "<p>Usted no está logueado.</p>";
  }else{
    
  
  ?>

<?php 
	include("conexion.php");
	$query = "SELECT * FROM usuarios WHERE usuario='".$_SESSION["usuario"]."'";
	$envio = $conexion->query($query);
  if ($envio->num_rows > 0) {
      while($row = $envio->fetch_assoc()){
?>

<!DOCTYPE html>
<html>
<head>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  
  <style>
    .contenedor_form{}
  
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"       aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"></li>
            </ul>
            <a  class="btn btn-primary" href="verofertas.php" role="button">Ver Ofertas</a>

            <form class="form-inline my-2 my-lg-0">
                
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </form>
        </div>         
    </nav>
    <div class="contenedor_form" style="width:50%;margin-left:20%">
    
        <br>
        <h1>Tus Datos</h1>
        
        <div  class="form-row">
        <form style='' method="post" action="modificarPerfil.php" enctype='multipart/form-data'>
                 <label>Imagen de Presentacion</label><br>
                 <img src="assets/img/<?php echo$row['imagen']?>" width="200" onerror="this.onerror=null; this.src='Default.jpg'" alt="">
                 <hr>
        </div>
        <div class="form-group">
            <label>Seleccionar imagen de presentación</label><br>
            <input class="btn btn-primary form-btn" onclick="window.open('imagen.php','mywindow', 'menubar=1,resizable=1,width=500,height=500')" type="button" value="Seleccionar una imagen">
        </div>
        
        <div class="form-group">
            <label>Nombre y Apellido</label>
            <input class="form-control" type="text" name="nombre" value="<?php echo $row['nombre']?>">
        </div>
        <div class="form-group">
        <label for="tipo" >Especialidad (Mecanica/Computación/Automotores)</label>
          <input class="form-control" type="text" name="especialidad" value="<?php echo $row['especialidad']?>">
        </div>
        <div class="form-group">
        <label for="quantity">Promedio</label><br>
        <input type="number" id="quantity" name="promedio" min="5" max="10" value="<?php echo $row['promedio']?>">
        </div>
        <div class="form-group">
                <label>Descripción</label>
                <input class="form-control" type="text" name="descripcion" value="<?php echo $row['descripcion']?>">        
        </div>

        <div class="form-group">
            <label>Email</label>
            <input class="form-control" type="email" autocomplete="off" required="" name="email" value="<?php echo $row['email']?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label>Confirmar contraseña para guardar</label>
            <input class="form-control" type="password" autocomplete="off" required="" name="pwd">
        </div>

        <hr>
        <div class="form-row">
            <div class="col-md-12 content-right">
            <button class="btn btn-primary form-btn" type="submit">GUARDAR</button>
            <button class="btn btn-danger form-btn" type="reset">CANCELAR </button>
        </div>
        </form>
                </div>
        
    
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/Profile-Edit-Form.js"></script>

</body>
</html>

<?php
             }
     } else {
        printf('No record found.<br />');
     }
     mysqli_free_result($envio);
    }
?>