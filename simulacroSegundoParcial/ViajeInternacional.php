<?php
include_once("Viaje.php");

class ViajeInternacional extends Viaje{
    /**
     * Si el viaje es internacional se debe almacenar si
     * requiere o no documentación adicional y el porcentaje correspondiente a impuestos que deben ser
     * aplicados al costo del viaje (por defecto el valor aplicado es del 45%)
     */
    private $documentacionAdicional;

    public function __construct($destino,$horaPartida,$horaLlegada,$numero,$montoBase,$fecha,$cantAsientosDisponible,$cantAsientoTotal,$responsable,$documentacionAdicional){
        parent::__construct($destino,$horaPartida,$horaLlegada,$numero,$montoBase,$fecha,$cantAsientosDisponible,$cantAsientoTotal,$responsable);
        $this->documentacionAdicional=$documentacionAdicional;
    }

    public function getDocumentacionAdicional(){
        return $this->documentacionAdicional;
    }

    public function setDocumentacionAdicional($documentacionAdicional){
        $this->documentacionAdicional=$documentacionAdicional;
    }
    public function __toString(){
        $datoViaje="";
        $datoViaje.=parent::__toString();
        return "---------------VIAJE INTERNACIONAL---------------\n".$datoViaje.
                "\nRequiere documentacion adicional: ".$this->getDocumentacionAdicional();
    }
    public function calcularImporteViaje(){
        $importe=parent::calcularImporteViaje();
        $importe=$importe*1.45;
        return $importe;
    }
}