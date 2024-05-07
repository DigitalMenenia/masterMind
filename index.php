<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">    
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
        <title>Información sobre eventos</title>
    </head>
    <body>
        <div class="descripcion">
            <h1>MASTER MIND</h1>
            <hr size="2px" color=" #4B0082" />
            <h3>DESCRIPCION</h3>
            <ol>
                <li>Esta es una presentación personalizada del juego. </li> <br /> 
                <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li> <br /> 
                <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li> <br /> 
                <li>En total habrá 14 intentos para adivinar la clave.</li> <br /> 
                <li>En cada jugada la app informará:</li> <br /> 
                    <ul>
                        <li> Cuántos colores has acertado de la combinacion.</li> <br /> 
                        <li> Cuántos de ellos están en la posicion correcta.</li> <br /> 
                    </ul>
                <li>No se especificará cuáles son las posiciones acertadas en caso de acierto. </li> <br /> 
            </ol>
            <hr size="2px" color="black" />

            <form action="jugar.php" method="POST">
                <input type="submit" value="Empezar a jugar" name="submit"/>
            </form>
        </div>
        <footer>
            <p>&copy; 2021 Lorena M.</p>
        </footer>
</body>
</html>

