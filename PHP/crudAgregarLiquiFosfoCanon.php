<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla impuesto_fosforos
    $numeroSecuenial = $_POST["secuencial"];
    $importePagar = $_POST["importePagar"];

    try {
        $queryImpuesto = "INSERT INTO liquidacion_canon (idimpuesto_fosforos, impuesto_pagar) VALUES (?, ?)";
        $stmtImpuesto = $pdo->prepare($queryImpuesto);
        $stmtImpuesto->execute([$numeroSecuenial, $importePagar]);

        header("Location: liquidacionFosforos.php");
    } catch (PDOException $e) {
        // Redirigir a error.php con el mensaje de error
        header("Location: error.php?mensaje=" . urlencode($e->getMessage()));
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
