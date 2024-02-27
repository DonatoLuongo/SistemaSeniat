<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla impuesto_fosforos
    $numeroSecuenial = $_POST["secuencial"];
    $importePagar = $_POST["importePagar"];
    

    $queryImpuesto = "INSERT INTO liquidacion_canon 
    (idimpuesto_fosforos, impuesto_pagar) VALUES (?, ?)";
    $stmtImpuesto = $pdo->prepare($queryImpuesto);
    $stmtImpuesto->execute([$numeroSecuenial, $importePagar]);

    header("Location: liquidacionFosforos.php");
}

   // header("Location: liquidacionCigarrillos.php");

?>