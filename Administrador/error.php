<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title>Error</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        div {
            text-align: center;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 2px;
        }

        img {
            width: 100px;
            height: auto;
        }

        p {
            font-size: 15px;
        }
    </style>
    
</head>

<body>

    <!-- Header de la Interfaz -->
    <header>

        <!-- Logo del Header, SENIAT -->
        <div class="logo">
            <a href="./index.php">
                <img src="../recursos/IMG/Logo.png" alt="logo del seniat">
            </a>
        </div>

        <!-- Barra de Menú Responsive -->
        <input type="checkbox" id="menu-bar">
        <label for="menu-bar">Menu</label>

        <!-- Botones para interaturar con las interfaces -->
        <nav class="navbar">
            <ul>
                <!-- Modulo de Registros de Coordinador -->
                <li><a class="linea1" href="">Registros del Coordinador </a>
                    <ul class="barrita">
                        <a href="../PHP/vistaTarifas.php">Tarifas</a>
                        <a href="../PHP/vistaUnidadTributariaAntigua.php">Unidad Tributaria Antigua</a>
                        <a href="../PHP/vistaUnidadTributaria.php">Unidad Tributaria</a>
                        <a href="../PHP/agregarLiquidador.php">Registro de Liquidadores</a>
                        <a href="../PHP/agregarContribuyentes.php">Registro Contribuyentes</a>
                        <a href="../PHP/vistaAgregarProductos.php">Agregar Productos</a>
                    </ul>
                </li>

                <!-- Modulo de Liquidacion -->
                <li><a class="linea2" href="">Liquidación</a>
                    <ul class="barrita">
                        <a href="../PHP/liquidacionLicores.php">Licores</a>
                        <a href="../PHP/liquidacionCigarrillos.php">Cigarrillos</a>
                        <a href="../PHP/liquidacionFosforos.php">Fósforos</a>
                    </ul>
                </li>

                <!-- Modulo de Consultas -->
                <li><a class="linea3" href="../PHP/vistaConsultas.php">Consulta</a></li>
            </ul>

        </nav>
        <!--    Fin    -->

        <!--    Boton para salir de un usuario logeado    -->
        <div class="salir">
            <a href="crudCerrarSesion.php">
                <button class="exit">Cerrar sesión</button>
            </a>
        </div>
        <!--    Fin del Boton de "Salir" de la interfaz    -->


    </header>
    <!--    Fin del Header de la interfaz    -->

    <div>
        <h1>Error</h1>
        <img src="../recursos/IMG/error.png" alt="">
        <p><?php echo isset($_GET['mensaje']) ? htmlspecialchars($_GET['mensaje']) : 'Se ha producido un error.'; ?></p>
    </div>

    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>