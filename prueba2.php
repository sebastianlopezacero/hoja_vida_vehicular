
<?php
require('PDF/fpdf.php');



$mysqli= new mysqli("localhost","root","", "daytona");
$consulta="SELECT * FROM mantenimientos";
$resultados=$mysqli->query($consulta);



//
// class PDF extends FPDF
// {
//   class ConductPDF extends FPDF {
//   function vcell($c_width,$c_height,$x_axis,$text){
//   $w_w=$c_height/3;
//   $w_w_1=$w_w+2;
//   $w_w1=$w_w+$w_w+$w_w+3;
//   $len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array
//   if($len>7){
//   $w_text=str_split($text,7);
//   $this->SetX($x_axis);
//   $this->Cell($c_width,$w_w_1,$w_text[0],'','','');
//   $this->SetX($x_axis);
//   $this->Cell($c_width,$w_w1,$w_text[1],'','','');
//   $this->SetX($x_axis);
//   $this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
//   }
//   else{
//          $this->SetX($x_axis);
//          $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
//          }
//       }
//
//
// // Cabecera de página
// function Header()
// {
//   //  --------------  LINEAS GRUERSAS -----------
//         // $this->Rect(1, 1, 213, 31);
//         //  $this->Rect(1, 31, 213, 1, 'DF');
//
//     // Logo
//     $this->Image('imagenes/con_este_equipo siempre_gano.jpg',10,10,60);
//     // Arial bold 15
//     $this->SetFont('Arial','B',15);
//     // Movernos a la derecha
//     $this->Cell(90,10);
//     // Título
//     $this->Cell(70,10,'DAYTONA CARS',0,0,'C');
//     // Salto de línea
//     $this->Ln(50);
//     //Cell(ancho, altura, 'texto', borde[0 no :1 si], salto de linea[0:no 1:si], alinear['C'], rellenar celda [0:no 1:si]);
//     // $this->Cell(30, 10, 'MANTENIMIENTO', 1, 0, 'C', 0);
//     // $this->Cell(30, 10, 'REPUESTOS', 1, 0, 'C', 0);
//     // $this->Cell(30, 10, 'FECHA', 1, 1, 'C', 0);
// }
//
// // Pie de página
// function Footer()
// {
//
//     // Posición: a 1,5 cm del final
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Número de página
//     $this->Cell(0,10,utf8_decode('Pagína ').$this->PageNo().'/{nb}',0,0,'C');
// }
// }
//
class ConductPDF extends FPDF {
function vcell($c_width,$c_height,$x_axis,$text){
$w_w=$c_height/3;
$w_w_1=$w_w+2;
$w_w1=$w_w+$w_w+$w_w+3;
$len=strlen($text);// check the length of the cell and splits the text into 7 character each and saves in a array
if($len>7){
$w_text=str_split($text,7);
$this->SetX($x_axis);
$this->Cell($c_width,$w_w_1,$w_text[0],'','','');
$this->SetX($x_axis);
$this->Cell($c_width,$w_w1,$w_text[1],'','','');
$this->SetX($x_axis);
$this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
}
else{
       $this->SetX($x_axis);
       $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
       }
    }
$pdf = new ConductPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',16);
// $pdf = new PDF();
// $pdf->AliasNbPages();
// $pdf->AddPage();
// $start_x=$pdf->GetX(); //initial x (start of column position)
// $current_y = $pdf->GetY();
// $current_x = $pdf->GetX();
//
// $cell_width_id = 10;  //define cell width
// $cell_height_id=6;    //define cell height
// $cell_width_man = 140;  //define cell width
// $cell_height_man=40;    //define cell height
// $cell_width_fec = 40;  //define cell width
// $cell_height_fec=6;    //define cell height
// $pdf->SetFillColor(232,232,232);
// $pdf->SetFont('Arial','B',16);
// $pdf->cell(10,6,'ID',1,0,'C',1);
// $pdf->cell(140,6,'MANTENIMIENTO',1,0,'C',1);
// $pdf->cell(40,6,'FECHA',1,1,'C',1);
$x_axis=$pdf->getx();
$c_width=20;// cell width
$c_height=6;// cell height
while ($row = $resultados->fetch_assoc()){
//   $pdf->CellFitSpace(0,10,$txt_short,1,1);
// $pdf->CellFitSpace(0,10,$txt_long,1,1,'',1);
$pdf->vcell($c_width,$c_height,$x_axis,$row['MANTENIMIENTO']);// pass all values inside the cell
$x_axis=$pdf->getx();// now get current pdf x axis value

$pdf->vcell($c_width,$c_height,$x_axis,$row['REPUESTOS']);// pass all values inside the cell
$x_axis=$pdf->getx();// now get current pdf x axis value

$pdf->vcell($c_width,$c_height,$x_axis,$row['FECHA']);// pass all values inside the cell
$x_axis=$pdf->getx();// now get current pdf x axis value


// $pdf->Cell($cell_width_id, $cell_height_id, $row['MANTENIMIENTO'], 1, 0, 'C', 0);
// $current_x+=$cell_width_id;                           //calculate position for next cell
// $pdf->SetXY($current_x, $current_y);               //set position for next cell to print
// $pdf->MultiCell($cell_width_man, $cell_height_man, $row['REPUESTOS'], 1, 0, 'C', 0);
// $current_x+=$cell_width_man;                           //calculate position for next cell
// $pdf->SetXY($current_x, $current_y);               //set position for next cell to print
// $pdf->Cell($cell_width_fec, $cell_height_fec, $row['FECHA'], 1, 1, 'C', 0);
// $current_x+=$cell_width_fec;                           //calculate position for next cell
// $pdf->SetXY($current_x, $current_y);               //set position for next cell to print
//

}










$pdf->Output();
?>
