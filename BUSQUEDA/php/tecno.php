<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/tabla.css">
<style media="screen">

</style>
<title>TECNOMECANICA VENCIDA</title>
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



//------------ CONSULTAMOS TECNO POR FEFCHA ------------------------
// $soat="SELECT * from carros";
$tecno_consulta="SELECT * from carros where FECHA_TECNO between curdate() and date_add(curdate(), interval 30 day)";
$tecno=mysqli_query($conexion,$tecno_consulta);
$tecno1= mysqli_fetch_row($tecno);


if($tecno1!==NULL){

  echo '<form " method="post">
<div class="main-container" style="text-align:center;"><table><tr>
  <th>NOMBRE</th>
  <th>APELLIDO</th>
  <th>CELULAR</th>
  <th>CORREO</th>
  <th>PLACA</th>
  <th>MARCA</th>
  <th>FECHA</th>
  </tr>';
$tecno_consulta="SELECT * from carros where FECHA_TECNO between curdate() and date_add(curdate(), interval 30 day)";
$tecno=mysqli_query($conexion,$tecno_consulta);
while ($fila = mysqli_fetch_row($tecno)){
$id_cliente= $fila[1];
$marca= $fila[2];
$placa= $fila[11];
$fecha_tecno= $fila[13];

// ----------- CONSULTAMOS AL CLIENTE POR CARRO ---------------
$consulta_cliente="SELECT * FROM clientes WHERE id=$id_cliente";
$resultados=mysqli_query($conexion,$consulta_cliente);
$cliente= mysqli_fetch_row($resultados);

echo '<tr><td name="cliente">';
echo $cliente[1] . " </td><td>";
echo $cliente[2] . " </td><td>";
echo $cliente[3] . " </td><td>";
echo $cliente[6] . " </td><td>";
echo $placa. " </td><td>";
echo $marca. " </td><td>";
echo $fecha_tecno . " </td><td></tr>";

//---- ENIVAR CORREOS ------------------------------------------
if ( isset($_REQUEST['confirmar']) == "ENVIAR CORREO")
{
//------ TEXTO CORREO---------------------------------
$texto_mail="Daytona Cars le recuerda que su TECNOMECANICA del vehículo con placas ".$placa .
            " esta pronto a vencer, recuerde renovarlo";

$destinatario=$cliente[6];
$asunto="PRONTO VENCIMIENTO TECNOMECANICA";
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=iso-8859-1\r\n";
$headers.="From: VENCIMIENTO TECNOMECANICA <sebastianlopez980224@gmail.com>\r\n";
$exito=mail($destinatario,$asunto,$texto_mail,$headers);
if($exito){

}else{
'<script type="text/javascript">
alert("FALLO EN ENVIO DE CORREOS");
</script>';}
}
}


}else{
  echo '<script type="text/javascript">
  alert("NO HAY TECNOMECANICA POR VENCER");
  </script>';}





echo '<input type="submit" name="confirmar" value="ENVIAR CORREO" class="btn_correo">';
echo "</table><div></form>";



echo '<a href="../PRINCIPAL.php"><input type="button" name="" value="VOLVER" class="btn"></a>';






   ?>

</body>
</html>
