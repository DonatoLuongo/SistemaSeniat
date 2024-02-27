<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla impuesto_fosforos
    $contribuyente = $_POST["contribuyente"];

    $queryImpuesto = "INSERT INTO impuesto_licores 
    (idcontribuyente) VALUES (?)";
    $stmtImpuesto = $pdo->prepare($queryImpuesto);
    $stmtImpuesto->execute([$contribuyente]);

    header("Location: liquidacionLicores.php");
}

   // header("Location: liquidacionCigarrillos.php");

?>