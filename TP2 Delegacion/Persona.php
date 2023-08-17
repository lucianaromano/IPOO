<?php

/**Implementar una clase Persona con los atributos: nombre, apellido, tipo y número de documento.
a) Defina en la clase los siguientes métodos:
1. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
2. Los métodos de acceso de cada uno de los atributos de la clase.
3. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
4. Crear un script Test_Persona que cree un objeto Persona e invoque a cada uno de los
métodos implementados.
b) Realizar las modificaciones necesarias en la clase CuentaBancaria (Ejercicio 14 del TP1) para que en
vez de contener como atributo el DNI del dueño de la cuenta tenga una referencia a las clase Persona.

 */
class Persona {
    //atributos de la clase
    private $nombre;
    private $apellido;
    private $tipoDoc;
    private $numDoc;


    //metodo constructor de la clase
    public function __construct($nombre,$apellido,$tipoDoc, $numDoc){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->tipoDoc=$tipoDoc;
        $this->numDoc=$numDoc;    
    }

    //metodos de acceso 
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getTipoDoc(){
        return $this->tipoDoc;
    }
    public function getNumDoc(){
        return $this->numDoc;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setTipoDoc($tipoDoc){
        $this->tipoDoc=$tipoDoc;
    }
    public function setNumDoc($numDoc){
        $this->numDoc=$numDoc;
    }

    //otros metodos de la clase
    public function __toString()
    {
    return  "\n -Nombre: ".$this->getNombre().
            "\n -Apellido: ". $this->getApellido().
            "\n -Tipo de documento: " .$this->getTipoDoc().
            "\n -Numero de documento: ".$this->getNumDoc();
    }

}

?>