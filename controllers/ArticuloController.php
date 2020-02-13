<?php
require_once 'models/articulo.php';
class articuloController{
	
	public function index(){
		require_once 'views/articulos/articulos.php';
		
	}
	
	public function crear(){
		Utils::isAdmin();
		require_once 'views/articulos/crear.php';
	}
	public function save(){
		Utils::isAdmin();
		
		
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
			
			
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $fecha ){
				$articulo = new Articulo();
				$articulo->setNombre($nombre);
				$articulo->setDescripcion($descripcion);
				$articulo->setFecha($fecha);
				
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$articulo->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$articulo->setId($id);
					
					$save = $articulo->edit();
					
				}else{
					;
					$save = $articulo->save();
				}
				
				if($save){
					$_SESSION['articulo'] = "complete";
				}else{
					$_SESSION['articulo'] = "failed";
				}
			}else{
				$_SESSION['articulo'] = "failed";
			}
		}else{
			$_SESSION['articulo'] = "failed";
		}
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/articulo/crear");
                    </script>';
	}

	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$articulo = new Articulo();
			$articulo->setId($id);
			
			$delete = $articulo->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/articulo/crear");
                    </script>';
	}

	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$articulo = new Articulo();
			$articulo->setId($id);
			
			$art = $articulo->getOne();
			//echo var_dump($cap);
			
			require_once 'views/articulos/crear.php';
			
		}else{
			echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/articulo/crear");
                    </script>';
		}
	}

	public function single(){
		require_once 'views/articulos/single.php';
	}

}