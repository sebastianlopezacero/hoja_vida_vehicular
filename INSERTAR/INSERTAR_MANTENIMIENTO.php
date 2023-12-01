<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
      <!-- <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0"> -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../css/estilos.css">
      <title>DAYTONA CARS</title>
</head>

<body>
  <?php
  include ("conexion.php");
  $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
   echo "FALLO AL CONECTAR BASE DE DATOS";
   exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
   mysqli_set_charset($conexion,"utf8");
//--------------------- CONSULTA ID CLIENTE ------------------------------
$placa=$placal."-".$placan;
$buscar_id_cliente= "SELECT * FROM carros WHERE PLACA='$placa'";
$seleccionar_id_cliente=mysqli_query($conexion,$buscar_id_cliente);
$seleccionar_id_cliente= mysqli_fetch_row($seleccionar_id_cliente);
$id_client=$seleccionar_id_cliente[1];
//--------------------- CONSULTA NOMBRE APELLIDO CLIENTE ------------------------------
$consulta_cliente= "SELECT NOMBRES, APELLIDOS, CORREO FROM clientes WHERE id=$id_client";
$seleccionar_nom_ape=mysqli_query($conexion,$consulta_cliente);
$seleccionar_nom_ape= mysqli_fetch_row($seleccionar_nom_ape);
$nom_cliente=$seleccionar_nom_ape[0];
$ape_cliente=$seleccionar_nom_ape[1];

//----------------------------------
   ?>

<p><h1 align="center"><br>Bienvenido <?php echo $nom_cliente . " ". $ape_cliente ?></h1></p>
  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->


  <form class="formulario" id="mantenimiento" name="formulario_registro" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <!-- PLACAS -->

    <table>
      <tr>
        <td><div class="">
          <div class="input-group">
          <input type="text"  id="placal" name="placal" value="<?php echo $placal; ?>"   readonly="readonly">
          <label  for="placal">Placas:</label>
        </div></td>
        <td>  <div class="">
            <div class="input-group">
            <input type="text"  id="placan" name="placan" value="<?php echo $placan; ?>"  readonly="readonly">
            <label  for="placan">Placas:</label>
          </div></td>
      </tr>
    </table>

    <!-- KM -->
    <div class="input-group" id="km">
      <input type="text"  id="km" name="km" value="">
      <label class="label" for="km">KM:</label>
    </div>



    <!-- TRABAJO -->
    <div class="input-group" id="km">
<label for="">Trabajo:</label>


<?php


 $consulta="SELECT * FROM trabajos";
$resultados=mysqli_query($conexion,$consulta);
 $ntrabajos= mysqli_num_rows($resultados);

// $numero= mysqli_fetch_row($resultados);

echo "<select id='desplegable' name='desplegable' class='select-css'>";
while ($fila=mysqli_fetch_array($resultados)){

//IMPRIMO DATOS

echo '<option value="'.$fila['id'].'">'.$fila['DESCRIPCCION'].'</option>';
}
echo "</select>";

 ?>

  </div>


  <!-- EMPLEADO -->
  <div class="input-group" id="empleado">
  <label for="">Empleado:</label>
  <?php
    $consulta2="SELECT id, NOMBRE, APELLIDO FROM login";
  $resultados2=mysqli_query($conexion,$consulta2);
  echo "<select id='empleado' name='empleado' class='select-css'>";
  while ($fila2=mysqli_fetch_array($resultados2)){
  echo '<option value="'.$fila2['id'].'">'.$fila2['NOMBRE']." ".$fila2['APELLIDO'].'</option>';
  }
  echo "</select>";
  ?>

  <br><br>
    <!-- REPUESTOS -->
    <div class="" id="km">
      <p><div class="input-group" id="km">  <label  for="repuestos">Repuestos:</label></p><p>
      <textarea id="repuestos" name="comentarios" rows="8" cols="58" maxlength="500"></textarea></p>
      <!-- <input type="text"  id="repuestos" name="repuestos" value=""> -->
    </div>
    <!-- PROXIMO KM -->
    <div class="input-group" id="km">
      <input type="text"  id="proximo_km" name="proximo_km" value="">
      <label class="label" for="proximo_km">Proximo KM:</label>
    </div>

    <!-- INFORMAR AL CORREO -->

  <br>
  <label for="">Desea notificar a su correo:</label>
  <br>
  <br>

<div class="input-group radio">
    <input type="radio" name="info" id="no" value="NO">
  <label  for="no">NO</label>
  <input type="radio" name="info" id="si" value="SI">
  <label for="si">SI</label>
</div>

    <!-- ENVIAR -->
    <input type="submit" id="btn-submit" name="enviar" value="Enviar">
    <br>
    <br>
    <a href="CONSULTA_MANTENIMIENTO.php"><input type="button" name="volver" value="Volver"></a>
    </div>
  </form>
  </div>
  </div>
  <script src="../js/formulario.js"></script>
</body>

</html>
