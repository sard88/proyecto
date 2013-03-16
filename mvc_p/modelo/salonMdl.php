<?php
	class salonMdl {

		function alta ($id, $edificio, $aula, $cupo, $nombre, $descripcion, $espacios) {


			require ('salonClass.php');
			$salon = new salon($id, $edificio, $aula, $cupo, $nombre, $descripcion, $espacios);
			$this->id = $id;
			$this->edificio = $edificio;
			$this->aula = $aula;
			$this->cupo = $cupo;
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			$this->espacios = $espacios;

			require ('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				//die('FALLO'.$conexion->errno.':'.$conexion->error);
				die('FALLO no se pudo conectar');
				
			//Crear query
			$query = "INSERT INTO salon (id, edificio, aula, cupo, nombre, descripcion, espacios) 
					  VALUES ('$this->id',
					  	 	  '$this->edificio',
					  		  '$this->aula', 
					  	      '$this->cupo', 
					  	      '$this->nombre',
					  	      '$this->descripcion',
					  	      '$this->espacios')";
			
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);
			echo 'Resultado salonMdl   ';
			var_dump($resultado);

			if(!$resultado){
				//echo 'FALLO '.$conexion->errno.' : '.$conexion->error;
				echo 'FALLO  no hay resultado D:';
				//Cerrar la conexion
				$conexion -> cerrar();
				return FALSE;
			}//if
			else {
				return $salon;
			}//else
		}//function alta

		function baja ($id) {

			include ('salonClass.php');

			require_once('dbdata.inc');
			require ('dbClass.php');

			$conexion = new DB ($host, $user, $pass, $bd);
			if (!$conexion->conectar())
				die('FALLO'.$conexion->errno.':'.$conexion->error);

			echo 'id: '.$id;
			//Crear query
			$query = 'DELETE FROM salon 
						WHERE id = '.$id;
			//Ejecutar el query
			$resultado = $conexion -> ejecutarConsulta($query);

			if(!$resultado){
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

			$consulta = "SELECT * FROM salon";

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
	}//class salonMdl
?>