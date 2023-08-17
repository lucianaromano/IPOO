<?php
include 'CuentaBancaria.php';

$cuentaBancaria= new cuentaBancaria(635,42604817,10500,12);
echo $cuentaBancaria;

$nuevoSaldo= $cuentaBancaria->actualizarSaldo();
echo "\n El saldo de la cuenta con el interés anual aplicado es de: ". $nuevoSaldo;

echo "\n Ingrese el saldo a depositar: ";
$cantidad= trim(fgets(STDIN));
$depositado= $cuentaBancaria->depositar($cantidad);
echo "\n Su nuevo saldo es: $".$depositado;

echo "\n Ingrese el saldo a retirar: ";
$retiro=trim(fgets(STDIN));
$retirado= $cuentaBancaria->retirar($retiro);
echo "\n Su nuevo saldo es: $". $retirado;

?>