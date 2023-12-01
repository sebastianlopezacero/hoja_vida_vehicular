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
<p><h1 align="center"><br>Bienvenido <?php echo $nombre . " ". $apellido ?></h1></p>
  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->


  <form class="formulario" name="formulario_registro" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <!-- CEDULA -->
    <div class="">
    <div class="input-group">
      <input  type="text"  id="cedula" name="cedula" value="<?php echo $cedula; ?>" readonly="readonly">
      <label  for="cedula">Cedula:</label>
    </div>

    <!-- MARCA -->

    <div class="">
    <div class="input-group">
      <input type="text"  id="marca" name="marca" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="marca">Marca:</label>
    </div>

<!-- __________________________________ -->
<!-- LINEA -->
<div class="">
  <div class="input-group">
  <input type="text"  id="linea" name="linea" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label class="label" for="linea">Linea:</label>
</div>



    <!-- MODELO -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="modelo" name="modelo" value="" maxlength="4">
      <label class="label" for="modelo">Modelo:</label>
    </div>

    <!-- PLACAS -->

    <table>
      <tr>
        <td><div class="">
          <div class="input-group">
          <input type="text"  id="placal" name="placal" value="" maxlength="3" placeholder="AAA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          <label  for="placal">Placa:</label>
        </div></td>
        <td>  <div class="">
            <div class="input-group">
            <input type="text"  id="placan" name="placan" value="" maxlength="3" placeholder="000">
            <label   for="placan">Placas:</label>
          </div></td>
      </tr>
    </table>

    <!-- COLOR -->
    <div class="">
      <div class="input-group">
      <input type="text"  id="color" name="color" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="color">Color:</label>
    </div>

    <!-- CIUDAD -->
    <div class="input-group">
      <input type="text"  id="ciudad" name="ciudad" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="ciudad">Ciudad:</label>
    </div>

    <!-- KM -->
    <div class="input-group">
      <input type="text"  id="km" name="km" value="">
      <label class="label" for="km">KM:</label>
    </div>
    <!-- FECHA SOAT -->
    <div class="input-group">
      <label  for="fecha">Fecha vencimiento SOAT:</label>
    &nbsp  &nbsp
      <input type="date"  id="fecha_soat" name="fecha_soat"  required>
      </div>
      <!-- FECHA TECNOMECANICA -->
      <div class="input-group">
        <label  for="fecha">Fecha vencimiento Tecnomecanica:</label>   &nbsp   &nbsp
        <input type="date"  id="fecha_tecno" name="fecha_tecno"  required>

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
    <a href="../CONSULTA_CARRO.php"><input type="button" name="volver" value="Volver"></a>
    </div>
  </form>
  </div>
  </div>
  <script src="../js/formulario.js"></script>
</body>

</html>
