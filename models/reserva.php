<?php

class Reserva{
	private $id;
	private $nombre_usuario;
	private $cupo;
	private $id_capacitacion;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}


	function getNombre_usuario() {
		return $this->nombre_usuario;
	}

    function getCupo() {
		return $this->cupo;
    }
    function getId_capacitacion() {
		return $this->id_capacitacion;
	}

	function setId($id) {
		$this->id = $id;
	}

	function setNombre_usuario($nombre_usuario) {
		$this->nombre_usuario = $this->db->real_escape_string($nombre_usuario);
	}

    function setCupo($cupo) {
		$this->cupo = $cupo;
    }
    function setId_capacitacion($id_capacitacion) {
		$this->id_capacitacion = $id_capacitacion;
	}
	public function save(){
		$sql = "INSERT INTO reservas VALUES(NULL, '{$this->getNombre_usuario()}', {$this->getCupo()}, {$this->getId_capacitacion()});";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
	public function getByCapacitacion($id){
		$reservas = $this->db->query("SELECT * FROM reservas WHERE id_capacitacion = $id");
		return $reservas;
	}
	
	public function getAll(){
		$reservas = $this->db->query("SELECT * FROM reservas ORDER BY id ASC");
		return $reservas;
    }
	
}