<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
}

require_once 'conexion.php';

//Este código llama los nombres y ids de los contribuyentes
$contribuyentes = "SELECT id, nombre FROM contribuyentes";
try {
    $contribuyente = $pdo->query($contribuyentes);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/liquidacionStyle.css">
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title>Liquidar Licores | Liquidación </title>

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

    <!-- Interfaz -->
    <div class="container_padre_forms" id="container_padre_forms">
        <form action="crudAgregarLiquiLicores.php" method="POST" class="padre_forms">
            <div class="container">
                <div class="titulo">
                    <h1>Impuesto Licores</h1>
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Oficina</label>
                    <input type="text" placeholder="10" name="numero_oficina" id="oficina" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Gerencia</label>
                    <input type="text" placeholder="11" name="numero_gerencia" id="gerencia" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Número de porción</label>
                    <input type="text" placeholder="1" name="numero_porcion" id="porcion" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Tipo de liquidación</label>
                    <input type="text" placeholder="2" name="tipo_liquidacion" id="liquidacion" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Serie</label>
                    <input type="text" placeholder="45" name="numero_serie" id="serie" tabindex="-1">
                </div>

                <!-- Nuevo codigo -->
                <!-- Agrega un ID al formulario para poder referenciarlo desde JavaScript -->
                    <div class="form-group">
                        <label for="exampleSelect1">Seleccione el Contribuyente</label>
                        <select class="form-control" id="exampleSelect1" name="contribuyente">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $contribuyente->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- BOTON PARA ENVIAR LOS DATROS DEL FORMULARIO -->
                    <div class="form-group">
                        <button type="submit" class="registrar" name="Registrar" onclick="return validarSelect()">Registrar Licores</button>
                    </div>

                    <!-- Codigo JavaScript para validar el Select -->
                <script>
                    function validarSelect() {
                        var select = document.getElementById('exampleSelect1');
                        if (select.value === '') {
                            alert('Por favor, seleccione una opción');
                            return false; // Evita que el formulario se envíe si no se ha seleccionado una opción
                        } else {
                            alert('Registro exitoso'); // Muestra un mensaje de registro exitoso si se han seleccionado opciones en ambos campos
                            return true; // Permite que el formulario se envíe si se ha seleccionado una opción
                        }
                    }
                </script>
        </form>

        <!-- BOTON PARA ENVIAR LOS DATROS DEL FORMULARIO -->
        <div class="botones-contenedor">
            <a href="../PHP/liquidacionLicoProduccion.php" class="btn-enviar btn-inline">Producción</a>
            <a href="../PHP/liquidacionLicoPVP.php" class="btn-enviar btn-inline">PVP</a>
            <a href="../PHP/liquidacionLicoBanda.php" class="btn-enviar btn-inline">Banda</a>
        </div>

    </div>

    </div>

    <!-- fin -->



    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>