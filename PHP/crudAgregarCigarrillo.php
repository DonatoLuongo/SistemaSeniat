<?php
require_once('conexion.php');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["nombre_cigarrillo"];
            
        
        
                $query = "INSERT INTO productos_cigarrillos(marca) 
                VALUES (?)";
                $stmt = $pdo->prepare($query);
        
                // Ejecutar la consulta con los datos del formulario
                $stmt->execute([$nombre]);

                header("Location: agregarCigarrillo.php");
        }
 


?>