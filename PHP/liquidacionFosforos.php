<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
};


//Estos códigos son para llamar lo necesario de la base de datos
require_once 'conexion.php';

//Este código llama los nombres y ids de los contribuyentes
$contribuyentes = "SELECT id, nombre FROM contribuyentes";
try {
    $contribuyente = $pdo->query($contribuyentes);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

//Este código llama los nombres y ids de los códigos contables
$codigoContables = "SELECT id, codigo_contable FROM codigo_contable_fosforos";
try {
    $codigoContable = $pdo->query($codigoContables);
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
    <title>Liquidar Fósforos | Liquidación </title>

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
                <li><a class="linea2" href="">Liquidacion </a>
                    <ul class="barrita">
                        <a href="../PHP/liquidacionLicores.php">Licores</a>
                        <a href="../PHP/liquidacionCigarrillos.php">Cigarrillos</a>
                        <a href="../PHP/liquidacionFosforos.php">Fosforos</a>
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

        <form action="crudAgregarLiquiFosforos.php" method="post" id="miFormulario">

            <div class="container">
                <div class="titulo">
                    <h1>Impuesto Fósforos</h1>
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Oficina</label>
                    <input type="text" placeholder="10" id="oficina" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Gerencia</label>
                    <input type="text" placeholder="11" id="gerencia" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Número de porción</label>
                    <input type="text" placeholder="1" id="porcion" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Tipo de liquidación</label>
                    <input type="text" placeholder="2" id="liquidacion" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Serie</label>
                    <input type="text" placeholder="45" id="serie" tabindex="-1">
                </div>

                <div class="form-group">
                    <label for="exampleSelect1">Selecione el Contribuyente</label>
                    <select class="form-control" id="contribuyente" name="contribuyente">
                        <option value="" disabled selected style="display:none">Selecciona una opción</option>
                        <?php
                        while ($row = $contribuyente->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleSelect2">Selecione el Código Contable</label>
                    <select class="form-control" id="codigoContable" name="codigoContable">
                        <option value="" disabled selected style="display:none">Selecciona una opción</option>
                        <?php
                        while ($row = $codigoContable->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option class='option' value='" . $row['id'] . "'>" . $row['codigo_contable'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <!-- BOTON PARA ENVIAR LOS DATROS DEL FORMULARIO -->
                <div class="botones-contenedor">
                    <div class="btn-container">
                        <button type="submit" class="registrar" name="Registrar">Registrar</button>
                    </div>

                    <div class="btn-container">
                        <a href="../PHP/liquidacionFosfProduccion.php">
                            <input type="button" value="Producción" class="btn-enviar">
                        </a>
                    </div>

                    <div class="btn-container">
                        <a href="../PHP/liquidacionFosfCannon.php">
                            <input type="button" value="Canon de arrendamiento" class="btn-enviar">
                        </a>
                    </div>

                </div>
            </div>
        </form>
    </div>
    <!-- fin -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('miFormulario').addEventListener('submit', function(event) {
                // Obtener los valores de los select
                var contribuyente = document.getElementById('contribuyente').value;
                var codigoContable = document.getElementById('codigoContable').value;

                // Validar si los campos de los select están seleccionados
                if (contribuyente === '' || codigoContable === '') {
                    // Evitar que el formulario se envíe
                    event.preventDefault();
                    // Mostrar alerta
                    alert('Por favor completa todos los campos.');
                } else {
                    // Mostrar mensaje de registro exitoso
                    alert('Registro exitoso');
                    // Limpiar los campos del formulario si es necesario
                    // Aquí puedes añadir código para limpiar los campos si lo deseas
                    // Por ejemplo:
                    // document.getElementById('contribuyente').value = '';
                    // document.getElementById('codigoContable').value = '';
                }
            });
        });
    </script>





    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>