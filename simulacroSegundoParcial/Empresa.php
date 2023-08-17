<?php

class Empresa{
    /**
     * 1. Se registra la siguiente información: identificación, nombre y la colección de Viajes que realiza.
     * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos.
     * 3. Los métodos de acceso de cada uno de los atributos de la clase.
     * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
     * 5. Implementar el método buscarViaje(codViaje) que dado un código de viaje que se recibe por parámetro,
     * retorna el objeto viaje correspondiente a ese código.
     * 6. Implementar el método darCostoViaje(codViaje) que dado un código de viaje retorna el importe
     * correspondiente a ese viaje.
     */
    private $identificacion;
    private $nombre;
    private $colViajes;
    public function __construct($identificacion,$nombre,$colViajes){
        $this->identificacion=$identificacion;
        $this->nombre=$nombre;
        $this->colViajes=$colViajes;
    }

    public function getIdentificacion(){
        return $this->identificacion;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getColViajes(){
        return $this->colViajes;
    }

    public function setIdentificacion($identificacion){
        $this->identificacion=$identificacion;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setColViajes($colViajes){
        $this->colViajes=$colViajes;
    }

    public function __toString(){
        return "Identificacion: ".$this->getIdentificacion()."\nNombre: ".$this->getNombre().
        "\nVIAJES\n".$this->recorrerViajes();
    }
    public function recorrerViajes(){
        $viaje=$this->getColViajes();
        $viajes="";
        for($i=0;$i<count($viaje);$i++){
            $viajes.=$viaje[$i]."\n";
        }
        return $viajes;
    }
    public function buscarViaje($codViaje){
        $viaje=$this->getColViajes();
        $encontrado=false;
        $dato="";
        $i=0;
        while($i<count($viaje) && !$encontrado){
            $codigo=$viaje[$i]->getNumero();
            if($codViaje==$codigo){
                $encontrado=true;
                $dato=$viaje[$i];
            }
            $i++;
        }
        return $dato;
    }
    public function darCostoViaje($codViaje){
        $objViaje=$this->buscarViaje($codViaje);
        $costo=$objViaje->calcularImporteViaje();
        return $costo;
    }
    public function viajeMenorValor(){
        $colViajes=$this->getColViajes();
        $viajeMenorValor=$colViajes[0];
        for($i=1;$i<count($colViajes);$i++){
            $viajeActual=$colViajes[$i];
            if($viajeActual->calcularImporteViaje()<$viajeMenorValor->calcularImporteViaje()){
                $viajeMenorValor=$viajeActual;
            }
        }
        return $viajeMenorValor;
    }
}