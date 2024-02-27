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
    <link rel="stylesheet" href="../recursos/CSS/tarifas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Unidad Tributaria Antigua | SENIAT </title> <!-- Nombre de la Interfaz -->
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

    <main class="tabletarifas">
        <section class="table_tarifas">
            <h1>Unidad Tributaria Antigua</h1>
        </section>

        <section class="table_body">
            <table>
                <thead>
                    <tr>
                        <th class="titlet"> Valor </th>
                    </tr>
                </thead>

                <tr>
                    <?php
                    require_once 'conexion.php';

                    //Código para traer a la pantalla la Unidad Tributaria Antigua
                    try {
                        $stmt = $pdo->query("SELECT valor FROM unidad_tributaria_antigua");
                        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        if (count($resultados) > 0) {
                            // echo '<h2>Unidad Tributaria Antigua</h2>';
                            // echo '<table border="1">';
                            // echo '<tr><th>Valor</th></tr>';

                            foreach ($resultados as $fila) {
                                echo '<tr>';
                                echo '<td>' . $fila['valor'] . '</td>';
                                echo '</tr>';
                            }

                            // echo '</table>';
                        } else {
                            echo '<p>No hay valor de unidad tributaria antigua registrado en la base de datos.</p>';
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