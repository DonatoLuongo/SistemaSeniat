<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_administrador"])) {
    header("location: InicioSesion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/consultas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consultas Licores | SENIAT </title> <!-- Nombre de la Interfaz -->

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
                        <a href="../Administrador/vistaTarifas.php">Tarifas</a>
                        <a href="../Administrador/vistaUnidadTributariaAntigua.php">Unidad Tributaria Antigua</a>
                        <a href="../Administrador/vistaUnidadTributaria.php">Unidad Tributaria</a>
                    </ul>
                </li>

                <!-- Modulo de Consultas -->
                <li><a class="linea3" href="../Administrador/vistaConsultas.php">Consulta</a></li>
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
                            <h3 class="lead-text"> Liquidaciones de Licores </h3>
                        </div>

                        <div>
                            <a href="../Administrador/consultaLiquidacionPVP.php">
                                <button class="btn-consultas"><span></span>PVP</button>
                            </a>

                            <a href="../Administrador/consultaLiquidacionProduccion.php">
                                <button class="btn-consultas"><span></span>Producción</button>
                            </a>

                            <a href="../Administrador/consultaLiquidacionBandas.php">
                                <button class="btn-consultas"><span></span>Bandas de Garantía</button>
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