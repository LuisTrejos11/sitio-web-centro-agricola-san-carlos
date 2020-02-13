<?php
require_once 'models/producto.php';

class productoController{
	public function index(){
		
		require_once 'views/productos/mostrar_productos.php';
		
	}

public function gestion(){

	require_once 'views/productos/gestion.php';

}

	public function crear(){
		require_once 'views/productos/crear.php';
	}

	public function save(){
		if(isset($_SESSION['identity'])){
			$id_usuario = $_SESSION['identity']->id;
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$categoria = isset($_POST['categoria1']) ? $_POST['categoria1'] : false;
			$subcategoria = isset($_POST['subcategoria']) ? $_POST['subcategoria'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$precio = isset($_POST['precio']) ? $_POST['precio'] : false;
			$stock = isset($_POST['stock']) ? $_POST['stock'] : false;
			$telefono= isset($_POST['telefono']) ? $_POST['telefono'] : false;
			
			
				
			if($nombre && $descripcion && $precio && $stock && $telefono){
				$producto = new Producto();
				$producto->setId_usuario($id_usuario);
				$producto->setNombre($nombre);
				$producto->setCategoria($categoria);
				$producto->setSubcategoria($subcategoria);
				$producto->setDescripcion($descripcion);
				$producto->setPrecio($precio);
				$producto->setStock($stock);
				$producto->setTelefono($telefono);
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$producto->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				//$link = mysql_connect("localhost", "root");
				//mysql_select_db("centro_agricola",$db);
				//$sql = "INSERT INTO productos (id, id_usuario, estado, categoria, subacategoria, nombre, descripcion, precio, stock, fecha, telefono, imagen) " +
				 // "VALUES (NULL, $id_usuario, 'disponible', NULL , NULL,$nombre, $descripcion, $precio, $stock, null,$telefono, $filename)";
				//$result = mysql_query($sql);
				



				

				//$db = Database::connect();
				//$db->query("INSERT INTO productos VALUES(NULL, $id_usuario, 'disponible', NULL , NULL,$nombre, $descripcion, $precio, $stock, null,$telefono, $filename ;");

				$save = $producto->save();
				
				//echo var_dump($producto);
				//die();
				
				if($save ){
					$_SESSION['producto'] = "complete";
				}else{
					$_SESSION['producto'] = "failed";
				}
				
			}else{
				$_SESSION['producto'] = "failed";
			}
			
			echo '<script type="text/javascript">
			window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/producto/crear");
			</script>';		
		}else{
			// Redigir al index
			echo '<script type="text/javascript">
			window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/");
			</script>';
		}
	}
	public function eliminar(){
		Utils::isUser();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$producto = new Producto();
			$producto->setId($id);
			
			$delete = $producto->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/producto/crear");
                    </script>';
	}

	public function vendido(){
		Utils::isUser();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$producto = new Producto();
			$producto->setId($id);
			$producto->setEstado('vendido');
			$producto->editEstado();
		
		
			
		}else{
			echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/producto/crear");
                    </script>';
		}
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/producto/crear");
                    </script>';
	}

	
}