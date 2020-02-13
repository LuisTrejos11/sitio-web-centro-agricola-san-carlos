<?php

require_once 'models/slider.php';


class sliderController{
    public function index(){
    	require_once'views/productos/crear.php';
        
    }
    public function crear(){
 		Utils :: isAdmin();
 		require_once 'views/slider/crear.php';

 	}

    public function gestion(){
    	Utils :: isAdmin();

    	$slider = new Slider();
    	$sliders = $slider->getAll();

		require_once 'views/slider/crear.php';
		require_once 'views/layouts/header.php';

    }

    public function save(){
    	Utils :: isAdmin();
		//echo var_dump($_POST);
		//die();
    	
			$titulo= isset($_POST['titulo']) ? $_POST['titulo'] :'';
			$publicidad= isset($_POST['publicidad']) ? $_POST['publicidad'] :'';
			//$orden= isset($_POST['orden']) ? $_POST['orden'] : false;
			//$imagen= isset($_POST['imagen']) ? $_POST['imagen'] : false;   

				$slider= new Slider();
				$slider-> setTitulo($titulo);
				$slider-> setPublicidad($publicidad);
				//$slider-> setOrden($orden);
				


				// GUARDAR IMAGEN 
                if(isset($_FILES['imagen'])){
					
                    $file= $_FILES['imagen'];
                    $filename = $file['name'];
                    $mimetype= $file['type'];

					

                    if($mimetype== "image/jpg" || $mimetype== "image/jpeg" || $mimetype== "image/png" || $mimetype== "image/git"){
					   
						if(!is_dir('uploads/images')){
                            mkdir('uploads/images',0777, true);
                        }

                        move_uploaded_file($file['tmp_name'], 'uploads/images/'.$filename);
                        $slider->setImagen($filename);

                    }
                }
				if(isset($_GET['id'])){
                    $id = $_GET['id'];
                    $slider->setId_slider($id);
                    $save= $slider->edit();

                }else{
                    $save= $slider->save();

                }

               

				if($save){
    					$_SESSION['slider']= "complete";
    				}else{
    					$_SESSION['slider']= "failed";
    				}
        					
                	


                    echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/usuario/gestion");
                    </script>';

    }

    public function editar(){
    	
    	Utils::isAdmin();
    	if(isset($_GET['id'])){
    		$id= $_GET['id'];
    		$edit = true;

    		$producto = new Producto();
    		$producto->setId($id);
    		$pro = $producto->getOne();

    	}else{
    		header('Location:'.base_url.'producto/gestion');
    	}
    	

    	require_once 'views/productos/crear.php';

    }

    public function eliminar(){
		
    	Utils:: isAdmin();
			if(isset($_GET['id_slider'])){
    		$id= $_GET['id_slider'];
    		$slider = new Slider();
    		$slider-> setId_slider($id);
    		$delete= $slider->delete();

    		if($delete){
    			$_SESSION['delete']= 'complete';
    		}else{
    			$_SESSION['delete']= 'failed';
    		}
    	}else{
    		$_SESSION['delete']= 'failed';
    	}
    	echo '<script type="text/javascript">
                    window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/slider/crear");
                    </script>';

    }
}
