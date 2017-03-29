
<?php

//incluir libreria fpdf
include('../conexion.php');
require('../fpdf/fpdf.php');
$id = $_POST['id'];
//echo "mundo" . $id;



session_start();

$pdf = new FPDF();

//adicionar pagina
$pdf->AddPage();

//10 -> en ejex 10->en eje y 25-> ancho
//$pdf->Image('C:\xampp\htdocs\RegistrosAlcaldia\imagenes\escudonar.png', 10, 10, 16);

$pdf->Cell(16, 18, '', 0); //16-ancho 18-alto 1-borde
//fuente letra
$pdf->SetFont('courier', 'B', 10);

// 100-> ancho, 10-> alto , utpf8 eliminar caracterres especiales, C-> centrar
//0 --> borde de la celda
$pdf->Cell(140, 18, utf8_decode('REGISTRO DE ASISISTENCIA ICBF CORREGIMINETO DE GENOY'), 0, 'C');

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 18, 'Fecha: ' . date('d/m/y'), 0, 'R');

//salto de linea 20 puntos
//$this->Ln(); -> un salto de linea
$pdf->Ln(5);
$pdf->Ln();



$pdf->Cell(70, 12, '', 0); //16-ancho 18-alto 1-borde
$pdf->Cell(80, 12, utf8_decode('INFORMACIÓN DE USUARIO'), 0, 'C');
$pdf->Ln(12);

//titulos tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(28, 10, utf8_decode('Cedula'), 1, 'C');
$pdf->Cell(50, 10, utf8_decode('Nombre'), 1, 'C');
$pdf->Cell(35, 10, utf8_decode('Tipo'), 1, 'C');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);

//contador registros
$contador = 1;

//realizar consulta
$consulta = "select id, nombre, tipo from usuarios";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a array o vector registros de base de datos
$registros = $resultado->fetch_assoc();
$num=$resultado->num_rows;
/*
$pdf->Cell(15, 10, utf8_decode($contador), 1, 'C');
$pdf->Cell(28, 10, utf8_decode($registros['id']), 1, 'C');
$pdf->Cell(50, 10, utf8_decode($registros['nombre']), 1, 'C');
$pdf->Cell(35, 10, utf8_decode($registros['tipo']), 1, 'C');
*/
 while ($row = $resultado->fetch_assoc()) {
       
		$pdf->Cell(28, 10, $row['id'], 1, 'C');
		$pdf->Cell(50, 10, $row['nombre'], 1, 'C');
		$pdf->Cell(35, 10, $row['tipo'], 1, 'C');
 $pdf->Ln(10);
 }
//$pdf->Row(array($referencia,$descripcion,$cantidad,$precio_unidad,$parcial));




//imprimir reporte
$pdf ->Output();
//$pdf->Output('r' . $id . '.pdf');

$fechar = date ('_dmy_His');
$pdf ->Output("C:\\reportes\\r".$id.$fechar.".pdf",'F');
