<?php

class Clave {
    
    const COLORES = ['Azul', 'Rojo', 'Naranja', 'Verde', 'Violeta', 'Amarillo', 'Marrón', 'Rosa'];

    private $clave;

    public function __construct(){

        if(isset($_SESSION['clave'])){
 
            $this->clave = $_SESSION['clave'];
        
        }else{
 
            $this->generar_clave();
 
            $_SESSION['clave'] = $this->clave;
        }
       
    }

    //---generamos clave (array 4 colores)
    private function generar_clave() {

        $clave= [];

        $posiciones = array_rand(self::COLORES, 4);

        foreach ($posiciones as $posicion) {
        
            $this->clave[] = self::COLORES[$posicion];    //-OJO $clave es vaiable a la funcion
         
        }    
       
            return $clave;

    }

    public function __toString() {

        return "{$this->clave[0]}-{$this->clave[1]}-{$this->clave[2]}-{$this->clave[3]}";
    
    }  

    public function getClave()   {

        return $this->clave;
        
    }
}



?>