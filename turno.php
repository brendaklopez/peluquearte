<?php
require("conexion/conectar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
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
    <!--componentes-->
    <link rel="stylesheet" href="css/04.componentes/form/form.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-titulo.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-datos.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-input.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-label.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-botones.css">
    <link rel="stylesheet" href="css/04.componentes/form/form-botones-boton.css">
    <link rel="stylesheet" href="css/04.componentes/mensaje/mensaje-link.css">    
    <link rel="stylesheet" href="css/04.componentes/menu/menu.css">
    <link rel="stylesheet" href="css/04.componentes/menu/menu-list.css"> 
    <link rel="stylesheet" href="css/04.componentes/menu/menu-item.css"> 
    <link rel="stylesheet" href="css/04.componentes/menu/menu-link.css"> 

    <title>Peluquearte | Generar turnos</title>
    
</head>
<body class="body-sistema">
    <header class=header>
        <h1 class="header-titulo">Peluquearte</h1>
        <nav class="menu">
            <ul class="menu__list">
                <li class="menu__item"><a class="menu__link" href="#">Generar turnos</a></li>
                <li class="menu__item"><a class="menu__link" href="#">Ver mis turnos</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <header class="main-header">
            <h2 class="main-header-titulo">Generar turnos</h2>
        </header>
        <section class="main-contenido">
            <form  class="main-form form" action="bdd/registrar_reserva.php" method="post" id="formulario" name="formulario" autocomplete="off">   
                <div>
                    <label>DNI</label>
                    <input id="DNI" type="number" name="dni" autocomplete="off" >            
                </div>
                <div>
                    <label>Nombre</label>
                    <input id="nombre"type="text" name="nombre" autocomplete="off">
                </div>
                <div>
                    <label>Apellido</label> 
                    <input id="apellido"type="text" name="apellido" autocomplete="off" >   
                </div>
                <div>
                    <label>Seleccionar fecha del turno: </label>
                    <input type="date" name="calendario"  value="2023-07-22" min="2018-01-01" max="2025-12-31" id= "dia">
                    <label>Hora:</label>
                    <input type="time" id="hora" name="hora" value="11:45:00" max="19:30:00" min="10:00:00" step="1" >
                </div>
                <div>
                <label>Seleccionar estado: </label>
                <select id="estado" name="estado">
                    <option value="">Estado</option>
                    <option value="confirmado">confirmado</option>
                    <option value="reservado">reservado</option>
                    <option value="cancelado">cancelado</option>
                </select>   
                </div>
                <div>
                    <label>Seleccionar empleado: </label>
                    <select name="Id_empleado" id="Id_empleado">
                        <?php
                        // Hacer la consulta incluyendo el campo id_empleado
                        $result = mysqli_query($conexion, 'SELECT id_empleado, Nombre, Apellido FROM empleado');

                        // Comprobar si la consulta tuvo éxito
                        if ($result) {
                        // Recorrer todas las filas del resultado
                        while ($row = mysqli_fetch_assoc($result)) {
                            // Crear una opción con el valor del campo id_empleado y el texto del campo Nombre
                            echo "<option value='" . $row["id_empleado"] . "'>" . $row["Nombre"] . " " . $row["Apellido"] . " " . "</option>";
                            //echo "<option value='" . $row["id_empleado"] . "'>" . $row["Nombre"] . "</option>";
                        }
                        } else {
                        // Mostrar un mensaje de error
                        echo "Error al hacer la consulta: " . mysqli_error($conexion);
                        }
                        ?>
                    </select>
                </div>   
                <input type="submit" value="enviar">     
            </form>

            <div id= "alerta">
                <p id = "dniMensaje"></p>
                <p id = "nombreMensaje"></p>
                <p id = "apellidoMensaje"></p>
                <p id = "selectMensaje"></p> 
            </div>
        </section>
    </main>

    <script type="text/javascript" src="js/formulario.js"></script>
</body>
</html>