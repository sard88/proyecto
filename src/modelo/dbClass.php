<?php

class DB {

	private $host;
	private $user;
	private $pass; 
	private $bdrr;
	private $cnx;

	private static $instance;


	//CAMBIAR BASE DE DATOS DE practicas (bd) a RESERVACION (bdr) EN ESTA LINEA
	private function __construct ($host, $user, $pass, $bd) {
		$this->host = $host;
		$this->user = $user;
		$this->pass = $pass;
		$this->bd = $bd;
	}//constructor

	public static function singleton() 
    {
        if (!isset(self::$instance)) {
            $c = __CLASS__;
            self::$instance = new $c;
        }

        return self::$instance;
    }//singleton

    // Evita que el objeto se pueda clonar
    public function __clone()
    {
        trigger_error('Clone is not allowed.', E_USER_ERROR);
    }//clone

	//REGRESA TRUE OR FALSE
	function conectar () {

		$conexion = new mysqli ($this->host, $this->user, $this->pass, $this->bd);
		if($conexion->errno) {
			return FALSE;
		}//if
		$this->cnx = $conexion;
		return TRUE;
	}//conecta()

	function ejecutarConsulta ($query) {

		echo 'ejecutar consulta  dbClass   .';
		$resultado = $this->cnx->query ($query);
		//var_dump($resultado);
		if ($this->cnx->errno) {
			echo ".  error en el query   .";
			//echo "cnx errno D: dbClass";
			return FALSE;
		}//if errno

		if (is_object($resultado)) {
			if($resultado->num_rows > 0) {
				echo "Objeto con filas";
				while($fila = $resultado->fetch_assoc()) {
					$resultado_array[] = $fila;
					//print_r($resultado_array);
				}//while
			}//if numrows >0
			return $resultado_array;
		}//si es un objeto

			$pos = strpos($query, 'INSERT');
		//Si es un insert
		if($pos===0) {
			echo 'ES UN INSERT D:';
			//return $this->cnx->insert_id;
			return $resultado;
		}//if insert

		return $this->cnx->affected_rows;
	}//ejecutarConsulta

	function cerrar() {
		return $this->cnx->close();
	}//cerrar

	function limpiarVariable ($dato) {

		return $this->cnx -> real_escape_string($dato);
	}//limpiarVariable

}//class

?>