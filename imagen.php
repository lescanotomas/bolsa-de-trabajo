<?php
  session_start();
  if(empty($_SESSION['usuario'])){
    echo "<p>error</p>";
  }else{
    
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="contenedor_form" style="width:50%;margin-left:20%;margin-top:10%">
<form style='' method="post" action="cambiarImagen.php" enctype='multipart/form-data'>
<div class="form-group">
            <label>Seleccionar imagen de presentación</label>
            <input type="file" class="form-control" name="imagen">
        </div>
        <div class="form-group">
            <label>Email </label>
            <input class="form-control" type="email" autocomplete="off" required="" name="email" value="<?php echo $row['email']?>">
        </div>
        <div class="form-group">
            <label>Ingrese contraseña para confirmar</label>
            <input class="form-control" type="password" autocomplete="off" required="" name="pwd">
        </div>
        <button class="btn btn-primary form-btn" type="submit">Guardar</button>
        <button class="btn btn-danger form-btn" id="closebtn" type="button" onclick="closeBtnClicked()">Cancelar</button>

        <script>
            function closeBtnClicked(){
            window.close();
            }
        </script>

</form>
</body>
</html>

<?php
             }
     } else {
        printf('No record found.<br />');
     }
     mysqli_free_result($envio);
?>