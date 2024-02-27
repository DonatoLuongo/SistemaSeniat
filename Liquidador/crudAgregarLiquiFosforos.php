<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla impuesto_fosforos
    $contribuyente = $_POST["contribuyente"];
    $codigoContable = $_POST["codigoContable"];
    

    $queryImpuesto = "INSERT INTO impuesto_fosforos 
    (idcontribuyente, idcodigo_contable) VALUES (?, ?)";
    $stmtImpuesto = $pdo->prepare($queryImpuesto);
    $stmtImpuesto->execute([$contribuyente, $codigoContable]);

    header("Location: liquidacionFosforos.php");
}

   // header("Location: liquidacionCigarrillos.php");

?>