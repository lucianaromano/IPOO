<?php

/**. Crea una clase CuentaBancaria con los siguientes atributos: número de cuenta, el DNI del cliente, el
saldo actual y el interés anual que se aplica a la cuenta. Define en la clase los siguientes métodos:
14.a. Método constructor _ _construct() que recibe como parámetros los valores iniciales para los
atributos de la clase.
14.b. Los método de acceso de cada uno de los atributos de la clase.
14.c. actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
dividido entre 365 aplicado al saldo actual).
14.d. depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta.
14.e. retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).
14.f. Redefinir el método _ _toString() para que retorne la información de los atributos de la clase.
14.g. Crear un script Test_CuentaBancaria que cree un objeto CuentaBancaria e invoque a cada
uno de los métodos implementados */
class cuentaBancaria {
    private $nroCuenta;
    private $dni;
    private $saldoActual;
    private $interesAnual;

    //metodo constructor de la clase
    public function __construct($nroCuenta,$dni,$saldoActual,$interesAnual){
        $this->nroCuenta=$nroCuenta;
        $this->dni=$dni;
        $this->saldoActual=$saldoActual;
        $this->interesAnual=$interesAnual;
    }

    //metodos de acceso
    public function getNroCuenta(){
        return $this->nroCuenta;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getSaldoActual(){
        return $this->saldoActual;
    }
    public function getInteresAnual(){
        return $this->interesAnual;
    }
    public function setNroCuenta($nroCuenta){
        $this->nroCuenta=$nroCuenta;
    }
    public function setDni($dni){
        $this->dni=$dni;
    }
    public function setSaldoActual($saldoActual){
        $this->saldoActual=$saldoActual;
    }
    public function setInteres($interesAnual){
        $this->interesAnual=$interesAnual;
    }

    //otros metodos 
    /**actualizarSaldo(): actualizará el saldo de la cuenta aplicándole el interés diario (interés anual
    dividido entre 365 aplicado al saldo actual*/
    public function actualizarSaldo(){
        $interesAnual= $this->getInteresAnual();
        $saldo= $this->getSaldoActual();
        $nuevoSaldo= $saldo + (($interesAnual/100) / 365);
        $this->setSaldoActual($nuevoSaldo);
        return $nuevoSaldo;
    }

    /**depositar($cant): permitirá ingresar una cantidad de dinero en la cuenta. */
    public function depositar($cant){
        $saldoActual=$this->getSaldoActual();
        $nuevoSaldo= $saldoActual + $cant;
        $this->setSaldoActual($nuevoSaldo); //actualizo el saldo?
        return $nuevoSaldo;
    }

    /**retirar($cant): permitirá sacar una cantidad de dinero de la cuenta (si hay saldo).*/
    public function retirar($cant){
        $saldoActual=$this->getSaldoActual();
        if ($saldoActual>0){
            $nuevoSaldo= $saldoActual- $cant;
            $this->setSaldoActual($nuevoSaldo); //actualizo el valor del saldo
        }else {
            echo "No posee saldo en su cuenta, por favor intentelo más tarde.";
        }
        return $nuevoSaldo;
    }
    public function __toString(){
        return "\n Número de cuenta: ". $this->getNroCuenta().
                "\n DNI: ".$this->getDni().
                "\n Saldo actual: $".$this->getSaldoActual().
                "\n Interes anual: ".$this->getInteresAnual() ."%";
    }

}



?>