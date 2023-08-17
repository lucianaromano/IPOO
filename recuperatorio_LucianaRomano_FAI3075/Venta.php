<?php
/**1. Se registra la siguiente información: número, fecha, referencia al cliente, referencia a una colección de
vehículos y el precio final.
2. Método constructor que recibe como parámetros cada uno de los valores a ser asignados a cada
atributo de la clase.
3. Los métodos de acceso de cada uno de los atributos de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método incorporarVehiculo($objVehiculo) que recibe por parámetro un objeto vehículo
y lo incorpora a la colección de vehículos de la venta, siempre y cuando sea posible la venta. El método
cada vez que incorpora un vehículo a la venta, debe actualizar la variable instancia precio final de la
venta. Utilizar el método que calcula el precio de venta de un vehículo donde crea necesario.*/
class Venta{
    //atributos de la clase
    private $numero;
    private $fecha;
    private $objCliente;
    private $coleccionObjVehiculo;
    private $precioFinal;
    //nuevo atributo
    private $formaPago;
    
    //metodo constructor
    public function __construct($numero, $fecha, $refCliente, $coleccionObjVehiculo, $precioFinal,$formaPago)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->objCliente = $refCliente;
        $this->coleccionObjVehiculo = $coleccionObjVehiculo;
        $this->precioFinal = $precioFinal;   
        $this->formaPago=$formaPago;
    }
    //metodos de acceso

    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getRefCliente(){
        return $this->objCliente;
    }

    public function getColeccionObjVehiculo(){
        return $this->coleccionObjVehiculo;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function getFormaPago(){
        return $this->formaPago;
    }
    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setRefCliente($refCliente){
        $this->objCliente = $refCliente;
    }

    public function setColeccionObjVehiculo($coleccionObjVehiculo){
        $this->coleccionObjVehiculo = $coleccionObjVehiculo;
    }

    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }
    public function setFormaPago($formaPago){
        $this->formaPago = $formaPago;
    }
    //otros metodos

    public function __toString(){
        $infoVenta = "Número: " . $this->getNumero().
                    "\nFecha: " . $this->getFecha() . 
                    "\nReferencia cliente: " . $this->getRefCliente() . 
                    "\nReferencia vehiculo: " . $this->getColeccionObjVehiculo() .
                    "\nPrecio final: " . $this->getPrecioFinal().
                    "\nForma de pago: ".$this->getFormaPago();
        for ($i=0;$i<count($this -> getColeccionObjVehiculo());$i++){
            $infoVenta = $infoVenta . "Informacion vehiculo: " . $i . $this-> getColeccionObjVehiculo()[$i] -> __toString();
        }
         return $infoVenta;  
    }

    /*5. Implementar el método incorporarVehiculo($objVehiculo) que recibe por parámetro un objeto vehículo
    y lo incorpora a la colección de vehículos de la venta, siempre y cuando sea posible la venta. El método
    cada vez que incorpora un vehículo a la venta, debe actualizar la variable instancia precio final de la
    venta. Utilizar el método que calcula el precio de venta de un vehículo donde crea necesario.*/
    public function incorporarVehiculo($objVehiculo){
        $vehiculos=$this->getColeccionObjVehiculo();
        if ($objVehiculo->getActiva()) {
            array_push($vehiculos, $objVehiculo);
            $this->setColeccionObjVehiculo($vehiculos);
            $this->setPrecioFinal($this->getPrecioFinal() + $objVehiculo->darPrecioVenta());
        } else {
            echo "No es posible la venta.";
        }   
    }

    /**1. Implementar el método retornarTotalVentaNacional() que retorna la sumatoria del precio venta de cada una de los
    vehiculos Nacionales vinculadas a la venta */
    public function retornarTotalVentaNacional(){
        $coleccionObjVehiculo= $this->coleccionObjVehiculo;
        $ventaNacionales=0;
        for ($i=0; $i< count($coleccionObjVehiculo); $i++){
            if ($coleccionObjVehiculo[$i]->getPaisOrigen()== 'Argentina'){
                $ventaNacionales += $coleccionObjVehiculo[$i]->darPrecioVenta();
            }
        }
        return $ventaNacionales;
    }
    
    /**
    *Implementar el método retornarVehículoImportado() que retorna una colección de vehículos importadas vinculadas
    *a la venta. Si la venta solo se corresponde con vehículos Nacionales la colección retornada debe ser vacía.
    *@return array $colVehImportados
    */
    public function retornarVehiculoImportado(){
    $colVehImportados=[];
    $vehiculos= $this->getColeccionObjVehiculo();
    for ($i=0; count($vehiculos); $i++){
        if ($vehiculos[$i]->getPaisOrigen() != 'Argentina'){
            array_push($colVehImportados,$vehiculos[$i]);
        }
    }
    return $colVehImportados;
    }

    /**Implementar la función registrarInformacionVenta($info) que recibe por parámetro un arreglo asociativo $info donde 
     * la claves coinciden con el nombre de los atributos necesarios en cada clase ($info[“formapago”] o $info[“direccion”]
     *  o $info[“diaemtrega”] son ejemplos de claves necesarios en el array $info). Redefinir el método según crea necesario,
     *  en cada clase de la jerarquía */
    public function registrarInformacionVenta($info){
        $formaPago= $info["formaPago"];
        $direccionEnvio= $info["direccion"];
        $dniReceptor=$info["dniReceptor"];
        $telefono=$info["telefono"];
        $transporte=$info["transporte"];
        $diaEntrega=$info["diaEntrega"];
        $horarioEntrega=$info["horarioEntrega"];
        $coleccionObjVehiculo=$this->getColeccionObjVehiculo();
        if ($direccionEnvio !=null ){ //Si tiene direccion,entonces la venta es online
            $venta = new VentaOnline($this->getNumero(),$this->getFecha(), $this->getRefCliente(), $coleccionObjVehiculo, $this->getPrecioFinal(),"Efectivo",$direccionEnvio,$dniReceptor,$telefono,$transporte);
        } else { //si no, es venta presencial
            $venta = new VentaLocal($this->getNumero(),$this->getFecha(), $this->getRefCliente(), $coleccionObjVehiculo, $this->getPrecioFinal(),"Efectivo",$diaEntrega,$horarioEntrega);
        }
        return $venta;
    }


    }
?>