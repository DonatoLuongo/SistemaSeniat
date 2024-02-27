<?php
require_once('conexion.php');

//Este código llama al valor de la unidad tributaria actual
$unidadTributarias = "SELECT valor FROM unidad_tributaria";
try {
    $stmt = $pdo->query($unidadTributarias);
    $valorUnidadTributaria = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Redirigir a error.php con el mensaje de error
    header("Location: error.php?mensaje=" . urlencode("Error al ejecutar la consulta de unidad tributaria: " . $e->getMessage()));
    exit(); // Detener la ejecución del script después de redirigir
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla liquidacion_fosforos
    try {
        for ($i = 1; $i <= 12; $i++) {
            $numeroSecuencial = !empty($_POST["numeroSecuencial$i"]) ? $_POST["numeroSecuencial$i"] : null;
            $tarifa = !empty($_POST["tarifa$i"]) ? $_POST["tarifa$i"] : null;
            $codigoContable = !empty($_POST["codigoContable$i"]) ? $_POST["codigoContable$i"] : null;
            $unidadTributaria = !empty($_POST["unidadTributaria$i"]) ? $_POST["unidadTributaria$i"] : null;
            $producto = !empty($_POST["producto$i"]) ? $_POST["producto$i"] : null;
            $numeroLicencia = !empty($_POST["numeroLicencia$i"]) ? $_POST["numeroLicencia$i"] : null;
            $litrosVolumenReal = !empty($_POST["litrosVolumenReal$i"]) ? $_POST["litrosVolumenReal$i"] : null;
            $litrosAlcoholAnhidro = !empty($_POST["litrosAlcoholAnhidro$i"]) ? $_POST["litrosAlcoholAnhidro$i"] : null;
            $gradoAlcoholico = !empty($_POST["gradoAlcoholico$i"]) ? $_POST["gradoAlcoholico$i"] : null;
            $capacidadEnvases = !empty($_POST["capacidadEnvases$i"]) ? $_POST["capacidadEnvases$i"] : null;
            $fechaVencimiento = !empty($_POST["fechaVencimiento$i"]) ? $_POST["fechaVencimiento$i"] : null;

            // Calcular la base imponible
            if ($tarifa == 1) {
                $baseImponible =  $litrosVolumenReal * 0.0135;
            } elseif ($tarifa == 2) {
                $baseImponible = $litrosVolumenReal * 0.0006;
            } elseif ($tarifa == 3) {
                $baseImponible = $litrosAlcoholAnhidro * 0.00015;
            } elseif ($tarifa == 4) {
                $baseImponible = $litrosVolumenReal * 0.009;
            } else {
                $baseImponible = null;
            }

            $importePagar = ($baseImponible && $valorUnidadTributaria) ? $baseImponible * $valorUnidadTributaria : null;

            // Verificar si todos los valores de la fila son nulos excepto $fechaVencimiento
            if ($numeroSecuencial === null && $tarifa === null && $codigoContable === null && $unidadTributaria === null && $producto === null && $numeroLicencia=== null) {
                // Si todos los valores son nulos, no se inserta la fila en la base de datos
                continue;
            }

            $queryLiquidacion = "INSERT INTO liquidacion_licores_produccion
            (idimpuesto_licores, idtarifa, idcodigo_contable ,idunidad_tributaria, 
            idproducto,numero_licencia, litros_volumen_real, litros_alcohol_anhidro, 
            grado_alcoholico, capacidad_envases, fecha_vencimiento, base_imponible,
            impuesto_pagar) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtLiquidacion = $pdo->prepare($queryLiquidacion);
            $stmtLiquidacion->execute([$numeroSecuencial, $tarifa, 
            $codigoContable, $unidadTributaria, $producto ,$numeroLicencia,
            $litrosVolumenReal,  $litrosAlcoholAnhidro,$gradoAlcoholico,
            $capacidadEnvases, $fechaVencimiento, $baseImponible, $importePagar]);
        }

        header("Location: liquidacionLicores.php");
    } catch (PDOException $e) {
        // Redirigir a error.php con el mensaje de error
        header("Location: error.php?mensaje=" . urlencode($e->getMessage()));
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
