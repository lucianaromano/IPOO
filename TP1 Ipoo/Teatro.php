<?php
//EJERCICIO 15 -TP 1 "IPOO"
/**Un teatro se caracteriza por su nombre y su dirección y en él se realizan 4 funciones al día. Cada función tiene
un nombre y un precio. Realice el diseño de la clase Teatro e indique qué métodos tendría que tener la clase,
teniendo en cuenta que se pueda cambiar el nombre del teatro y la dirección, el nombre de un función y el
precio. Implementar las 4 funciones usando array de array asociativo. Cada función es un array asociativo con
las claves “nombre” y “precio”. */
class Teatro{
    private $nombre;
    private $direccion;
    private $funciones; //arrayASOCIATIVO

    //metodo constructor de la clase
    public function __construct($nombre,$direccion,$funciones){
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->funciones=$funciones;
    }

    //metodos de acceso
    public function getNombre(){
        return $this->nombre;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function getFunciones(){
        return $this->funciones;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function setdireccion($direccion){
        $this->direccion=$direccion;
    }
    public function setFunciones($funciones){
        $this->funciones=$funciones;
    }
    //otros metodos

    public function __toString(){
        return  "\n Nombre del teatro: ". $this->getNombre().
                "\n Direccion: ".$this->getDireccion().
                "\n************FUNCIONES************".
                " \n".$this->mostrarFunciones(); //crear funcion que muestre el array

    }

    public function mostrarFunciones(){
        $funciones= $this->getFunciones();
        $texto ="";
        for ($i=0; $i<4;$i++){
            $nroFuncion=$i+1; 
            $texto= $texto. "N°: ".$nroFuncion. 
                " \n Nombre: ". $funciones[$i]["Nombre"]. 
                " - Precio: $".$funciones[$i]["Precio"]."\n";
        }
        return $texto;
    }

    public function modificarNombre($nombreNuevo){
        $nuevoNombre=$this->setNombre($nombreNuevo);
        return $nuevoNombre;
    }
    public function modificarDireccion($direccionNueva){
        $nuevaDire=$this->setdireccion($direccionNueva);
        return $nuevaDire;
    }

    public function modificarFuncion($nroFuncion,$nuevoNombre,$nuevoPrecio){
        $funciones= $this->getFunciones();
        $bandera=false;
        if($nroFuncion>=0 && $nroFuncion<4){
            $unaFuncion = $funciones[$nroFuncion];
            $unaFuncion["nombre"]=$nuevoNombre;
	        $unaFuncion["precio"]=$nuevoPrecio;
	        $funciones[$nroFuncion] = $unaFuncion;
	        $bandera = true;
        }
        $this->setFunciones($unaFuncion);
        return $bandera;
    }
}

?>