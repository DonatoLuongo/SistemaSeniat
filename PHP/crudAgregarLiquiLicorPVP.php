<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Insertar datos en la tabla liquidacion_licores_pvp
        for ($i = 1; $i <= 12; $i++) {
            $numeroSecuencial = !empty($_POST["numeroSecuencial$i"]) ? $_POST["numeroSecuencial$i"] : null;
            $tarifa = !empty($_POST["tarifa$i"]) ? $_POST["tarifa$i"] : null;
            $codigoContable = !empty($_POST["codigoContable$i"]) ? $_POST["codigoContable$i"] : null;
            $producto = !empty($_POST["producto$i"]) ? $_POST["producto$i"] : null;
            $gradoAlcoholico = !empty($_POST["gradoAlcoholico$i"]) ? $_POST["gradoAlcoholico$i"] : null;
            $capacidadEnvase = !empty($_POST["capacidadEnvase$i"]) ? $_POST["capacidadEnvase$i"] : null;
            $cantidadEnvase = !empty($_POST["cantidadEnvase$i"]) ? $_POST["cantidadEnvase$i"] : null;
            $precioBotella = !empty($_POST["precioBotella$i"]) ? $_POST["precioBotella$i"] : null;

            $baseImponible = ($cantidadEnvase && $precioBotella) ? $cantidadEnvase * $precioBotella : null;
            
            // Calcular importe a pagar según el producto
            if ($tarifa == 1) {
                $importePagar = $baseImponible * 0.15;
            } elseif ($tarifa == 2) {
                $importePagar = $baseImponible * 0.35;
            } elseif ($tarifa == 3) {
                $importePagar = $baseImponible * 0.5;
            } else {
                $importePagar = null;
            }

            // Verificar si todos los valores de la fila son nulos excepto $gradoAlcoholico
            if ($numeroSecuencial === null && $tarifa === null && $codigoContable === null && $producto === null && $baseImponible === null && $gradoAlcoholico=== null) {
                // Si todos los valores son nulos, no se inserta la fila en la base de datos
                continue;
            }

            $queryLiquidacion = "INSERT INTO liquidacion_licores_pvp 
            (idimpuesto_licores, idtarifa, idcodigo_contable ,idproducto, grado_alcoholico,
            capacidad_envases, cantidad_envases, precio_botella, base_imponible, impuesto_pagar) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmtLiquidacion = $pdo->prepare($queryLiquidacion);
            $stmtLiquidacion->execute([$numeroSecuencial, $tarifa, 
            $codigoContable, $producto, $gradoAlcoholico ,$capacidadEnvase,
            $cantidadEnvase, $precioBotella,$baseImponible, $importePagar]);
        }

        header("Location: liquidacionLicores.php");
    } catch (PDOException $e) {
        // Redirigir a error.php con el mensaje de error
        header("Location: error.php?mensaje=" . urlencode($e->getMessage()));
        exit(); // Detener la ejecución del script después de redirigir
    }
}
?>
