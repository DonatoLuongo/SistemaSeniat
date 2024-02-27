<?php
require_once('conexion.php');

function manejarError($mensaje) {
    // Redirecciona a la página de error con el mensaje
    header("Location: error.php?mensaje=" . urlencode($mensaje));
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Verificar si se ha completado al menos un campo en el primer formulario
        if (!isset($_POST["numeroSecuencial1"]) || $_POST["numeroSecuencial1"] === '' || !isset($_POST["producto1"]) || $_POST["producto1"] === '' || !isset($_POST["cantidadGruesas1"]) || $_POST["cantidadGruesas1"] === '' || !isset($_POST["precioGruesas1"]) || $_POST["precioGruesas1"] === '' || !isset($_POST["cantidadLuces1"]) || $_POST["cantidadLuces1"] === '' || !isset($_POST["fechaVencimiento1"]) || $_POST["fechaVencimiento1"] === '') {
            manejarError("Por favor, complete al menos un campo en el primer formulario.");
        }

        // Insertar datos en la tabla liquidacion_fosforos solo para el primer formulario
        $numeroSecuencial = $_POST["numeroSecuencial1"];
        $producto = $_POST["producto1"];
        $cantidadGruesas = $_POST["cantidadGruesas1"];
        $precioGruesas = $_POST["precioGruesas1"];
        $cantidadLuces = $_POST["cantidadLuces1"];
        $fechaVencimiento = $_POST["fechaVencimiento1"];

        $baseImponible = ($cantidadGruesas && $precioGruesas) ? $cantidadGruesas * $precioGruesas : null;

        // Calcular importe a pagar según el producto
        if ($producto == 1) {
            $importePagar = $baseImponible * 0.17;
        } elseif ($producto == 2) {
            $importePagar = $baseImponible * 0.22;
        } elseif ($producto == 3) {
            $importePagar = $baseImponible * 0.05;
        } else {
            $importePagar = null;
        }

        // Preparar la consulta
        $queryLiquidacion = "INSERT INTO liquidacion_fosforos 
        (idimpuesto_fosforos, idproductos, cantidad_gruesas, precio_gruesas, 
        cantidad_luces, fecha_vencimiento, base_imponible, impuesto_pagar) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtLiquidacion = $pdo->prepare($queryLiquidacion);

        // Ejecutar la consulta
        $stmtLiquidacion->execute([$numeroSecuencial, $producto, 
        $cantidadGruesas, $precioGruesas, $cantidadLuces ,$fechaVencimiento,
        $baseImponible, $importePagar]);

        // Verificar si ocurrió un error al ejecutar la consulta
        $stmtError = $stmtLiquidacion->errorInfo();
        if ($stmtError[0] !== '00000') {
            throw new Exception("Error al insertar datos en la base de datos: " . $stmtError[2]);
        }

        // Si todo va bien, redireccionar a la página principal u otra página según sea necesario
        header("Location: liquidacionFosforos.php");
        exit();
    } catch (Exception $e) {
        manejarError($e->getMessage());
    }
} else {
    manejarError("Método de solicitud incorrecto.");
}
?>
