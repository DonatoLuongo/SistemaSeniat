<?php
// COLOCAR TODO LOS CODIGOS PHP ARRIBA DEL CODIGOS HTML

//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_liquidador"])) {
    header("location: InicioSesion.php");
    exit;
};

//Estos códigos son para llamar lo necesario de la base de datos
require_once 'conexion.php';

//Este código llama al valor de la unidad tributaria actual
$unidadTributarias = "SELECT valor FROM unidad_tributaria";
try {
    $stmt = $pdo->query($unidadTributarias);
    $unidadTributaria = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta de unidad tributaria: " . $e->getMessage();
}

//Este código llama al valor de la unidad tributaria antigua
$unidadTributariaAntiguas = "SELECT valor FROM unidad_tributaria_antigua";
try {
    $stmt = $pdo->query($unidadTributariaAntiguas);
    $unidadTributariaAntigua = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta de unidad tributaria antigua: " . $e->getMessage();
}

//Este código llama al valor de la tarifa de canon
$tarifaCanons = "SELECT tarifa FROM tarifa_canon";
try {
    $stmt = $pdo->query($tarifaCanons);
    $tarifaCanon = $stmt->fetchColumn();
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta de tarifa de canon: " . $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <!-- <link rel="stylesheet" href="../recursos/CSS/liquidacionStyle.css"> -->
    <link rel="stylesheet" href="../recursos/CSS/liquidacionCannon.css">
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

    <div class="container_padre_forms" id="container_padre_forms">
        <form action="crudAgregarLiquiFosfoCanon.php" method="POST" class="padre_forms">

            <div class="container">
                <div class="titulo">
                    <h1>Canon de arrendamiento</h1>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Número Secuencial</label>
                    <input type="text" name="secuencial" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de Secuencial" required>
                </div>

                <script>
                    function validarFormulario() {
                        var secuencial = document.getElementById("exampleFormControlInput1").value;
                        if (secuencial == "") {
                            alert("Por favor ingrese el número de Secuencial");
                            return false;
                        } else {
                            alert("Formulario enviado exitosamente");
                            return true;
                        }
                    }
                </script>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Importe a Pagar</label>
                    <?php
                    // Calcula el valor del importe a pagar
                    $baseImponible = $unidadTributaria / $unidadTributariaAntigua;
                    $importePagar = $baseImponible * $tarifaCanon;

                    // Ajusta el formato del número para que sea compatible con la base de datos
                    $importePagar = str_replace(',', '.', $importePagar);

                    // Imprime el valor en el placeholder y en el atributo value
                    ?>
                    <input type="text" name="importePagar" class="form-control" id="exampleFormControlInput1" placeholder="<?php echo $importePagar ?>" value="<?php echo $importePagar ?>" readonly>
                </div>

                <div class="btn-container">
                    <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                </div>

            </div>


        </form>
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