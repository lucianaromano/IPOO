<?php
/*
1. Se registra la siguiente información: denominación, dirección, la colección de objClientes, colección de
vehículos y la colección de ventas realizadas.
2. Método constructor que recibe como parámetros los valores iniciales para los atributos de la clase.
3. Los métodos de acceso para cada una de las variables instancias de la clase.
4. Redefinir el método _toString para que retorne la información de los atributos de la clase.
5. Implementar el método retornarVeículo($codigoVehículo) que recorre la colección de vehículos de la
Empresa y retorna la referencia al objeto vehículo cuyo código coincide con el recibido por parámetro.
6. Implementar el método registrarVenta($codigosVehiculos, $objobjCliente) método que recibe por
parámetro una colección de códigos de vehículos, la cual es recorrida, se busca el objeto vehículo
correspondiente al código y se incorpora a la colección de vehículos de la instancia Venta que debe ser
creada. Recordar que no todos los objClientes ni todos los vehículos, están disponibles para registrar una
venta en un momento determinado.
El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
venta.
7. Implementar el método retornarVentasXobjCliente($tipoDoc,$nroDoc) que recibe por parámetro el tipoDoc$tipoDoc y
número de documento de un objCliente y retorna una colección con las ventas realizadas al objCliente. */
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
        $colVehiculos=$this->getColVehiculos();
        $colClientes=$this->getColClientes();
        $colVentas=$this->getColVentas();
        $infoConcesionaria = "Denominacion: " . $this->getDenominacion() .
                            "\nDireccion: " . $this->getDireccion();
                            
        for ($i=0;$i<count($colClientes);$i++){
            $infoConcesionaria = $infoConcesionaria . "\n\n Informacion cliente: " . ($i+1) . $colClientes[$i] ."\n";
        }
        for ($i=0;$i<count($colVehiculos);$i++){
            $infoConcesionaria = $infoConcesionaria . "\n\n Vehiculo n°: " . ($i+1) . $colVehiculos[$i]  ."\n";
        }
        for ($i=0;$i<count($colVentas);$i++){
            $infoConcesionaria = $infoConcesionaria . "\n\n Ventas: " . ($i+1) . $colVentas[$i]  ."\n";
        }
        return $infoConcesionaria;
        }
    
    /**
     * 5. Implementar el método retornarVehiculo($codigoVehículo) que recorre la colección de vehículos de la
     *Empresa y retorna la referencia al objeto vehículo cuyo código coincide con el recibido por parámetro.
     */
    public function retornarVehiculo($codigoVehiculo){
        $vehiculo = null; 
        $colVehiculos=$this->getColVehiculos();
        foreach($colVehiculos as $objVehiculo){
            if ($objVehiculo->getCodigo() == $codigoVehiculo){
                $vehiculo = $objVehiculo->getCodigo();
            }
        }
        return $vehiculo;
    }



    /*6. Implementar el método registrarVenta($codigosVehiculos, $objCliente) método que recibe por
    parámetro una colección de códigos de vehículos, la cual es recorrida, se busca el objeto vehículo
    correspondiente al código y se incorpora a la colección de vehículos de la instancia Venta que debe ser
    creada. Recordar que no todos los objClientes ni todos los vehículos, están disponibles para registrar una
    venta en un momento determinado.
    El método debe setear los variables instancias de venta que corresponda y retornar el importe final de la
    venta. */
    public function registrarVenta($colCodigosVehiculos, $cliente)
    {
        $cantCodigos = count($colCodigosVehiculos);
        $precioVenta = 0; //Inicializamos el precioVenta = 0

        if (!$cliente->getBaja()) { //Si el objCliente no esta dado de baja...
            $arregloVehiculos = []; //Inicializamos el arregloVehiculos = []

            for ($i = 0; $i < $cantCodigos; $i++) { //Recorriendo el arreglo de codigos iterando con $i...
                $vehiculoEncontrado = $this->retornarVehiculo($colCodigosVehiculos[$i]); //Se llama a retornarVehiculo($codigo) con cada codigo

                if (($vehiculoEncontrado != null) && ($vehiculoEncontrado->getActivo())) { //Si el retorno no es null (existe el vehiculo con ese codigo) y el vehiculo esta a la venta...

                    array_push($arregloVehiculos, $vehiculoEncontrado); //Se agrega el vehiculo al arreglo de la venta
                    $precioVenta += $vehiculoEncontrado->darPrecioVenta(); //Se actualiza el precio total de la venta
                    $vehiculoEncontrado = null; //$vehiculoEncontrado vuelve a ser null para así buscar el proximo vehiculo
                }
            }

            $numeroVenta = count($this->getColVentas()) + 1;
            $venta = new Venta($numeroVenta, '01/01/1999', $cliente, $arregloVehiculos, $precioVenta);
            $colVentas = $this->getColVentas();
            array_push($colVentas, $venta);
            $this->setColVentas($colVentas); //Agregamos la venta al arreglo de ventas
            $retorno = $venta->getPrecioFinal();
        }

        if ($precioVenta == 0) {
            $retorno = "El vehiculo elegido no esta disponible. ";
        }
        return $retorno;
    }
    /**
     * 7. Implementar el método retornarVentasXCliente($tipoDoc,$nroDoc) que recibe por parámetro el tipoDoc y
     * número de documento de un cliente y retorna una colección con las ventas realizadas al cliente. 
     *@param string $tipoDoc
     *@param int $nroDoc
     *@return array 
     */ 
      public function retornarVentasXCliente($tipoDoc,$nroDoc){
        $arrayVentas= $this->getColVentas();
        $ventasDisp=[];
    
        for($i=0;$i<count($arrayVentas) ;$i++){
            
            $venta=$arrayVentas[$i];
            
            $tipoDoc = $venta->getTipoDoc();

            if ( ($tipoDoc == $tipoDoc) && ($nroDoc == $nroDoc)){
               $ventasDisp = [$venta];
            }
              
        }
        return $ventasDisp;
        
    }  

    /** 1. Implementar el método informarSumaVentasNacionales() que recorre la colección de ventas realizadas por la empresa 
     * y retorna el importe total de ventas Nacionales realizadas por la empresa */
    
     public function informarSumaVentasNacionales(){
        $colVentas= $this->getColVentas();
        $totalNac=0;
        for ($i=0; $i<count($colVentas); $i++){
            $totalNac += $colVentas[$i]-> retornarTotalVentaNacional();
        }
        return $totalNac;
        }

     /**Implementar el método informarVentasImportadas() que recorre la colección de ventas realizadas por la empresa y
    retorna una colección de ventas de vehículos importados. Si en la venta al menos uno de los vehículos es importado
    la venta debe ser informada. */
    public function informarVentasImportadas(){
        $colVentas= $this->getColVentas();
        $totalImp=[];
        for ($i=0; $i<count($colVentas); $i++){
            $cantVentas= count($colVentas[$i]->retornarVehiculoImportado());
            if ($cantVentas>=1){
                array_push($totalImp, $colVentas[$i]);
            }
        }
        return $totalImp;
        }
}

?>