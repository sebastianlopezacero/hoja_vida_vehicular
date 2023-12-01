
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>DAYTONA CARS</title>
  </head>
  <body>

<?php
// include("../INSERTAR_CLIENTES.php");

if(!isset($_POST["registrar"])){
echo '
  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->
  <form class="formulario" name="formulario_registro" action="'.$_SERVER['PHP_SELF'] .'" method="post">
  <!-- NOMBRE -->
  <div class="">
  <div class="input-group">
  <input type="text"  id="nombre" name="nombre" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label class="label" for="nombre">Nombre:</label>
  </div>
  <!-- APELLIDO -->
  <div class="">
  <div class="input-group">
  <input type="text"  id="apellido" name="apellido" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label class="label" for="apellido">Apellido:</label>
  </div>
  <!-- IDENTIFICACION -->
  <div class="">
  <div class="input-group">

  <input type="text"  id="identificacion" name="identificacion" value="'. $cedula .'" readonly="readonly" >
  <label  for="identificacion">Identificación:</label>
  </div>
  <!-- DIRECCION -->
  <div class="">
  <div class="input-group">
  <input type="text"  id="direccion" name="direccion" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label class="label" for="direccion">Dirección:</label>
  </div>
  <!-- EMAIL -->
  <div class="input-group">
  <input type="email"  id="email" name="email" value="">
  <label class="label" for="email">Correo:</label>
  </div>
  <!-- CELULAR -->
  <div class="">
  <div class="input-group">
  <input type="text"  id="celular" name="celular" value="">
  <label class="label" for="celular">N Celular:</label>
  </div>
  <!-- SEXO -->
  <div class="input-group radio">
  <input type="radio" name="sexo" id="hombre" value="Hombre">
  <label  for="hombre">Hombre</label>
  <input type="radio" name="sexo" id="mujer" value="Mujer">
  <label for="mujer">Mujer</label>
  <input type="radio" name="sexo" id="empresa" value="Empresa">
  <label for="Empresa">Empresa</label>
  </div>
  <!-- FECHA -->
  <div class="input-group">
  <label  for="fecha">Fecha cumpleaños:</label>
  <input type="date"  id="fecha" name="fecha"  value="1998-02-24" required>

  </div>


  <!-- ENVIAR -->
  <input type="submit" id="btn-submit" name="registrar" value="Enviar">
  <br>
  <br>
  <a href="../../index.php"><input type="button" name="volver" value="Volver"></a>
  </div>
  </form>
  </div>
  </div>';
}

// include("../INSERTAR_CARRO.php");

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
include ("php/conexion.php");
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
  mysqli_set_charset($conexion,"utf8");
//----------------------------------------------------------------------------


  //------------------METEMOS DATOS ----------------------------------------------
  $insetar= "INSERT INTO clientes(NOMBRES, APELLIDOS, CELULAR, IDENTIFICACION, SEXO, CORREO, DIRECCION, FECHA_NACIMIENTO, FECHA_INGRESO ) VALUES ('$nombre', '$apellido', $celular, $identificacion, '$sexo', '$email', '$direccion', '$fecha', '$fecha_ingreso')";
  $resultados=mysqli_query($conexion,$insetar);

if($resultados!=FALSE){
  echo '<script type="text/javascript">
    alert("Usuario registrado");
    window.location="CONSULTA_CARRO.php";
    </script>';
}
// header ("Location:CONSULTA_CLIENTES.php");
// echo '<a href="CONSULTA_CLIENTES.php"><input type="button" name="volver" value="Volver"></a>';
  //------------------------------------------------------------------------------

}
 ?>

  <script src="../../js/formulario.js"></script>
</body>
</html>
