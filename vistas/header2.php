<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Semestral Desarrollo 7</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    
    <link rel="stylesheet" href="<?php echo RUTA; ?>/css/estilos.css">
</head>
<body>
    <header>
    <div class="contenedor">
        <div class="logo izquierda">
            <p> <a href="<?php echo RUTA?>">Proyecto Semestral</a></p>
        </div>
        <div class="derecha"> 
            <form name="busqueda" class="buscar" action="<?php echo RUTA;?>/buscar.php" method="get">
                <input type="text" name="busqueda" placeholder="Buscar">
                <button type="submit" class="icono fa fa-search"></button>
            </form>
            <nav class="menu">
                <ul>
                    <li> <a href="#"><i class="fa fa-github"></i></a> </li>
                    <li> <a href="#"><i class="fa fa-twitter"></i></a> </li>
                    <li><a href="http://localhost/dark-mode/"><i class="fa fa-adjust"></i></a></li>
                    <!--<li> <a href="#">Contacto<i class="fa fa-envelope"></i></a> </li> -->

                </ul>
            </nav>
    </div>
    </div>
    </header>