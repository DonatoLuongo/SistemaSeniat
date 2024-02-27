<?php
require_once '../PHP/conexion.php';
require_once '../fpdf/fpdf.php';

// Verifica si se ha proporcionado un RIF para buscar
if (isset($_GET['rif_contribuyente'])) {
    try {
        $rif = $_GET['rif_contribuyente'];

        $stmt = $pdo->prepare("SELECT nombre, rif, licencia FROM contribuyentes WHERE rif = :rif_contribuyente");
        $stmt->bindParam(':rif_contribuyente', $rif);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($result) {
            // Crear PDF
            $pdf = new FPDF();
            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 12);

            // Encabezado de la tabla
            $pdf->Cell(40, 10, 'Nombre', 1);
            $pdf->Cell(40, 10, 'RIF', 1);
            $pdf->Cell(40, 10, 'Licencia', 1);
            $pdf->Ln();

            // Agregar datos
            foreach ($result as $row) {
                $pdf->Cell(40, 10, $row['nombre'], 1);
                $pdf->Cell(40, 10, $row['rif'], 1);
                $pdf->Cell(40, 10, $row['licencia'], 1);
                $pdf->Ln();
            }

            // Mostrar PDF
            $pdf->Output();
            exit;
        } else {
            echo 'No se encontraron contribuyentes con este RIF: ' . $rif;
        }
    } catch (PDOException $e) {
        die('Error al realizar la consulta: ' . $e->getMessage());
    }
} else {
    // Si no se proporciona un RIF, muestra un mensaje de error
    echo 'No se ha proporcionado un número de RIF.';
}
?>
