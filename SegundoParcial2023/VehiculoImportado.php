<?php

include_once("Vehiculo.php");

class VehiculoImportado extends Vehiculo{

    private $paisOrigen;
    private $impuestos;

    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activo, $paisOrigen, $impuestos){
        parent::__construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activo);
        $this->paisOrigen=$paisOrigen;
        $this->impuestos=$impuestos;
    }

    public function getPaisOrigen(){
        return $this->paisOrigen;
    }

    public function setPaisOrigen($paisOrigen){
        $this->paisOrigen=$paisOrigen;
    }
    
    public function getImpuestos(){
        return $this->impuestos;
    }

    public function setImpuestos($impuestos){
        $this->impuestos=$impuestos;
    }

    /**
     * porcentaje de descuento en lo vehículos Nacionales que será aplicado al momento de la venta (por defecto el valor del descuento es del 15%).
     */
    public function darPrecioVenta(){
        $venta=parent::darPrecioVenta();
        $venta=$venta + ($this->getImpuestos());
        return $venta;
    }
    
    public function __toString(){
        $infoVehiculoImportado="\n ---------------VEHICULO IMPORTADO---------------\n".
        $infoVehiculoImportado= parent::__toString();
        $infoVehiculoImportado.="\nPais de origen del vehiculo: ".$this->getPaisOrigen().
                                "\nImpuestos de importacion: ".$this->getImpuestos();
        return $infoVehiculoImportado;
    }

}
?>