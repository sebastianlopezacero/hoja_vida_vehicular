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
<div class="contenedor-formulario">
<div class="wrap">
<!-- FORMULARIO -->
<form class="formulario" name="formulario_registro" action="../php/busqueda_cliente_prin.php" method="post">
<!-- NOMBRE -->
<div class="">
<div class="input-group">
<input type="text"  id="nombre" name="nombre" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
  <label  for="nombre">Nombre:</label>
</div>

<!-- BUSCAR POR NOMBRE -->
<input type="submit" id="btn-submit" name="buscar_nombre" value="Buscar Nombre">
</form>
<!-- ________________________________________________ -->
<br><br>
<hr  color="blue" size=3>
<br><br>
<!-- ________________________________________________ -->
<form class="formulario" name="formulario_registro" action="../php/busqueda_cliente_prin.php" method="post">

<!-- IDENTIFICACION -->
<div class="">
<div class="input-group">
<input type="text"  id="identificacion" name="identificacion" value="">
<label  for="identificacion">Identificación:</label>
</div>

<!-- BUSCAR POR CEDULA -->
<input type="submit" id="btn-submit" name="buscar_cedula" value="Buscar Identificación">
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
