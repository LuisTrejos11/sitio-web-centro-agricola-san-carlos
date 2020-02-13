<?php 
 class Utils{
 	public static function deleteSession($name){
 		if (isset($_SESSION[$name])) {
 			$_SESSION[$name]= null;
 			unset($_SESSION[$name]);
 		}
 		return $name;
 	}

 	public static function isAdmin(){
 		if (!isset($_SESSION['admin'])) {
			echo '<script type="text/javascript">
			window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/");
			</script>';
 		}else{
 			return true;
 		}
	 }
	 
	 public static function isUser(){
		if (!isset($_SESSION['identity'])) {
		   echo '<script type="text/javascript">
		   window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/");
		   </script>';
		}else{
			return true;
		}
	}
 	
 }