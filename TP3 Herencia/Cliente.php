<?php

include 'Persona.php';
class Cliente extends Persona {
    //clase que hereda la clase persona 
    private $nroCliente;
        //metodo constructor de Cliente
    public function __construct($DNI, $nombre, $apellido, $nroCliente){
        //invocamos al constructor de persona
        parent :: __construct($DNI, $nombre, $apellido);
        //agregamos el nuevo atributo
        $this->nroCliente=$nroCliente;
    }

    //metodo de acceso
    public function getNroCliente(){
        return $this->nroCliente;
    }

    public function setNroCliente($numero){
        $this->nroCliente=$numero;
    }

    public function __toString()
    {
        $cadena = parent :: __toString();
        $cadena.="\n Codigo cliente: ".$this->getNroCliente();
        return $cadena;
    }
} 


?>