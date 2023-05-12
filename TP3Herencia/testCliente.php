<?php
include 'Cliente.php';

function Test_Cliente (){
    $objCliente = new Cliente ("DNI: 42604817", "Luciana", "Romano", "3075");
    echo $objCliente;
}

function main (){
    Test_Cliente();
}
main ();
?>