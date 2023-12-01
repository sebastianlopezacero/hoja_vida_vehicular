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
  <form class="formulario" name="formulario_registro" action="../php/busqueda_carro_c.php" method="get">

    <!-- PLACAS -->
    <table>
      <tr>
        <td><div class="">
          <div class="input-group">
          <input type="text"  id="placal" name="placal" maxlength="3" value="" placeholder="AAA" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase(); >
          <label for="placal">Placa:</label>
        </div></td>
        <td>  <div class="">
            <div class="input-group">
            <input type="text"  id="placan" name="placan" maxlength="3" value="" placeholder="000">
            <label for="placan">Placas:</label>
          </div></td>
      </tr>
    </table>




    <!-- BUSCAR -->
    <input type="submit" id="btn-submit" name="buscar" value="Buscar">
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
