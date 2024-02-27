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
    <link rel="stylesheet" href="../recursos/CSS/consultaLiquidacion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Consultas | Liquidacion Fósforos </title> <!-- Nombre de la Interfaz -->

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

    <div class="search-container">

        <div>
            <h1>Liquidación de Fósforos</h1>
        </div>

        <form action="#" method="POST">
            <div class="search-box">
                <input type="text" id="search" name="rif_contribuyente" placeholder="Buscar por número de RIF..">
                <button type="submit"> <i class="fa fa-search"></i></button>
            </div>

            <div class="tablacontribuyente">
                <table>
                    <thead>
                        <tr>
                            <th>Nro. secuencial</th>
                            <th>RIF</th>
                            <th>Nombre</th>
                            <th>Total de Gruesas</th>
                            <th>Total Canon Pagado</th>
                            <th>Total Importe Pagado</th>
                        </tr>
                    </thead>

                    <tr>
                        <?php
                        // require_once 'conexion.php';

                        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        //     try {
                        //         $rif = $_POST['rif_contribuyente'];

                        //         $stmt = $pdo->prepare("SELECT nombre, rif, licencia FROM contribuyentes WHERE rif = :rif_contribuyente");
                        //         $stmt->bindParam(':rif_contribuyente', $rif);
                        //         $stmt->execute();

                        //         $result = $stmt->fetch(PDO::FETCH_ASSOC);

                        //         if ($result) {
                        //             echo '<td> ' . $result['nombre'] . '</td>';
                        //             echo '<td> ' . $result['rif'] . '</td>';
                        //             echo '<td> ' . $result['licencia'] . '</td>';
                        //         } else {
                        //             echo '<p class="alertdebusqueda"><span>Resultados:</span> No se encontró algún contribuyente con este RIF: ' . $rif . '</p>';
                        //         }
                        //     } catch (PDOException $e) {
                        //         die('Error al realizar la consulta: ' . $e->getMessage());
                        //     }
                        // }
                        ?>
                    </tr>
                </table>

            </div>

            <div class="container-btn">
                <a href="" class="btn-reporte">Reporte</a>
            </div>

        </form>
    </div>



    <!--    Fin de la intefaz principal   -->

    <!-- Footer de las interfaces -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->



</body>

</html>