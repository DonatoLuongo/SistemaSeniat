<?php
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insertar datos en la tabla liquidacion_fosforos
    for ($i = 1; $i <= 3; $i++) {
        $numeroSecuencial = !empty($_POST["numeroSecuencial$i"]) ? $_POST["numeroSecuencial$i"] : null;
        $producto = !empty($_POST["producto$i"]) ? $_POST["producto$i"] : null;
        $cantidadGruesas = !empty($_POST["cantidadGruesas$i"]) ? $_POST["cantidadGruesas$i"] : null;
        $precioGruesas = !empty($_POST["precioGruesas$i"]) ? $_POST["precioGruesas$i"] : null;
        $cantidadLuces = !empty($_POST["cantidadLuces$i"]) ? $_POST["cantidadLuces$i"] : null;
        $fechaVencimiento = !empty($_POST["fechaVencimiento$i"]) ? $_POST["fechaVencimiento$i"] : null;

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

        // Verificar si todos los valores de la fila son nulos excepto $fechaVencimiento
        if ($numeroSecuencial === null && $producto === null && $cantidadGruesas === null && $precioGruesas === null && $cantidadLuces === null && $baseImponible === null && $importePagar === null) {
        // Si todos los valores son nulos, no se inserta la fila en la base de datos
        continue;
        }

        $queryLiquidacion = "INSERT INTO liquidacion_fosforos 
        (idimpuesto_fosforos, idproductos, cantidad_gruesas, precio_gruesas, 
        cantidad_luces, fecha_vencimiento, base_imponible, impuesto_pagar) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtLiquidacion = $pdo->prepare($queryLiquidacion);
        $stmtLiquidacion->execute([$numeroSecuencial, $producto, 
        $cantidadGruesas, $precioGruesas, $cantidadLuces ,$fechaVencimiento,
        $baseImponible, $importePagar]);
    }

    header("Location: liquidacionFosforos.php");
}
?>