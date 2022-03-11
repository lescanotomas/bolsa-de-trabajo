<?php
  include("conexion.php");
  session_start();
  if(empty($_SESSION['usuario'])){
    echo "error";
  }else{
    
  }
  ?>

<?php 
  if($_SESSION['usuario'] == 'alumno'){
    echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
    </div>
  </nav>';
  }

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
            <a  class="btn btn-primary" style="margin-right:1%;" href="ofertas.php" role="button">Generar Ofertas</a>
            <a  class="btn btn-primary" href="verofertas2.php" role="button">Ver tus ofertas</a>

            <form class="form-inline my-2 my-lg-0">
                
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </form>
        </div>         
    </nav>
    <h1 style="width:50%;margin-left:2%;margin-top:2%">Generar Ofertas</h1> 
    
    
    
    <form action="generaroferta.php" method=post>
    <div class="contenedor_form" style="width:50%;margin-left:20%">
        <div class="form-group">
            <label>Imagen de presentacion</label>
            <input type="file" class="form-control" name="imagen">
        <div class="form-group">
            <label>Puesto</label>
            <input class="form-control" type="text" name="puesto">
        </div>
        <div class="form-group">
                <label>Ubicación</label>
                <input class="form-control" type="text" name="ubicacion">
        </div>
        <div class="form-group">
            <label>Descripción </label>
            <input class="form-control" type="text" autocomplete="off" required="" name="descripcion">
        </div>
        <div class="form-group">
            <label>Contacto</label>
            <input class="form-control" type="text" autocomplete="off" required="" name="contacto">
        </div>
        <div class="form-group">
            <label>Remuneración</label>
            <input class="form-control" type="text" autocomplete="off" required="" name="remuneracion">
        </div>
        <hr>
        <div class="form-row">
            <div class="col-md-12 content-right">
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $row['usuario']?>">
            <button class="btn btn-primary form-btn" type="submit">GUARDAR</button>
            <button class="btn btn-danger form-btn" type="reset">CANCELAR </button>
        </div>
      </form>
                </div>
    </div>
    
    
    
    
    
    
    
    </form>
    <?php
             }
     } else {
        printf('No record found.<br />');
     }
     mysqli_free_result($envio);
    
?>
</body>
</html>
