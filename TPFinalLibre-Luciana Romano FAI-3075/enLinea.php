<?php

class enLinea extends Modulo{
    private $linkReunion;
    private $bonificacion;   //por defecto 20%
    private $mensajeOperacion;

    public function __construct(){
        parent:: __construct();
        $this-> linkReunion = "";
        $this-> bonificacion="";
    }

    public function cargar($idModulo,$descripcion,$tope,$costo,$horaInicio,$horaCierre,$fecha, $linkReunion, $bonificacion){
        parent::cargar($idModulo,$descripcion,$tope,$costo,$horaInicio,$horaCierre,$fecha);
        $this->setLinkReunion($linkReunion);
        $this->setBonificacion($bonificacion);
    }

    public function getLinkReunion(){
        return $this->linkReunion;
    }
    public function setLinkReunion($linkReunion){
        $this->linkReunion = $linkReunion;
    }

    public function getBonificacion(){
        return $this->bonificacion;
    }
    public function setBonificacion($bonificacion){
        $this->bonificacion = $bonificacion;
    }
    public function getMensajeOperacion(){
        return $this->mensajeOperacion;
    }
    public function setMensajeOperacion($mensajeOperacion){
        $this->mensajeOperacion = $mensajeOperacion;
    }


    public function __toString(){
        return parent::__toString() .
        "\nLink reunión: " . $this->getLinkReunion() .
        "\nBonificación: " . $this->getBonificacion();
    }

    /**
     * @param
     * @return float $costo
     */
    public function darCostoModulo(){
        $costo = parent::darCostoModulo();
        $costo += $costo * 0.20;
        return $costo;
    }
    /**********************************************************************************************************************************************************************/

    /**
	 * Recupera los datos de un modulo por su id
	 * @param int $id
	 * @return boolean
	 */		
    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from modulo where idModulo=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
				    $this->setIdModulo($id);
					$this->setDescripcion($row2['descripcion']);
					$this->setTope($row2['tope']);
					$this->setCosto($row2['costo']);
					$this->setHoraInicio($row2['horaInicio']);
					$this->setHoraCierre($row2['horaCierre']);
					$this->setFecha($row2['fecha']);
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
		$consultaInsertar="INSERT INTO modulo(idModulo,descripcion,tope,costo,horaInicio,horaCierre,fecha)
				VALUES ('".$this->getIdModulo()."','".$this->getDescripcion()."','".$this->getTope()."','".$this->getCosto()."','".$this->getHoraInicio()."','".$this->getHoraCierre()."','".$this->getFecha()."')";
		
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

	/** Actualiza los datos de la tabla modulo en la base de datos que coincida con su  id
     * @param ()
     * @return boolean 
    */
    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		$consultaModifica="UPDATE modulo SET descripcion='".$this->getDescripcion()."',tope='".$this->getTope()."',costo= '" .$this->getCosto(). 
		"',horaInicio= '".$this->getHoraInicio()."',horaCierre= '".$this->getHoraCierre(). "',fecha= '".$this->getFecha(). "'WHERE Id=". $this->getIdModulo();

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
	
	/** Elimina una instancia de la tabla modulos 
     * @param ()
     * @return boolean
     */
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM modulo WHERE idModulo=".$this->getIdModulo();
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
     * Lista todos los modulos que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloModulo
     */
    public function listar($condicion)
    {
        $arregloModulo = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM modulo ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY id ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloModulo = array();
                while ($row2 = $base->Registro()) {

					$idModulo= $row2['idModulo'];
                    $obj = new Modulo();
                    $obj->Buscar($idModulo);
                    array_push($arregloModulo, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloModulo;
    }
}

?>

