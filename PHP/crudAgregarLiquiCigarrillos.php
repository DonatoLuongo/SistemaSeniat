<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla impuesto_cigarrillos
    $contribuyente = $_POST["contribuyente"];
    $codigoContable = $_POST["codigoContable"];
    $tarifa = $_POST["tarifa"];

    try {
        $queryImpuesto = "INSERT INTO impuesto_cigarrillos (idcontribuyente, idcodigo_contable, idtarifa) VALUES (?, ?, ?)";
        $stmtImpuesto = $pdo->prepare($queryImpuesto);
        $stmtImpuesto->execute([$contribuyente, $codigoContable, $tarifa]);

        // Insertar datos en la tabla liquidacion_cigarrillos para cada item
        for ($i = 1; $i <= 12; $i++) {
            $numeroSecuencial = !empty($_POST["numeroSecuencial$i"]) ? $_POST["numeroSecuencial$i"] : null;
            $producto = !empty($_POST["producto$i"]) ? $_POST["producto$i"] : null;
            $cantidadCajetillas = !empty($_POST["cantidadCajetillas$i"]) ? $_POST["cantidadCajetillas$i"] : null;
            $precioCajetillas = !empty($_POST["precioCajetillas$i"]) ? $_POST["precioCajetillas$i"] : null;
            $fechaVencimiento = !empty($_POST["fechaVencimiento$i"]) ? $_POST["fechaVencimiento$i"] : null;

            // Calcular base imponible e importe a pagar
            $baseImponible = ($cantidadCajetillas && $precioCajetillas) ? $cantidadCajetillas * $precioCajetillas : null;
            $importePagar = ($baseImponible) ? $baseImponible * 0.70 : null;

            // Verificar si todos los valores de la fila son nulos excepto $fechaVencimiento
            if ($numeroSecuencial === null && $producto === null && $cantidadCajetillas === null && $precioCajetillas === null && $baseImponible === null && $importePagar === null) {
                // Si todos los valores son nulos, no se inserta la fila en la base de datos
                continue;
            }

            $queryLiquidacion = "INSERT INTO liquidacion_cigarrillos (idimpuesto_cigarrillos, idproductos_cigarrillos, cantidad_cajetillas, precio_cajetillas, fecha_vencimiento, base_imponible, impuesto_pagar) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmtLiquidacion = $pdo->prepare($queryLiquidacion);
            $stmtLiquidacion->execute([$numeroSecuencial, $producto, $cantidadCajetillas, $precioCajetillas, $fechaVencimiento, $baseImponible, $importePagar]);
        }

        header("Location: liquidacionCigarrillos.php");
    } catch (PDOException $e) {
        // Redirigir a error.php con el mensaje de error
        header("Location: error.php?mensaje=" . urlencode($e->getMessage()));
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
