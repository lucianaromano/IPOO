<?php
/**La clase Pasajeros con necesidades especiales se refiere a pasajeros que pueden requerir servicios especiales como sillas de ruedas,
asistencia para el embarque o desembarque,o comidas especiales para personas con alergias o restricciones alimentarias.  
Implementar el método darPorcentajeIncremento() que retorne 
el porcentaje que debe aplicarse como incremento según las características del pasajero. Para un pasajero VIP se incrementa el importe un 35% 
si la cantidad de millas acumuladas supera a las 300 millas se realiza un incremento del 30%. Si el pasajero tiene necesidades especiales y 
requiere silla de ruedas, asistencia y comida especial entonces el pasaje tiene un incremento del 30%; si solo requiere uno de los servicios
prestados entonces el incremento es del 15%. Por último, para los pasajeros comunes el porcentaje de incremento es del 10 %.
Modificar la clase viaje para almacenar el costo del viaje, la suma de los costos abonados por los pasajeros e implementar el método 
venderPasaje($objPasajero) que debe incorporar el pasajero a la colección de pasajeros ( solo si hay espacio disponible), actualizar 
los costos abonados y retornar el costo final que deberá ser abonado por el pasajero.
Implemente la función hayPasajesDisponible() que retorna verdadero si la cantidad de pasajeros del viaje es menor 
a la cantidad máxima de pasajeros y falso caso contrario
*/

include 'Pasajeros.php';

class PasajerosNecesidades extends Pasajeros {
    private $sillaDeRuedas;
    private $asistencia;
    private $comidaEspecial;

    public function __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket, $sillaDeRuedas, $asistencia, $comidaEspecial){
        parent:: __construct($nombre,$apellido,$numeroDni,$tele, $numAsiento, $numTicket);
        $this->sillaDeRuedas=$sillaDeRuedas;
        $this->asistencia=$asistencia;
        $this->comidaEspecial=$comidaEspecial;
    }

    //metodos de acceso
    public function getSillaDeRuedas(){
        return $this->sillaDeRuedas;
    }
    public function setSillaDeRuedas($sillaDeRuedas){
        $this->sillaDeRuedas=$sillaDeRuedas;
    }
    public function getAsistencia(){
        return $this->asistencia;
    }
    public function setAsistencia($asistencia){
        $this->asistencia=$asistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial=$comidaEspecial;
    }
    
    /**
     * Retorna el porcentaje que debe aplicarse como incremento segun las caracteristicas del pasajero.
     */
    public function darPorcentajeIncremento(){
        if ($this->getSillaDeRuedas()== "Si" && $this->getAsistencia()=="Si" && $this->getComidaEspecial()=="Si"){
            $porcentaje=(30/100);
        } elseif ($this->getSillaDeRuedas()== "Si" || $this->getAsistencia()=="Si" || $this->getComidaEspecial()=="Si"){
            $porcentaje= (15/100);
        }
        return $porcentaje;
    }

    //metodo toString de la clase PasajerosNecesidades
    public function __toString(){
        $cadena = parent:: __toString();
        $cadena.="\n Silla de ruedas: ".$this->getSillaDeRuedas().
        $cadena.="\n Asistencia de embarque/desembarque: ".$this->getAsistencia().
        $cadena.="\n Comida especial: ".$this->getComidaEspecial();
        return $cadena;
    }
    

}
?>

