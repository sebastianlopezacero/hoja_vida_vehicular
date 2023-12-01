
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="../imagenes/logo1.ico">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scalable=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos.css">
    <title>DAYTONA CARS</title>
  </head>
  <body>
<?php
//
//
//
//
include("../INSERTAR_MANTENIMIENTO.php");

 if(isset($_POST["enviar"])){

$km=$_POST["km"];
$proximo_km=$_POST["proximo_km"];
$id_trabajo=$_POST["desplegable"];
$id_empleado=$_POST["empleado"];
$envio_coreo=$_POST["info"];
$repuestos=$_POST["comentarios"];
date_default_timezone_set("America/Bogota");
$fecha=date("Y-m-d");


//---- conexion con base de datos ---------
include ("conexion.php");
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
  mysqli_set_charset($conexion,"utf8");
//----------------------------------------------------------------------------


if($envio_coreo=="SI"){

  $buscar_trabajo= "SELECT * FROM trabajos WHERE id=$id_trabajo";
  $seleccionar_trabajo=mysqli_query($conexion,$buscar_trabajo);
  $seleccionar_trabajo= mysqli_fetch_row($seleccionar_trabajo);
  $trabajo=$seleccionar_trabajo[1];

  $buscar_id_client= "SELECT * FROM carros WHERE PLACA='$placa'";
  $seleccionar_id_client=mysqli_query($conexion,$buscar_id_client);
  $seleccionar_id_client= mysqli_fetch_row($seleccionar_id_client);
  $id_client=$seleccionar_id_client[1];



  $buscar_cliente= "SELECT NOMBRES, APELLIDOS, CORREO FROM clientes WHERE id=$id_client";
  $seleccionar_cliente=mysqli_query($conexion,$buscar_cliente);
  $seleccionar_cliente= mysqli_fetch_row($seleccionar_cliente);
  $email=$seleccionar_cliente[2];
  $nombre_cliente=$seleccionar_cliente[0];
  $apellido_cliente=$seleccionar_cliente[1];


  if($proximo_km==0){
    $mensaje_prox="";

  }else{
    $mensaje_prox=" Se recomienda realizar su proximo trabajo al kilometraje número: <b>".$proximo_km. "</b>";
  }
$texto_email0="Esperamos tenga un excelente día señor(a) <b>".$nombre_cliente. " ".$apellido_cliente. "</b>";
$texto_email=", <b>DAYTONA CARS</b> le agradece su fidelidad, a continución anexamos el trabajo";
$texto_email1=" que le realizamos a su vehículo.<br><table class='egt'>
  <tr> <th>PLACA</th> <td>".$placa. "</td></tr>";
$texto_email2="<tr>
  <th>KM</th>
  <td>".$km. "</td></tr>";
$texto_email3=" <tr>
  <th>TRABAJO</th>
    <td>". $trabajo . "</td></tr>
    <tr>
      <th>DESCRIPCCION</th>
      <td>".$repuestos."</td>
    </tr></table>  ";
$texto_email4="" .$mensaje_prox;
$texto_email5="<br><br><br><br><br><br><br><br><img src='https://66.media.tumblr.com/ce472b0d631f2bc621893d3bce8fb671/c69aef1acb16ed19-db/s250x400/2863b0bd064d44f6c1cf4a2bedc8878189521e2c.jpg'>";
$tex_fin_mensaje= $texto_email0.$texto_email.$texto_email1.$texto_email2.$texto_email3.$texto_email4.$texto_email5;
 $mensaje = wordwrap($tex_fin_mensaje, 70, "\r\n");


  $asunto="REPORTE MANTENIMIENTO";
  $headers="MIME-Version: 1.0\r\n";
  $headers.="Content-type: text/html; charset=iso-8859-1\r\n";
  $headers.="From: DAYTONA CARS <sebastianlopez980224@gmail.com>\r\n";
  $exito=mail($email,$asunto,$mensaje,$headers);


}  elseif($envio_coreo=="NO") {

}







//INSERT INTO `mantenimientos` ( `id_carro`, `id_login`, `KM`, `PROXIMO_KM`, `MANTENIMIENTO`, `REPUESTOS`, `FECHA`) VALUES (NULL, '13', '17', '200', '', '2', 'd', '2020-04-20');
  //------------------METEMOS DATOS ----------------------------------------------
  $insertar= "INSERT INTO mantenimientos (id_carro, id_login, KM, PROXIMO_KM, MANTENIMIENTO, REPUESTOS, NOTIFICACION, FECHA) VALUES ($id_carro, $id_empleado, $km, $proximo_km, $id_trabajo, '$repuestos', '$envio_coreo', '$fecha')";
  $resultados3=mysqli_query($conexion,$insertar);
if($resultados3!==false){
  echo "string";
  echo '<script type="text/javascript"> alert("MANTENIMIENTO REGISTRADO, PARA REGISTRAR OTRO MANTENIMIENTO A ESTA PLACA COMPLETE LOS DATOS, DE LO CONTRARIO OPRIMA VOLVER");</script>';


}
  }
 ?>


 <script type="text/javascript" src="../../js/formulario.js"></script>

</body>
</html>
