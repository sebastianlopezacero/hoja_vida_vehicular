<?php
try{
$base=new PDO("mysql:host=localhost; dbname=daytona", "root", "");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$id= $_GET['desplegable'];
$linea = $base->query("SELECT * FROM linea_carro WHERE id_marca=$id");
echo "<select id='desplegable2' name='desplegable2' class='select-css'>";
foreach($linea as $row){
  echo '<option value="'.$row[0].'">'.$row[2].'</option>';
}echo '</select>';

}
}
catch(Exception $e){
die("Error: ". $e->getLine());
}


?>
