<?php
require_once 'models/capacitacion.php';
class capacitacionController{
	public function mision(){
		require_once 'views/capacitaciones/mision.php';
	}
	public function index(){
		require_once 'views/capacitaciones/capacitaciones.php';
		
	}
	public function crear(){
		Utils::isAdmin();
		require_once 'views/capacitaciones/crear.php';
	}
	public function save(){
		Utils::isAdmin();
		
		
		if(isset($_POST)){
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : false;
			$fecha = isset($_POST['fecha']) ? $_POST['fecha'] : false;
			$cupo = isset($_POST['cupo']) ? $_POST['cupo'] : false;
			$hora = isset($_POST['hora']) ? $_POST['hora'] : false;
			
			// $imagen = isset($_POST['imagen']) ? $_POST['imagen'] : false;
			
			if($nombre && $descripcion && $fecha && $cupo && $hora ){
				$capacitacion = new Capacitacion();
				$capacitacion->setNombre($nombre);
				$capacitacion->setDescripcion($descripcion);
				$capacitacion->setFecha($fecha);
				$capacitacion->setCupo($cupo);
				$capacitacion->setHora($hora);
				
				
				// Guardar la imagen
				if(isset($_FILES['imagen'])){
					$file = $_FILES['imagen'];
					$filename = $file['name'];
					$mimetype = $file['type'];

					if($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){

						if(!is_dir('uploads/images')){
							mkdir('uploads/images', 0777, true);
						}

						$capacitacion->setImagen($filename);
						move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
					}
				}
				
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$capacitacion->setId($id);
					
					$save = $capacitacion->edit();
					
				}else{
					;
					$save = $capacitacion->save();
				}
				
				if($save){
					$_SESSION['capacitacion'] = "complete";
				}else{
					$_SESSION['capacitacion'] = "failed";
				}
			}else{
				$_SESSION['capacitacion'] = "failed";
			}
		}else{
			$_SESSION['capacitacion'] = "failed";
		}
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/capacitacion/crear");
                    </script>';
	}
	public function eliminar(){
		Utils::isAdmin();
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$capacitacion = new Capacitacion();
			$capacitacion->setId($id);
			
			$delete = $capacitacion->delete();
			if($delete){
				$_SESSION['delete'] = 'complete';
			}else{
				$_SESSION['delete'] = 'failed';
			}
		}else{
			$_SESSION['delete'] = 'failed';
		}
		
		echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/capacitacion/crear");
                    </script>';
	}

	public function editar(){
		Utils::isAdmin();
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$edit = true;
			
			$capacitacion = new Capacitacion();
			$capacitacion->setId($id);
			
			$cap = $capacitacion->getOne();
			//echo var_dump($cap);
			
			require_once 'views/capacitaciones/crear.php';
			
		}else{
			echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/capacitacion/crear");
                    </script>';
		}
	}
	
}