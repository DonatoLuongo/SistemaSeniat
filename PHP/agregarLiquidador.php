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
  <title> Registrar Liquidador | SENIAT </title> <!-- Nombre de la Interfaz -->

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
                <h3 class="lead-text">Liquidador</h3>
              </div>

              <!--    Formulario    -->
              <form action="crudAgregarLiquidador.php" method="POST" id="form">
                <div class="user-details">
                  <!--   Campos del Formularios   -->
                  <div class="input-box"> <!-- 1 -->
                    <label class="detail" for="nom">Nombre</label>
                    <input type="text" placeholder="Nombre del Liquidador" name="nombre_liquidador" id="nombre_liquidador" />
                    <div class="error"></div>
                  </div>

                  <div class="input-box"> <!-- 2 -->
                    <label class="detail" for="apelli">Apellido</label>
                    <input type="text" placeholder="Apellido del Liquidador" name="apellido_liquidador" id="apellido_liquidador" />
                    <div class="error"></div>
                  </div>

                  <div class="input-box"> <!-- 3 -->
                    <label class="detail" for="ci">Cédula de Identidad</label>
                    <input type="text" placeholder="Número de Cédula" name="cedula_liquidador" id="cedula_liquidador" />
                    <div class="error"></div>
                  </div>

                  <div class="input-box"> <!-- 4 -->
                    <label class="detail" for="pass">Contraseña</label>
                    <input type="password" placeholder="Contraseña" name="clave_liquidador" id="clave_liquidador" />
                    <div class="error"></div>
                  </div>

                </div>
                <!--    Fin de los campos del formulario    -->

                <!--    Boton para registrar el liquidador    -->
                <div class="btn-reg">
                  <input type="submit" id="viewAlerta" value="Registrar Liquidador" registrar>
                </div>
              </form>

              <!--    Fin del Formulario    -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- Fin de los Div del formularios -->

  <!--    Footer de las interfaces   -->
  <footer class="footer">
    Servicio Nacional Integrado de Administración Aduanera y Tributaria
    <strong>RIF: G-20000303-0</strong>
  </footer>
  <!-- Fin del Footer -->


  <script src="../recursos/JS/alertRegistro.js"></script>
  <script src="../recursos/JS/errorCampos.js"></script>


</body>

</html>