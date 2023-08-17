<?php
//EJERCICIO 13- TP 1 "IPOO"
/**Desarrollar una clase Cafetera con los atributos capacidadMaxima (la cantidad máxima de café que puede
contener la cafetera) y cantidadActual (la cantidad actual de café que hay en la cafetera). Implementar los
siguientes métodos:
13.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
13.b. Los método de acceso de cada uno de los atributos de la clase.
13.c. llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera.
13.d. servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
al consumidor para que sepa porque no se le sirvió un taza completa.
13.e. vaciarCafetera(): pone la cantidad de café actual en cero.
13.f. agregarCafe($cantidad): añade a la cafetera la cantidad de café indicada.
13.g. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
13.h. Crear un script Test_Cafetera que cree un objeto Cafetera e invoque a cada uno de los
métodos implementados. */

class Cafetera{
    private $capacidadMaxima;
    private $cantidadActual;

    //metodo constructor de la clase
    public function __construct($capacidadMaxima,$cantidadActual){
        $this->capacidadMaxima=$capacidadMaxima;
        $this->cantidadActual=$cantidadActual;
    }

    //metodos de acceso
    public function getCapacidadMaxima(){
        return $this->capacidadMaxima;
    }
    public function getCantidadActual(){
        return $this->cantidadActual;
    }
    public function setCapacidadMaxima($capacidadMaxima){
        $this->capacidadMaxima=$capacidadMaxima;
    }
    public function setCantidadActual($cantidadActual){
        $this->cantidadActual=$cantidadActual;
    }

    //otros metodos
    /**llenarCafetera(): la cantidad actual debe ser igual a la capacidad de la cafetera. */
    public function llenarCafetera(){
        $capacidadMaxima= $this->getCapacidadMaxima();
        $this->setCantidadActual($capacidadMaxima);
    }

    /**servirTaza($cantidad): simula la acción de servir una taza con la capacidad indicada. Si la
    cantidad actual de café “no alcanza” para llenar la taza, se sirve lo que quede y se envía un mensaje
    al consumidor para que sepa porque no se le sirvió un taza completa. */
    public function servirTaza($cantidad){
        $cantidadActual=$this->getCantidadActual();
        if ($cantidadActual<$cantidad){
            $cantidad+=$cantidadActual;
            echo "\n La cantidad actual es de ".$cantidadActual. "ml, por lo que no se completo la taza.";
        }
    }

    /**vaciarCafetera(): pone la cantidad de café actual en cero. */
    public function vaciarCafetera(){
        $vacio= 0;
        $this->setCantidadActual($vacio);
    }

    public function __toString(){
        return  "\n Capacidad máxima: ". $this->getCapacidadMaxima().
                "\n Cantidad ocupada actualmente: ".$this->getCantidadActual();
    }
}
?>
