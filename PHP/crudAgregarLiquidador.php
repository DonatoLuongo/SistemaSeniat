<?php
require_once('conexion.php');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre_liquidador"];
            $apellido = $_POST["apellido_liquidador"];
            $cedula = $_POST["cedula_liquidador"];
            $clave = $_POST["clave_liquidador"];
        
        
                $query = "INSERT INTO usuarios (nombre, apellido, 
                cedula, clave) 
                VALUES (?, ?, ?,?)";
                $stmt = $pdo->prepare($query);
        
                // Ejecutar la consulta con los datos del formulario
                $stmt->execute([$nombre, $apellido,$cedula, $clave]);

                header("Location: agregarLiquidador.php");
        
        }
 


?>