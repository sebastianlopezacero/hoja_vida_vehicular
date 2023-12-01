
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






include("../INSERTAR_CARRO.php");

if(isset($_POST["enviar"])){
// $cedula=$_POST["cedula"];
$marca=$_POST["marca"];
$linea=$_POST["linea"];
$modelo=$_POST["modelo"];
$placal=$_POST["placal"];
$placan=$_POST["placan"];
$color=$_POST["color"];
$ciudad=$_POST["ciudad"];
$km=$_POST["km"];
$servicio=$_POST["servicio"];
$clase=$_POST["clase"];
$fecha_soat=$_POST["fecha_soat"];
$fecha_tecno=$_POST["fecha_tecno"];
$placa=$placal."-".$placan;



// Día del mes con 2 dígitos, y con ceros iniciales, de 01 a 31
$fecha= date("Y")."-".date("m")."-".date("d");
// echo "$fecha_ingreso";


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
//INSERT INTO `carros` (`id`, `id_client`, `MARCA`, `MODELO`, `CLASE`, `SERVICIO`, `COLOR`, `CIUDAD`, `KM`, `FECHA`, `PLACA`) VALUES (NULL, '6', 'osram', '2015', 'chevrolet', 'particular', 'vrede', 'bogot', '200', '2020-04-22', 'dsf236');

  //------------------METEMOS DATOS ----------------------------------------------
  $insetar= "INSERT INTO carros (id_client, MARCA, LINEA, MODELO, CLASE, SERVICIO, COLOR, CIUDAD, KM, FECHA, PLACA, FECHA_SOAT, FECHA_TECNO ) VALUES (
                                $id, '$marca', '$linea', $modelo, '$clase', '$servicio', '$color', '$ciudad', $km, '$fecha', '$placa', '$fecha_soat', '$fecha_tecno')";
    $resultados=mysqli_query($conexion,$insetar);
    if($resultados!=false){
    echo '<script type="text/javascript"> alert("USUARIO REGISTRADO, PARA REGISTRAR OTRO VEHÍCULO A ESTA CEDULA COMPLETE LOS DATOS, DE LO CONTRARIO OPRIMA VOLVER");</script>';

    }

  //------------------------------------------------------------------------------

}


 ?>




 <script type="text/javascript" src="../js/formulario_carros.js"></script>

</body>
</html>
