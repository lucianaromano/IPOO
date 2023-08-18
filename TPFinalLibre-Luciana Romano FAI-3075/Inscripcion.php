<?php
include_once 'BaseDatos.php';

class Inscripcion {
    private $id_inscripcion;
    private $fecha;
    private $costo_final;
	private $mensajeoperacion;
	private $obj_modulo;
	private $obj_ingresante;


    public function __construct(){
        $this-> id_inscripcion = "";
        $this-> fecha = "";
        $this-> costo_final = "";
		$this-> obj_modulo = null;
		$this-> obj_ingresante= null;
    }
	
    public function getIdInscripcion(){
        return $this->id_inscripcion;
    }
    
    public function setIdInscripcion($id_inscripcion){
        $this->id_inscripcion = $id_inscripcion;
    }
    public function getFecha(){
        return $this->fecha;
    }
    public function setFecha($fecha){
        $this->fecha = $fecha;
    }
    
    public function getCostoFinal(){
        return $this->costo_final;
    }
    public function setCostoFinal($costo_final){
        $this->costo_final = $costo_final;
    }
    public function getObjModulo(){
        return $this->obj_modulo;
    }
    public function setObjModulo($id_modulo){
        $this->obj_modulo = $id_modulo;
    }
    
    public function getObjIngresante(){
        return $this->obj_ingresante;
    }
    public function setObjIngresante($id_ingresante){
        $this->obj_ingresante = $id_ingresante;
    }
    public function getMensajeOperacion(){
		return $this->mensajeoperacion;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    //FUNCIONES DE LA CLASE INSCRIPCION
	public function cargar($id_inscripcion,$fecha,$costo_final,$id_modulo,$id_ingresante){		
		$this->setIdInscripcion($id_inscripcion);
		$this->setFecha($fecha);
		$this->setCostoFinal($costo_final);
		$this->setObjModulo($id_modulo);
		$this->setObjIngresante($id_ingresante);
    }

    /**
	 * Recupera los datos de una inscripcion por su id
	 * @param int $id
	 * @return boolean
	 */		
    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from inscripcion where id_inscripcion=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
				    $this->setIdInscripcion($id);
					$this->setFecha($row2['fecha']);
					$this->setCostoFinal($row2['costo_final']);
					$this->setObjModulo($row2['obj_modulo']);
					$this->setObjIngresante($row2['obj_ingresante']);
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
		$consultaInsertar="INSERT INTO inscripcion(id_inscripcion, fecha, costo_final,id_modulo,id_ingresante)
				VALUES ('".$this->getIdInscripcion()."','".$this->getFecha()."','".$this->getCostoFinal()."','".$this->getObjModulo()."','".$this->getObjIngresante()."')";
		
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
		$consultaModifica="UPDATE inscripcion SET fecha='".$this->getFecha()."',costo_final='".$this->getCostoFinal()."'WHERE Id=". $this->getIdInscripcion();

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
				$consultaBorra="DELETE FROM inscripcion WHERE id_inscripcion=".$this->getIdInscripcion();
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

					$id_inscripcion= $row2['id_inscripcion'];
                    $obj = new Inscripcion();
                    $obj->Buscar($id_inscripcion);
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
					 	"Costo final: " . $this->getCostoFinal()."\n".
						"Modulo: ".$this->getObjModulo().
						"Ingresante: ".$this->getObjIngresante();
		return $cadena;
	}
}

?>