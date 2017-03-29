
<?php

//incluir libreria fpdf
include('../conexion.php');
require('../fpdf/fpdf.php');
$pdf = new FPDF();
$id = $_POST['id'];
//echo "mundo" . $id;


session_start();



//adicionar pagina
$pdf->AddPage();

//10 -> en ejex 10->en eje y 25-> ancho
//$pdf->Image('C:\xampp\htdocs\RegistrosAlcaldia\imagenes\escudonar.png', 10, 10, 16);

$pdf->Cell(16, 18, '', 0); //16-ancho 18-alto 1-borde
//fuente letra
$pdf->SetFont('courier', 'B', 10);

// 100-> ancho, 10-> alto , utpf8 eliminar caracterres especiales, C-> centrar
//0 --> borde de la celda
$pdf->Cell(140, 18, utf8_decode('REGISTRO DE ASISISTENCIA FUNCIONARIOS CORREGIMIENTO DE GENOY'), 0, 'C');

$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(30, 18, 'Fecha: ' . date('d/m/y'), 0, 'R');

//salto de linea 20 puntos
//$this->Ln(); -> un salto de linea
$pdf->Ln(5);
$pdf->Ln();

//NOTA: despues de cada salto se configura nuevo fuentes
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 12, utf8_decode("Identificación: " . $_SESSION['login']), 0, 'L');
$pdf->Ln(6);
$pdf->Cell(0, 12, utf8_decode('Nombre: ' . $_SESSION['name']), 0, 'L');
$pdf->Ln(6);
$pdf->Cell(0, 12, utf8_decode('Dirección: Calle 20 #12-3, Pasto'), 0, 'L');
$pdf->Ln(6);
$pdf->Cell(0, 12, utf8_decode('Telefono: 7310011'), 0, 'L');
$pdf->Ln(6);
$pdf->Cell(0, 12, utf8_decode('E-mail: silmalegofa@gmail.com'), 0, 'L');
$pdf->Ln(20);

$pdf->Cell(70, 12, '', 0); //16-ancho 18-alto 1-borde
$pdf->Cell(80, 12, utf8_decode('INFORMACIÓN DE REGISTRO'), 0, 'C');
$pdf->Ln(12);

//titulos tabla
$pdf->SetFont('Arial', 'B', 10);

$pdf->Cell(22, 10, utf8_decode('Codigo'), 1, 'C');
$pdf->Cell(30, 10, utf8_decode('Cedula'), 1, 'C');
$pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 'C');
$pdf->Cell(25, 10, utf8_decode('Hora'), 1, 'C');
$pdf->Cell(26, 10, utf8_decode('Jornada'), 1, 'C');
$pdf->Cell(26, 10, utf8_decode('Ingreso'), 1, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);

//contador registros
//$contador = 1;

//realizar consulta
$consulta = "select  codigo, cedula, fecha, hora, jornada, ingreso from registro where codigo =" . $id . "";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a array o vector registros de base de datos
$registros = $resultado->fetch_assoc();

//$pdf->Cell(15, 10, utf8_decode($contador), 1, 'C');
$pdf->Cell(22, 10, utf8_decode($registros['codigo']), 1, 'C');
$pdf->Cell(30, 10, utf8_decode($registros['cedula']), 1, 'C');
$pdf->Cell(25, 10, utf8_decode($registros['fecha']), 1, 'C');
$pdf->Cell(25, 10, utf8_decode($registros['hora']), 1, 'C');
$pdf->Cell(26, 10, utf8_decode($registros['jornada']), 1, 'C');
$pdf->Cell(26, 10, utf8_decode($registros['ingreso']), 1, 'C');
$pdf->Ln(10);

//$pdf->SetFont('Arial', 'B', 10);
//$pdf->Cell(92, 10, '', 1, 'C');
//$pdf->Cell(51, 10, utf8_decode('Total Usuarios: '), 1, 'C');
//$pdf->SetFont('Arial', '', 10);
//$pdf->Cell(26, 10, utf8_decode($contador), 1, 'C');

//imprimir reporte
$pdf ->Output();
//$pdf->Output('r' . $id . '.pdf');

$fechar = date ('_dmy_His');
$pdf ->Output("C:\\reportes\\rinreg".$id.$fechar.".pdf",'F');
