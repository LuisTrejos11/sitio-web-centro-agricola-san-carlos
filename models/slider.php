<?php
class Slider {
	private $id_slider;
	private $titulo;
	private $imagen;
	private $publicidad;
	private $link;
    private $orden;
    private $estado;

    // conexiòn base de datos 

	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

    public function getId_slider(){
		return $this->id_slider;
	}

	public function setId_slider($id_slider){
		$this->id_slider = $id_slider;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}

	public function getPublicidad(){
		return $this->publicidad;
	}

	public function setPublicidad($publicidad){
		$this->publicidad = $publicidad;
	}

	public function getLink(){
		return $this->link;
	}

	public function setLink($link){
		$this->link = $link;
	}

	public function getOrden(){
		return $this->orden;
	}

	public function setOrden($orden){
		$this->orden = $orden;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function setEstado($estado){
		$this->estado = $estado;
    }
    public function save(){
        $sql= " INSERT INTO slider VALUES (NULL, '{$this->getTitulo()}','{$this->getImagen()}','{$this->getPublicidad()}','{$this->getLink()}','{$this->getOrden()}','{$this->getEstado()}')";
        $save= $this->db->query($sql);
    
        $result= false;
    
        if ($save) {
            $result=true;
        }
        return $result;
    }
    
    public function delete(){
        $sql = "DELETE FROM slider WHERE id_slider={$this->id_slider}";
        $delete= $this->db->query($sql);
    
        $result= false;
    
           if ($delete) {
               $result=true;
           }
           return $result;
    }
    public function getAll(){
		$sql = "SELECT * FROM slider ORDER BY id_slider DESC";
		$sliders= $this->db->query($sql);
		return $sliders;
	}    
	public function obtenerMenor(){// "SELECT MAX(id_tabla) AS id FROM tabla"
		$sql = "SELECT MIN(id_slider) FROM slider";
		$menor= $this->db->query($sql);
	
		return $menor->fetch_object(); 
	}
}
    

    
