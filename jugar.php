<?php

session_start();



/* cargamos automaticamente las clases q necesitaremos */
function carga ($clase){

    require ("./clases/clave.php");
    require ("./clases/interfaz.php");
    require ("./clases/jugada.php");
    
}

spl_autoload_register("carga");


$clave = new Clave();

$opcion = $_POST['submit'] ?? "";

$opcionesJuego = "Mostrar clave";

$_SESSION['intentos'] = 0;

$msj = "";

$jugada = null; // Inicializamos la variable $jugada

// Inicializamos $numeroJugada
$numeroJugada = 1; // Definir el número de jugada


    switch ($opcion){

        case "Empezar a jugar":
            $msj = "<h3> Sin datos que mostrar </h3>";
            break;
        case "Jugar":
            $jugada = new Jugada($_POST['combinacion'], $numeroJugada);       
            $jugada->evaluar_jugada($clave->getClave());
            $_SESSION['jugadas'][]['jugada'] = $jugada; //-----gurdamos variable en el array de sesion           
            $posicion_actual = array_key_last($_SESSION['jugadas']);
            break;
            exit;
        case "Resetear clave":
            session_destroy();
            session_start();
            header("Location:jugar.php");
            $clave = new Clave();
            $msj .= "<h3> La clave actual ha cambiado</h3>";
            break;
            exit;
        case "Mostrar clave":
            $opcionesJuego = "Ocultar clave";
           // $msj = Interfaz::mostrarClave();
            $msj .= "<h2> Clave Actual <br />" . $clave . "</h2> <br /> ";
            break;
            exit;
        case "Ocultar clave":
            $opcionesJuego = "Mostrar clave";
            $msj .= "<h3> Sin datos que mostrar </h3>";
            break;
            exit;
        default:

            
    }

    $formularioJuego = Interfaz::mostrar_formulario();

    $clave_actual = $clave->getClave();
?>

<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" >
        <link rel="stylesheet" href="estilo.css" type="text/css"/>
        <script type="text/javascript">
            function cambia_color(numero) {
                color = document.getElementById("combinacion" + numero).value;
                elemento = document.getElementById("combinacion" + numero);
                elemento.className = color;
            }
        </script> 
        <title>MasterMind</title>
    </head>
    <body>
        <div class="contenedorJugar">
            <div class="opciones">  <!-- Parte izquierda de la pantalla, con dos secciones-->
                <h2>OPCIONES</h2>
                <fieldset style="width:25%"><!-- Sección de acciones -->
                    <legend>Acciones posibles</legend>
            
                    <form action="jugar.php" method="POST">
                        <input type="submit" value="<?php echo $opcionesJuego ?>" name="submit" />
                        <input type="submit" value="Resetear clave" name="submit" />  
                    </form>
                </fieldset>
                
                <fieldset style="width:75%"><!-- Sección de menú para realizar la jugada -->                   
                    <legend>Menú jugar</legend>
                       <form action="jugar.php" method="POST">
                           <?= $formularioJuego?>
                            <input type="submit" value="Jugar" name="submit" />             
                        </form>
                </fieldset>
            </div>
                    
            <div class="informacion">
                <fieldset class="informacion"><!-- Parte derecha  de la pantalla para la información-->
                    <h2>INFORMACIÓN</h2>
                        <fieldset style="width:25%">
                            <legend> Sección de información</legend>
                            <?php echo $msj ?>
                            <?php echo "<h3> $jugada </h3>" ?>
                        </fieldset>
                        <hr>
                        <div>
                            <!--<h3>un fieldset dentro de (<span style="color:green">class=información</span>)</h3>    -->
                            
                        </div>
                </fieldset>
            </div>
        </div>
</body> 
<footer>
    <p>&copy; 2021 Lorena M.</p>
<footer>
    
   
</html>
