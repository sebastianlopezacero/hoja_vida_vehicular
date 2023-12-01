<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">

    <title>DAYTONA CARS</title>
  </head>
  <body>
<?php
include ("conexion.php");

$cedula=$_POST["identificacion"];
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
    mysqli_set_charset($conexion,"utf8");


    $consulta="SELECT * FROM clientes WHERE IDENTIFICACION = $cedula";
  $resultados=mysqli_query($conexion,$consulta);
$numero= mysqli_fetch_row($resultados);

if($numero!==NULL){
  echo '<script type="text/javascript">
    alert("Usuario registrado");
    window.location.href="../CONSULTA_CLIENTES.php";
  </script>';

}else{

    include("../INSERTAR_CLIENTES.php");

}

   ?>


  </body>
</html>
