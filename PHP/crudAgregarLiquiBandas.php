<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Insertar datos en la tabla liquidacion_bandas_garantia
        $numeroSecuencial = $_POST["numeroSecuencial"];
        $codigoContable = $_POST["codigoContable"];
        $cantidad =  $_POST["cantidad"];
        $desde = $_POST["desde"];
        $hasta = $_POST["hasta"];
        $color = $_POST["color"];
        $anualidad = $_POST["anualidad"];
        $precio = $_POST["precio"];

        $importePagar = $cantidad * $precio;
        
        $queryLiquidacion = "INSERT INTO liquidacion_bandas_garantia 
        (idimpuesto_licores, idcodigo_contable, cantidad, desde, 
        hasta, color, anualidad_impresion, precio, importe_pagar) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtLiquidacion = $pdo->prepare($queryLiquidacion);
        $stmtLiquidacion->execute([$numeroSecuencial,$codigoContable,
        $cantidad,$desde,$hasta,$color,$anualidad,$precio,$importePagar]);

        header("Location: liquidacionLicores.php");
    } catch (PDOException $e) {
        // Redirigir a error.php con el mensaje de error
        header("Location: error.php?mensaje=" . urlencode($e->getMessage()));
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
