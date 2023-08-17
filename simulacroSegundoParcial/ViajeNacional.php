<?php

include_once("Viaje.php");

class ViajeNacional extends Viaje{

    public function __construct($destino,$horaPartida,$horaLlegada,$numero,$montoBase,$fecha,$cantAsientosDisponible,$cantAsientoTotal,$responsable){
        parent::__construct($destino,$horaPartida,$horaLlegada,$numero,$montoBase,$fecha,$cantAsientosDisponible,$cantAsientoTotal,$responsable);
    }

    public function __toString(){
        $datoViaje="";
        $datoViaje.=parent::__toString();
        return "---------------VIAJE NACIONAL---------------\n".$datoViaje;
    }
    /**
     * Si el viaje es Nacional se
     * almacena porcentaje de descuento que puede ser aplicado al monto del viaje (por defecto el descuento
     * aplicado es del 10%).
     */
    public function calcularImporteViaje(){
        $importe=parent::calcularImporteViaje();
        $importe=$importe-($importe*0.1);
        return $importe;
    }
}