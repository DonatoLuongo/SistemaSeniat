<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../recursos/IniciarSesion/CSS/style.css">
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo -->
    <title> Iniciar Sesión | SENIAT</title> <!-- Nombre de la Interfaz -->
</head>

<body>
    <!-- Interfaz para iniciar sesion como Coordinador -->

    <div class="container" id="container">
        <div class="form-container sign-up">
            <!--  Formulario  -->
            <form action="crudIniciarCoordinador.php" method="POST" id="login-form">
                <h1>Coordinador</h1> <!--  Titulo  -->

                <!--  Imagen del Seniat "Logo"  -->
                <div class="social-icons">
                    <img src="../recursos/IMG/Logo.png" alt="LogoSeniat" width="100%">
                </div>
                <!--  Fin  -->
                <span>Introduce tu número de cédula y contraseña</span>
                <!--  Campos para ingresar datos  -->
                <input type="number" placeholder="Cédula" name="cedula_coordinador" required>
                <!-- <input type="password" placeholder="Contraseña" name="clave_coordinador" required> -->

                <div class="password-container">
                    <input type="password" placeholder="Contraseña" id="clave_coordinador" name="clave_coordinador" required>
                    <i class="fa fa-eye-slash" onclick="togglePasswordVisibility('clave_coordinador')"></i>
                </div>

                <!--  Boton para ingresar al login del Administrador -->
                <a class="RecPass" href="../Administrador/InicioSesion.php">Iniciar como Administrador</a>

                <!--  Boton para iniciar sesion de un usuario  -->
                <a href="./index.php">
                    <button>Iniciar Sesión</button>
                </a>
            </form> <!-- Fin del Formulario -->
        </div> <!--  FIN  del div -->


        <!-- Interfaz para iniciar sesion como Liquidador -->

        <div class="form-container sign-in">
            <!--  Formulario  -->
            <form action="crudIniciarLiquidador.php" method="POST" id="liquidador-form">
                <h1>Liquidador</h1> <!--  Titulo  -->

                <!--  Imagen del Seniat "Logo"  -->
                <div class="social-icons">
                    <img src="../recursos/IMG/Logo.png" alt="LogoSeniat" width="100%">
                </div>
                <!--  Fin  -->
                <span>Introduce tu número de cédula y contraseña</span>
                <!--  Campos para ingresar datos  -->

                <input type="number" placeholder="Cédula" name="cedula_liquidador" required>

                <div class="password-container">
                    <input type="password" placeholder="Contraseña" id="clave_liquidador" name="clave_liquidador" required>
                    <i class="fa fa-eye-slash" onclick="togglePasswordVisibility('clave_liquidador')"></i>
                </div>




                <!--  Boton para iniciar sesion de un usuario  -->
                <a href="./index.php">
                    <button>Iniciar sesión</button>
                </a>
            </form> <!-- Fin del Formulario -->
        </div> <!--  FIN   -->


        <!--    Informacion de bienvenida    -->
        <div class="toggle-container">
            <div class="toggle">
                <!--    Segunda Informacion para el Coordinador    -->
                <div class="toggle-panel toggle-left">
                    <h1>¡Bienvenido de nuevo!</h1>
                    <p>Ingresa tus datos personales para utilizar todas las funciones del <strong>Liquidador</strong></p>
                    <button class="hidden" id="login">Iniciar</button>
                </div>
                <!--    Fin Segunda Informacion para el Coordinador    -->

                <!--    Primera Informacion para el Liquidador -->
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenido!</h1>
                    <p>Ingrese sus datos personales para utilizar todas las funciones del sistema</p>
                    <button class="hidden" id="register">Iniciar</button>
                </div>
                <!--    Fin Primera Informacion para el Liquidador -->
            </div>
        </div>
        <!--    Fin    -->


    </div>


    <!--    Script de JS para la animacion del Login "Llamando el archivo Js"  -->
    <script src="../recursos/IniciarSesion/JS/script.js"></script>
    <script src="../recursos/IniciarSesion/JS/validaciones.js"></script>
    <!-- Fin del Script -->
</body>

</html>