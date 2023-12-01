
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<link rel="stylesheet" href="../css/estilos.css">
<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>




<title>Formularios</title>
</head>
<body>
<?php
if(!isset($_POST["enviar"])){
echo '<div class="contenedor-formulario">
<div class="wrap">
<form action="'. $_SERVER['PHP_SELF'].'" class="formulario" name="formulario_registro" method="post">
<!-- NOMBRE -->
<div>
<div class="input-group">
<input type="text" id="nombre" name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
<label class="label" for="nombre">Nombre:</label>
</div>
<!-- APELLIDO -->
<div class="">
<div class="input-group">
<input type="text"  id="apellido" name="apellido" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
<label class="label" for="apellido">Apellido:</label>
</div>
<!-- CARGO -->
<div class="">
<div class="input-group">
<input type="text"  id="cargo" name="cargo" value="" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
<label class="label" for="cargo">Cargo:</label>
</div>
<!-- EMAIL -->
<div class="input-group">
<input type="email"  id="email" name="email" value="">
<label class="label" for="email">Correo:</label>
</div>
<!-- CONTRASEÑA -->
<div class="input-group">
<input type="password"  id="pass" name="pass" value="">
<label class="label" for="pass">Contraseña:</label>
</div>
<!-- VERIFICACIÓN CONTRASEÑA -->
<div class="input-group">
<input type="password"  id="pass2" name="pass2" value="">
<label class="label" for="pass2">Repetir Contraseña:</label>
</div>

<!-- SEXO -->
<div class="input-group radio">
<input type="radio" name="sexo" id="hombre" value="Hombre">
<label for="hombre">Hombre</label>
<input type="radio" name="sexo" id="mujer" value="Mujer">
<label for="mujer">Mujer</label>
</div>

<input type="submit" name="enviar" id="btn-submit" value="Enviar">
<br>
<br>
<a href="../index.php"><input type="button" name="volver" value="Volver"></a>
</div>
</form>
</div>
</div>
';
}

if(isset($_POST["enviar"])){


$nombre=$_POST['nombre'];
$apellido=$_POST["apellido"];
$email=$_POST["email"];
$sexo=$_POST["sexo"];
$pass=$_POST["pass"];
$pass2=$_POST["pass2"];
$cargo=$_POST["cargo"];

//---- conexion con base de datos ---------
include ("php/conexion.php");
    $conexion=mysqli_connect($db_host,$db_usuarios,$db_contra);
  if(mysqli_connect_errno()){
    echo "FALLO AL CONECTAR BASE DE DATOS";
    exit();
  }
  mysqli_select_db($conexion, $db_nombre) or die ("EL NOMBRE DE LA BASE DE DATOS ESTA MAL");
  mysqli_set_charset($conexion,"utf8");
//----------------------------------------------------------------------------

if ($pass==$pass2) {
  //------------------METEMOS DATOS ----------------------------------------------
  $insetar= "INSERT INTO login (NOMBRE, APELLIDO, CARGO, CORREO, CONTRASENA, SEXO) VALUES ('$nombre', '$apellido', '$cargo', '$email', '$pass', '$sexo')";
  $resultados=mysqli_query($conexion,$insetar);
   // header("location:../login.html");
   if($resultados!=FALSE){
     echo '<script type="text/javascript">
       alert("REGISTRO EXITOSO");
       window.location="../index.php";
       </script>';
   }

}else{

  //------------------------------------------------------------------------------
// echo '<script language="javascript">alert("DATOS ERRONEOS");</script>';
}
}




?>

<script src="../js/formulario.js"></script>
</body>
</html>
