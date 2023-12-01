<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>DAYTONA CARS</title>
  </head>
  <body>
<?php


include ("conexion.php");

$placan=$_POST["placan"];
$placal=$_POST["placal"];
$placa=$placal."-".$placan;


   $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
    mysqli_set_charset($conexion,"utf8");

    $consulta="SELECT id, MARCA, id_client FROM carros WHERE PLACA = '$placa'";
  $resultados=mysqli_query($conexion,$consulta);
$numero= mysqli_fetch_row($resultados);



if($numero!==NULL){
$id_carro=$numero[0];
$marca=$numero[1];
$id_cliente= $numero[2];

$consulta2="SELECT NOMBRES, APELLIDOS FROM clientes WHERE id = $id_cliente";
$resultados2=mysqli_query($conexion,$consulta2);
$numero2= mysqli_fetch_row($resultados2);
$nombre_cliente= $numero2[0];
$apellido_cliente= $numero2[1];
  include("insertar_mantenimiento.php");
}else{

  echo '<script type="text/javascript">
    alert("Placa no encontrada");
    window.location.href="../CONSULTA_MANTENIMIENTO.php";
  </script>';

}





?>
<script type="text/javascript" src="../../js/formulario.js"></script>

</body>
</html>
