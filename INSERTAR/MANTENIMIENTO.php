<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <link rel="shortcut icon" type="image/x-icon" href="imagenes/logo1.ico">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="../css/estilos.css">
      <title>INGRESO TRABAJO</title>
      <style media="screen">

      </style>
</head>

<body>
  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->
  <form class="formulario" name="formulario_registro" action="php/trabajos.php" method="post">


    <!-- TRABAJO -->
    <div class="input-group">
      <input type="text"  id="trabajo" name="trabajo" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
      <label class="label" for="trabajo">Trabajo:</label>
    </div>


    <!-- ENVIAR -->
    <input type="submit" id="btn-submit" name="guardar" value="Guardar">
    <br>
    <br>
    <a href="../index.php"><input type="button" name="volver" value="Volver"></a>
    </div>
  </form>
  </div>
  </div>
  <script src="../js/formulario.js"></script>
</body>
</html>
