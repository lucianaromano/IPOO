<?php
include_once("Terminal.php");
include_once("Empresa.php");
include_once("ViajeNacional.php");
include_once("ViajeInternacional.php");
include_once("Responsable.php");
/**
 * 1. Se crea una colección con un mínimo de 2 empresas, ejemplo Flecha Bus y Via Bariloche.
 * 2. A cada empresa se le incorporan 2 instancias de la clase viaje Nacionales y 3 instancias de la clase
 * Viaje Internacionales.
 * 3. Se crea un objeto Terminal con la colección de empresas creadas en el punto 1.
 * 4. Invocar y visualizar el resultado obtenido de invocar al método darViajeMenorValor() a partir de la
 * instancia Terminal creada en el punto 3
 */
 $colEmpresas=[
   new Empresa(1,"Flecha bus",[]),
   new Empresa(2,"Via bariloche",[])
]; //1

$objReponsable=[
   new Responsable("alan","aguirre",12345678,"jmp","ada@scf.com",20090849356),
   new Responsable("tobias","aguirre",123321123,"mjp","asdasa@frrfr.com",2005433456),
   new Responsable("mirko","gutierrez",554554545,"dfr","addda@scf.com",3231121221),
   new Responsable("rocio","gonzalez",444444,"edr","asdfdasa@frreeefr.com",2900434434)
];

 $colViajes1=[
    new ViajeNacional("cordoba",17,19,12,100,"12-12",12,40,$objReponsable[0]),
    new ViajeNacional("CABA",13,19,13,320,"1-5",2,23,$objReponsable[0]),
    new ViajeInternacional("Francia",5,19,1,9000,"5-11",9,12,$objReponsable[1],false),
    new ViajeInternacional("EEUU",5,19,1,10,"9-2",9,40,$objReponsable[1],true),
    new ViajeInternacional("Brasil",5,19,1,300,"12-10",9,12,$objReponsable[1],false)
 ];

 $colViajes2=[
   new ViajeNacional("corriente",17,19,12,3200,"12-12",24,40,$objReponsable[2]),
   new ViajeNacional("santa cruz",13,19,13,6855,"1-5",2,23,$objReponsable[2]),
   new ViajeInternacional("Francia",5,19,1,6900,"5-11",9,12,$objReponsable[3],false),
   new ViajeInternacional("EEUU",5,19,1,4500,"9-2",9,40,$objReponsable[3],false),
   new ViajeInternacional("Brasil",5,19,1,2100,"12-10",9,12,$objReponsable[3],false)
]; 

 $colEmpresas[0]->setColViajes($colViajes1); //2
 $colEmpresas[1]->setColViajes($colViajes2); //2


 $objTerminal=new Terminal("Terminal cipo","ruta 22",$colEmpresas); //3

 $viajesEconomicos=$objTerminal->darViajeMenorValor();//4
 foreach($viajesEconomicos as $viaje){
    echo $viaje."\n";
 }

 $objEmpresa = new EmpresaCable();
 $estadoContrato = new EstadoContrato("Al dia");
 
 $tipoCanal1 = new TipoCanal("noticias");
 $tipoCanal2 = new TipoCanal("deportivos");
 $tipoCanal3 = new TipoCanal("peliculas");
 
 $canal1 = new Canal($tipoCanal1, true, 100);
 $canal2 = new Canal($tipoCanal2, false, 120);
 $canal3 = new Canal($tipoCanal3, true, 80);
 
 $arregloCanales = array();
 $arregloCanales[0] = $canal1;
 $arregloCanales[1] = $canal2;
 $arregloCanales[2] = $canal3;
 
 $plan1 = new Plan(111, $arregloCanales, 200, false);
 $plan2 = new Plan(222, $arregloCanales, 210, true);
 $plan3 = new Plan(222, $arregloCanales, 210, true);
 
 $objEmpresa -> incorporarPlan($plan1);
 $objEmpresa -> incorporarPlan($plan2);
 
 $objCliente = new Cliente(40960405, "Diego Nicolas", "Montes");
 
 $contrato1 = new ContratoWeb("2014-07-13", "2014-07-19", $plan1, $objCliente, $estadoContrato);
 
 $contrato2 = new ContratoEmpresa("2018-05-30", "2018-06-29", $plan1, $objCliente,$estadoContrato);
 
 $contrato3 = new ContratoWeb("2016-01-11", "2018-01-29", $plan1, $objCliente,$estadoContrato);
 
 $objEmpresa -> incorporarContrato($contrato2, false);
 $objEmpresa -> incorporarContrato($contrato2, true);
 
 echo $objEmpresa;