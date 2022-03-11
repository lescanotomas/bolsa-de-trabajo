<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">



<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"       aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item"></li>
            </ul>
            <a style="margin-right:1%;" class="btn btn-primary" href="ofertas.php" role="button">Generar Ofertas</a>
            <a  class="btn btn-primary" href="inicio.php" role="button">Buscar Usuarios</a>
            
            <form class="form-inline my-2 my-lg-0">
                
                <a class="nav-link" href="cerrar_sesion.php">Cerrar sesion</a>
            </form>
        </div>         
    </nav>


<?php

session_start();
if(empty($_SESSION['usuario'])){
   echo "<p>Usted no está logueado.</p>";
}else{
    
  


include('conexion.php');



    $sql = "SELECT * FROM ofertas WHERE usuario='".$_SESSION["usuario"]."'";


    $envio = $conexion->query($sql);
    if ($envio->num_rows > 0) {
        while($row = $envio->fetch_assoc()) {
        ?>


    
    <div class="card" style="margin-top:3%; margin-left:3% ;width: 18rem;float:left">
    <img src="http://localhost/bolsadetrabajo/assets/img/<?php echo $row['imagen']?>">
    <div class="card-body">
        <h3 style="text-align:left;margin-top:20px;font-family:'Open Sans', sans-serif;font-size:18px;margin-right:0;margin-left:24px;line-height:34px;letter-spacing:0px;font-style:normal;font-weight:bold;"><?php echo $row['puesto']; ?>
        <p class="text-secondary" style="text-align:left;font-size:14px;font-family:'Open Sans', sans-serif;line-height:22px;color:rgb(9,9,10);margin-left:24px;"><?php echo $row['descripcion'];?></p><a class="h4" href="#"></a>
        <p class="text-secondary" style="text-align:left;font-size:14px;font-family:'Open Sans', sans-serif;line-height:22px;color:rgb(9,9,10);margin-left:24px;"><?php echo $row['ubicacion'];?></p><a class="h4" href="#"></a>
        <p class="text-secondary" style="text-align:left;font-size:14px;font-family:'Open Sans', sans-serif;line-height:22px;color:rgb(9,9,10);margin-left:24px;"><?php echo $row['contacto'];?></p><a class="h4" href="#"></a>
        <p class="text-secondary" style="text-align:left;font-size:14px;font-family:'Open Sans', sans-serif;line-height:22px;color:rgb(9,9,10);margin-left:24px;"><?php echo $row['remuneracion'];?></p><a class="h4" href="#"></a>
        <a href="#" class="btn btn-primary">Postularme</a>
        <a class="btn btn-primary" href="#" name="eliminar" role="button" type="submit">Eliminar</a>
    </div>
    </div>
            
            
            
            
        </div>
            <?php
             }
     } else {
        printf('No record found.<br />');
     }
     mysqli_free_result($envio);
    }
