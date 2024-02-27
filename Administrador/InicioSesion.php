<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../recursos/IniciarSesion/CSS/style.css">
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo -->
    <title> Iniciar Sesión | SENIAT</title> <!-- Nombre de la Interfaz -->
</head>

<body>

        <!-- Interfaz para iniciar sesion como Coordinador -->

    <div class="container" id="container">
        <div class="form-container sign-up">
            <!--  Formulario  -->
            <form>
                <h1>Coordinador</h1> <!--  Titulo  -->
                
                <!--  Imagen del Seniat "Logo"  -->
                <div class="social-icons">
                    <img src="../recursos/IMG/Logo.png" alt="LogoSeniat" width="100%">
                </div>
                <!--  Fin  -->
                <span>Introduce tu número de cédula y contraseña</span>
                <!--  Campos para ingresar datos  -->
                <input type="number" placeholder="Cédula" required>
                <input type="password" placeholder="Contraseña" required>

                <!--  Boton para iniciar sesion de un usuario  -->
                <a href="../index.php">
                    <button>Iniciar Sesión</button>
                </a>
            </form>  <!-- Fin del Formulario -->
        </div> <!--  FIN  del div -->
        

            <!-- Interfaz para iniciar sesion como Liquidador -->

        <div class="form-container sign-in">
            <!--  Formulario  -->
            <form action="crudIniciarAdministrador.php" method="POST">
                <h1>Administrador</h1> <!--  Titulo  -->

                <!--  Imagen del Seniat "Logo"  -->
                <div class="social-icons">
                    <img src="../recursos/IMG/Logo.png" alt="LogoSeniat" width="100%">
                </div>
                <!--  Fin  -->
                <span>Introduce tu número de cédula y contraseña</span>
                <!--  Campos para ingresar datos  -->
                <input type="number" placeholder="Cédula" name="cedula_administrador" required>
                <!-- <input type="password" placeholder="Contraseña" name="clave_administrador" required> -->

                <div class="password-container">
                    <input type="password" placeholder="Contraseña" id="clave_administrador" name="clave_administrador" required>
                    <i class="fa fa-eye-slash" onclick="togglePasswordVisibility()"></i>
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
                    <p>Ingresa tus datos personales para utilizar todas las funciones del Liquidador</p>
                    <button class="hidden" id="login">Iniciar</button>
                </div>
                <!--    Fin Segunda Informacion para el Coordinador    -->

                <!--    Primera Informacion para el Liquidador -->
                <div class="toggle-panel toggle-right">
                    <h1>Bienvenido!</h1>
                    <p>"Te damos la bienvenida a nuestro sistema. Estamos encantados de tenerte con nosotros y esperamos que tu experiencia sea excepcional."</p>
                    <button class="hidden" id="felizdia">Feliz dia!</button>
                </div>
                <!--    Fin Primera Informacion para el Liquidador -->
            </div>
        </div>
        <!--    Fin    -->

    </div>

    <!--    Script de JS para la animacion del Login "Llamando el archivo Js"  -->
    <script src="../recursos/IniciarSesion/JS/scriptLoginAdmin.js"></script>
    <!-- Fin del Script -->
</body>

</html>