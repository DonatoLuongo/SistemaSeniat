<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
}

//Estos códigos son para llamar lo necesario de la base de datos
require_once 'conexion.php';

//Este código llama los nombres y ids de los códigos contables
$codigoContables = "SELECT id, valor FROM codigo_contable_bandas";
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
    <link rel="stylesheet" href="../recursos/CSS/liquidaciones.css">
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
        <form action="crudAgregarLiquiBandas.php" method="POST" class="padre_forms" id="miFormulario">

            <div class="container">
                <div class="titulo">
                    <h1>Bandas de Garantia</h1>
                </div>

                <div>
                    
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número secuencial</label>
                        <input type="text" name="numeroSecuencial" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el número secuencial" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['valor'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Desde</label>
                        <input type="text" name="desde" class="form-control" id="exampleFormControlInput1" placeholder="Introduce una cantidad">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Hasta</label>
                        <input type="text" name="hasta"class="form-control" id="exampleFormControlInput1" placeholder="Introduce una cantidad">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Color</label>
                        <input type="text" name="color" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el color">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Anualidad impresión</label>
                        <input type="text" name="anualidad" class="form-control" id="exampleFormControlInput1" placeholder="Introduzca la base imponible">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio</label>
                        <input type="text" name="precio" class="form-control" id="exampleFormControlInput1" placeholder="Ingrese el monto">
                    </div>

                    <div class="btn-container">
                        <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                    </div>
                    
                </div>


            </div>
        </form>
    </div>
    <!-- fin de la  Interfaz-->

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('miFormulario').addEventListener('submit', function (event) {
            // Obtener los valores de los campos del formulario
            var campos = [
                'numeroSecuencial', 'codigoContable', 'cantidad', 
                'desde', 'hasta', 'color', 'anualidad', 'precio'
            ];
            var camposCompletos = campos.every(function (campo) {
                return document.querySelector('input[name="' + campo + '"]').value.trim() !== '';
            });

            // Verificar si todos los campos están completos
            if (!camposCompletos) {
                // Evitar que el formulario se envíe
                event.preventDefault();
                // Mostrar alerta de campos incompletos
                alert('Por favor completa todos los campos.');
            } else {
                // Mostrar alerta de formulario enviado correctamente
                alert('Formulario enviado correctamente.');
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