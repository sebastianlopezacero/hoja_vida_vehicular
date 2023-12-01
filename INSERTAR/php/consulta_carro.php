<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>INSERTAR CARRO</title>
  </head>
  <body>
<?php
include ("conexion.php");

$cedula=$_POST["cedula"];
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
    mysqli_set_charset($conexion,"utf8");

//MUESTRA ALGO EN ESPECIAL
//   $sql="SELECT id, NOMBRES, APELLIDOS FROM clientes WHERE IDENTIFICACION = :cedula";

    $consulta="SELECT id, NOMBRES, APELLIDOS FROM clientes WHERE IDENTIFICACION = $cedula";
  $resultados=mysqli_query($conexion,$consulta);
$numero= mysqli_fetch_row($resultados);

if($numero!==NULL){
  $id=$numero[0];
  $nombre= $numero[1];
  $apellido= $numero[2];
  include("insertar_carros.php");
}else{

  echo '<script type="text/javascript">
    alert("Usuario no encontrado");
    window.location.href="../CONSULTA_CARRO.php";
  </script>';

}


  mysqli_close($conexion);
   ?>

  <script src="../../js/formulario.js"></script>
  </body>
</html>
