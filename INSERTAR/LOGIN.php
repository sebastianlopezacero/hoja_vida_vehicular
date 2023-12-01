<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/estilos.css">

      <title>INSERTAR CLIENTE</title>


      <title>DAYTONA CARS</title>
</head>

<body>


  <?php
  if(!isset($_POST["entrar"])){
echo '<div class="contenedor-formulario">
<div class="wrap">
<!-- FORMULARIO -->
<form class="formulario" name="formulario_registro" action="'. $_SERVER['PHP_SELF'].'" method="post">
<!-- NOMBRE -->
<div class="">
<div class="input-group">
<input type="text"  id="usuario" name="usuario" value="">
<label class="label" for="nombre">Nombre:</label>
</div>
<!-- CONTRASEÑA -->
<div class="input-group">
<input type="password"  id="pass" name="pass" value="">
<label class="label" for="pass">Contraseña:</label>
</div>

<div class="">

<p><a href="INSERTAR_PERSONAL.php">¿USUARIO NO REGISTRADO?</a></p>
<br>
</div>

<!-- ENVIAR -->
<input type="submit" id="btn-submit" name="entrar" value="Ingresar">
<br>
<br>
<a href="../index.php"><input type="button" name="volver" value="Volver"></a>

</div>
</form>
</div>
</div>
';
}
?>

<?php

// include("../LOGIN.php");

if(isset($_POST["entrar"])){


try{
$base=new PDO("mysql:host=localhost; dbname=daytona", "root", "");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql="SELECT * FROM login WHERE NOMBRE=  :login AND CONTRASENA= :password";
$resultado=$base->prepare($sql);
$usuario=htmlentities(addslashes($_POST["usuario"]));
$password=htmlentities(addslashes($_POST["pass"]));
$resultado->bindValue(":login",$usuario);
$resultado->bindValue(":password",$password);
$resultado->execute();
$numero_registro=$resultado->rowCount();

if ($numero_registro!=0) {
  session_start();
  $_SESSION["usuario"]=$_POST["usuario"];

    echo "bien";
        header("Location:../BUSQUEDA/PRINCIPAL.php");
}else{
  echo
  '<script type="text/javascript">
  alert("Usuario o contaseña erroneos ");
    </script>';
}
}catch(Exception $e){
die("Error: ". $e->getLine());
}
}

?>



  <script src="../js/formulario.js"></script>
</body>
</html>
