<?php

class Interfaz {
        
    /*
    *
    * Tendría métodos para:
    * Mostrar / ocultar la clave.
    * Mostrar menú jugar.
    * Mostrar la relación de jugadas efectuadas.
    * Mostrar informe de resultado de la partida.
    *
    */

    //----mostrar menu jugar con los 4 selects
    static public function mostrar_formulario() : string {
        
        $colores = CLAVE::COLORES;

        $html = "";

        for ($i = 0; $i<4; $i++) {

            $html .= "<select name='combinacion[]'>";

            foreach ($colores as $color) {

                $html .= "<option class=$color value='$color'>$color</option>";
            
            }

            $html .= "</select>";
        }

       return $html;
    }

/*    public static function mostrarClave ($colores) : string {  ///---- repasar metodo 

        $html = "<div class='jugada'>";

        foreach ($colores as $color)

            $html .= "<span class='Color $color'>$color</span>";

        $html .= "</div >";

        return $html;
    }
*/
 /*   static public function obtenerJugadas() : string {

        $jugadas = $_SESSION['jugadas'] ??  [];

        if ($jugadas == []) {

            return "No hay jugadas actualmente";

        } else{

            $numJugadas = count ($jugadas);

            $html = jugada_actual($jugadas);
            
            $html .="<hr />";
            
            $html .="Histórico de jugadas";

            $jugadas = array_reverse($jugadas);
            
            $html .= listado_jugadas ($jugadas,$numJugadas);
            
        }   
            
        return $html;
    }*/

    private static function obtenerJugadas(): array
    {
        $jugadas = $_SESSION['jugadas'];
        foreach ($jugadas as $jugada) {
            $jugadas[] = $jugada;
        }
        $jugadas =array_reverse($jugadas);
        return $jugadas;
    }
/*
    public static function mostrarTodasJugadas(){
        $jugadas = self::obtenerJugadas();
        foreach ($jugadas as $numJugada => $jugada) {
            $colores = $jugada->
            $msj.="<br /><br /><h2>Valor de la jugada $numJugada :</h2><br />" . mostrar_clave($_SESSION['jugadas'][$i]) . "<br />";
        }

    }
*/
     static public function mostrarJugadas () : string {

        $jugadas = self::obtenerJugadas();
    
        $numJugadaActual = sizeof($jugadas);
    
        $coloresActual = $jugada[0]->getColoresAcertados();
        $posicionesActual = $jugada[0]->getPosicionesAcertadas();
    
        $html = "<h3>Jugada actual $numJugadaActual </h3>";
    
        $html .= "<h3>Resultado : $coloresActual Colores y $posicionesActual posiciones </h3>";

        $jugadas = self::obtenerJugadas();

        $html = sizeof($jugadas) > 0 ? self::descripcionJugadas($jugadas) : $html;

        return $html;
    }
    
 
}
?>
