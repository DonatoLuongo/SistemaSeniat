<?php
// Este código evita que una sesión se abra dos veces
session_start();

require_once '../PHP/conexion.php';
require_once '../fpdf/fpdf.php';

// Función para generar el PDF con los datos de los códigos contables de cigarrillos
function generarPDF($pdo)
{
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();

     // Cabecera de página
     $pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
     $pdf->SetFont('Arial', 'B', 15);
     $pdf->Cell(0, 10, utf8_decode('Códigos Contables'), 0, 1, 'C');
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(0, 10, utf8_decode('Fecha: ') . date('d/m/Y'), 0, 1, 'R');
     $pdf->Ln(20); // Salto de línea

     // Cabecera de página
     $pdf->SetFont('Arial', 'B', 15);
     $pdf->Cell(0, 10, utf8_decode('Códigos Contables de Cigarrillos'), 0, 1, 'C');
     $pdf->Ln(10);
     
    // Obtener datos de la base de datos y agregarlos al PDF
    try {
        $stmt = $pdo->query("SELECT nombre, codigo_contable FROM codigo_contable_cigarrillos");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(70, 10, 'Nombre', 1, 0, 'C');
            $pdf->Cell(70, 10, utf8_decode('Código'), 1, 1, 'C');
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->Cell(70, 10, utf8_decode($fila['nombre']), 1, 0, 'C');
                $pdf->Cell(70, 10, utf8_decode($fila['codigo_contable']), 1, 1, 'C');
            }
        } else {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('No hay códigos contables de cigarrillos registrados.'), 0, 1);
        }
    } catch (PDOException $e) {
        die('Error al realizar la consulta: ' . $e->getMessage());
    }

    // Salida del PDF
    $pdf->Output();
}

// Llamar a la función para generar el PDF
generarPDF($pdo);
?>
