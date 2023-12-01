<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/tabla.css">

<title>DATOS VEHÍCULO</title>
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

  if(isset($_POST["soat"])){

//------------ CONSULTAMOS SOAT POR FEFCHA ------------------------
$soat="select * from carros where FECHA_SOAT between curdate() and date_add(curdate(), interval 90 day)";
$soat=mysqli_query($conexion,$soat);
$soat= mysqli_fetch_row($soat);
echo "$soat";
if($soat!==NULL){
  echo '<div class="main-container" style="text-align:center;"><table><tr>
  <th>PLACA </th>
  <th>NOMBRE</th>
  <th>APELLIDO</th>
  <th>CELULAR</th>
  <th>CORREO</th>
  </tr>';

// while ($fila = mysqli_fetch_row($soat)){
//
//   // ----------- CONSULTAMOS AL CLIENTE POR CARRO ---------------
//   $consulta_cliente="SELECT * FROM clientes WHERE id=";
//   $resultados=mysqli_query($conexion,$consulta_cliente);
//
//

}

// echo "$placa"."<br>";
}else{
  echo '<script type="text/javascript">
  alert("NO HAY SAOT POR VENCER");
  </script>';}







   ?>

</body>
</html>
