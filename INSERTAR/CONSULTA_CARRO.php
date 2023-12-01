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
echo "$identificacion"; ?>

  <div class="contenedor-formulario">
  <div class="wrap">
  <!-- FORMULARIO -->
  <?php// echo $_SERVER['PHP_SELF']?>
  <form class="formulario" name="formulario_registro" action="php/consulta_carro.php" method="post">
    <form class="formulario" name="formulario_busqueda" action="php/insertar_carros.php" method="get">

    <!-- CEDULA -->
      <div class="input-group">
      <input type="text"  id="cedula" name="cedula" value="">
      <label class="label" for="cedula">Identificación:</label>
    </div>
<p><a href="insertar_clientes.php">¿NO ESTA REGISTRADO EL USUARIO?</a></p>
<br>
<br>
    <!-- BUSCAR -->
    <input type="submit" id="btn-submit" name="investigar" value="Buscar"  >
    <br>
    <br>
    <a href="../index.php"><input type="button" name="volver" value="Volver"></a>

    </div>
  </form>
    </form>
  </div>
  </div>
  <script src="../js/formulario.js"></script>
</body>
</html>
