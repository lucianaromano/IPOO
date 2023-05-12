<?
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
class Venta
{
    //atributos de la clase
    private $numero;
    private $fecha;
    private $refCliente;
    private $refColeccion;
    private $precioFinal;
    
    //metodo constructor
    public function __construct($numero, $fecha, $refCliente, $refColeccion, $precioFinal)
    {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->refCliente = $refCliente;
        $this->refColeccion = $refColeccion;
        $this->precioFinal = $precioFinal;   
    }
    //metodos de acceso

    public function getNumero(){
        return $this->numero;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getRefCliente(){
        return $this->refCliente;
    }

    public function getRefColeccion(){
        return $this->refColeccion;
    }

    public function getPrecioFinal(){
        return $this->precioFinal;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setFecha($fecha){
        $this->fecha = $fecha;
    }

    public function setRefCliente($refCliente){
        $this->refCliente = $refCliente;
    }

    public function setRefColeccion($refColeccion){
        $this->refColeccion = $refColeccion;
    }

    public function setPrecioFinal($precioFinal){
        $this->precioFinal = $precioFinal;
    }

    //otros metodos

    public function __toString(){
        return "Número: " . $this->getNumero() .
        "\nFecha: " . $this->getFecha() . 
        "\nReferencia cliente: " . $this->getRefCliente() . 
        "\nReferencia vehiculo: " . $this->getRefColeccion() .
        "\nPrecio final: " . $this->getPrecioFinal();
    }

    /*5. Implementar el método incorporarVehiculo($objVehiculo) que recibe por parámetro un objeto vehículo
    y lo incorpora a la colección de vehículos de la venta, siempre y cuando sea posible la venta. El método
    cada vez que incorpora un vehículo a la venta, debe actualizar la variable instancia precio final de la
    venta. Utilizar el método que calcula el precio de venta de un vehículo donde crea necesario.*/
    public function incorporarVehiculo($objVehiculo){
        $coleccionVehiculos=$this->getColVehiculos();


        if ($this->getActivo()== "SI"){
             
    }
    
    
    
    public function incorporarVehiculo($objVehiculo){
    $coleccionVehiculos = $this->getColVehiculos();
    $encontro = false;
    $exito = false;
    $i =0;
    while ($i<count($coleccionVehiculos) && !$encontro){
        $unViaje = $coleccionVehiculos[$i];
        if ($unViaje->getDestino() == $objVehiculo->getDestino()){
            //siempre y cuando sea posible la venta
                $encontro =true;
        }
        $i++;
    }        
    if (!$encontro){
        $coleccionVehiculos[]=$objVehiculo;
        $this->setColVehiculos($coleccionVehiculos);
        $exito = true;
    }
   return $exito;
    
    }
}
?>