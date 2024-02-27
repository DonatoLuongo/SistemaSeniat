<?php
require_once('conexion.php');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre_contribuyente"];
            $rif = $_POST["rif"];
            $licencia = $_POST["licencia_contribuyente"];

            $query = "INSERT INTO contribuyentes (nombre, rif, 
            licencia) 
            VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
    
            // Ejecutar la consulta con los datos del formulario
            $stmt->execute([$nombre, $rif,$licencia]);

            $estado = $_POST["estado"];
            $municipio = $_POST["municipio"];
            $direccion = $_POST["direccion_especifica"];
        
                $query = "INSERT INTO direccion_plantas (estado, municipio, 
                direccion_especifica) 
                VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($query);
        
                // Ejecutar la consulta con los datos del formulario
                $stmt->execute([$estado, $municipio,$direccion]);

                header("Location: agregarContribuyentes.php");
        }
 


?>