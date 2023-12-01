<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
      <!-- <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0"> -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/estilos.css">
      <title>INSERTAR CARRO</title>

</head>

<body>

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

  $l_placa=$_POST["placal"];
  $num_placa=$_POST["placan"];
  $placa=$l_placa."-".$num_placa;



  if (isset($_POST["modificar"])){

    //------------ CONSULTAMOS CARRO POR PLACA ------------------------
    $consulta_carro="SELECT id_client, MARCA, LINEA, MODELO, CLASE, SERVICIO, COLOR, CIUDAD, KM,
                            FECHA_SOAT, FECHA_TECNO FROM carros WHERE PLACA = '$placa'";
    //UNIMOS CODIGO SQL
    $resultados=mysqli_query($conexion,$consulta_carro);
    $numero_placa= mysqli_fetch_row($resultados);
    if($numero_placa!==NULL){
          $id_cliente=$numero_placa[0];
          $MARCA=$numero_placa[1];
          $LINEA=$numero_placa[2];
          $MODELO=$numero_placa[3];
          $CLASE=$numero_placa[4];
          $SERVICIO=$numero_placa[5];
          $COLOR=$numero_placa[6];
          $CIUDAD=$numero_placa[7];
          $KM=$numero_placa[8];
          $FECHA_SOAT=$numero_placa[9];
          $FECHA_TECNO=$numero_placa[10];

    } else{
      echo '<script type="text/javascript">
      alert("PLACA NO EXISTE");
      window.location="../formularios/MODIFICA_CARRO.php";
      </script>';


   }

}else {
  $marca=$_POST["marca"];
  $linea=$_POST["linea"];
  $modelo=$_POST["modelo"];
  $color=$_POST["color"];
  $ciudad=$_POST["ciudad"];
  $km=$_POST["km"];
  $servicio=$_POST["servicio"];
  $clase=$_POST["clase"];
  $fecha_soat=$_POST["fecha_soat"];
  $fecha_tecno=$_POST["fecha_tecno"];


    $sql="UPDATE carros SET  MARCA='$marca', LINEA='$linea', MODELO=$modelo, CLASE='$clase', SERVICIO='$servicio', COLOR='$color', CIUDAD='$ciudad', KM=$km,
                            FECHA_SOAT='$fecha_soat', FECHA_TECNO='$fecha_tecno'";
    $resultados=mysqli_query($conexion,$sql);
    echo '<script type="text/javascript">
    alert("CAMBIO EXITOSO");
    window.location="../formularios/MODIFICA_CARRO.php";
    </script>';
}



   ?>





  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->


  <form class="formulario" name="formulario_registro" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">


    <!-- MARCA -->



    <div class="">
    <div class="input-group">
      <input type="text"  id="marca" name="marca" value="<?php echo $MARCA ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="marca">Marca:</label>
    </div>

<!-- __________________________________ -->
<!-- LINEA -->
<div class="">
  <div class="input-group">
  <input type="text"  id="linea" name="linea" value="<?php echo $LINEA ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label class="label" for="linea">Linea:</label>
</div>



    <!-- MODELO -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="modelo" name="modelo" value="<?php echo $MODELO ?>" maxlength="4">
      <label class="label" for="modelo">Modelo:</label>
    </div>

    <!-- PLACAS -->

    <table>
      <tr>
        <td><div class="">
          <div class="input-group">
          <input type="text"  id="placal" name="placal" value="<?php echo $l_placa ?>" readonly="readonly" maxlength="3" placeholder="AAA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          <label  for="placal">Placa:</label>
        </div></td>
        <td>  <div class="">
            <div class="input-group">
            <input type="text"  id="placan" name="placan" value="<?php echo $num_placa ?>" readonly="readonly"  maxlength="3" placeholder="000">
            <label   for="placan">Placas:</label>
          </div></td>
      </tr>
    </table>

    <!-- COLOR -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="color" name="color" value="<?php echo $COLOR ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="color">Color:</label>
    </div>

    <!-- CIUDAD -->
    <div class="input-group">
      <input type="text"  id="ciudad" name="ciudad" value="<?php echo $CIUDAD ?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="ciudad">Ciudad:</label>
    </div>

    <!-- KM -->
    <div class="input-group">
      <input type="text"  id="km" name="km" value="<?php echo $KM ?>">
      <label class="label" for="km">KM:</label>
    </div>
    <!-- FECHA SOAT -->
    <div class="input-group">
      <label  for="fecha">Fecha vencimiento SOAT:</label>
    &nbsp  &nbsp
      <input type="date"  id="fecha_soat" name="fecha_soat" value="<?php echo $FECHA_SOAT ?>"  required>
      </div>
      <!-- FECHA TECNOMECANICA -->
      <div class="input-group">
        <label  for="fecha">Fecha vencimiento Tecnomecanica:</label>   &nbsp   &nbsp
        <input type="date"  id="fecha_tecno" name="fecha_tecno" value="<?php echo $FECHA_TECNO ?>"  required>

      </div>


        <!-- SERVICIO -->
    <div class="input-group radio">
      <input type="radio" name="servicio" id="publico" value="Publico">
      <label class="label" for="publico">Publico</label>
      <input type="radio" name="servicio" id="particular" value="Particular">
      <label class="label" for="particular">Particular</label>
    </div>

    <!-- CLASE -->
<div class="input-group radio">
  <input type="radio" name="clase" id="automovil" value="Automovil">
  <label class="label" for="automovil">Automovil</label>
  <input type="radio" name="clase" id="camioneta" value="Camioneta">
  <label class="label" for="camioneta">Camioneta</label>
</div>

    <!-- ENVIAR -->
    <input type="submit" id="btn-submit" name="enviar" value="Enviar">
    <br>
    <br>
    <a href="../PRINCIPAL.php"><input type="button" name="volver" value="Volver"></a>
    </div>
  </form>
  </div>
  </div>
  <script src="../js/formulario.js"></script>
</body>

</html>
