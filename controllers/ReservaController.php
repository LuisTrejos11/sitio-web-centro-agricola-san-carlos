<?php
require_once 'models/reserva.php';
require_once 'models/capacitacion.php';
class 	reservaController{
	
	public function index(){
		require_once 'views/capacitaciones/capacitaciones.php';
		
	}
    public function save(){
		
		if(isset($_POST)){
			$nombre_usuario = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$cupo = isset($_POST['cupo']) ? $_POST['cupo'] : false;
			$id = isset($_POST['id']) ? $_POST['id'] : false;
			
			if($nombre_usuario  && $cupo && $id ){
				$reserva = new Reserva();
				$reserva->setNombre_usuario($nombre_usuario);
				$reserva->setCupo($cupo);
				$reserva->setId_capacitacion($id);
					
					$save = $reserva->save();
				
				if($save){
					$capacitacion = new Capacitacion();
					$capa = $capacitacion->getUno($id);
					$nuevo_cupo= $capa->cupo-$cupo;
					$capacitacion->setId($id);
					$capacitacion->setCupo($nuevo_cupo);
					$capacitacion->editCupo();
					//echo var_dump($nuevo_cupo);
					//die();

					$_SESSION['reserva'] = "complete";
				}else{
					$_SESSION['reserva'] = "failed";
				}
			}else{
				$_SESSION['reserva'] = "failed";
			}
		}else{
			
			$_SESSION['reserva'] = "failed";
		}

		echo '<script type="text/javascript">
          window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/?pagina=1");
          </script>';
	}
	
	public function gestion(){
		Utils::isAdmin();
		require_once 'views/reservas/gestionReservas.php';

	}

	public function listado(){
		Utils::isAdmin();
		require_once 'views/reservas/reserva.php';
	}
}
