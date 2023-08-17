<?php
include_once 'BaseDatos.php';

class Ingresante {
    private $mail;
    private $legajo;
    private $dni;
    private $nombre;
    private $apellido;
    private $mensajeoperacion;

    public function __construct(){
        $this-> mail = "";
        $this-> legajo = "";
        $this-> dni = "";
        $this-> nombre = "";
        $this-> apellido ="";
    }

    public function setMail($mail){
        $this->mail = $mail;
    }
    
    public function getMail(){
        return $this->mail;
    }
    public function setLegajo($legajo){
        $this->legajo = $legajo;
    }
    
    public function getLegajo(){
        return $this->legajo;
    }
    
    public function setDni($dni){
        $this->dni = $dni;
    }
    
    public function getDni(){
        return $this->dni;
    }
    
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    
    public function getNombre(){
        return $this->nombre;
    }
    
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    
    public function getApellido(){
        return $this->apellido;
    }

    public function getMensajeOperacion(){
		return $this->mensajeoperacion;
	}
	public function setMensajeOperacion($mensajeoperacion){
		$this->mensajeoperacion=$mensajeoperacion;
	}

    //FUNCIONES DE LA CLASE INGRESANTE

	public function cargar($mail,$legajo,$dni,$nombre,$apellido){		
		$this->setMail($mail);
		$this->setLegajo($legajo);
		$this->setDni($dni);
		$this->setNombre($nombre);
		$this->setApellido($apellido);
    }

    /**
	 * Recupera los datos de un ingresante por su dni
	 * @param int $mail
	 * @return boolean
	 */		
    public function Buscar($dni){
		$base = new BaseDatos();
		$consultaBusqueda = "SELECT * from mail where dni=".$dni;
		$resp = false;

		if($base->Iniciar()){
			if($base->Ejecutar($consultaBusqueda)){
				if($row2=$base->Registro()){		
					$this->setDni($row2['mail']);			
				    $this->setMail($dni);
					$this->setLegajo($row2['legajo']);
					$this->setNombre($row2['nombre']);
					$this->setApellido($row2['apellido']);
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
		$consultaInsertar="INSERT INTO ingresante(mail,legajo,dni,nombre,apellido)
				VALUES ('".$this->getMail()."','".$this->getLegajo()."','".$this->getDni()."','".$this->getNombre()."','".$this->getApellido()."')";
		
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

	/** Actualiza los datos de la tabla ingresante en la base de datos que coincida con su 
     * @param ()
     * @return boolean 
    */
    public function modificar(){
	    $resp = false; 
	    $base = new BaseDatos();
		$consultaModifica="UPDATE ingresante SET mail='".$this->getMail()."',legajo='".$this->getLegajo()."',nombre= '" .$this->getNombre(). 
		"',apellido= '".$this->getApellido(). "'WHERE dni=". $this->getDni();

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
	
	/** Elimina una instancia de la tabla ingresante 
     * @param ()
     * @return boolean
     */
	public function eliminar(){
		$base=new BaseDatos();
		$resp=false;
		if($base->Iniciar()){
				$consultaBorra="DELETE FROM ingresante WHERE mail=".$this->getMail();
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
     * Lista todos los ingresantes que cumplen con una condicion dada
     * @param String $condicion
     * @return Array $arregloIngresante
     */
    public function listar($condicion)
    {
        $arregloIngresante = [];
        $base = new BaseDatos();
        $consulta = "SELECT * FROM ingresante ";
        if ($condicion != "") {
            $consulta = $consulta . ' WHERE ' . $condicion;
        }
        $consulta .= " ORDER BY mail ";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($consulta)) {
                $arregloIngresante = array();
                while ($row2 = $base->Registro()) {

					$mail= $row2['mail'];
                    $obj = new Ingresante();
                    $obj->Buscar($mail);
                    array_push($arregloIngresante, $obj);
                }
            } else {
                $this->setmensajeoperacion($base->getError());
            }
        } else {
            $this->setmensajeoperacion($base->getError());
        }
        return $arregloIngresante;
    }
	

	
	//metodo toString de la clase ingresantes
	public function __toString(){
		$cadena ="\n INGRESANTES \n";
		$cadena .="Correo electronico: " . $this->getMail(). "\n".
					 	"Legajo: " . $this->getLegajo()."\n".
					 	"Documento: " . $this->getDni()."\n".
						"Nombre: ". $this->getNombre()."\n".
						"Apellido: ". $this->getApellido()."\n";
		return $cadena;
	}
	
}













?>