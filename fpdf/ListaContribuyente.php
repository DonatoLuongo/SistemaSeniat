<?php
require_once '../PHP/conexion.php'; // Asegúrate de que la ruta al archivo 'conexion.php' sea correcta
require_once '../fpdf/fpdf.php';

// Crear instancia de FPDF
$pdf = new FPDF();
$pdf->AddPage();

// Cabecera de página
$pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(0, 10, 'Contribuyentes', 0, 1, 'C');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 10, 'Fecha: ' . date('d/m/Y'), 0, 1, 'R');
$pdf->Ln(20); // Salto de línea

// Encabezado de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(30, 10, 'Nombre', 1);
$pdf->Cell(25, 10, 'RIF', 1);
$pdf->Cell(25, 10, 'Licencia', 1);
$pdf->Cell(25, 10, 'Estado', 1);
$pdf->Cell(25, 10, 'Municipio', 1);
$pdf->Cell(20, 10, 'Activo', 1);
$pdf->Ln();

// Obtener datos de la base de datos y agregarlos al PDF
$stmt = $pdo->query("SELECT c.id, c.nombre, c.rif, c.licencia, d.estado, d.municipio, c.activo FROM contribuyentes c JOIN direccion_plantas d ON c.id = d.idcontribuyente");
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

$pdf->SetFont('Arial', '', 10);
foreach ($resultados as $fila) {
    $pdf->Cell(20, 10, $fila['id'], 1);
    $pdf->Cell(30, 10, $fila['nombre'], 1);
    $pdf->Cell(25, 10, $fila['rif'], 1);
    $pdf->Cell(25, 10, $fila['licencia'], 1);
    $pdf->Cell(25, 10, $fila['estado'], 1);
    $pdf->Cell(25, 10, $fila['municipio'], 1);
    $pdf->Cell(20, 10, $fila['activo'] ? 'Si' : 'No', 1);
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();
?>
