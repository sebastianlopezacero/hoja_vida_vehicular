
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

include("../INSERTAR_CLIENTES.php");

if(isset($_POST["registrar"])){

$nombre=$_POST["nombre"];
$apellido=$_POST["apellido"];
$identificacion=$_POST["identificacion"];
$direccion=$_POST["direccion"];
$email=$_POST["email"];
$sexo=$_POST["sexo"];
$fecha=$_POST["fecha"];
$celular=$_POST["celular"];




// Día del mes con 2 dígitos, y con ceros iniciales, de 01 a 31
date_default_timezone_set("America/Bogota");

$fecha_ingreso=date("Y-m-d");
// echo "$fecha_ingreso";
//




//---- conexion con base de datos ---------
include ("conexion.php");
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
  mysqli_set_charset($conexion,"utf8");
//----------------------------------------------------------------------------


  //------------------METEMOS DATOS ----------------------------------------------
  $insetar= "INSERT INTO clientes (NOMBRES, APELLIDOS, CELULAR, IDENTIFICACION, SEXO, CORREO, DIRECCION, FECHA_NACIMIENTO, FECHA_INGRESO) VALUES ('$nombre', '$apellido', $celular, $identificacion, '$sexo', '$email', '$direccion', '$fecha', '$fecha_ingreso')";
  $resultados=mysqli_query($conexion,$insetar);

if($resultados!=FALSE){
  echo '<script type="text/javascript">
    alert("Usuario registrado");
    </script>';
}



  //------------------------------------------------------------------------------

}
 ?>
</body>
</html>
