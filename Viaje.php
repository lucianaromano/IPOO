<?php
/**Modificar la clase Viaje para que ahora los pasajeros sean un objeto que tenga los atributos nombre, apellido, numero de documento y teléfono. 
El viaje ahora contiene una referencia a una colección de objetos de la clase Pasajero. También se desea guardar la información de la persona 
responsable de realizar el viaje, para ello cree una clase ResponsableV que registre el número de empleado, número de licencia, nombre y 
apellido. La clase Viaje debe hacer referencia al responsable de realizar el viaje.

Volver a implementar las operaciones que permiten modificar el nombre, apellido y teléfono de un pasajero. Luego implementar la operación
 que agrega los pasajeros al viaje, solicitando por consola la información de los mismos. Se debe verificar que el pasajero no este cargado
  mas de una vez en el viaje. De la misma forma cargue la información del responsable del viaje.
*/

class Viaje{
  private $codivoViaje;
  private $destino;
  private $cantidadMaximaPasajeros;
  private $pasajeros;
  private $objResponsableV;


public function __construct ($codigoViaje,$destino,$maxPasajeros,$colObjPasajeros, $responsableV){
  $this ->codigoViaje =$codigoViaje;
  $this ->destino=$destino;
  $this ->cantidadMaximaPasajeros=$maxPasajeros;
  $this ->pasajeros=$colObjPasajeros;
  $this ->objResponsableV=$responsableV;
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
}

?>