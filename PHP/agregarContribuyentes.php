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
    <link rel="stylesheet" href="../recursos/CSS/form.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="../recursos/IMG/LogoSeniat.png"> <!-- Logo del Sistema -->
    <title> Registrar Contribuyente | SENIAT </title> <!-- Nombre de la Interfaz -->

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
    <div class="container">
        <div class="flex-container">
            <div class="row full">
                <div class="col-md-12">
                    <div class="form-container">
                        <div class="row">
                            <!--    Titulo del "Formulario"    -->
                            <div class="TituloModulo">
                                <h3 class="lead-text">Contribuyente</h3>
                            </div>

                            <!--    Formulario    -->
                            <form action="crudAgregarContribuyente.php" id="form" method="POST">
                                <div class="user-details">
                                    <!--   Campos del Formularios   -->
                                    <div class="input-box"> <!-- 1 -->
                                        <label class="detail" for="Nom">Nombre</label>
                                        <input type="text" placeholder="Nombre del Contribuyente" name="nombre_contribuyente" id="input-nombre" />
                                        <div class="error"></div>
                                    </div>
                                    <div class="input-box"> <!-- 2 -->
                                        <label class="detail" for="rif">RIF</label>
                                        <input type="text" placeholder="Número del Rif" name="rif" id="input-rif" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box"> <!-- 3 -->
                                        <label class="detail" for="licencia">Licencia</label>
                                        <input type="text" placeholder="Número de Licencia" name="licencia_contribuyente" id="input-licencia" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box">
                                        <label class="detail" for="est">Estado</label>
                                        <div class="selectestado">
                                            <select class="select-estado" name="estado" id="input-estado" required>
                                                <option value="" disabled selected style="display:none">Selecciona un Estado</option>
                                                <option value="LG">LG</option>
                                                <option value="DC">DC</option>
                                                <option value="Miranda">Miranda</option>
                                            </select>
                                        </div>
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box"> <!-- 5 -->
                                        <label class="detail" for="mun">Municipio</label>
                                        <input type="text" placeholder="Municipio" name="municipio" id="input-municipio" />
                                        <div class="error"></div>
                                    </div>

                                    <div class="input-box"> <!-- 6 -->
                                        <label class="detail" for="Parroquia">Dirección Específica</label>
                                        <input type="text" placeholder="Plaza Venezuela, Avenida Quito, Caracas 1052, Distrito Capital" name="direccion_especifica" id="input-parroquia" />
                                        <div class="error"></div>
                                    </div>

                                </div>
                                <!--    Fin de los campos del formulario    -->

                                <!--    Boton para registrar el liquidador    -->

                                <div class="btn-contributent">
                                    <button class="btn-contribuyente" type="submit" id="viewAlerta" value="Registrar Contribuyente" name="enviar_registro">
                                        Registrar Contribuyente
                                    </button>
                                </div> <!--    Fin de los botones    -->

                            </form>

                            <!--    Fin del Formulario    -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin de los Div del formularios -->
    </form>
    <!--    Fin de los pasos    -->

    <!--    Fin de la Interfaz    -->



    <!--    Footer de las interfaces   -->
    <footer class="footer">
        Servicio Nacional Integrado de Administración Aduanera y Tributaria
        <strong>RIF: G-20000303-0</strong>
    </footer>
    <!-- Fin del Footer -->


    <!-- Script desde los JS -->
    <script src="../recursos/JS/errorCamposContribuyentes.js"></script>
    <script src="../recursos/JS/alertRegistroContribuyentes.js"></script>
</body>

</html>