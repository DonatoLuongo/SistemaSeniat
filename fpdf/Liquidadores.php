<?php
require_once('../PHP/conexion.php');
require_once('../fpdf/fpdf.php');

// Crear instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Cabecera de página
$pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Liquidadores', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Fecha: ' . date('d/m/Y'), 0, 1, 'R');
$pdf->Ln(20); // Salto de línea

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Apellido', 1);
$pdf->Cell(40, 10, 'Cedula', 1);
$pdf->Cell(40, 10, 'Activo', 1);
$pdf->Ln();

// Obtener datos de la base de datos y agregarlos al PDF
$stmt = $pdo->query("SELECT nombre, apellido, cedula, activo, idrol FROM usuarios where idrol = 3");
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf->SetFont('Arial', '', 10);
foreach ($resultados as $fila) {
    $pdf->Cell(40, 10, $fila['nombre'], 1);
    $pdf->Cell(40, 10, $fila['apellido'], 1);
    $pdf->Cell(40, 10, $fila['cedula'], 1);
    $pdf->Cell(40, 10, $fila['activo'] ? 'Si' : 'No', 1);
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();
?>
