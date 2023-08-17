<?php
/**
 * 1. Se registra la siguiente información: nombre, apellido, Nro de Documento, dirección, mail y teléfono.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
 * clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método toString para que retorne la información de los atributos de la clase.
 */
class Responsable{
    private $nombre;
    private $apellido;
    private $nroDocumento;
    private $direccion;
    private $mail;
    private $tel;

    public function __construct($nombre,$apellido,$nroDocumento,$direccion,$mail,$tel){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->nroDocumento=$nroDocumento;
        $this->direccion=$direccion;
        $this->mail=$mail;
        $this->tel=$tel;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNroDoc(){
        return $this->nroDocumento;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getTel(){
        return $this->tel;
    }

    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setApellido($apellido){
        $this->apellido=$apellido;
    }
    public function setNroDoc($nroDocumento){
        $this->nroDocumento=$nroDocumento;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setMail($mail){
        $this->mail=$mail;
    }
    public function setTel($tel){
        $this->tel=$tel;
    }

    public function __toString(){
        return "Nombre: ".$this->getNombre()."\nApellido: ".$this->getApellido()."\nNro Documento: ".$this->getNroDoc().
        "\nDireccion: ".$this->getDireccion()."\nMail: ".$this->getMail()."\nTelefono: ".$this->getTel();
    }
}