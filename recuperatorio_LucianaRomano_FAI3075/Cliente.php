<?php
class Cliente
{
    //atributos de la clase
    private $nombre;
    private $apellido;
    private $baja; //Si un cliente está dado de baja, no puede registrar compras desde el momento de su baja
    private $tipoDoc;
    private $nroDoc;

    //metodo constructor
    public function __construct($nombre, $apellido, $baja, $tipoDoc, $nroDoc)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->baja = $baja;
        $this->tipoDoc = $tipoDoc;
        $this->nroDoc = $nroDoc;   
    }
    //metodos de acceso

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getBaja(){
        return $this->baja;
    }

    public function getTipoDoc(){
        return $this->tipoDoc;
    }

    public function getNroDoc(){
        return $this->nroDoc;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;
    }

    public function setBaja($baja){
        $this->baja = $baja;
    }

    public function setTipoDoc($tipoDoc){
        $this->tipoDoc = $tipoDoc;
    }

    public function setNroDoc($nroDoc){
        $this->nroDoc = $nroDoc;
    }

    //otros metodos
    public function baja(){
        $baja=$this->getBaja();
        $retorno = "Si";
        if (!$baja){
            $retorno= "No";
        }
        return $retorno;
    }
    public function __toString(){
        return "\n Nombre: " . $this->getNombre() .
        "\nApellido: " . $this->getApellido() . 
        "\nBaja: " . $this->baja() . 
        "\nTipo de Documento: " . $this->getTipoDoc() .
        "\nNro Documento: " . $this->getNroDoc();
    }
}
?>