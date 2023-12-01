
<?php
try{
$base=new PDO("mysql:host=localhost; dbname=daytona", "root", "");
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// $sql="SELECT * FROM marca_carro"
// $resultado=$base->prepare($sql);
$marca = $base->query("SELECT * FROM marca_carro");
echo "<select id='desplegable' name='desplegable' class='select-css'  onchange='this.form.submit()'>";
foreach($marca as $row){
    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
}echo '</select>';





// $id= $_GET['desplegable'];
$linea = $base->query("SELECT * FROM linea_carro WHERE id_marca=$id");
echo "<select id='desplegable2' name='desplegable2' class='select-css'>";
foreach($linea as $row){
  echo '<option value="'.$row[0].'">'.$row[2].'</option>';
}echo '</select>';


}
catch(Exception $e){
die("Error: ". $e->getLine());
}









?>
