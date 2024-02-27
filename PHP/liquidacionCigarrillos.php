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
$codigoContables = "SELECT id, nombre FROM codigo_contable_cigarrillos";
try {
    $codigoContable = $pdo->query($codigoContables);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

//Este código llama el valor y el id de la tarifa de cigarrillos
$tarifas = "SELECT id, tarifa FROM tarifa_cigarrillos";
try {
    $tarifa = $pdo->query($tarifas);
} catch (PDOException $e) {
    // Manejar errores de consulta
    echo "Error al ejecutar la consulta: " . $e->getMessage();
}

//Este código llama los nombres y ids de los productos
$productos = "SELECT id, marca FROM productos_cigarrillos";
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


// -------------------------------------------------
// ---------------ENVIAR DATOS DE LOS FORMULARIOS ----------------------------------
// -------------------------------------------------


if (isset($_POST['']))
?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../recursos/CSS/styleMain.css">
    <link rel="stylesheet" href="../recursos/CSS/liquidaciones.css">
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title>Liquidar Cigarrillos | Liquidación </title>
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
        <form action="crudAgregarLiquiCigarrillos.php" method="POST" class="padre_forms">

            <div class="container">
                <div>
                    <h1>Item 1</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial1" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el número de secuencial" required>
                    </div>

                    <div class="form-group">
                        <label class="detail" for="est">Selecione Contribuyente</label>
                        <div class="selectestado">
                            <select class="select-estado" name="contribuyente" id="contribuyente" required>
                                <option value="" disabled selected style="display:none">Selecciona una opción</option>
                                <?php
                            while ($row = $contribuyente->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                                ?>
                            </select>
                        </div>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione Código Contable</label>
                        <select class="form-control" id="exampleSelect2" name="codigoContable" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $codigoContable->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione la Tarifa</label>
                        <select class="form-control" id="exampleSelect3" name="tarifa" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $tarifa->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['tarifa'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleSelect1">Selecione el Producto</label>
                        <select class="form-control" id="exampleSelect4" name="producto1" required>
                            <option value="" disabled selected style="display:none">Selecciona una opción</option>
                            <?php
                            while ($row = $producto1->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['marca'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas1" class="form-control" id="exampleFormControlInput2" placeholder="Ingresar la cantidad de cajetillas" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas1" class="form-control" id="exampleFormControlInput3" placeholder="Ingresar el precio de las cajetillas" required>
                    </div>

                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" name="fechaVencimiento1" type="date" value="2024-01-01" id="exampleDateInput" required>
                    </div>

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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas2" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas2" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento2" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas3" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas3" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento3" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas4" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas4" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento4" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas5" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas5" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento5" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas6" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas6" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento6" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas7" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas7" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento7" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas8" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas8" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento8" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas9" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas9" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento9" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas10" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas10" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento10" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas11" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas11" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento11" value="2024-01-01" id="exampleDateInput">
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
                        <label for="exampleFormControlInput1">Cantidad de Cajetilla</label>
                        <input type="text" name="cantidadCajetillas12" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar la cantidad de cajetillas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio de Cajetilla</label>
                        <input type="text" name="precioCajetillas12" class="form-control" id="exampleFormControlInput1" placeholder="Ingresar el precio de las cajetillas">
                    </div>
                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" type="date" name="fechaVencimiento12" value="2024-01-01" id="exampleDateInput">
                    </div>
                    <!-- </div> -->

                    <div class="btn-container">
                        <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                    </div>

                    <script>
                        document.querySelector('form').addEventListener('submit', function(event) {
                            const numeroSecuencial = document.getElementById('exampleFormControlInput1').value;
                            const contribuyente = document.getElementById('contribuyente').value;
                            const codigoContable = document.getElementById('exampleSelect2').value;
                            const tarifa = document.getElementById('exampleSelect3').value;
                            const producto = document.getElementById('exampleSelect4').value;
                            const cantidadCajetillas = document.getElementById('exampleFormControlInput2').value;
                            const precioCajetillas = document.getElementById('exampleFormControlInput3').value;
                            const fechaVencimiento = document.getElementById('exampleDateInput').value;

                            if (numeroSecuential === '' || contribuyente === '' || codigoContable === '' || tarifa === '' || producto === '' || cantidadCajetillas === '' || precioCajetillas === '' || fechaVencimiento === '') {
                                alert('Por favor, complete todos los campos');
                                event.preventDefault(); // Evita que el formulario se envíe si no se han completado todos los campos
                            } else {
                                alert('Registro exitoso'); // Muestra un mensaje de registro exitoso si se han completado todos los campos
                            }

                            if (contribuyente === '') {
                                alert('Por favor, seleccione un contribuyente');
                                event.preventDefault(); // Evita que el formulario se envíe si no se ha seleccionado un contribuyente
                            }

                        });
                    </script>

                </div>
                <!-- fin del item 12 -->


        </form>
    </div>








    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

</body>

</html>