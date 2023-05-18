<?php
/**Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método 
 * venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar 
 * los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la cantidad máxima 
de pasajeros y falso caso contrario
*/

class Viaje{
  private $codigoViaje;
  private $destino;
  private $cantidadMaximaPasajeros;
  private $pasajeros;
  private $objResponsableV;
  //nuevo atributo
  private $costo;

public function __construct ($codigoViaje,$destino,$maxPasajeros,$colObjPasajeros, $responsableV,$costo){
  $this ->codigoViaje =$codigoViaje;
  $this ->destino=$destino;
  $this ->cantidadMaximaPasajeros=$maxPasajeros;
  $this ->pasajeros=$colObjPasajeros;
  $this ->objResponsableV=$responsableV;
  $this ->costo=$costo;
}

public function getCodigoViaje(){
  return $this->codigoViaje;
}

public function setCodigoViaje($valor){
  $this->codigoViaje=$valor;
}
public function getDestino(){
  return $this->destino;
}

public function setDestino($lugar){
  $this->destino=$lugar;
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
public function getObjResponsableV(){
  return $this->objResponsableV;
}
public function setObjResponsableV($objResp){
  $this-> objResponsableV=$objResp;
}

public function getCosto(){
  return $this->costo;
}
public function setCosto($costo){
  $this-> costo=$costo;
}
/**
     * Permite saber si el dni ingresado es igual al de algun pasajero ya cargado y retorna un valor booleano.
     * Agrega el nuevo pasajero al array con un indice anterior.
     */
    public function modificarDatos($codPasajero,$dniAnterior, $nombreNuevo, $apellidoNuevo,$teleNuevo){
      $arregloPasajeros=$this->getArregloPasajeros();
      $i=0;
      $encontrado=false;

      while ($i< count($arregloPasajeros) && !$encontrado){
          $pasajero= $arregloPasajeros[$i];
          $encontrado= ($pasajero->getDocumento() == $dniAnterior);  
          $i++;  //return boolean
      } if ($encontrado){  //no asigno un nuevo numero de dni a un pasajero
          $newObjPasajero= new Pasajeros($nombreNuevo,$apellidoNuevo, $dniAnterior,$teleNuevo); //creo un nuevo obj pasajero
          $arregloPasajeros[$i-1]= $newObjPasajero; 
          $codPasajero= $this-> setArregloPasajeros($arregloPasajeros);
      }
      return $codPasajero;
    }
    /**
     * Modifico la informacion del responsable del viaje
     */
    public function ModificarDatosResponsable($nroEmpleado, $nroLicencia, $nombre, $apellido){
      $objResponsableV= $this-> getObjResponsableV();
      $objResponsableV= new ResponsableV ($nroEmpleado, $nroLicencia, $nombre, $apellido); //creo un nuevo obj responsable del viaje

      return $this->setObjResponsableV($objResponsableV);
    }
  
     /**
     * Muestra los datos de los pasajeros.
     */
    public function mostrarDatosPasajeros (){
        $datosPasajeros=$this->getArregloPasajeros();
        $pasajero="";
        for ($i=0;$i<count($datosPasajeros);$i++){
            $objPasajero=$datosPasajeros[$i];
            $numPasajero=$i;
            $pasajero= $pasajero ." ".$numPasajero."\n".
                      $objPasajero."\n";
        }
        return $pasajero;
    }


    /**implementar el método 
    * venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar 
    * los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
    */
    public function venderPasaje($objPasajero){
      $arregloPasajeros = $this->getArregloPasajeros();
      $costo= false;

      if($this->hayPasajesDisponible()){
        $i=count($arregloPasajeros);
        $arregloPasajeros[$i]= $objPasajero;
        $this->setArregloPasajeros($arregloPasajeros);
        $costo = $this-> getCosto();
      }
      return $costo;
    }
 

    /**
     * Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor a la 
     * cantidad máxima de pasajeros y falso caso contrario
     */
    public function hayPasajesDisponible(){
      $arregloPasajeros = $this-> getArregloPasajeros();
      $cantMaximaPasajeros = $this-> getCantidadMaximaPasajeros();
      $value=false;

      if (count($arregloPasajeros) < $cantMaximaPasajeros){
        $value=true;
      }
      return $value;
    }
    
    /**
     * Permite imprimir en pantalla los valores del viaje.
     */
    public function __toString(){
      //$cadenaPasajeros= $this->mostrarDatosPasajeros();
      $objResp=$this-> getObjResponsableV();
      $cadena =   "Código del viaje: ".$this->getCodigoViaje(). "\n".
                  "Destino: ".$this->getDestino()."\n".
                  "Cantidad máxima de pasajeros: " .$this->getCantidadMaximaPasajeros()."\n".
                  "Responsable del viaje:" .$objResp->getNombre(). " " . $objResp->getApellido()."\n".
                  "N° Empleado: ".$objResp->getNroEmpleado()."-"."N° Licencia: ".$objResp->getNroLicencia()."\n".
                  "Datos pasajeros: \n" . $this->mostrarDatosPasajeros();
      return $cadena;
  }    

    
  }

?>