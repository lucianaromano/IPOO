<?php

//La clase "PasajeroVIP" tiene como atributos adicionales el número de viajero frecuente y cantidad de millas de pasajero. 

class PasajerosVip extends Pasajeros {
    //clase que hereda la clase pasajeros
    private $nroViajeroFrecuente;
    private $cantMillas;

    //metodo constructor de pasajero Vip
    public function __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket,$costo, $nroViajeroFrecuente, $cantMillas){
        parent:: __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket,$costo);
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

     /**
     * Retorna el porcentaje que debe aplicarse como incremento segun las caracteristicas del pasajero.
     */
    public function darPorcentajeIncremento(){
        if ($this->getCantMillas()>300){
            $porcentaje=((30)/100);
        } else{
            $porcentaje= ((35)/100);
        }
        return $porcentaje;
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

