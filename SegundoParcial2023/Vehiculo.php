<?php
/*
1. Se registra la siguiente información: código, costo, año fabricación, descripción, porcentaje
incremento anual, activo (atributo que va a contener un valor true, si el vehículo está disponible para la
venta y false en caso contrario).
2. Método constructor que recibe como parámetros los valores iniciales para los atributos definidos en la
clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método toString para que retorne la información de los atributos de la clase.
5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendido un
vehículo. Si el vehículo no se encuentra disponible para la venta retorna un valor < 0. Si el vehículo está
disponible para la venta, el método realiza el siguiente cálculo:*/
class Vehiculo{
    private $codigo;
    private $costo;
    private $anioFabricacion; 
    private $descripcion;
    private $porcentaje;
    private $activo;
    
    public function __construct($codigo,$costo,$anioFabricacion,$descripcion,$porcentaje,$activo){
        $this->codigo=$codigo;
        $this->costo=$costo;
        $this->anioFabricacion=$anioFabricacion;
        $this->descripcion=$descripcion;
        $this->porcentaje=$porcentaje;
        $this->activo=$activo;   
    }
    //metodos de acceso

    public function getCodigo(){
        return $this->codigo;
    }

    public function getCosto(){
        return $this->costo;
    }

    public function getAnioFabricacion(){
        return $this->anioFabricacion;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getPorcentaje(){
        return $this->porcentaje;
    }

    public function getActivo(){
        return $this->activo;
    }
    public function setCodigo($codigo){
        $this->codigo = $codigo;
    }

    public function setCosto($costo){
        $this->costo = $costo;
    }

    public function setAnioFabricacion($anioFabricacion){
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function setPorcentaje($porcentaje){
        $this->porcentaje = $porcentaje;
    }

    public function setActivo($activo){
        $this->activo = $activo;
    }

    //otros metodos
    public function __toString(){
        $retorno = "\nCodigo del vehiculo: " . $this->getCodigo() .
                    "\nCosto: " . $this->getCosto() . 
                    "\nAño de fabricación: " . $this->getAnioFabricacion() . 
                    "\nDescripcion: " . $this->getDescripcion();
                    if (!$this->getActivo()){
                        $retorno.=" \n No disponible para su venta.";
                    }
        return $retorno;
                    
    }
    /* 5. Implementar el método darPrecioVenta el cual calcula el valor por el cual puede ser vendido un
    vehículo. Si el vehículo no se encuentra disponible para la venta retorna un valor < 0. 
    Si el vehículo está
    disponible para la venta, el método realiza el siguiente cálculo:
    $_venta = $_compra + $_compra * (anio * por_inc_anual)
    donde $_compra: es el costo del vehículo.
    anio: cantidad de años transcurridos desde que se fabricó el vehículo.
    por_inc_anual: porcentaje incremento anual del vehículo*/
    public function darPrecioVenta(){
        $venta= -1;
        $activo= $this->getActivo();
        if ($activo){
            $compra=$this->getCosto();
            $anio= (2023 - ($this->getAnioFabricacion()));
            $por_inc_actual=$this->getPorcentaje();
            $venta = $compra + $compra * ($anio * $por_inc_actual);
        }
        return $venta;
    }

}
?>