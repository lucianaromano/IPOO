<?php
include_once 'BaseDatos.php';

class Inscripcion {
    private $idInscripcion;
    private $fecha;
    private $costoFinal;
	private $mensajeoperacion;


    public function __construct(){
        $this-> idInscripcion = "";
        $this-> fecha = "";
        $this-> costoFinal = "";
    }
	
    public function getIdInscripcion(){
        return $this->idInscripcion;
    }
    
    public function setIdInscripcion($idInscripcion){
        $this->idInscripcion = $idInscripcion;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getCostoFinal(){
        return $this->costoFinal;
    }
    public function setCostoFinal($costoFinal){
        $this->costoFinal = $costoFinal;
    }
    
    public function getMensajeOperacion(){
		return $this->mensajeoperacion;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    //FUNCIONES DE LA CLASE INSCRIPCION
	public function cargar($idInscripcion,$fecha,$costoFinal){		
		$this->setIdInscripcion($idInscripcion);
		$this->setFecha($fecha);
		$this->setCostoFinal($costoFinal);
    }

    /**
	 * Recupera los datos de una inscripcion por su id
	 * @param int $id
	 * @return boolean
	 */		
    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from inscripcion where idInscripcion=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
				    $this->setIdInscripcion($id);
					$this->setFecha($row2['fecha']);
					$this->setCostoFinal($row2['costoFinal']);

					$resp= true;
				}				
		 	}	else {
		 			$this->setMensajeOperacion($base->getError());
			}
		 }	else {
		 		$this->setMensajeOperacion($base->getError());
		 }		
		 return $resp;
	}	
    
	/** Coloca la clase en una tabla de la base de datos
     * @param ()
     * @return boolean 
    */
	public function insertar(){
		$base=new BaseDatos();
		$resp= false;
		$consultaInsertar="INSERT INTO inscripcion(idInscripcion, fecha, costoFinal)
				VALUES ('".$this->getIdInscripcion()."','".$this->getFecha()."','".$this->getCostoFinal()."')";
		
		if($base->Iniciar()){
			if($base->Ejecutar($consultaInsertar)){
			    $resp=  true;
			}	else {
					$this->setMensajeOperacion($base->getError());			
			}
		} else {
				$this->setMensajeOperacion($base->getError());	
		}
		return $resp;
	}

	/** Actualiza los datos de la tabla inscripcion en la base de datos que coincida con su  id
     * @param ()
     * @return boolean 
    */
    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		$consultaModifica="UPDATE inscripcion SET fecha='".$this->getFecha()."',costoFinal='".$this->getCostoFinal()."'WHERE Id=". $this->getIdInscripcion();

		if($base->Iniciar()){
			if($base->Ejecutar($consultaModifica)){
			    $resp=  true;
			}else{
				$this->setMensajeOperacion($base->getError());
			}
		}else{
				$this->setMensajeOperacion($base->getError());
		}
		return $resp;
	}	
	
	/** Elimina una instancia de la tabla inscripciones 
     * @param ()
     * @return boolean
     */
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM inscripcion WHERE idInscripcion=".$this->getIdInscripcion();
				if($base->Ejecutar($consultaBorra)){
				    $resp=  true;
				}else{
						$this->setMensajeOperacion($base->getError());		
				}
		}else{
				$this->setMensajeOperacion($base->getError());
		}
		return $resp; 
	}

	/**
     * Lista todas las inscripciones que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloInscripcion
     */
    public function listar($condicion)
    {
        $arregloInscripcion = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM inscripcion ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY id ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloInscripcion = array();
                while ($row2 = $base->Registro()) {

					$idInscripcion= $row2['idInscripcion'];
                    $obj = new Inscripcion();
                    $obj->Buscar($idInscripcion);
                    array_push($arregloInscripcion, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloInscripcion;
    }
	
	//metodo toString de la clase inscripcion
	public function __toString(){
		$cadena ="\n INSCRIPCIONES \n";
		$cadena .=      "ID: " . $this->getIdInscripcion(). "\n".
					 	"Fecha: " . $this->getFecha()."\n".
					 	"Costo final: " . $this->getCostoFinal()."\n";
		return $cadena;
	}
}

?>