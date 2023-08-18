<?php
include_once 'BaseDatos.php';
class enLinea extends Modulo{
    private $link_reunion;
    private $bonificacion;   //por defecto 20%
    private $mensajeOperacion;

    public function __construct(){
        parent:: __construct();
        $this-> link_reunion = "";
        $this-> bonificacion="";
    }

    public function cargar($id_modulo,$descripcion,$tope,$costo,$hora_inicio,$hora_cierre,$fecha,$id_actividad,$link_reunion,$bonificacion){
        parent::cargar($id_modulo,$descripcion,$tope,$costo,$hora_inicio,$hora_cierre,$fecha,$id_actividad);
        $this->setlink_reunion($link_reunion);
        $this->setBonificacion($bonificacion);
    }

    public function getlink_reunion(){
        return $this->link_reunion;
    }
    public function setlink_reunion($link_reunion){
        $this->link_reunion = $link_reunion;
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

    public function Buscar($id){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from enLinea where id=".$id;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){
                    parent::Buscar($id);
				    $this->setLinkReunion($row2['link_reunion']);
                    $this->setBonificacion($row2['bonificacion']);
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
    
	public function insertar(){
		$base=new BaseDatos();
		$resp= false;

        if(parent::insertar()){
            $consultaInsertar="INSERT INTO enLinea(id,link_reunion, bonificacion)
             VALUES (".$this->getIdModulo().",'".$this->getLinkReunion().",'".$this->getBonificacion()."')";
		    if($base->Iniciar()){
			    if($base->Ejecutar($consultaInsertar)){
			    $resp= true;
			    } else {
					$this->setMensajeOperacion($base->getError());			
			}
		    } else {
				$this->setMensajeOperacion($base->getError());	
		    }
        }
		return $resp;
    }

    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();

        if(parent::modificar()){
            $consultaModifica="UPDATE enLinea SET link_reunion='".$this->getLinkReunion()."',bonificacion='".$this->getBonificacion()."'WHERE id_modulo =". $this->getid_modulo();    
	    	if($base->Iniciar()){
		    	if($base->Ejecutar($consultaModifica)){
			    $resp=  true;
			    }else{
				$this->setMensajeOperacion($base->getError());
		    	}
		    }else{
				$this->setMensajeOperacion($base->getError());
	    	}
        }
		return $resp;
	}	
	
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM enLinea WHERE id_modulo=".$this->getIdModulo();
				if($base->Ejecutar($consultaBorra)){
                    if (parent::eliminar()){
				    $resp=  true;
                    }
				}else{
						$this->setMensajeOperacion($base->getError());		
				}
		}else{
				$this->setMensajeOperacion($base->getError());
		}
		return $resp; 
	}

    public function listar($condicion){
        $arreglo = null;
        $base = new BaseDatos();
        $consulta = "SELECT * FROM enLinea ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY link_reunion ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arreglo=array();
                while ($row2=$base->Registro()) {
                    $obj=new enLinea();
                    $obj->Buscar($row2['id_modulo']);
                    array_push($arreglo, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arreglo;
    }

    public function __toString(){
        return parent::__toString() .
        "\n Link reunion: " . $this->getLinkReunion() .
        "\n Bonificación: " . $this->getBonificacion();
    }

    public function darCostoModulo(){
        $costo = parent::darCostoModulo();
        $costo += $costo * 0.20;
        return $costo;
    }

}
?>

