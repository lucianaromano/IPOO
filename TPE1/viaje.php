
<?php
/**La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes. De cada viaje se precisa 
 * almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los 
datos de los pasajeros). Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo 
con las claves “nombre”, “apellido” y “numero de documento”. */

class viaje{
    private $codigoViaje;
    private $destino;
    private $cantidadMaximaPasajeros;
    private $pasajeros; //arreglo con informacion de los pasajeros
    
//$pasajeros = [$pasajero1, $pasajero2, $pasajero3];
//$pasajero1 = ["nombre"=> "", "apellido"=>"", "documento"=>""];
//metodo constructor de la clase
    public function __construct($codigoViaje,$destino,$cantidadMaximaPasajeros,$pasajeros){
        $this->codigoViaje=$codigoViaje;
        $this->destino=$destino;
        $this->cantidadMaximaPasajeros=$cantidadMaximaPasajeros;
        $this->pasajeros=$pasajeros;
    }

    public function getCodigo(){
        return $this->codigoViaje;
    }
    public function setCodigo($valor){
        $this->codigoViaje = $valor;
    }
    
    public function getDestino(){
        return $this->destino;
    }

    public function setDestino($lugar){
        $this->destino = $lugar;
    }

    public function getCantidadMaximaPasajeros(){
        return $this->cantidadMaximaPasajeros;
    }
 
    public function setCantidadMaximaPasajeros($valor){
        $this->cantidadMaximaPasajeros = $valor;
    }
 
    public function getArregloPasajeros(){
        return $this->pasajeros;
    }

    public function setArregloPasajeros($arregloPasajeros){
        $this-> pasajeros=$arregloPasajeros;
    }

    /**
     * Permite saber si el dni ingresado es igual al de algun pasajero ya cargado y retorna un valor booleano.
     * Agrega el nuevo pasajero al array con un indice anterior.
     */
    public function modificarDatos($codPasajero,$dniAnterior, $nombreNuevo, $apellidoNuevo,$dniNuevo){
        $arregloPasajeros=$this->getArregloPasajeros();
        $i=0;
        $encontrado=false;

        while ($i< count($arregloPasajeros) && !$encontrado){
            $pasajero= $arregloPasajeros[$i];
            $encontrado= ($pasajero["documento"] == $dniAnterior);  
            $i++;  //return boolean
        } if ($encontrado){
            $newPasajero=["nombre"=>$nombreNuevo, "apellido"=>$apellidoNuevo, "documento"=>$dniNuevo];
            $arregloPasajeros[$i-1]= $newPasajero; 
            $codPasajero= $this-> setArregloPasajeros($arregloPasajeros);
        }
        return $codPasajero;
    }

    /**
     * Muestra los datos de los pasajeros.
     */
    public function mostrarDatosPasajeros (){
        $datosPasajeros=$this->getArregloPasajeros();
        $pasajero="";
        for ($i=0;$i<count($datosPasajeros);$i++){
            $numPasajero= $i + 1;
            $pasajero= $pasajero ." ".$numPasajero."\n".
                       "Nombre: ".$datosPasajeros[$i]["nombre"]."\n".
                       "Apellido: ".$datosPasajeros[$i]["apellido"]."\n".
                       "Documento: ".$datosPasajeros[$i]["documento"]."\n";
        }
        return $pasajero;
    }

    /**
     * Permite imprimir en pantalla los valores del viaje.
     */
    public function __toString(){
        $cadenaPasajeros= $this->mostrarDatosPasajeros();
        $cadena =   "Código del viaje: ".$this->getCodigo(). "\n".
                    "Destino: ".$this->getDestino()."\n".
                    "Cantidad máxima de pasajeros: " .$this->getCantidadMaximaPasajeros()."\n".
                    "Datos pasajeros: \n" .$cadenaPasajeros;
        return $cadena;
    }
}
?>