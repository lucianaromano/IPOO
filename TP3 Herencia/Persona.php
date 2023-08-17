<?php
class Persona {
    private $DNI;
    private $nombre;
    private $apellido;

    public function __construct($DNI, $nombre, $apellido){
        $this->DNI=$DNI;
        $this->nombre=$nombre;
        $this->apellido=$apellido;
    }
    public function getDNI (){
        return $this->DNI;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }
    public function setDNI($numero){
        $this->DNI=$numero;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    
    public function __toString(){
      return "DNI: " .$this->getDNI().
      "\n Nombre: " .$this->getNombre().
      "\n Apellido: ".$this->getApellido();  
    }
}

?>