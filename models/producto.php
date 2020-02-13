<?php

class Producto{
	private $id;
	private $id_usuario;
	private $estado;
	private $categoria;
	private $subcategoria;
	private $nombre;
	private $descripcion;
	private $precio;
	private $stock;
	private $fecha;
	private $telefono;
	private $imagen;

	private $db;
	
	public function __construct() {
		$this->db = Database::connect();
	}
	
	function getId() {
		return $this->id;
	}
	function getId_usuario() {
		return $this->id_usuario;
	}
	function getEstado() {
		return $this->estado;
	}

	function getCategoria() {
		return $this->categoria;
	}
	function getSubcategoria() {
		return $this->subcategoria;
	}

	function getNombre() {
		return $this->nombre;
	}

	function getDescripcion() {
		return $this->descripcion;
	}

	function getPrecio() {
		return $this->precio;
	}

	function getStock() {
		return $this->stock;
	}


	function getFecha() {
		return $this->fecha;
	}
	function getTelefono() {
		return $this->telefono;
	}

	function getImagen() {
		return $this->imagen;
	}

	function setId($id) {
		$this->id = $id;
	}
	function setId_usuario($id_usuario) {
		$this->id_usuario = $id_usuario;
	}
	function setEstado($estado) {
		$this->estado = $estado;
	}

	function setCategoria($categoria) {
		$this->categoria = $categoria;
	}
	function setSubcategoria($subcategoria) {
		$this->subcategoria = $subcategoria;
	}

	function setNombre($nombre) {
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setDescripcion($descripcion) {
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setPrecio($precio) {
		$this->precio = $this->db->real_escape_string($precio);
	}

	function setStock($stock) {
		$this->stock = $this->db->real_escape_string($stock);
	}


	function setFecha($fecha) {
		$this->fecha = $fecha;
	}
	function setTelefono($telefono) {
		$this->telefono = $telefono;
	}

	function setImagen($imagen) {
		$this->imagen = $imagen;
	}

	public function getAll(){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC");
		return $productos;
	}

	public function buscar($valor){
		$productos = $this->db->query("SELECT * FROM productos WHERE nombre LIKE '%".$valor."%' OR categoria LIKE '%".$valor."%' OR
												subcategoria LIKE '%".$valor."%' OR
												descripcion LIKE '%".$valor."%'  ORDER BY id DESC");
		return $productos;
	}
	

	
	public function getRandom($limit){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY RAND() LIMIT $limit");
		return $productos;
	}
	
	public function getOne(){
		$producto = $this->db->query("SELECT * FROM productos WHERE id = {$this->getId()}");
		return $producto->fetch_object();
	}
	
	public function save(){
		$sql = "INSERT INTO productos VALUES(NULL, {$this->getId_usuario()}, 'disponible', '{$this->getCategoria()}' , '{$this->getSubcategoria()}','{$this->getNombre()}', '{$this->getDescripcion()}', '{$this->getPrecio()}','{$this->getStock()}', null,{$this->getTelefono()},'{$this->getImagen()}' )";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
	
	
	public function delete(){
		$sql = "DELETE FROM productos WHERE id={$this->id}";
		$delete = $this->db->query($sql);
		
		$result = false;
		if($delete){
			$result = true;
		}
		return $result;
	}

	public function getSix($inicio, $final){
		$productos = $this->db->query("SELECT * FROM productos ORDER BY id DESC LIMIT $inicio,$final");
		return $productos;
	}


	public function getByUsuario($id){
		$productos = $this->db->query("SELECT * FROM productos WHERE id_usuario = $id");
		return $productos;
	}

	public function editEstado(){
		$sql = "UPDATE productos SET  estado='{$this->getEstado()}' WHERE id={$this->id};";
		
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}
	
	
}