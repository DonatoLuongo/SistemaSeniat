<?php

if (isset($_SESSION['cedula_coordinador']) && $_SESSION['cedula_coordinador'] === true) {
    header("Location: index.php");
    exit;
}

require_once 'conexion.php'; // Incluye el archivo de conexión

// Verificación de la conexión (esto no es necesario ya que se maneja en 'conexion.php')

// Obtiene los datos del formulario
$cedula = $_POST["cedula_coordinador"];
$clave = $_POST["clave_coordinador"];

// Consulta SQL para buscar el usuario
$sql = "SELECT * FROM usuarios WHERE cedula = '$cedula' AND clave = '$clave' AND idrol = '2'";

try {
    // Ejecuta la consulta
    $resultados = $pdo->query($sql);

    // Verifica si el usuario existe
    if ($resultados->rowCount() > 0) {
        // El usuario existe
        // Inicia sesión
        session_start();
        $_SESSION["cedula_coordinador"] = true;
        header("Location: loadingPage.php");
    } else {
        $_SESSION["mensaje_error"] = "La cédula de identidad o contraseña no son válidos.";
        echo "<script> 
            alert('" . $_SESSION["mensaje_error"] . "'); 
            window.location.href = 'InicioSesion.php';
          </script>";
    }
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

?>

