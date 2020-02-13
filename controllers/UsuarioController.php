<?php ob_start();?>
<?php
require_once 'models/usuario.php';

class usuarioController{
    public function index(){
        
    }

    public function registro(){
        Utils:: isAdmin();
    	require_once 'views/registro.php';

    }

    public function gestion(){
        require_once 'views/gestion.php';
    }

    public function save(){
    	if (isset($_POST)) {
            $nombre= isset($_POST['nombre']) ? $nombre=$_POST['nombre'] : false;
            $apellidos= isset($_POST['apellidos']) ? $apellidos=$_POST['apellidos'] : false;
            $email= isset($_POST['email']) ? $email=$_POST['email'] : false;
            $password= isset($_POST['password']) ? $password=$_POST['password'] : false;
            $codigo= isset($_POST['codigo']) ? $codigo=$_POST['codigo'] : false;



            if($nombre && $apellidos && $email && $password && $codigo){
            		$usuario= new Usuario();
                    $usuario->setNombre($nombre);
                    $usuario->setApellidos($apellidos);
                    $usuario->setEmail($email);
                    $usuario->setPassword($password);
                    $usuario->setCodigo($codigo);

                    $save= $usuario->save();
                    if ($save) {

                        $_SESSION['register']= "complete";
                        
                    }else{
                        $_SESSION['register']= "failed";

                    }
            }
            else{
                $_SESSION['register']= "failed";
            }
    	}else{
                $_SESSION['register']= "failed";
             }
             
             
             echo '<script type="text/javascript">
window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/usuario/registro");
</script>';
        
    }

    public function login(){
        if(isset($_POST)){
            // identificar el usuario
            //Consulta a la base de datos 
            $usuario = new Usuario();
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);
            $usuario->setCodigo($_POST['codigo']);
            $identity= $usuario->login();

           // echo var_dump($identity);
            //die();

            
            if ($identity && is_object($identity)) {
                $_SESSION['identity'] = $identity;

                if ($identity->rol == 'admin') {
                    $_SESSION['admin']= true;
                }
            }else{
                $_SESSION['error_login'] = 'Identifiación fallida';

            }
            


        }
        echo '<script type="text/javascript">
window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/usuario/gestion");
</script>';
    }

    public function logout(){
        if (isset($_SESSION['identity'])) {
            unset($_SESSION['identity']);
        }
        if (isset($_SESSION['admin'])) {
            unset($_SESSION['admin']);
        }
        echo '<script type="text/javascript">
        window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/");
        </script>';
        
    }

    public function eliminar(){
		
    	Utils:: isAdmin();
			if(isset($_GET['id_user'])){
    		$id= $_GET['id_user'];
    		$user = new Usuario();
    		$user-> setId($id);
    		$delete= $user->delete();

    		if($delete){
    			$_SESSION['delete']= 'complete';
    		}else{
    			$_SESSION['delete']= 'failed';
    		}
    	}else{
    		$_SESSION['delete']= 'failed';
    	}
    	echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/usuario/registro");
                    </script>';

    }
}
?>
<?php ob_end_flush(); ?>