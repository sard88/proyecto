
<?php

class Salon {
		
	//Atributos
	public $id;
	public $edificio;
	public $aula;
	public $cupo;
	public $nombre;
	public $descripcion;
	public $espacios;

	function __construct($id, $edificio, $aula, $cupo, $nombre, $descripcion, $espacios) {

		$this->id = $id;
		$this->edificio = $edificio;
		$this->aula = $aula;
		$this->cupo = $cupo;
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
		$this->espacios = $espacios;
		
	}//constructor
}//class Salon

?>