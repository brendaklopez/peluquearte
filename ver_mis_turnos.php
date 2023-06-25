<?php
require("conexion/conectar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!---------------------------Fuentes de Google Fonts------------------------------------->
    <!--Roboto-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">    
    <!--Rock Salt-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rock+Salt&display=swap" rel="stylesheet">

    <!-------------------------------Hojas de estilo----------------------------------------->
    <!--variables-->
    <link rel="stylesheet" href="css/01.variables/variables.css">
    <!-----base------>
    <link rel="stylesheet" href="css/02.base/normalize.css">
    <link rel="stylesheet" href="css/02.base/general.css">
    <!--secciones--->
    <link rel="stylesheet" href="css/03.secciones/header.css">    
    <link rel="stylesheet" href="css/03.secciones/header-titulo.css">
    <link rel="stylesheet" href="css/03.secciones/main.css">
    <link rel="stylesheet" href="css/03.secciones/main-header.css">
    <link rel="stylesheet" href="css/03.secciones/main-header-titulo.css">
    <link rel="stylesheet" href="css/03.secciones/main-contenido.css">
    <link rel="stylesheet" href="css/03.secciones/main-contenido-tabla.css">
    <!--componentes-->   
    <link rel="stylesheet" href="css/04.componentes/menu/menu.css">
    <link rel="stylesheet" href="css/04.componentes/menu/menu-list.css"> 
    <link rel="stylesheet" href="css/04.componentes/menu/menu-item.css"> 
    <link rel="stylesheet" href="css/04.componentes/menu/menu-link.css">
    <link rel="stylesheet" href="css/04.componentes/tabla/tabla.css"> 
    <link rel="stylesheet" href="css/04.componentes/tabla/tabla-encabezado.css">
    <link rel="stylesheet" href="css/04.componentes/tabla/tabla-fila.css">
    <link rel="stylesheet" href="css/04.componentes/tabla/tabla-celda.css">

    <title>Peluquearte | Ver mis turnos</title>

</head>
<body class=body-sistema>
    <header class="header">
        <h1 class="header-titulo">Peluquearte</h1>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item"><a class="menu__link" href="turno.php">Generar turnos</a></li>
                <li class="menu__item"><a class="menu__link" href="ver_mis_turnos.php">Ver mis turnos</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <header class="main-header">
            <h2 class="main-header-titulo">Ver mis turnos</h2>
        </header>
        <section class="main-contenido">
            <div class="main-contenido-tabla">
                <?php 
                    // Ejecutar la consulta de reservas
                    $sql = "SELECT * FROM reservas";
                    $resultado = mysqli_query($conexion, $sql) or die("Error al ejecutar la consulta");

                    // Mostrar la consulta en una tabla
                    echo "<table class='tabla' border='1'>";
                    echo "<tr class='tabla__encabezado'><th class='tabla__celda'>Id_Reserva</th><th class='tabla__celda'>DNI</th><th class='tabla__celda'>Nombre</th><th class='tabla__celda'>Apellido</th><th class='tabla__celda'>Dia</th><th class='tabla__celda'>Estado</th><th class='tabla__celda'>Id_empleado</th></tr>";
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo "<tr class='tabla__fila'>";
                        echo "<td class='tabla__celda'>" . $fila["Id_Reserva"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["DNI"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["Nombre"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["Apellido"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["Dia"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["Estado"] . "</td>";
                        echo "<td class='tabla__celda'>" . $fila["Id_empleado"] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";

                    // Cerrar la conexión
                    mysqli_close($conexion);
                ?>
            </div>
        </section>
    </main>
    
    <script type="text/javascript" src="js/formulario.js"></script>
</body>
</html>