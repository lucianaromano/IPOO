<?php

include_once("Venta.php");
/**Si la venta es on-line se debe almacenar: dirección de envío, DNI de quien recepciona la entrega y número 
 * de teléfono de contacto. Además hay que tener en cuenta para estas ventas, un costo de transporte que va a afectar 
 * al importe total de la venta, produciendo un incremento del un 15%. 
 */
class VentaOnline extends Venta{

    private $direccionEnvio;
    private $dniReceptor;
    private $telefono;
    private $transporte; //incremento al importe total venta del 15%.

    //metodo constructor
    public function __construct($numero, $fecha, $refCliente, $coleccionObjVehiculo, $precioFinal,$formaPago,$direccionEnvio,$dniReceptor,$telefono,$transporte){
        parent::__construct($numero, $fecha, $refCliente, $coleccionObjVehiculo, $precioFinal,$formaPago);
        $this->direccionEnvio=$direccionEnvio;
        $this->dniReceptor=$dniReceptor;
        $this->telefono=$telefono;
        $this->transporte=$transporte;
    }
    //metodos de acceso
    public function getDireccionEnvio(){
        return $this->direccionEnvio;
    }
    public function getDniReceptor(){
        return $this->dniReceptor;
    }
    public function getTelefono(){
        return $this->telefono;
    }
    public function getTransporte(){
        return $this->transporte;
    }

    public function setDireccionEnvio($direccionEnvio){
        $this->direccionEnvio=$direccionEnvio;
    }
    public function setDniReceptor($dniReceptor){
        $this->dniReceptor=$dniReceptor;
    }
    public function setTelefono($telefono){
        $this->telefono=$telefono;
    }
    public function setTransporte($transporte){
        $this->transporte=$transporte;
    }
    
    //otros metodos

    public function __toString(){
        $infoVentaOnline=parent::__toString();
        return "\n ---------------VENTA ONLINE---------------\n".$infoVentaOnline.
                "\nDireccion de envio: ".$this->getDireccionEnvio().
                "\nDni receptor del pedido: ".$this->getDniReceptor().
                "Telefono de contacto del receptor del pedido: ".$this->getTelefono().
                "\nCosto transporte: ".$this->getTransporte();
                "\nPrecio final (Incluido el costo de transporte): " .$this->nuevoPrecio();
    }

    
    public function nuevoPrecio(){
        $precioFinal=parent::getPrecioFinal();
        $precioFinal=$precioFinal+($precioFinal*0.15);
        return $precioFinal;
    }
}
?>