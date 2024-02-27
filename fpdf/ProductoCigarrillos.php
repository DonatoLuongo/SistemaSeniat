<?php
require_once '../PHP/conexion.php'; // Asegúrate de incluir el archivo de conexión
require_once '../fpdf/fpdf.php';

// Función para generar el PDF con los datos de los productos de cigarrillos
function generarPDF($pdo)
{
    // Crear instancia de FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    
     // Cabecera de página
     $pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
     $pdf->SetFont('Arial', 'B', 15);
     $pdf->Cell(0, 10, utf8_decode('Consulta de Cigarrillos'), 0, 1, 'C');
     $pdf->SetFont('Arial', '', 10);
     $pdf->Cell(0, 10, utf8_decode('Fecha: ') . date('d/m/Y'), 0, 1, 'R');
     $pdf->Ln(20); // Salto de línea


    // Obtener datos de la base de datos y agregarlos al PDF
    try {
        $stmt = $pdo->query("SELECT id, marca FROM productos_cigarrillos");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(50, 10, 'ID', 1, 0, 'C');
            $pdf->Cell(140, 10, 'Marca', 1, 1, 'C');
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->Cell(50, 10, utf8_decode($fila['id']), 1, 0, 'C');
                $pdf->Cell(140, 10, utf8_decode($fila['marca']), 1, 1, 'C');
            }
        } else {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('No hay productos de cigarrillos registrados.'), 0, 1);
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
