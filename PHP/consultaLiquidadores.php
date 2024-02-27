<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/tablaLiquidadores.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consulta | Liquidadores </title> <!-- Nombre de la Interfaz -->

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

    <main class="Tabla_liquidadores">
        <!--    Titulo de la Interfaz   -->
        <section class="titulo_tabla">
            <h1 class="lead-text">Lista de Liquidadores</h1>
        </section>
        <!--    Interfaz "Tabla"   -->
        <!--    Tabla para mostrar informacion "Datos" y la opcion de editar "Modificar"  -->
        <div class="tabla">
            <table>
                <thead>
                    <tr>
                        <th> Nombre </th>
                        <th> Apellido </th>
                        <th> Cédula </th>
                        <th> Activo </th>
                    </tr>
                </thead>

                <tr>
                    <?php

                    require_once 'conexion.php';

                    $stmt = $pdo->query("SELECT nombre, apellido, cedula, activo, idrol FROM usuarios where idrol = 3");
                    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);


                    if (count($resultados) > 0) {

                        foreach ($resultados as $fila) {
                            echo '<tr>';
                            echo '<td>' . $fila['nombre'] . '</td>';
                            echo '<td>' . $fila['apellido'] . '</td>';
                            echo '<td>' . $fila['cedula'] . '</td>';
                            echo '<td>' . ($fila['activo'] ? 'Si' : 'No') . '</td>';
                            echo '</tr>';
                        }

                        // echo '</table>';
                    }

                    ?>
                </tr>
            </table>

        </div>


        <div style="text-align: right;">
            <a href="../fpdf/Liquidadores.php" target="_blank">
                <button class="action_btn">Reporte</button>
            </a>
        </div>

    </main>
    <!--    Fin de la intefaz principal   -->

    <!-- Footer de las interfaces -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>