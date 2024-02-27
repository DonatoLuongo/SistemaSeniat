<?php
// Este código evita que una sesión se abra dos veces
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
}

require_once '../PHP/conexion.php';
require_once '../fpdf/fpdf.php';

// Función para generar el PDF con los datos de los códigos contables
function generarPDF($pdo)
{
    // Crear instancia de FPDF con la configuración de UTF-8
    $pdf = new FPDF('P', 'mm', 'Letter');
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    // Cabecera de página
    $pdf->Image('Seniat.png', 10, 10, 30); // Ajusta la ruta y posición de la imagen
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Códigos Contables'), 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(0, 10, utf8_decode('Fecha: ') . date('d/m/Y'), 0, 1, 'R');
    $pdf->Ln(20); // Salto de línea

    // Cabecera de página
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->Cell(0, 10, utf8_decode('Códigos Contables de Licores'), 0, 1, 'C');
    $pdf->Ln(10);

    // Obtener datos de la base de datos y agregarlos al PDF
    try {
        // Obtener códigos contables de producción
        $stmt = $pdo->query("SELECT nombre, codigo_contable FROM codigo_contable_produccion");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('Códigos Contables de Producción'), 0, 1);
            $pdf->Ln(5);
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->MultiCell(0, 10, utf8_decode($fila['nombre'] . ': ' . $fila['codigo_contable']));
            }
            $pdf->Ln(10);
        }

        // Obtener códigos contables de PVP
        $stmt = $pdo->query("SELECT nombre, codigo_contable FROM codigo_contable_pvp");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('Códigos Contables de PVP'), 0, 1);
            $pdf->Ln(5);
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->MultiCell(0, 10, utf8_decode($fila['nombre'] . ': ' . $fila['codigo_contable']));
            }
            $pdf->Ln(10);
        }

        // Obtener código contable de bandas de garantía
        $stmt = $pdo->query("SELECT valor FROM codigo_contable_bandas");
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) > 0) {
            $pdf->SetFont('Arial', 'B', 12);
            $pdf->Cell(0, 10, utf8_decode('Código Contable de Bandas de Garantía'), 0, 1);
            $pdf->Ln(5);
            $pdf->SetFont('Arial', '', 10);
            foreach ($resultados as $fila) {
                $pdf->MultiCell(0, 10, utf8_decode('Valor: ' . $fila['valor']));
            }
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
