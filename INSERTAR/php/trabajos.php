
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">

    <title>INGRESO TRABAJO</title>
  </head>
  <body>


<?php




include("../MANTENIMIENTO.php");
if(isset($_POST["guardar"])){
$trabajo= $_POST['trabajo'];

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
  $insetar= "INSERT INTO trabajos (DESCRIPCCION) VALUES ('$trabajo')";
  $resultados=mysqli_query($conexion,$insetar);
   // header("location:../login.html");

}


 ?>

</body>



</html>
