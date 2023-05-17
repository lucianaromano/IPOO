<?php

/**
 * 3. Defina una clase Banco con las siguiente variables instancias:
*1. coleccionCuentaCorriente: variable que contiene una colección de instancias de la clase
*Cuentas Corrientes.
*2. coleccionCajaAhorro: variable que contiene una colección de instancias de la clase Caja de Ahorro .
*3. ultimoValorCuentaAsignado: variable que contiene el ultimo valor asignado a una cuenta del banco.
*4. coleccionCliente: variable que contiene una colección de instancias de la clase Cliente
*4. En la clase Banco defina e implemente los siguientes métodos:
*1. incorporarCliente(objCliente): permite agregar un nuevo cliente al Banco
*2. incorporarCuentaCorriente(numeroCliente, montoDescubierto): Agregar una nueva
*Cuenta a la colección de cuentas, verificando que el cliente dueño de la cuenta es cliente
*del Banco.
*3. incorporarCajaAhorro(numeroCliente):Agregar una nueva Caja de Ahorro a la colección de cajas
*de ahorro, verificando que el cliente dueño de la cuenta es cliente del Banco.
*4. realizarDeposito(numCuenta,monto): Dado un número de Cuenta y un monto, realizar depósito.
*5. realizarRetiro(numCuenta,monto): Dado un número de Cuenta y un monto, realizar retiro.

 */
class Banco {
    //variables instancias de la clase
    private $coleccionCuentaCorriente=[]; //contiene una coleccion de instancias de la clase cuenta corriente
    private $coleccionCajaAhorro=[]; //contiene una coleccion de instancias de la clase caja de ahorro
    private $ultimoValorCuentaAsignado; //contiene el ultimo valor asignado a una cuenta del banco
    private $coleccionCliente=[]; //contiene una coleccion de instancias de la clase cliente

    //metodo constructor de la clase 
    public function __construct($colCuentaCorriente, $colCajaAhorro, $ultimoValorCuentaAsignado, $colCliente){
        $this->coleccionCuentaCorriente=$colCuentaCorriente;
        $this->coleccionCajaAhorro=$colCajaAhorro;
        $this->ultimoValorCuentaAsignado=$ultimoValorCuentaAsignado;
        $this->coleccionCliente=$colCliente;
    }
    public function getColeccionCuentaCorriente(){
        return $this->coleccionCuentaCorriente;
    }
    public function getColeccionCajaAhorro(){
        return $this->coleccionCajaAhorro;
    }
    public function getUltimoValorCuentaAsignado(){
        return $this->ultimoValorCuentaAsignado;
    }   
    public function getColeccionCliente(){
        return $this->coleccionCliente;
    }

    public function setColeccionCuentaCorriente($array){
        $this->coleccionCuentaCorriente=$array;
    }   
    public function setColeccionCajaAhorro($array){
        $this->coleccionCajaAhorro=$array;
    }
    public function setUltimoValorCuentaAsignado($valor){
        $this->ultimoValorCuentaAsignado=$valor;
    }
    public function setColeccionCliente($array){
        $this->coleccionCliente=$array;
    }

    public function incorporarCliente($objCliente){ //permite agregar un nuevo cliente al banco

    }
    
}
?>