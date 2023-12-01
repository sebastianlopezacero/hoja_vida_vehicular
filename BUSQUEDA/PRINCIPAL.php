<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
      <meta charset="utf-8">
      <link rel="shortcut icon" type="image/x-icon" href="LOGIN_DAYTONA_2/imagenes/logo1.ico">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../css/estilos.css">

      <title>DAYTONA CARS</title>
</head>

<body>
  <?php
  session_start();
  if (!isset($_SESSION["usuario"])) {

    header("location:../INSERTAR/LOGIN.php");
  }

   ?>
<p><h1 align="center"><br>Bienvenido <?php echo $_SESSION["usuario"] ?></h1></p>

  <div class="contenedor-formulario">

  <div class="wrap">

  <!-- FORMULARIO -->
  <form class="formulario" name="formulario_registro"  method="post">



<!-- BUSCAR CARRO POR PLACA -->
<a href="formularios/BUSQUEDA_CARRO_C.php"><input type="button" name="c_placa" value="BUSCAR TRABAJO POR PLACA"></a>
<br>
<br>
<!-- BUSCAR CLIENTE -->
<a href="formularios/BUSQUEDA_CLIENTE_PRIN.php"><input type="button" name="c_placa" value="BUSCAR CLIENTE"></a>
<br>
<br>
<!-- BUSCAR CARRO POR PLACA -->
<a href="formularios/MODIFICA_CARRO.php"><input type="button" name="c_placa" value="BUSCAR CARRO POR PLACA"></a>
<br>
<br>
<!-- SOAT VENCIDO -->
<a href="php/SOAT.php"><input type="button" name="soat" value="SOAT VENCIDO"></a>
<br>
<br>
<!-- TECNO VENCIDO -->
<a href="php/tecno.php"><input type="button" name="soat" value="TECNOMECANICA VENCIDA"></a>
<br>
<br>
<p><a href="php/cierre.php">CERRAR SESIÓN</a></p>
<br>
<br>


    </div>
  </form>
  </div>
  </div>
    <script src="LOGIN_DAYTONA_2/ejemplo/formulario.js"></script>
</body>
</html>
