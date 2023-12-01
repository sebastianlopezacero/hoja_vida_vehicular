<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/estilos.css">
        <?php
       ?>
      <title>DAYTONA CARS</title>
</head>
<?php



// ----- HACEMOS CONEXION ------------------------------------
include ("conexion.php");
// HACEMOS CONEXION
$conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
//CUANDO NO CONECTA A BASE DE DATOS
if(mysqli_connect_errno()){
echo "FALLO AL CONECTAR BASE DE DATOS";
exit();
}
mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
mysqli_set_charset($conexion,"utf8");
//-------------- TERMINA CONEXION -----------------------------

if (!isset($_POST["registrar"])){

  $id=$_GET["id"];
  $nom=$_GET["nom"];
  $ape=$_GET["ape"];
  $cel=$_GET["cel"];
  $cc=$_GET["cc"];
  $sex=$_GET["sex"];
  $email=$_GET["email"];
  $dir=$_GET["dir"];
  $fn=$_GET["fn"];
}else {
  $id=$_POST["id"];
  $nom=$_POST["nombre"];
  $ape=$_POST["apellido"];
  $cel=$_POST["celular"];
  $cc=$_POST["identificacion"];
  $email=$_POST["email"];
  $dir=$_POST["direccion"];

$sql="UPDATE clientes SET NOMBRES='$nom', APELLIDOS='$ape', CELULAR=$cel, IDENTIFICACION=$cc, CORREO='$email', DIRECCION='$dir' WHERE id=$id";
$resultados=mysqli_query($conexion,$sql);
echo '<script type="text/javascript">
alert("CAMBIO EXITOSO");
</script>';

}


 ?>
<body>
  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->
  <form class="formulario" name="formulario_registro" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">


     <input type="hidden" id="id" name="id" value="<?php echo $id ?>">

    <!-- NOMBRE -->
    <div class="">
    <div class="input-group">
      <input type="text"  id="nombre" name="nombre" value="<?php echo $nom ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label  for="nombre">Nombre:</label>
    </div>
    <!-- APELLIDO -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="apellido" name="apellido" value="<?php echo $ape ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label  for="apellido">Apellido:</label>
    </div>
    <!-- IDENTIFICACION -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="identificacion" name="identificacion" value="<?php echo $cc?>">
      <label  for="identificacion">Identificación:</label>
    </div>
    <!-- DIRECCION -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="direccion" name="direccion" value="<?php echo $dir ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label  for="direccion">Dirección:</label>
    </div>
    <!-- EMAIL -->
    <div class="input-group">
      <input type="email"  id="email" name="email" value="<?php echo $email ?>">
      <label for="email">Correo:</label>
    </div>
    <!-- CELULAR -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="celular" name="celular" value="<?php echo $cel ?>">
      <label  for="celular">N° Celular:</label>
    </div>


    <!-- ENVIAR -->
    <input type="submit" id="btn-submit" name="registrar" value="Enviar">
    <br>
    <br>
    <a href="../formularios/BUSQUEDA_CLIENTE_PRIN.php"><input type="button" name="volver" value="Volver"></a>
    </div>
  </form>
  </div>
  </div>
  <script src="../ejemplo/formulario.js"></script>
</body>
</html>
