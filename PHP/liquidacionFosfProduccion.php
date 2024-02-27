<?php
// COLOCAR TODO LOS CODIGOS PHP ARRIBA DEL CODIGOS HTML

//Este códgio evita que una sesión se abra dos veces
session_start();

if (!isset($_SESSION["cedula_coordinador"])) {
    header("location: InicioSesion.php");
    exit;
};

//Estos códigos son para llamar lo necesario de la base de datos
require_once 'conexion.php';

//Este código llama los nombres y ids de los productos
$productos = "SELECT id, labor FROM productos_fosforos";
try {
    $producto1 = $pdo->query($productos);
    $producto2 = $pdo->query($productos);
    $producto3 = $pdo->query($productos);
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
        <form action="crudAgregarLiquiFosfoProduc.php" method="POST" class="padre_forms" onsubmit="return validarPrimerFormulario();">

            <div class="container">
                <div>
                    <h1>Item 1</h1>
                </div>
                <div>

                    <div class="form-group">
                        <label for="numeroSecuencial">Número de Secuencial</label>
                        <input type="text" name="numeroSecuencial1" class="form-control" id="numeroSecuencial" placeholder="Ingresar el número de secuencial" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="producto">Seleccione el Producto</label>
                        <select class="form-control" id="producto" name="producto1" required>
                            <option value="" disabled selected style="display:none">Selecciona una labor</option>
                            <?php
                            while ($row = $producto1->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['labor'] . "</option>";
                            }
                            ?>
                        </select>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="cantidadGruesas">Cantidad de Gruesas</label>
                        <input type="text" name="cantidadGruesas1" class="form-control" id="cantidadGruesas" placeholder="Introduzca el número de gruesas" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="precioGruesas">Precio Gruesas</label>
                        <input type="text" name="precioGruesas1" class="form-control" id="precioGruesas" placeholder="Introduce el precio de las gruesas" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="cantidadLuces">Cantidad Luces</label>
                        <input type="text" name="cantidadLuces1" class="form-control" id="cantidadLuces" placeholder="Introduce el precio de las luces" required>
                        <div class="error"></div>
                    </div>

                    <div class="form-group">
                        <label for="fechaVencimiento">Fecha de Vencimiento</label>
                        <input class="form-control" name="fechaVencimiento1" type="date" value="2024-01-01" id="fechaVencimiento" required>
                        <div class="error"></div>
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
                            <option value="" disabled selected style="display:none">Selecciona una labor</option>
                            <?php
                            while ($row = $producto2->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['labor'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad de Gruesas</label>
                        <input type="text" name="cantidadGruesas2" class="form-control" id="exampleFormControlInput1" placeholder="Introduzca el número de gruesas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio Gruesas</label>
                        <input type="text" name="precioGruesas2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de las gruesas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Luces</label>
                        <input type="text" name="cantidadLuces2" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de las luces">
                    </div>

                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" name="fechaVencimiento2" type="date" value="2024-01-01" id="exampleDateInput">
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
                            <option value="" disabled selected style="display:none">Selecciona una labor</option>
                            <?php
                            while ($row = $producto3->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option class='option' value='" . $row['id'] . "'>" . $row['labor'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Repeat the above form-group for the remaining 3 selects -->
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad de Gruesas</label>
                        <input type="text" name="cantidadGruesas3" class="form-control" id="exampleFormControlInput1" placeholder="Introduzca el número de gruesas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Precio Gruesas</label>
                        <input type="text" name="precioGruesas3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de las gruesas">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Cantidad Luces</label>
                        <input type="text" name="cantidadLuces3" class="form-control" id="exampleFormControlInput1" placeholder="Introduce el precio de las luces">
                    </div>

                    <!-- Repeat the above form-group for the second input -->
                    <div class="form-group">
                        <label for="exampleDateInput">Fecha de Vencimiento</label>
                        <input class="form-control" name="fechaVencimiento3" type="date" value="2024-01-01" id="exampleDateInput">
                    </div>

                    <!-- </div> -->
                </div>
            </div>
            <!-- fin del item 3 -->


            <div class="container">

                <div class="btn-container">
                    <input type="submit" class="btn-enviar" id="viewLiquiCigarri" value="Enviar" name="enviar_registro">
                </div>

            </div>
        </form>
    </div>
            <!-- fin de la interfaz -->


    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->

    <!-- Script desde los JS -->
    <script src="../recursos/JS/errorCamposLiquidacion.js"></script>

</body>

</html>