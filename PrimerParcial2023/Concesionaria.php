<?
/*
1. Se registra la siguiente información: denominación, dirección, la colección de clientes, colección de
vehículos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarVeículo($codigoVehículo) que recorre la colección de vehículos de la
Empresa y retorna la referencia al objeto vehículo cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($colCodigosVehiculos, $objCliente) método que recibe por
parámetro una colección de códigos de vehículos, la cual es recorrida, se busca el objeto vehículo
correspondiente al código y se incorpora a la colección de vehículos de la instancia Venta que debe ser
creada. Recordar que no todos los clientes ni todos los vehículos, están disponibles para registrar una
venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */
class Concesionaria
{
    //atributos de la clase
    private $denominacion;
    private $direccion;
    private $colClientes; 
    private $colVehiculos;
    private $colVentas;

    //metodo constructor
    public function __construct($denominacion, $direccion, $colClientes, $colVehiculos, $colVentas)
    {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->colClientes = $colClientes;
        $this->colVehiculos = $colVehiculos;
        $this->colVentas = $colVentas;   
    }
    //metodos de acceso

    public function getDenominacion(){
        return $this->denominacion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function getColClientes(){
        return $this->colClientes;
    }

    public function getColVehiculos(){
        return $this->colVehiculos;
    }

    public function getColVentas(){
        return $this->colVentas;
    }

    public function setDenominacion($denominacion){
        $this->denominacion = $denominacion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function setColClientes($colClientes){
        $this->colClientes = $colClientes;
    }

    public function setColVehiculos($colVehiculos){
        $this->colVehiculos = $colVehiculos;
    }

    public function setColVentas($colVentas){
        $this->colVentas = $colVentas;
    }

    //otros metodos
    public function __toString(){
        return "Denominacion: " . $this->getDenominacion() .
               "\nDireccion: " . $this->getDireccion() .
               "\nClientes: " . $this->mostrarClientes().
               "\nVehiculos: " . $this->getColVehiculos().
               "\nVentas: " . $this->getColVentas(). "\n";
    }
    
    private function mostrarClientes()
    {
        $coleccion = $this->getColClientes();
        $texto = "No se han cargado clientes.\n";
        $cantidad = count($coleccion);
        for ($i = 0; $i < $cantidad; $i++) {
                $texto = $texto . $coleccion[$i];
            }
        return $texto;
    }
    /*5. Implementar el método retornarVehiculo($codigoVehículo) que recorre la colección de vehículos de la
    Empresa y retorna la referencia al objeto vehículo cuyo código coincide con el recibido por parámetro.*/
    public function retornarVehiculo($codigoVehículo){
        $cant= count($this->getColVehiculos()); 
        for ($i=0;$i<$cant;$i++){

            $refVehiculo= $codigoVehículo; 
        }
        return $refVehiculo;
    }
    /*6. Implementar el método registrarVenta($colCodigosVehiculos, $objCliente) método que recibe por
    parámetro una colección de códigos de vehículos, la cual es recorrida, se busca el objeto vehículo
    correspondiente al código y se incorpora a la colección de vehículos de la instancia Venta que debe ser
    creada. Recordar que no todos los clientes ni todos los vehículos, están disponibles para registrar una
    venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. */
    public function registrarVenta($colCodigosVehiculos, $objCliente){

    }
    /*7. Implementar el método retornarVentasXCliente($tipo,$numDoc) que recibe por parámetro el tipo y
    número de documento de un Cliente y retorna una colección con las ventas realizadas al cliente. */ 
    public function retornarVentasXCliente($tipo,$numDoc){
       //$coleccionVentas= getColVentas();
       //$coleccionCliente= getColClientes();
    }
}

?>