<?php


require('fpdf.php');
// include('pfd2.php');
$placa=$_GET["placa"];
class PDF_MC_Table extends FPDF {
  // Cabecera de página
  function Header()
  {
    $placa=$_GET["placa"];
      // Logo
      $this->Image('../imagenes/con_este_equipo siempre_gano.jpg',10,8,50);
      // Arial bold 15
      $this->SetFont('COURIER','B',15);

      // Movernos a la derecha
      $this->Cell(80);
      // Título
      $this->Cell(95,5,utf8_decode('DAYTONA CARS'),0,1,'R');
      $this->Cell(182,5,utf8_decode('CARRERA 45A #130-49'),0,1,'R');
      $this->Cell(185,5,utf8_decode('TELEFONO: 3112923512'),0,1,'R');
        $this->SetFont('TIMES','B',20);
      $this->Cell(185,10,utf8_decode('Historia clínica del vehículo'),0,1,'R');
      $this->Ln(10);
      $this->Cell(185,10,utf8_decode('PLACA:'.$placa),0,1,'C');
      $this->Ln(7);
      $this->SetFont('Arial','B',15);
      $this->Cell(20,10,utf8_decode('TRABAJO'),0,0,'C',false);
      $this->Cell(100,10,utf8_decode('DESCRIPCCION'),0,0,'C',false);
      $this->Cell(40,10,utf8_decode('KM'),0,0,'C',false);
      $this->Cell(20,10,utf8_decode('FECHA'),0,1,'C',false);

      // Salto de línea
      $this->Ln(20);

  }
  // Pie de página
  function Footer()
  {
      // Posición: a 1,5 cm del final
      $this->SetY(-15);
      // Arial italic 8
      $this->SetFont('Courier','I',12);
      // Número de página
            $this->Cell(0,10,utf8_decode('DAYTONA CARS '),0,0,'L');
      $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo(),0,0,'R');
  }

  //-------------------------------------
  //-------------------------------------
  //-------------------------------------

// variable para almacenar anchos y alineaciones de celdas y altura de línea
var $widths;
var $aligns;
var $lineHeight;

//Establecer la matriz de anchos de columna
function SetWidths($w){
    $this->widths=$w;
}

//Establecer la matriz de alineaciones de columnas
function SetAligns($a){
    $this->aligns=$a;
}

//Establecer altura de línea
function SetLineHeight($h){
    $this->lineHeight=$h;
}

//Calcule la altura de la fila.
function Row($data)
{
    // numero de linea
    $nb=1.5;

    // recorrer cada dato para encontrar el mayor número de línea en una fila.
    for($i=0;$i<count($data);$i++){
      // NbLines calculará cuántas líneas se necesitan para mostrar el texto ajustado en el ancho especificado.
         // entonces la función max comparará el resultado con el actual $ nb. Volviendo el mejor. Y reasignar el $ nb.
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    }

    //multiplica el número de línea por la altura de la línea. Esta será la altura de la fila actual
    $h=$this->lineHeight * $nb;

    //Emita un salto de página primero si es necesario
    $this->CheckPageBreak($h);

    //Dibuja las celdas de la fila actual
    for($i=0;$i<count($data);$i++)
    {
        // ancho de la columna actual
        $w=$this->widths[$i];
        // alineación de la col actual. si no está activado, déjelo a la izquierda
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Guardar la posición actual
        $x=$this->GetX();
        $y=$this->GetY();
        //dibuja el borde

        // $this->Rect($x,$y,$w,$h);

        //Imprime el texto
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Coloque la posición a la derecha de la celda.
        $this->SetXY($x+$w,$y);
    }
    //Ir a la siguiente línea
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //Si la altura h causara un desbordamiento, agregue una nueva página inmediatamente
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //calcular el número de líneas que tomará un MultiCell de ancho w
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*450/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
}








$pdf=new PDF_MC_Table();
$pdf->AddPage();
$pdf->SetFont('TIMES','I',12);
$pdf->SetWidths(Array(30,100,30,30));
$pdf->SetLineHeight(5);




    require '../INSERTAR/php/conexion.php';
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
    //------------ CONSULTAMOS CARRO POR PLACA ------------------------
    $consulta_carro="SELECT id, id_client, MARCA, LINEA  FROM carros WHERE PLACA = '$placa'";
    //UNIMOS CODIGO SQL
    $resultados=mysqli_query($conexion,$consulta_carro);
    $numero_placa= mysqli_fetch_row($resultados);

          $id=$numero_placa[0];
          $id_cliente=$numero_placa[1];
          $MARCA=$numero_placa[2];
        $LINEA=$numero_placa[3];


        //--------------------------------------------------------------------------

        $consulta_mantenimiento="SELECT * FROM mantenimientos WHERE id_carro = $id" ;
        $resultados3=mysqli_query($conexion,$consulta_mantenimiento);


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

    $pdf->Row(Array(
      utf8_decode($trabajos[1]),
      utf8_decode($fila["REPUESTOS"]),
      utf8_decode($fila["KM"]),
      utf8_decode($fila["FECHA"])
    ));


          }



    $pdf->Output('I','Historiclinica.pdf',true);


?>
