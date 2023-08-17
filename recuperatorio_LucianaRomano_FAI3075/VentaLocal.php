<?php

include_once("Venta.php");
/**Si la venta es en el local se debe almacenar  un día y  horario para coordinar la entrega  del o los vehículo/s, ese 
 * día el sector de administración va a contar con toda la documentación lista para otorgar al cliente.
Sobre la implementación realizada para el segundo parcial: 
*/
class VentaLocal extends Venta{

    private $diaEntrega;
    private $horarioEntrega;
    
    //metodo constructor
    public function __construct($numero, $fecha, $refCliente, $coleccionObjVehiculo, $precioFinal,$formaPago,$diaEntrega,$horarioEntrega){
        parent::__construct($numero, $fecha, $refCliente, $coleccionObjVehiculo, $precioFinal,$formaPago);
        $this->diaEntrega=$diaEntrega;
        $this->horarioEntrega=$horarioEntrega;
    }
    //metodos de acceso
    public function getDiaEntrega(){
        return $this->diaEntrega;
    }
    public function getHorarioEntrega(){
        return $this->horarioEntrega;
    }
    public function setDiaEntrega($diaEntrega){
        $this->diaEntrega=$diaEntrega;
    }
    public function setHorarioEntrega($horarioEntrega){
        $this->horarioEntrega=$horarioEntrega;
    }
    //otros metodos

    public function __toString(){
        $infoVentaLocal=parent::__toString();
        return "\n ---------------VENTA PRESENCIAL---------------\n".$infoVentaLocal.
                "\n Dia entrega: ".$this->getDiaEntrega().
                "\n Horario entrega: ".$this->getHorarioEntrega();
    }

}
?>