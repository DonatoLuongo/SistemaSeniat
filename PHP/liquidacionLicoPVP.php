<?php
//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
}

//Estos códigos son para llamar lo necesario de la base de datos
require_once 'conexion.php';

//Este código llama el valor y el id de la tarifa de cigarrillos
$tarifas = "SELECT id, nombre FROM tarifa_licores_pvp";
try {
    $tarifa1 = $pdo->query($tarifas);
    $tarifa2 = $pdo->query($tarifas);
    $tarifa3 = $pdo->query($tarifas);
    $tarifa4 = $pdo->query($tarifas);
    $tarifa5 = $pdo->query($tarifas);
    $tarifa6 = $pdo->query($tarifas);
    $tarifa7 = $pdo->query($tarifas);
    $tarifa8 = $pdo->query($tarifas);
    $tarifa9 = $pdo->query($tarifas);
    $tarifa10 = $pdo->query($tarifas);
    $tarifa11 = $pdo->query($tarifas);
    $tarifa12 = $pdo->query($tarifas);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

//Este código llama los nombres y ids de los códigos contables
$codigoContables = "SELECT id, nombre FROM codigo_contable_pvp";
try {
    $codigoContable1 = $pdo->query($codigoContables);
    $codigoContable2 = $pdo->query($codigoContables);
    $codigoContable3 = $pdo->query($codigoContables);
    $codigoContable4 = $pdo->query($codigoContables);
    $codigoContable5 = $pdo->query($codigoContables);
    $codigoContable6 = $pdo->query($codigoContables);
    $codigoContable7 = $pdo->query($codigoContables);
    $codigoContable8 = $pdo->query($codigoContables);
    $codigoContable9 = $pdo->query($codigoContables);
    $codigoContable10 = $pdo->query($codigoContables);
    $codigoContable11 = $pdo->query($codigoContables);
    $codigoContable12 = $pdo->query($codigoContables);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

//Este código llama los nombres y ids de los productos
$productos = "SELECT id, marca FROM productos_licores";
try {
    $producto1 = $pdo->query($productos);
    $producto2 = $pdo->query($productos);
    $producto3 = $pdo->query($productos);
    $producto4 = $pdo->query($productos);
    $producto5 = $pdo->query($productos);
    $producto6 = $pdo->query($productos);
    $producto7 = $pdo->query($productos);
    $producto8 = $pdo->query($productos);
    $producto9 = $pdo->query($productos);
    $producto10 = $pdo->query($productos);
    $producto11 = $pdo->query($productos);
    $producto12 = $pdo->query($productos);
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

    <!-- Item 1 -->
    <!-- FORMULARIO PADRE QUE CONTIENE TODOS LOS DEMAS FORMULARIOS  -->
    <div class="container_padre_forms" id="container_padre_forms">
        <!-- ENVIAR FORMULARIOS -->
        <!-- OBSERVA QUE TENEMOS UNA ETIQUETA FORM QUE CONTIENE LOS DEMAS FORM
            SIN EMBARGO LAS ETIQUETAS FORM LOS CAMBIE POR LA ETIEUTA DIV, HACIENDO QUE SEAN CONTENEDORES
            ADEMAS COMO TODOS LOS CAMPOS INPUTS TIENEN SU ATRIBUTO NAME PUEDES ENVIAR TODOS LOS CAMPOS A SU TABLAS CORRESPONDIENTES 
            COMO TIENES YA EN TU PHP 
        
            EL BOTON SUBMIT LO TIENES DE ULTIMO, SIEMPRE DENTRO DE LA ETIQUETA FORM
            
            INDICAIONES :
                1 -> NO CONSTRUYA FORMULARIO DENTRO DE OTROS FORMULARIO ES DECIR, ETIEUQTAS FORM DENTRO DE ETIQUETAS FORM YA QUE TE DARAN ERRO 
                2   SI TIENES MUCHOS FORMULARIO PARA ENVIAR A DISTINTAS TABLAS O PORQUE ASI SE REQUIERE, SOLO HAZ ESTRUCTURAS SEPARADAS MEDIANTE LA ETIQUETA DIV
                    Y LUEGO LOS VAS INCLUYENDO EN LA ETIQEUTA FORM, LOS DEMAS SON ESTILOS PARA HACER CREER QUE TODO CORRESPONDE A UN FORMULARIO, ESA ES LA IDEA DE CSS
                3  EL BOTON SUBMIT SIEMPRE ES UNO PARA ENVIAR TODOS AQUELLOS CAMPOS INPUTS DENTRO DE LA ETIEUTA FORM, YA CON PHP TU ACCEDES A ESTOS CAMPOS 
                    MEDIANTE SU ATRIBUTO NAME Y SE ENVIARAN A TU TABLA DE BASE DE DATOS, SIEMRE Y CUANDO ESTEN DENTRO DE LA ETIQUETA FORM
        -->

        <!-- Aqui vas a colocar el curd del formulario, solamente 1 vez -->
        <form action="crudAgregarLiquiLicorPVP.php" method="POST" class="padre_forms">

            <div class="container">
                <div>
                    <h1>PVP</h1>
                    <h3>Item 1</h3>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial1" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Seleccione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa1" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa1->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect2">Seleccione el Código Contable</label>
                        <select class="form-control" id="exampleSelect2" name="codigoContable1" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable1->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect3">Seleccione el Producto</label>
                        <select class="form-control" id="exampleSelect3" name="producto1" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto1->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput3">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico1" class="form-control" id="exampleFormControlInput3" placeholder="Introduce el grado alcohólico" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput4">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase1" class="form-control" id="exampleFormControlInput4" placeholder="Introduce la capacidad de envases" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput5">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase1" class="form-control" id="exampleFormControlInput5" placeholder="Introduce la cantidad de envases" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput6">Precio de la Botella</label>
                        <input type="text" name="precioBotella1" class="form-control" id="exampleFormControlInput6" placeholder="Introduce el precio de la botella" required>
                    </div>

                    <script>
                        function validarFormulario() {
                            var numeroSecuencial = document.getElementsByName("numeroSecuencial1")[0].value;
                            var tarifa = document.getElementsByName("tarifa1")[0].value;
                            var codigoContable = document.getElementsByName("codigoContable1")[0].value;
                            var producto = document.getElementsByName("producto1")[0].value;
                            var fechaVencimiento = document.getElementsByName("fechaVencimiento1")[0].value;
                            var gradoAlcoholico = document.getElementsByName("gradoAlcoholico1")[0].value;
                            var capacidadEnvase = document.getElementsByName("capacidadEnvase1")[0].value;
                            var cantidadEnvase = document.getElementsByName("cantidadEnvase1")[0].value;
                            var precioBotella = document.getElementsByName("precioBotella1")[0].value;

                            if (numeroSecuencial == "" || tarifa == "" || codigoContable == "" || producto == "" || fechaVencimiento == "" || gradoAlcoholico == "" || capacidadEnvase == "" || cantidadEnvase == "" || precioBotella == "") {
                                alert("Por favor complete todos los campos obligatorios");
                                return false;
                            } else {
                                alert("Formulario enviado exitosamente");
                                return true;
                            }
                        }
                    </script>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 1 -->


            <!-- Item 2 -->
            <div class="container">
                <div>
                    <h1>Item 2</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial2" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa2">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa2->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable2">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable2->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto2">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto2->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 2 -->


            <!-- Item 3 -->
            <div class="container">
                <div>
                    <h1>Item 3</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial3" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa3">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable3">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto3">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 3 -->


            <!-- Item 4 -->
            <div class="container">
                <div>
                    <h1>Item 4</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial4" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa4">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa4->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable4">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable4->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto4">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto4->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico4" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase4" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase4" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella4" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 4 -->


            <!-- Item 5 -->
            <div class="container">
                <div>
                    <h1>Item 5</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial5" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa5">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa5->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable5">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable5->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto5">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto5->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico5" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase5" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase5" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella5" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 5 -->


            <!-- Item 6 -->
            <div class="container">
                <div>
                    <h1>Item 6</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial6" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa6">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa6->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable6">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable6->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto6">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto6->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico6" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase6" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase6" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella6" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 6 -->


            <!-- Item 7 -->
            <div class="container">
                <div>
                    <h1>Item 7</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial7" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa7">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa7->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable7">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable7->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto7">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto7->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico7" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase7" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase7" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella7" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 7 -->


            <!-- Item 8 -->
            <div class="container">
                <div>
                    <h1>Item 8</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial8" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa8">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa8->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable8">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable8->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto8">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto8->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico8" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase8" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase8" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella8" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 8 -->


            <!-- Item 9 -->
            <div class="container">
                <div>
                    <h1>Item 9</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial9" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa9">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa9->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable9">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable9->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto9">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto9->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico9" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase9" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase9" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella9" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>
                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 9 -->


            <!-- Item 10 -->
            <div class="container">
                <div>
                    <h1>Item 10</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial10" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa10">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa10->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable10">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable10->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto10">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto10->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico10" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase10" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase10" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella10" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 10 -->


            <!-- Item 11 -->
            <div class="container">
                <div>
                    <h1>Item 11</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial11" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa11">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa11->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable11">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable11->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto11">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto11->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico11" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase11" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase11" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella11" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 11 -->


            <!-- Item 12 -->
            <div class="container">
                <div>
                    <h1>Item 12</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial12" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial">
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la tarifa</label>
                        <select class="form-control" id="exampleSelect1" name="tarifa12">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa12->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Código Contable</label>
                        <select class="form-control" id="exampleSelect1" name="codigoContable12">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable12->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect1" name="producto12">
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto12->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Grado alcohólico</label>
                        <input type="text" name="gradoAlcoholico12" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el grado alcohólico">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Capacidad Envases</label>
                        <input type="text" name="capacidadEnvase12" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la capacidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Envases</label>
                        <input type="text" name="cantidadEnvase12" class="form-control" id="exampleFormControlInput1" placeholder="Introduce la cantidad de envases">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de la Botella</label>
                        <input type="text" name="precioBotella12" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de la botella">
                    </div>

                    <div class="btn-container">
                        <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                    </div>

                </div>
                <!-- fin del item 12 -->
                <!-- 
                <div class="btn-container">
                    <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                </div> -->
        </form>
    </div>

    <!-- Fin de la interfaz -->

    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>