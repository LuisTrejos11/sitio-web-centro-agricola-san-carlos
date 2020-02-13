<?php

class Articulo{
	private $id;
	private $nombre;
	private $descripcion;
	private $fecha;
    private $imagen;
	

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
   

    public function save(){
		$sql = "INSERT INTO articulos VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getFecha()}', '{$this->getImagen()}');";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    public function getAll(){
		$articulos = $this->db->query("SELECT * FROM articulos ORDER BY id ASC");
		return $articulos;
    }
   
	public function getTres($inicio, $final){
		$articulos = $this->db->query("SELECT * FROM articulos ORDER BY id DESC LIMIT $inicio,$final");
		return $articulos;
	}
	public function delete(){
		$sql = "DELETE FROM articulos WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}
	public function edit(){
		$sql = "UPDATE articulos SET nombre='{$this->getNombre()}', descripcion='{$this->getDescripcion()}', fecha='{$this->getFecha()}' ";
		
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
		$articulo = $this->db->query("SELECT * FROM articulos WHERE id = {$this->getId()}");
		return $articulo->fetch_object();
	}

}