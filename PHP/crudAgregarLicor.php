<?php
require_once('conexion.php');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre_licor"];
            
        
        
                $query = "INSERT INTO productos_licores(marca) 
                VALUES (?)";
                $stmt = $pdo->prepare($query);
        
                // Ejecutar la consulta con los datos del formulario
                $stmt->execute([$nombre]);

                header("Location: agregarLicor.php");
        
        }
 


?>