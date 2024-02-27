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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/codigocontable.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consulta | Licores </title>  <!-- Nombre de la Interfaz -->
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

    <main class="tablecodigocontable">
        <!--    Titulo de la Interfaz   -->
        <section class="titulo_codigocontable">
            <h1>Códigos Contables de Licores</h1>
        </section>
        <!--    Interfaz "Tabla"   -->
        <section class="table_body">
            <!--    Tabla para mostrar informacion "Datos" y la opcion de editar "Modificar"  -->
            <table>

                <tr>
                    <?php
                    require_once 'conexion.php';

                    try {
                        $stmt = $pdo->query("SELECT nombre, codigo_contable FROM codigo_contable_produccion");
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($resultados) > 0) {
                            echo '<h2>Códigos Contables de Producción</h2>';
                            // echo '<table border="1">';
                            echo '<tr><th>Nombre</th><th>Código</th></tr>';

                            foreach ($resultados as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['nombre'] . '</td>';
                                echo '<td>' . $fila['codigo_contable'] . '</td>';
                                echo '</tr>';
                            }

                            // echo '</table>';
                        } else {
                            echo '<p>No hay códigos contables de producción registrados.</p>';
                        }
                    } catch (PDOException $e) {
                        die('Error al realizar la consulta: ' . $e->getMessage());
                    }

                    ?>
                </tr>
            </table>
        </section>

        <section class="table_body">
            <table>
                <tr>


                    <?php
                    try {
                        $stmt = $pdo->query("SELECT nombre, codigo_contable FROM codigo_contable_pvp");
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($resultados) > 0) {
                            echo '<h2>Códigos Contables de PVP</h2>';
                            // echo '<table border="1">';
                            echo '<tr><th>Nombre</th><th>Código</th></tr>';

                            foreach ($resultados as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['nombre'] . '</td>';
                                echo '<td>' . $fila['codigo_contable'] . '</td>';
                                echo '</tr>';
                            }

                            // echo '</table>';
                        } else {
                            echo '<p>No hay códigos contables de PVP registrados.</p>';
                        }
                    } catch (PDOException $e) {
                        die('Error al realizar la consulta: ' . $e->getMessage());
                    }
                    ?>
                </tr>
            </table>
        </section>


        <section class="table_body">
            <table>
                <tr>


                    <?php
                    try {
                        $stmt = $pdo->query("SELECT valor FROM codigo_contable_bandas");
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($resultados) > 0) {
                            echo '<h2>Código Contable de Bandas de Garantía</h2>';
                            // echo '<table border="1">';
                            echo '<tr><th class="banda">Código</th></tr>';

                            foreach ($resultados as $fila) {
                                echo '<tr>';
                                echo '<td class="banda">' . $fila['valor'] . '</td>';
                                echo '</tr>';
                            }

                            // echo '</table>';
                        } else {
                            echo '<p>No hay código contable de bandas de garantía registrado.</p>';
                        }
                    } catch (PDOException $e) {
                        die('Error al realizar la consulta: ' . $e->getMessage());
                    }
                    ?>


                </tr>
            </table>
        </section>

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