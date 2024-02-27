<?php
require_once('conexion.php');


        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Obtener los datos del formulario
            $nombre = $_POST["labor_fosforo"];
            $tarifa = $_POST["tarifa_fosforo"];
            
        
        
                $query = "INSERT INTO productos_fosforos(labor,tarifa) 
                VALUES (?,?)";
                $stmt = $pdo->prepare($query);
        
                // Ejecutar la consulta con los datos del formulario
                $stmt->execute([$nombre,$tarifa]);

                header("Location: agregarFosforo.php");
        
        }
 


?>