<?php
class Usuario{
	private $id;
	private $nombre;
	private $apellidos;
	private $email;
	private $password;
    private $rol;
    private $codigo;
	

	// conexiòn base de datos 

	private $db;

	public function __construct(){
		$this->db = Database::connect();
	}

	 function getId() {
            return $this->id;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getApellidos() {
            return $this->apellidos;
        }

        function getEmail() {
            return $this->email;
        }

        function getPassword() {
            return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost'=>'4']);
        }

        function getRol() {
            return $this->rol;
        }

        function getCodigo() {
            return  $this->codigo;
        }

        

        function setId($id) {
            $this->id = $id;
        }

        function setNombre($nombre) {
            $this->nombre = $this->db->real_escape_string($nombre);
        }

        function setApellidos($apellidos) {
            $this->apellidos = $this->db->real_escape_string($apellidos);
        }

        function setEmail($email) {
            $this->email = $this->db->real_escape_string($email);
        }

        function setPassword($password) {
            $this->password = $password;
        }

        function setRol($rol) {
            $this->rol = $rol;
        }

        function setCodigo($codigo) {
            $this->codigo = $codigo;
        }


        public function save(){
        	$sql= " INSERT INTO usuarios VALUES (NULL, '{$this->getNombre()}','{$this->getApellidos()}','{$this->getEmail()}','{$this->getPassword()}','user', '{$this->getCodigo()}')";
        	$save= $this->db->query($sql);

        	$result= false;

        	if ($save) {
        		$result=true;
        	}
        	return $result;
        }

        public function login(){
        	//Comprobar si existe el usuario
        	$result=false;

        	$email= $this->email;
            $password= $this->password;
            $codigo= $this->codigo;
            

        	$sql= "SELECT * FROM usuarios WHERE email = '$email' AND codigo = '$codigo'"; 

        	$login= $this->db->query($sql);

        	if ($login && $login->num_rows ==1) {
        		$usuario = $login->fetch_object();

        		// verificar cotraseña y codigo afiliado
                $verify= password_verify($password, $usuario->password);
               

        		if ($verify ) {
        			$result= $usuario;        		
        		}

        	}

        	return $result;
        }

        public function getOne($id){
            $usuario = $this->db->query("SELECT * FROM usuarios WHERE id = $id");
            return $usuario->fetch_object();
        }

        public function getAll(){
            $sql = "SELECT * FROM usuarios ORDER BY id DESC";
            $usuarios= $this->db->query($sql);
            return $usuarios;
        }   

        public function delete(){
            $sql = "DELETE FROM usuarios WHERE id={$this->id}";
            $delete= $this->db->query($sql);
        
            $result= false;
        
               if ($delete) {
                   $result=true;
               }
               return $result;
        }


}