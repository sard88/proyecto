<?php

class estandarCtl {

   public $modelo;

   function __construct(){

    //Incluir modelo 
     require '../src/modelo/usuarioMdl.php';
     //Crear el objeto del modelo
     $this->modelo = new usuarioMdl();
   }//constructor

  function ejecutar () {

    //Si no hay accion definida en la variable,
    //entonces se listan los usuarios
    if (isset($_REQUEST['accion'])) {

     session_start();

    if( isset($_SESSION['codigo']) ){
      //Ya existe la sesion y no debe intentar hacer login
    }

     $action = $_REQUEST['accion'];

     require_once ('../src/modelo/dbdata.inc');
     require_once ('../src/modelo/dbClass.php');

     $conexion = new DB ($host, $user, $pass, $bd);
     if (!$conexion->conectar())
      die('FALLO'.$conexion->errno.':'.$conexion->error);

      //Limpiar variables
      $codigo = $conexion->limpiarVariable($_REQUEST['code']);
      $contrasena = $conexion->limpiarVariable($_REQUEST['pass']);

     if (preg_match("/^[A-Z0-9][0-9]{6,8}$/", $codigo)) {
      echo "RGXC_|";
     }//if regex codigo

     if (preg_match("/^[\w][\s|\w]{5,}$/", $contrasena)) {
      echo "_RGXT";
     }//if regex contraseña


      switch($action){

        case "login" :

          $usuario = $this->modelo->buscar($codigo,$contrasena);
          //print_r($usuario);

          $_SESSION['codigo']=$usuario[0]['codigo'];
          $_SESSION['nombre']=$usuario[0]['nombre'];
          $_SESSION['apellido']=$usuario[0]['apellido'];
          $_SESSION['permisos']=$usuario[0]['permisos'];

          //var_dump($_SESSION);

        break;
        
        default :
          die ( '$action No es una accion valida ' );
      }//switch
    }//if isset

     if (is_array($usuario) || is_object($usuario)) {
        $_SESSION['activo']= true;
       //Incluir la vista
       //include('../src/vista/usuarioVst.php');
     }
     else {
       //Se manda llamar la lista de errores
       die('No hay datos estandar Ctl');
    }//else no es array
  }//ejecutar

}//class
?>