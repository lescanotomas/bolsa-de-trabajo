
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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



<?php
include('conexion.php');

    $especialidad = $_GET['especialidad'];
    $promedio = $_GET['promedio'];

    $sql = "SELECT * FROM usuarios where especialidad = '".$especialidad."' and promedio = ".$promedio;


    $envio = $conexion->query($sql);
    if ($envio->num_rows > 0) {
        while($row = $envio->fetch_assoc()) {
            ?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<div class="card" style="width: 18rem;margin-left:3%;margin-top:1%;float:left">
  <img class="card-img-top" src="http://localhost/bolsa-de-trabajo/assets/img/<?php echo $row['imagen']?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
    <p class="card-text" style="color:rgb(9,9,10)"><?php echo $row['descripcion'];?></p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $row['email'];?></li>
  </ul>
  <div class="card-body">
    <a href="tepostulaste.php" class="card-link">Contactar</a>
    <a href="#" class="card-link">Eliminar</a>
  </div>
</div>

            <?php
             }
     } else {
        printf('No record found.<br />');
     }
     mysqli_free_result($envio);
     ?>

