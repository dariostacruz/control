
<?php

//incluir libreria fpdf
include('../conexion.php');
include('../fpdf/fpdf.php');






session_start();

$pdf = new FPDF();

//adicionar pagina
$pdf->AddPage();

//10 -> en ejex 10->en eje y 25-> ancho
$pdf->Image('../imagenes/escudonar.png', 10, 10, 16);

$pdf->Cell(16, 18, '', 0); //16-ancho 18-alto 1-borde
//fuente letra
$pdf->SetFont('courier', 'B', 10);

// 100-> ancho, 10-> alto , utpf8 eliminar caracterres especiales, C-> centrar
//0 --> borde de la celda
$pdf->Cell(140, 18, utf8_decode('REGISTRO DE ASISISTENCIA FUNCIONARIOS ALCALDIA DE NARIÑO NARIÑO'), 0, 'C');

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
$pdf->Cell(80, 12, utf8_decode('INFORMACIÓN DE USUARIO'), 0, 'C');
$pdf->Ln(12);

//titulos tabla
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(15, 10, utf8_decode('Número'), 1, 'C');
$pdf->Cell(28, 10, utf8_decode('Identificacion'), 1, 'C');
$pdf->Cell(50, 10, utf8_decode('Nombre'), 1, 'C');
$pdf->Cell(35, 10, utf8_decode('tipo'), 1, 'C');
//$pdf->Cell(35, 10, utf8_decode('Dirección'), 1, 'C');
//$pdf->Cell(26, 10, utf8_decode('Telefono'), 1, 'C');

$pdf->Ln(10);
$pdf->SetFont('Arial', '', 10);

//contador registros
$contador = 0;

//realizar consulta
$consulta = "select id, nombre, tipo from usuarios";

//traer registros de base de datos con la conexion
$resultado = $con->query($consulta);

//convertir a array o vector registros de base de datos
while ($registros = $resultado->fetch_assoc()) {
    
$contador = $contador+1;

$pdf->Cell(15, 10, utf8_decode($contador), 1, 'C');
$pdf->Cell(28, 10, utf8_decode($registros['id']), 1, 'C');
$pdf->Cell(50, 10, utf8_decode($registros['nombre']), 1, 'C');
$pdf->Cell(35, 10, utf8_decode($registros['tipo']), 1, 'C');
$pdf->Ln(10);
}
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(128, 10, '', 1, 'C');
$pdf->Cell(35, 10, utf8_decode('Total Usuarios: '), 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(26, 10, utf8_decode($contador), 1, 'C');

//imprimir reporte
$pdf ->Output();
//$pdf->Output('r' . $id . '.pdf');
/*
$fechar = date ('_dmy_His');
$pdf ->Output("C:\\reportes\\rgeneral".$fechar.".pdf",'F');
*/
