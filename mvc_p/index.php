<?php

//Cargar la informacion del controlador

//include('controlador/estandarCtl.php');
//include('controlador/alumnoCtl.php');
//include('controlador/maestroCtl.php');
//include('controlador/usuarioCtl.php');
//include('controlador/salonCtl.php');
include('controlador/reservacionCtl.php');

//Crear objeto controlador y ejecutar
//$controlador = new estandarCtl();

//$controlador = new alumnoCtl();
//$controlador = new maestroCtl();
//$controlador = new usuarioCtl();
//$controlador = new salonCtl();
$controlador = new reservacionCtl();
$controlador -> ejecutar();

?>