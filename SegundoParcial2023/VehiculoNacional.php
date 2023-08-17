<?php

include_once("Vehiculo.php");

class VehiculoNacional extends Vehiculo{

    private $descuento; //por defecto es del 15%=0.15;

    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activo, $descuento){
        parent::__construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activo);
        $this->descuento=$descuento;
    }

    public function geDescuento(){
        return $this->descuento;
    }

    public function seDescuentogeDescuento($descuento){
        $this->descuento=$descuento;
    }

    /**
     * porcentaje de descuento en lo vehículos Nacionales que será aplicado al momento de la venta (por defecto el valor del descuento es del 15%).
     */
    public function darPrecioVenta(){
        $venta=parent::darPrecioVenta();
        $venta=$venta-($venta*0.15);
        return $venta;
    }
    public function __toString(){
        $infoVehiculoNacional=parent::__toString();
        return "\n ---------------VEHICULO NACIONAL---------------\n".$infoVehiculoNacional.
               "\nPorcentaje de descuento: ".$this->geDescuento();
    }


}
?>