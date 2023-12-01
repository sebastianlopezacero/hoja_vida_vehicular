<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DAMOBI</title>
    <!-- Fuentes -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,900&display=swap" rel="stylesheet">
    <!-- Estilos CSS -->
    <link rel="stylesheet" href="css/particulas.css">
    <style media="screen">
    body {
        background-color:#5089f2;}
    </style>
    <script type="text/javascript" src="js/push.min.js">

    </script>
</head>
<body>

  <?php
  // ----- HACEMOS CONEXION ------------------------------------
  include ("INSERTAR/php/conexion.php");
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

  //------------ CONSULTAMOS TECNO POR FEFCHA ------------------------
  // $soat="SELECT * from carros";
  $tecno_consulta="SELECT * from carros where FECHA_TECNO between curdate() and date_add(curdate(), interval 120 day)";
  $tecno=mysqli_query($conexion,$tecno_consulta);
  $tecno1= mysqli_fetch_row($tecno);

    if($tecno1!==NULL){

      tecno();
    }
    function tecno()
    {
      echo '  <script type="text/javascript">
        Push.create("TECNOMECANICA PROXIMAS A VENCER", {
            body: "Revisa las TECNOMECANICAS para vencer Johanna",
            icon: "imagenes/mision_cumplida_daytona.jpg",
            timeout: 4000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
        </script>';
    }


  //------------ CONSULTAMOS SOAT POR FECHA ------------------------
  // $soat="SELECT * from carros";
  $soat_consulta="SELECT * from carros where FECHA_SOAT between curdate() and date_add(curdate(), interval 120 day)";
  $soat=mysqli_query($conexion,$soat_consulta);
  $soat1= mysqli_fetch_row($soat);
  // <form class="" '."action='soat_mail.php'".' method="post">

if($soat1!==NULL){

  function soat()
  {
    echo '  <script type="text/javascript">
      Push.create("SOAT PROXIMOS A VENCER", {
          body: "Revisa los SOAT para vencer Johanna",
          icon: "imagenes/mision_cumplida_daytona.jpg",
          timeout: 8000,
          onClick: function () {
              window.focus();
              this.close();
          }
      });
      </script>';
  }
  soat();
}

?>




    <!-- ID Particles.js -->
    <div id="particles-js"></div>
    <header class="contenedor header">

        <!-- Barra de navegación -->
        <nav class="barra-navegacion">
            <ul>
              <li><a href="INSERTAR/LOGIN.php">Iniciar sesión</a></li>

                    <li><a href="INSERTAR/INSERTAR_PERSONAL.php"> empleado</a></li>

              <li><a href="INSERTAR/CONSULTA_CLIENTES.php"> cliente</a></li>
              <li><a href="INSERTAR/CONSULTA_CARRO.php"> vehículo</a></li>
              <li><a href="INSERTAR/MANTENIMIENTO.php"> mantenimiento</a></li>
                <!-- <li>
                    <a href="#" class="logo">
                        <i class="fas fa-biohazard"></i>
                    </a>
                </li> -->

            </ul>
        </nav>

        <!-- Título y descripción -->
        <div class="contenido-descripcion">
            <div>
                <h1 class="titulo">
                    <span>DAYTONA</span>
                    <span>CARS</span>
                </h1>

                <article class="descripcion">
                    <a href="INSERTAR/CONSULTA_MANTENIMIENTO.php" class="btn-link">Insertar trabajo</a>
                </article>

            </div>

            <div class="">
              <img src="imagenes/mision_cumplida_daytona.jpg" alt="" width="400">
              </div>
        </div>

    </header>

    <!-- JS Particles.js -->

<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script src="js/app.js"></script>

    <!-- JS FontAwesome -->
    <script src="https://kit.fontawesome.com/a2e8d0339c.js"></script>
</body>
</html>
