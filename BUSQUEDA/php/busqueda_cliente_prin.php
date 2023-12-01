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



if(isset($_POST["buscar_nombre"])){
// TRAEMOS DATOS DEL FORMATO----------------------------------
$nombre=$_POST["nombre"];

// ----------- CONSULTAMOS AL CLIENTE POR NOMBRE ---------------
$consulta_cliente="SELECT * FROM clientes WHERE NOMBRES LIKE '%$nombre%'";
$resultados=mysqli_query($conexion,$consulta_cliente);
$numero_clientes= mysqli_num_rows($resultados);

if($numero_clientes!==NULL){

//------------------ TABLA CON LO DATOS------------
      echo '<div class="main-container" style="text-align:center;"><table><tr>
      <th>NOMBRES&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </th>
      <th>APELLIDOS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
      <th>CARROS&nbsp&nbsp&nbsp   </th>
      <th>CELULAR&nbsp&nbsp&nbsp   </th>
      <th>IDENTIFICACIÓN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   </th>
      <th>CORREO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
      <th>DIRECCIÓN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   </th>
      <th>FECHA INGRESO&nbsp&nbsp&nbsp   </th>
      <th>CUMPLEAÑOS  </th>
      <th>MODIFICAR   </th>
      </tr>';
// // ------------------ BUCLE PARA TODOS LOS CARROS-----------
//
while ($fila = mysqli_fetch_row($resultados)){

  $id_cliente= $fila[0];
//------------ CONSULTAMOS CARRO POR CLIENTE ------------------------
  $consulta_carro="SELECT * FROM carros WHERE id_client = $id_cliente";
  $resultados3=mysqli_query($conexion,$consulta_carro);
  $numero_placa= mysqli_fetch_row($resultados3);
  if($numero_placa!==NULL){
      $placa=$numero_placa[11];
  // echo "$placa"."<br>";
}else{  $placa="SIN CARRO";}

  echo "<tr><td>";
  echo $fila[1] . "</td><td>";
  echo $fila[2] . "</td><td>";
  echo $placa .   "</td><td>";
  echo $fila[3] . "</td><td>";
  echo $fila[4] . "</td><td>";
  echo $fila[6] . "</td><td>";
  echo $fila[7] . "</td><td>";
  echo $fila[9] . "</td><td>";
  echo $fila[8] . "</td><td>";

  echo "<a href='actualizar_cliente.php?id=".$id_cliente."& nom=".$fila[1]."& ape=".$fila[2]."& cel=".$fila[3]."& cc=".$fila[4]."& sex=".$fila[5]."& email=".$fila[6]."& dir=".$fila[7]."& fn=".$fila[8]."<input type='button' name='up' id='up' value='MODIFICAR' class='bttn'>MODIFICAR</input>" . "</td><td></tr>";
  //
}
echo "</table></div></form>";
}// IF SI AH CLIENTES
else{
echo '<script type="text/javascript">
alert("Usuario no encontrado");
</script>';
 // header("Location:../formularios/BUSQUEDA_CLIENTE_PRIN.php");
}
}//PRIMER IF DE ENTER







if(isset($_POST["buscar_cedula"])){
  $cedula=$_POST["identificacion"];

  // ----------- CONSULTAMOS AL CLIENTE POR NOMBRE ---------------
  $consulta_cliente="SELECT * FROM clientes WHERE IDENTIFICACION=$cedula";
  $resultados=mysqli_query($conexion,$consulta_cliente);
  $numero_clientes= mysqli_num_rows($resultados);

  if($numero_clientes!==NULL){

  //------------------ TABLA CON LO DATOS------------
  echo '<form class="" '."action='actualizar_cliente.php'".' method="post"><div class="main-container" style="text-align:center;"><table><tr>
  <th>NOMBRES&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  </th>
  <th>APELLIDOS&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
  <th>CARROS&nbsp&nbsp&nbsp   </th>
  <th>CELULAR&nbsp&nbsp&nbsp   </th>
  <th>IDENTIFICACIÓN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   </th>
  <th>CORREO&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</th>
  <th>DIRECCIÓN&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp   </th>
  <th>FECHA INGRESO&nbsp&nbsp&nbsp   </th>
  <th>CUMPLEAÑOS  </th>
  <th>MODIFICAR   </th>
  </tr>';
  // // ------------------ BUCLE PARA TODOS LOS CARROS-----------
  //
  while ($fila = mysqli_fetch_row($resultados)){

    $id_cliente= $fila[0];
    //------------ CONSULTAMOS CARRO POR CLIENTE ------------------------
    $consulta_carro="SELECT * FROM carros WHERE id_client = $id_cliente";
    $resultados3=mysqli_query($conexion,$consulta_carro);
    $numero_placa= mysqli_fetch_row($resultados3);
    if($numero_placa!==NULL){
        $placa=$numero_placa[11];
    // echo "$placa"."<br>";
  }else{  $placa="NO CARRO";}

      echo "<tr><td>";
      echo $fila[1] . " </td><td>";
      echo $fila[2] . " </td><td>";
      echo $placa . " </td><td>";
      echo $fila[3] . " </td><td>";
      echo $fila[4] . " </td><td>";
      echo $fila[6] . " </td><td>";
      echo $fila[7] . " </td><td>";
      echo $fila[9] . " </td><td>";
      echo $fila[8] . " </td><td>";
    echo "<a href='actualizar_cliente.php?id=".$id_cliente."& nom=".$fila[1]."& ape=".$fila[2]."& cel=".$fila[3]."& cc=".$fila[4]."& sex=".$fila[5]."& email=".$fila[6]."& dir=".$fila[7]."& fn=".$fila[8]."<input type='button' name='up' id='up' value='MODIFICAR' class='bttn'>MODIFICAR</input>" . "</td><td></tr>";
    //
    //
  }
echo "</table></div></form>";
  }// IF SI AH CLIENTES
  else{
  echo '<script type="text/javascript">
  alert("Usuario no encontrado");
  </script>';
   header("Location:../formularios/BUSQUEDA_CLIENTE_PRIN.php");
  }

}
echo '<a href="../formularios/BUSQUEDA_CLIENTE_PRIN.php"><input type="button" name="" value="VOLVER" class="btn"></a>';
echo '<input type="button" name="" value="CERRAR SESIÓN" class="btn">';


   ?>
  </body>
</html>
