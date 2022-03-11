<?php
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
            <a  class="btn btn-primary" href="ofertas.php" role="button">Generar Ofertas</a>

            <form class="form-inline my-2 my-lg-0">
                
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </form>
        </div>         
    </nav>
    <h1 style="width:50%;margin-left:2%;margin-top:2%">Selección de Usuarios</h1> 
    <form action="buscaralumno.php">
    <label style="margin-left:2%;margin-top:5%"  for="tipo" >Especialidad:</label>
                        <select id="tipo" name="especialidad" >
                        <option value="">Seleccionar...</option>
                        <option value="computacion">Computación</option>
                        <option value="mecanica">Mecanica</option>
                        <option value="automotriz">Automotríz</option>
                        
                        </select>
    <div style="width:20%;margin-left:20%;margin-top:-2%">
    
    <label  for="tipo" >Nota:</label >
                        <select id="tipo" name="promedio" multiple class="form-control">
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        </select> 
    </div>

    <div style="margin-left:32%;margin-top:-2%">
    
                        <button  class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
    </div>
           
    
    
    </form> 
    
</body>
</html>
