<?php
// Inicia la sesión
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Borra la cookie de sesión
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finaliza la sesión
session_destroy();

// Redirige al usuario a la página de inicio de sesión
header("Location: ../PHP\InicioSesion.php");
exit(); // Asegúrate de detener el script después de redirigir
?>
