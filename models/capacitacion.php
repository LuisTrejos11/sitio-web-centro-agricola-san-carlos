<?php

class Capacitacion{
	private $id;
	private $nombre;
	private $descripcion;
	private $fecha;
    private $imagen;
	private $cupo;
	private $hora;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}


	function getNombre() {
		return $this->nombre;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getFecha() {
		return $this->fecha;
	}

	function getImagen() {
		return $this->imagen;
    }
    function getCupo() {
		return $this->cupo;
	}
	function getHora() {
		return $this->hora;
	}

	function setId($id) {
		$this->id = $id;
	}


	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setFecha($fecha) {
		$this->fecha = $fecha;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
    }
    function setCupo($cupo) {
		$this->cupo = $cupo;
	}
	function setHora($hora) {
		$this->hora = $hora;
    }

    public function save(){
		$sql = "INSERT INTO capacitaciones VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getFecha()}', '{$this->getImagen()}','{$this->getCupo()}', '{$this->getHora()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    public function getAll(){
		$capacitaciones = $this->db->query("SELECT * FROM capacitaciones ORDER BY id ASC");
		return $capacitaciones;
    }
    public function getTodo(){
        $capacitaciones = $this->db->query("SELECT * FROM capacitaciones ");
		return $capacitaciones;
	}
	public function getTres($inicio, $final){
		$capacitaciones = $this->db->query("SELECT * FROM capacitaciones ORDER BY id DESC LIMIT $inicio,$final");
		return $capacitaciones;
	}
	public function delete(){
		$sql = "DELETE FROM capacitaciones WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	public function edit(){
		$sql = "UPDATE capacitaciones SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', fecha='{$this->getFecha()}', cupo='{$this->getCupo()}', hora='{$this->getHora()}' ";
		
		if($this->getImagen() != null){
			$sql .= ", imagen='{$this->getImagen()}'";
		}
		
		$sql .= " WHERE id={$this->id};";
		
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	public function getOne(){
		$capacitacion = $this->db->query("SELECT * FROM capacitaciones WHERE id = {$this->getId()}");
		return $capacitacion->fetch_object();
	}
	public function getUno($id){
		$capacitacion = $this->db->query("SELECT * FROM capacitaciones WHERE id = $id");
		return $capacitacion->fetch_object();
	}
	public function editCupo(){
		$sql = "UPDATE capacitaciones SET cupo='{$this->getCupo()}' WHERE id={$this->id};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

}