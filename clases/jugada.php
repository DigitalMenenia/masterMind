<?php

class Jugada {

    private $jugada = [];
    private $colores_acertados;
    private $posiciones_acertadas;
    private $intentos;
    private $numeroJugada;
	  private $jugada_actual;
    private $numJugadaActual;

    public function __construct (array $jugada_usuario, $numeroJugada) {

        $this->jugada = $jugada_usuario;
        $this->colores_acertados = 0;
        $this->posiciones_acertadas = 0;
        $this->intentos = 0;
        $this->numeroJugada = $numeroJugada; // Inicializamos el número de jugada
    }

    public function __toString() {

      $msj = "Número de jugada: {$this->numeroJugada}<br />"; // Mostramos el número de jugada
      $msj = "Jugada actual: {$this->jugada_actual}<br />";
      $msj .= "<br />";
      $msj .= "Colores de la jugada: {$this->jugada[0]}-{$this->jugada[1]}-{$this->jugada[2]}-{$this->jugada[3]}<br />";
      $msj .= "<br />";
      $msj .= "Resultados: <br />";
      $msj .= "<br />";

     // $msj .= "Colores de la jugada: {$this->jugada[0]}-{$this->jugada[1]}-{$this->jugada[2]}-{$this->jugada[3]}<br />";
      $msj .= "Colores acertados: $this->colores_acertados <br />";
      $msj .= "Posiciones acertadas: $this->posiciones_acertadas <br />";
      
      $msj .= "<hr>";
      $msj .= "Historico de jugadas <br />";
      $msj .= "Valor de la jugada {$this->numJugadaActual}";

      return $msj;
    } 

    public function evaluar_jugada($clave) {
        
        $jugada_sin_duplicar = array_unique($this->jugada);

        foreach ($jugada_sin_duplicar as $color_jugada) {

            if (in_array($color_jugada, $clave)){

                $this->colores_acertados++;
            }
        } 

        foreach ($this->jugada as $pos => $color_jugada) {

            if ($clave[$pos] == $color_jugada) {
            
                $this->posiciones_acertadas++;
            } 
        } 
    }

    //creamos metodos getter
    public function getJugada()  {

        return $this->jugada;
    }

    public function getPosicionesAcertadas() : int {

        return $this->posiciones_acertadas;
    }

    public function getColoresAcertados() : int {

        return $this->colores_acertados;
    }

    public function getColoresJugada(): string {

        $msj = "";

        foreach ($this->jugada as $color)

            $msj .= "<div class='Color $color'>$color</div>";

        return $msj;
    }  
}

?>


