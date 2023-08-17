<?php
/**Implementar una clase Disquera con los atributos: hora_desde y hora_hasta (que indican el horario de
atención de la tienda), estado (abierta o cerrada), dirección y dueño. El atributo dueño debe referenciar a un
objeto de la clase Persona implementada en el punto 1. Defina en la clase los siguientes métodos:
a) Método constructor _ _construct () que recibe como parámetros los valores iniciales para los atributos
de la clase.
b) Los métodos de acceso de cada uno de los atributos de la clase.
c) dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
encontrarse abierta en ese horario y false en caso contrario.
d) abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura.
e) cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.
f) Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
g) Crear un script Test_Disquera que cree un objeto Disquera e invoque a cada uno de los métodos
implementados.
 */

class Disquera{
    private $horaDesde;
    private $horaHasta;
    private $estado;
    private $direccion;
    private $dueño; //ref obj persona

    //metodo constructor de la clase
    public function __construct($horaDesde,$horaHasta,$estado,$direccion,$objPersona){
        $this->horaDesde=$horaDesde;
        $this->horaHasta=$horaHasta;
        $this->estado=$estado;
        $this->direccion=$direccion;
        $this->dueño=$objPersona;
    }

    //metodos de acceso
    public function getHoraDesde(){
        return $this->horaDesde;
    }
    public function getHoraHasta(){
        return $this->horaHasta;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getDueño(){
        return $this->dueño;
    }
    public function setHoraDesde($horaDesde){
        $this->horaDesde=$horaDesde;
    }
    public function setHoraHasta($horaHasta){
        $this->horaHasta=$horaHasta;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setDueño($objPersona){
        $this->dueño=$objPersona;
    }
    
    //otros metodos

    /**dentroHorarioAtencion($hora,$minutos): que dada una hora y minutos retorna true si la tienda debe
    encontrarse abierta en ese horario y false en caso contrario.
     */
    public function dentroHorarioAtencion($hora,$minutos){
        $horaCierre= $this->getHoraHasta();
        $horaApertura=$this->getHoraDesde();
        $horario= $hora+$minutos;
        if ($horario>=$horaApertura && ($horario<=$horaCierre)){
            $respuesta = true;
        } else {
            $respuesta = false;
        }
        return $respuesta;
    }

    /**abrirDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra dentro del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su apertura. 
    public function abrirDisquera ($hora,$minutos){
        $horaCierre= $this->getHoraHasta();
        $horaApertura=$this->getHoraDesde();
        $horario= $hora+$minutos;
        $estado= "Abierto";
        if (($horario>=$horaApertura) && ($horario<$horaCierre)){
            $respuesta= $this->setEstado($estado);
        } else {
            $respuesta=$this->getEstado();
        }
        return $respuesta;
    }
    */
    public function abrirDisquera ($hora,$minutos){
        $estado= "Abierto";
        if( $this->dentroHorarioAtencion($hora,$minutos) == true ){
            $rta= $estado; 
            $this-> setEstado($estado); 
        }else{
            $rta = $this->getEstado();
        }
        return $rta;
    }
    

    /**cerrarDisquera($hora,$minutos): que dada una hora y minutos corrobora que se encuentra fuera del
    horario de atención y cambia el estado de la disquera solo si es un horario válido para su cierre.*/
    public function cerrarDisquera($hora,$minutos){
        $estado= "Cerrado";
        if( $this->dentroHorarioAtencion($hora,$minutos) == false ){
            $rta= $estado; 
            $this-> setEstado($estado); 
        }else{
            $rta = $this->getEstado();
        }
        return $rta;
        }


    public function __toString()
    {
    return  "\n Horario de apertura: ".$this->getHoraDesde().
            "\n Horario de cierre: ". $this->getHoraHasta().
            "\n Estado: " .$this->getEstado().
            "\n Direccion: ".$this->getDireccion().
            "\n Dueño Disquera: ". $this->getDueño();
    }
}
?>