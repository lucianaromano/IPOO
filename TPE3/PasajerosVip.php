<?php

//La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. 

class PasajerosVip extends Pasajeros {
    //clase que hereda la clase pasajeros
    private $nroViajeroFrecuente;
    private $cantMillas;

    //metodo constructor de pasajero Vip
    public function __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket, $nroViajeroFrecuente, $cantMillas){
        parent:: __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket);
        $this->nroViajeroFrecuente=$nroViajeroFrecuente;
        $this->cantMillas=$cantMillas;
    }

    //metodos de acceso
    public function getNroViajeroFrecuente(){
        return $this->nroViajeroFrecuente;
    }
    public function setNroViajeroFrecuente($numero){
        $this->nroViajeroFrecuente=$numero;
    }
    public function getCantMillas(){
        return $this->cantMillas;
    }
    public function setCantMillas($cantMillas){
        $this->cantMillas=$cantMillas;
    }

    //metodo toString de la clase
    public function __toString(){
        $cadena = parent:: __toString();
        $cadena.="\n Numero viajero frecuente: ".$this->getNroViajeroFrecuente().
        $cadena.="\n Cantidad de millas del pasajero: ".$this->getCantMillas();
        return $cadena;
    }
}
?>

