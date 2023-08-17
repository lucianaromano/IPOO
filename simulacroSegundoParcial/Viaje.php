<?php
/** 
 * 1. Se registra la siguiente información: destino, hora de partida, hora de llegada, número, monto base,
 * fecha, cantidad de asientos totales, cantidad de asientos disponibles, y una referencia a la persona
 * responsable del viaje.
 * 2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
 * clase.
 * 3. Los métodos de acceso de cada uno de los atributos de la clase.
 * 4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
 * 5. Implementar la jerarquía de herencia que corresponda para implementar los viajes Nacionales e
 * Internacionales.
 * 6. Implementar el método calcularImporteViaje() que se calcula en base al monto base del viaje, la
 * cantidad de asientos disponibles y la cantidad total de asientos. El cálculo que se realiza es el siguiente:
 * importe = monto base + (monto base * asientosVendidos /asientos totales)
 * 7. Redefinir el método que permite calcular el importe de un viaje según corresponda.
*/
class Viaje{
    private $destino;
    private $horaPartida;
    private $horaLlegada;
    private $numero;
    private $montoBase;
    private $fecha;
    private $cantAsientosDisponible;
    private $cantAsientoTotal;
    private $responsable;

    public function __construct($destino,$horaPartida,$horaLlegada,$numero,$montoBase,$fecha,$cantAsientosDisponible,$cantAsientoTotal,$responsable){
        $this->destino=$destino;
        $this->horaPartida=$horaPartida;
        $this->horaLlegada=$horaLlegada;
        $this->numero=$numero;
        $this->montoBase=$montoBase;
        $this->cantAsientosDisponible=$cantAsientosDisponible;
        $this->cantAsientoTotal=$cantAsientoTotal;
        $this->responsable=$responsable;
        $this->fecha=$fecha;
    }

    public function getDestino(){
        return $this->destino;
    }
    public function getHoraPartida(){
        return $this->horaPartida;
    }
    public function getHoraLlegada(){
        return $this->horaLlegada;
    }
    public function getNumero(){
        return $this->numero;
    }
    public function getMontoBase(){
        return $this->montoBase;
    }
    public function getCantAsientosDisponible(){
        return $this->cantAsientosDisponible;
    }
    public function getResponsable(){
        return $this->responsable;
    }
    public function getCantAsientoTotal(){
        return $this->cantAsientoTotal;
    }
    public function getFecha(){
        return $this->fecha;
    }

    public function setDestino($destino){
        $this->destino=$destino;
    }
    public function setHoraPartida($horaPartida){
        $this->horaPartida=$horaPartida;
    }
    public function setHoraLlegada($horaLlegada){
        $this->horaLlegada=$horaLlegada;
    }
    public function setNumero($numero){
        $this->numero=$numero;
    }
    public function setMontoBase($montoBase){
        $this->montoBase=$montoBase;
    }
    public function setCantAsientosDisponible($cantAsientosDisponible){
        $this->cantAsientosDisponible=$cantAsientosDisponible;
    }
    public function setCantAsientoTotal($cantAsientoTotal){
        $this->cantAsientoTotal=$cantAsientoTotal;
    }
    public function setResponsable($responsable){
        $this->responsable=$responsable;
    }
    public function setFecha($fecha){
        $this->fecha=$fecha;
    }

    public function __toString(){
        return "Destino: ".$this->getDestino()."\nHora de Partida: ".$this->getHoraPartida()."\nHora de Llegada: ".$this->getHoraLlegada().
        "\nNumero: ".$this->getNumero()."\nMonto Base: ".$this->getMontoBase()."\nFecha: ".$this->getFecha()."\nCantidad de Asientos Disponible: ".$this->getCantAsientosDisponible().
        "\nCantidad de Asientos Total: ".$this->getCantAsientoTotal()."\nResponsable: ".$this->getResponsable();
    }

    /** 
     * el método calcularImporteViaje() que se calcula en base al monto base del viaje, la
     * cantidad de asientos disponibles y la cantidad total de asientos. El cálculo que se realiza es el siguiente:
     * importe = monto base + (monto base * asientosVendidos /asientos totales)
    */
    public function calcularImporteViaje(){
        $montoBase=$this->getMontoBase();
        $cantAsientosDisponible=$this->getCantAsientosDisponible();
        $cantAsientoTotal=$this->getCantAsientoTotal();
        $asientosVendidos=$cantAsientoTotal-$cantAsientosDisponible;
        $importe=$montoBase+($montoBase*($asientosVendidos/$cantAsientoTotal));
        $cantAsientoTotal-=$asientosVendidos;
        $this->setCantAsientoTotal($cantAsientoTotal);
        return $importe;
    }

}