<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/consultas.css">
    <!-- <link rel="stylesheet" href="../recursos/CSS/button.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consultas | SENIAT </title> <!-- Nombre de la Interfaz -->

    <?php
    session_start();

    if (!isset($_SESSION["cedula_liquidador"])) {
        header("location: ../PHP/InicioSesion.php");
        exit;
    }
    ?>


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
                        <a href="../Liquidador/vistaTarifas.php">Tarifas</a>
                        <a href="../Liquidador/vistaUnidadTributariaAntigua.php">Unidad Tributaria Antigua</a>
                        <a href="../Liquidador/vistaUnidadTributaria.php">Unidad Tributaria</a>
                    </ul>
                </li>

                <!-- Modulo de Liquidacion -->
                <li><a class="linea2" href="">Liquidación</a>
                    <ul class="barrita">
                        <a href="../Liquidador/liquidacionLicores.php">Licores</a>
                        <a href="../Liquidador/liquidacionCigarrillos.php">Cigarrillos</a>
                        <a href="../Liquidador/liquidacionFosforos.php">Fósforos</a>
                    </ul>
                </li>

                <!-- Modulo de Consultas -->
                <li><a class="linea3" href="../Liquidador/vistaConsultas.php">Consulta</a></li>
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



    <!-- Interfaz -->

    <div class="container">
        <div class="flex-container">
            <div class="row full">
                <div class="col-md-12">
                    <div class="form-container">

                        <div class="TituloModulos">
                            <h3 class="lead-text"> Consultas </h3>
                        </div>

                        <div>
                            <a href="../Liquidador/consultaLiquidadores.php">
                                <button class="btn-consultas"><span></span>Liquidadores</button>
                            </a>

                            <a href="../Liquidador/consultaContribuyente.php">
                                <button class="btn-consultas"><span></span>Contribuyentes</button>
                            </a>

                            <a href="../Liquidador/consultaCodigosContables.php">
                                <button class="btn-consultas"><span></span>Código Contable</button>
                            </a>

                            <a href="../Liquidador/vistaConsultasLiquidaciones.php">
                                <button class="btn-consultas"><span></span>Liquidaciones</button>
                            </a>

                            <a href="../Liquidador/consultaProductos.php">
                                <button class="btn-consultas"><span></span>Productos</button>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>



    <!--    Footer de las interfaces   -->
    <footer class="footer">Servicio Nacional Integrado de Administración Aduanera y Tributaria <strong>RIF: G-20000303-0</strong> </footer>


</body>

</html>