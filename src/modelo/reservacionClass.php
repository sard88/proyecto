<?php

class Reservacion {
		
	//Atributos
	public $id;
	public $salon;
	public $fecha_inicio;
	public $fecha_final;
	public $hora_inicio;
	public $hora_final;
	public $usuario;
	public $motivo;

	function __construct($id, $salon, $fecha_inicio, $fecha_final, $hora_inicio, $hora_final, $usuario, $motivo) {

		$this->id = $id;
		$this->salon = $salon;
		$this->fecha_inicio = $fecha_inicio;
		$this->fecha_final = $fecha_final;
		$this->hora_inicio = $hora_inicio;
		$this->hora_final = $hora_final;
		$this->usuario = $usuario;
		$this->motivo = $motivo;
	}//constructor
}//class Reservacion

?>