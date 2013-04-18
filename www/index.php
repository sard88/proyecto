
<?php


switch($_REQUEST['controlador'])
{
	case 'usuario': 
		include('../src/controlador/usuarioCtl.php');
		$controlador = new usuarioCtl();
	break;

	case 'alumno':
		include('../src/controlador/alumnoCtl.php');
		$controlador = new alumnoCtl();
	break;

	case 'salon':
		include('../src/controlador/salonCtl.php');
		$controlador = new salonCtl();
	break;

	case 'reservacion':
		include('../src/controlador/reservacionCtl.php');
		$controlador = new reservacionCtl();
	break;

	default: 
		include('../src/controlador/estandarCtl.php');
		$controlador = new estandarCtl(); 
	break;
}//switch

//Ejecutamos el controlador
$controlador -> ejecutar();
	//phpinfo();

?>