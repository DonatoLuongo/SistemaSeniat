<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/tablaContribuyentes.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consulta | Contribuyentes </title> <!-- Nombre de la Interfaz -->

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

    <main class="tabla_contribuyentes">

        <section class="titulo_tabla">
            <h1 class="lead-text">Información de Contribuyentes</h1>
        </section>

        <!--    Tabla para mostrar informacion "Datos" y la opcion de editar "Modificar"  -->
        <div class="tabla1">

            <table>
                <thead>
                    <tr>
                        <th class="titlet">ID</th>
                        <th class="titlet">Nombre</th>
                        <th class="titlet">RIF</th>
                        <th class="titlet">Licencia</th>
                        <th class="titlet">Activo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        require_once 'conexion.php';

                        try {
                            $stmt = $pdo->query("SELECT id, nombre, rif, licencia, activo FROM contribuyentes");
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($resultados) > 0) {
                                // echo '<table border="1">';
                                // echo '<tr><th>ID</th><th>Nombre</th><th>RIF</th><th>Licencia</th><th>Activo</th></tr>';

                                foreach ($resultados as $fila) {
                                    echo '<tr>';
                                    echo '<td>' . $fila['id'] . '</td>';
                                    echo '<td>' . $fila['nombre'] . '</td>';
                                    echo '<td>' . $fila['rif'] . '</td>';
                                    echo '<td>' . $fila['licencia'] . '</td>';
                                    echo '<td>' . ($fila['activo'] ? 'Si' : 'No') . '</td>';
                                    echo '</tr>';
                                }

                                // echo '</table>';
                            } else {
                                echo '<p>No hay contribuyentes registrados.</p>';
                            }
                        } catch (PDOException $e) {
                            die('Error al realizar la consulta: ' . $e->getMessage());
                        }

                        ?>

                    </tr>
                </tbody>

            </table>

        </div>
    </main>

    <!-- Tabla 2 -->

    <main class="tabla_contribuyentes2">

        <section class="titulo_tabla">
            <h1 class="lead-text">Dirección de Planta</h1>
        </section>

        <div class="table2">
            <table>
                <thead>
                    <tr>
                        <th class="titlet">ID</th>
                        <th class="titlet">Estado</th>
                        <th class="titlet">Municipio</th>
                        <th class="titlet">Dirección..</th>
                        <th class="titlet">Activo</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <?php

                        try {
                            $stmt = $pdo->query("SELECT idcontribuyente, estado, municipio, direccion_especifica, activa FROM direccion_plantas");
                            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                            if (count($resultados) > 0) {
                                // echo '<table border="1">';
                                // echo '<tr><th>ID Contr.</th><th>Estado</th><th>Municipio</th><th>Dirección..</th><th>Activo</th></tr>';

                                foreach ($resultados as $fila) {
                                    echo '<tr>';
                                    echo '<td>' . $fila['idcontribuyente'] . '</td>';
                                    echo '<td>' . $fila['estado'] . '</td>';
                                    echo '<td>' . $fila['municipio'] . '</td>';
                                    echo '<td>' . $fila['direccion_especifica'] . '</td>';
                                    echo '<td>' . ($fila['activa'] ? 'Si' : 'No') . '</td>';
                                    echo '</tr>';
                                }

                                // echo '</table>';
                            } else {
                                echo '<p>No hay plantas registradas.</p>';
                            }
                        } catch (PDOException $e) {
                            die('Error al realizar la consulta: ' . $e->getMessage());
                        }

                        ?>
                </tbody>

            </table>
        </div>

        <div class="rep">
            <button class="btn_report">Reporte</button>
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