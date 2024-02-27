<?php
// Parámetros de conexión
$host = 'localhost';
$port = '5432';
$dbname = 'seniat';
$user = 'postgres';
$password = '30066904';

// Cadena de conexión PDO
$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

try {
    // Crear una instancia de PDO
    $pdo = new PDO($dsn);

    // Configurar el modo de error para que PDO lance excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Conexión exitosa a PostgreSQL";
} catch (PDOException $e) {
    // Manejar errores de conexión
    echo "Error de conexión a PostgreSQL: " . $e->getMessage();
}
?>