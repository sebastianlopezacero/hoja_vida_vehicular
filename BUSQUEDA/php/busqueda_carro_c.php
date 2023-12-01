<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="../css/tabla.css">
<style media="screen">
.paginador ul{
  padding: 5px;
  list-style: none;
  background: #FFF;
  margin-top: 15px;
  display:flex;
  justify-content: center;

}
.paginador a{
  color:#428bca;
  border: 1px solid #ddd;
  padding: 8px;
  display: inline-block;
  font-size: 20px;
  text-align: center;
  width: 50px;
}
.paginador a:hover{
  background: #ddd;
}
.pageSelected{
  color:#FFF;
  background:#428bca;
  border: 1px solid #428bca;
  padding: 8px;
  display: inline-block;
  font-size: 20px;
  text-align: center;
  width: 50px;
}


.form_search{
  display: flex;
  float: right;
  background: initial;
  padding: 10px;
  border-radius: 10px;

}
.form_search .btn_search{
  background: #1faac8;
  color: #FFF;
  padding: 0 20px;
  border: 0;
  cursor: pointer;
  margin-left: 10px;
}

</style>
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
// -------------- TERMINA CONEXION -----------------------------
// TRAEMOS DATOS DEL FORMATO----------------------------------



if(isset($_GET["buscar"]) ) {

$placan=$_GET["placan"];
$placal=$_GET["placal"];

  $placa=$placal."-".$placan;



//------------ CONSULTAMOS CARRO POR PLACA ------------------------
$consulta_carro="SELECT id, id_client, MARCA, LINEA FROM carros WHERE PLACA = '$placa'";
//UNIMOS CODIGO SQL
$resultados=mysqli_query($conexion,$consulta_carro);
$numero_placa= mysqli_fetch_row($resultados);
if($numero_placa!==NULL){
      $id=$numero_placa[0];
      $id_cliente=$numero_placa[1];
      $MARCA=$numero_placa[2];
      $LINEA=$numero_placa[3];

  // ----------- CONSULTAMOS AL CLIENTE DEL CARRO ---------------
  $consulta_cliente="SELECT * FROM clientes WHERE id = $id_cliente";
  $resultados2=mysqli_query($conexion,$consulta_cliente);
  $numero_clientes= mysqli_fetch_row($resultados2);
  if($numero_clientes!==NULL){
      $nombre=$numero_clientes[1];
      $apellido=$numero_clientes[2];
      $celular=$numero_clientes[3];
      $identificacion=$numero_clientes[4];
      $sexo=$numero_clientes[5];
      $correo=$numero_clientes[6];
      $direccion=$numero_clientes[7];
      $f_nacimiento=$numero_clientes[8];
      $f_ingreso=$numero_clientes[9];
}


//----               PAGINACIÓN ----------------------------------------

$sql_registros="SELECT COUNT(*) as total FROM mantenimientos WHERE id_carro = $id";
$resgistros=mysqli_query($conexion,$sql_registros);
$resultado_registros= mysqli_fetch_array($resgistros);
$total_registros=$resultado_registros['total'];
//------------------- resultados por pagina ----------------------------------
$por_pagina=8;

if(empty($_GET['pagina'])){
  // TRAEMOS DATOS DEL FORMATO----------------------------------

  $pagina=1;
}else{
  // TRAEMOS DATOS DEL FORMATO----------------------------------

  $pagina=$_GET['pagina'];
}
$desde=($pagina-1)*$por_pagina;

$total_paginas=ceil($total_registros/$por_pagina);
//--------------------------------------------------------------------------

$consulta_mantenimiento="SELECT * FROM mantenimientos WHERE id_carro = $id LIMIT $desde,$por_pagina ";
$resultados3=mysqli_query($conexion,$consulta_mantenimiento);



// ------------- TABLA DATOS PERSONALES --------------------------------
echo '<br><br><div class="main-container" style="text-align:center;"><table><tr>
<th>PROPIETARIO</th>
<th>PLACA</th>
<th>VEHÍCULO</th></tr>
<tr><td>'.$nombre. " ".$apellido.'</td>
<td>'.$placa.'</td>
<td>'.$MARCA. ' - '.$LINEA .'</td></tr>
</table></div><br><br>';
//--------------------------------------------------------


//------------------ TABLA CON LO DATOS------------
echo '<div class="main-container" style="text-align:center;"><table><tr>
      <th>MANTENIMIENTO</th>
      <th>DECRIPCCIÓN</th>
      <th>KM</th>
      <th>PROXIMO KM</th>
      <th>TÉCNICO</th>
      <th>FECHA</th>
      </tr>';

// ------------------ BUCLE PARA TODOS LOS MANTENIMIENTOS DEL CARRO-----------
while ($fila=mysqli_fetch_array($resultados3, MYSQLI_ASSOC)){
    $id_login=$fila["id_login"];
    $id_mantenimiento=$fila["MANTENIMIENTO"];
    //-------------- NOMBRE DEL TRABAJADOR QUE HIZO EL TRABAJO ------------------
    $consulta_empleado="SELECT NOMBRE FROM login WHERE id= $id_login";
    $resultados4=mysqli_query($conexion,$consulta_empleado);
    $empleados= mysqli_fetch_row($resultados4);
//-------------- TRABAJO QUE LE HICIERON ------------------
    $consulta_trabajo="SELECT * FROM trabajos WHERE id= $id_mantenimiento";
    $resultados5=mysqli_query($conexion,$consulta_trabajo);
    $trabajos= mysqli_fetch_row($resultados5);

//------------------  DATOS ORGANIZADOS--------------------------
      echo "<tr><td>";
      echo $trabajos[1] . " </td><td>";
      echo $fila["REPUESTOS"] . " </td><td class='empleado'>";
      echo $fila["KM"] . " </td><td class='empleado'>";
      echo $fila["PROXIMO_KM"] . " </td><td class='empleado'>";
      echo $empleados[0] . " </td><td>";
      echo $fila["FECHA"] . " </td><td></tr>";
  }


        // /------------------ PAGINACIÓN ----------------
          $n=1;
         echo '<div class="paginador">
           <ul>
    ';
               for ($i=1; $i <=$total_paginas; $i++) {

                // echo '<li><a href="?pagina='.$i.'placan='.$placan.'placal='.$placal.'">' . $i .' </a></li> ';
                  if($i==$pagina){
                    echo '<li class="pageSelected">'.$i.'</li>';
                  }else{
                echo '<li><a href="?pagina='.$i.'& placan='.$placan.'& placal='.$placal.'& buscar=Buscar">' . $i .' </a></li> ';
              }}

         echo '
           </ul>
         </div>';

//------- POR SI LA PLACA NO EXISTE ------------------
}else{

  echo '<script type="text/javascript">
    alert("Placa no encontrado");
      </script>';

}








 //---------------- BOTONES--------------------------------
echo '<a href="../formularios/BUSQUEDA_CARRO_C.php"><input type="button" name="" value="VOLVER"  class="btn"></a>';
echo '<input type="button" name="" value="CERRAR SESIÓN" class="btn">';
echo '<a  href="../../PDF/pdf4.php?placa='.$placa.'" target="_blank" ><input type="button" name="" value="GENERAR PDF" target="_blank" class="btn"></a>';

 }

 //-------CERRAMOS $conexion---------------------------------------
  mysqli_close($conexion);


   ?>
  </body>
</html>
