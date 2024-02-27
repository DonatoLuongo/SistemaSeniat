<?php
require_once '../PHP/conexion.php'; // Asegúrate de incluir el archivo de conexión
require_once '../fpdf/fpdf.php';

// Función para generar el PDF con los datos de los productos de fósforos
function generarPDF($pdo)
{
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
     // Cabecera de página
     $pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
     $pdf->SetFont('Arial', 'B', 15);
     $pdf->Cell(0, 10, utf8_decode('Consulta de Fósforos'), 0, 1, 'C');
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(0, 10, utf8_decode('Fecha: ') . date('d/m/Y'), 0, 1, 'R');
     $pdf->Ln(20); // Salto de línea


    // Obtener datos de la base de datos y agregarlos al PDF
    try {
        $stmt = $pdo->query("SELECT id, labor, tarifa FROM productos_fosforos");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(50, 10, 'ID', 1, 0, 'C');
            $pdf->Cell(70, 10, 'Labor', 1, 0, 'C');
            $pdf->Cell(70, 10, 'Tarifa', 1, 1, 'C');
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->Cell(50, 10, utf8_decode($fila['id']), 1, 0, 'C');
                $pdf->Cell(70, 10, utf8_decode($fila['labor']), 1, 0, 'C');
                $pdf->Cell(70, 10, utf8_decode($fila['tarifa']), 1, 1, 'C');
            }
        } else {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('No hay productos de fósforos registrados.'), 0, 1);
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
