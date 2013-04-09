<?php

class usuarioBss {


	//Regresa el array productos, y en caso de falla un FALSE

	function listar() {
		require ('dbdata.inc');
		require ('dbClass.php');

		$conexion = new DB ($host, $user, $pass, $bd);
		if (!$conexion->conectar())
			die('FALLO'.$conexion->errno.':'.$conexion->error);

		$consulta = "SELECT * FROM usuario";

		//Ejecutar consulta
		$resultado = $conexion -> ejecutarConsulta($consulta);

		if(!$resultado) {
			$conexion->cerrar();
			return FALSE;
		}//if
		else {

			$conexion -> cerrar();
			return $resultado;
		}//else

	}//listar

	function insertarAlumno ($nombre, $apellido, $edad) {
		require('usuarioClass.php');
		$usuario = new Alumno ($nombre, $apellido, $edad);

		//Asignar variables
		$this->nombre = $nombre;
		$this->edad = $edad;
		$this->apellido = $apellido;

		//Conexion a la base de datos
		require_once('dbdata.inc');
		require ('dbClass.php');

		$conexion = new DB ($host, $user, $pass, $bd);
		if (!$conexion->conectar())
			die('FALLO'.$conexion->errno.':'.$conexion->error);
			
		//Crear query
		$query = "INSERT INTO usuario (nombre, apellido, edad) 
				  VALUES ('$this->nombre', 
				  	      '$this->apellido', 
				  	      '$this->edad')";
		
		//Ejecutar el query
		$resultado = $conexion -> ejecutarConsulta($query);

		if(!$resultado){
			echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
			//Cerrar la conexion
			$conexion -> cerrar();
			return FALSE;
		}//if
		else{
			//$this->id = $resultado;
			//Cerrar la conexion
			//	$conexion -> cerrar ();
			//	return $this->id;
			return $usuario;
			}//else
		}//function insertar alumno


		function consultar_id($id){

			include ('usuarioClass.php');
			echo $id;
			//conectarse a la base de datos
			require_once('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			//Crear query
			$query = 'SELECT * FROM usuario 
						WHERE id_usuario = '.$id;
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);

			if(!$resultado){
				echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else{
				//Cerrar la conexion
				$conexion -> cerrar();

				if ($resultado[0]['id_usuario'] == $id ){
					$this -> id_usuario = $resultado[0]['id_usuario'];
					$this -> nombre = $resultado[0]['nombre'];
					$this -> apellido = $resultado[0]['apellido'];
					$this -> edad = $resultado[0]['edad'];
					return TRUE;
				}//if
				else
					return FALSE;			
			}//else
		}//function consultar id

}//class usuariBss

?>