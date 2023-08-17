<?php

class Terminal{
    /**
     * 1. Se registra la siguiente información: denominación, dirección y la colección de empresas registradas en
     * la terminal.
     * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
     * 3. Los métodos de acceso para cada una de las variables instancias de la clase.
     * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase
     */

     private $dominacion;
     private $direccion;
     private $colEmpresas;

     public function __construct($dominacion,$direccion,$colEmpresas){
        $this->dominacion=$dominacion;
        $this->direccion=$direccion;
        $this->colEmpresas=$colEmpresas;
     }

     public function getDominacion(){
        return $this->dominacion;
     }
     public function getDireccion(){
        return $this->direccion;
     }
     public function getColEmpresas(){
        return $this->colEmpresas;
     }

     public function setDominacion($dominacion){
        $this->dominacion=$dominacion;
     }
     public function setDireccion($direccion){
        $this->direccion=$direccion;
     }
     public function setColEmpresas($colEmpresas){
        $this->colEmpresas=$colEmpresas;
     }

     public function __toString(){
        return "Dominacion: ".$this->getDominacion()."\nDireccion: ".$this->getDireccion()."\nEMPRESAS\n".$this->recorrerEmpresas();
     }

     public function recorrerEmpresas(){
        $empresa=$this->getColEmpresas();
        $empresas="";
        for($i=0;$i<count($empresa);$i++){
            $empresas.=$empresa[$i]."\n";
        }
        return $empresas;
    }
    /**
     * 5. Implementar el método darViajeMenorValor() recorre cada una de las empresas vinculadas a la terminal
     * y retorna una colección de objetos de viaje. Cada viaje es el de menor valor dentro de la colección de
     * viajes de esa empresa
     */
    public function darViajeMenorValor(){
        $colEmpresas=$this->getColEmpresas();
        $colViajes=[];
        for($i=0;$i<count($colEmpresas);$i++){
            $colViajes[]=$colEmpresas[$i]->viajeMenorValor();
         }
         return $colViajes;
      }
}