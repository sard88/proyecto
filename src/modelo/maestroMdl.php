<?php
	class maestroMdl {

		function alta ($codigo, $correo, $nombre, $apellido, $rol, $flag, $pass, $permisos, $activo) {


			require ('maestroClass.php');

			$maestro = new Maestro($codigo, $correo, $nombre, $apellido, $rol, $flag, $pass, $permisos, $activo);
			$this->codigo = $codigo;
			$this->correo = $correo;
			$this->nombre = $nombre;
			$this->apellido = $apellido;
			$this->rol = $rol;
			$this->flag = $flag;
			$this->pass = $pass;
			$this->permisos = $permisos;
			$this->activo = $activo;

			//echo ".  correo   : ".$this->correo.".  .";

			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				//die('FALLO'.$conexion->errno.':'.$conexion->error);
				die('FALLO no se pudo conectar');
				
			//Crear query
			$query = "INSERT INTO maestro (codigo, correo, nombre, apellido, rol, flag) 
					  VALUES ('$this->codigo',
					  	 	  '$this->correo',
					  		  '$this->nombre', 
					  	      '$this->apellido', 
					  	      '$this->flag')";
			
			$query_s = "INSERT INTO sesion_maestro (codigo, pass, permisos, activo) 
					  VALUES ('$this->codigo',
					  	 	  '$this->pass',
					  		  '$this->permisos', 
					  	      '$this->activo')";

			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);
			$resultado_s = $conexion -> ejecutarConsulta($query_s);

			echo 'Resultado maestroMdl   .';
			var_dump($resultado);
			var_dump($resultado_s);

			if(!$resultado || !$resultado_s) {
				//echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
				echo '.  FALLO  no hay resultado D:';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				return $maestro;
			}//else
		}//function alta

		function baja ($codigo) {

			include ('maestroClass.php');

			require_once('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			echo 'Codigo: '.$codigo;
			//Crear query
			$query = 'DELETE FROM maestro 
						WHERE codigo = '.$codigo;

			$query_s = 'DELETE FROM sesion_maestro
						WHERE codigo = '.$codigo;

			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);
			$resultado_s = $conexion -> ejecutarConsulta($query_s);

			if(!$resultado || !$resultado_s) {
				//echo 'FALLO no hay resultado'.$conexion->errno.' : '.$conexion->error;
				echo 'FALLO no hay resultado';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				echo 'Si se pudo D:';
			}//else
		}//function baja

		function consulta() {
			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			$consulta = "SELECT * FROM maestro";

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
	}//class maestroMdl
?>