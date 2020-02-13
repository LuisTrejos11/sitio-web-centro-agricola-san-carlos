<?php 

$errores='';
$enviado='';

if (isset($_POST['submit'])){  
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];

	if (!empty($nombre)){
		// ELIMINA ESPACIOS 
		$nombre= trim($nombre);
		// ELIMINA CARACTERES ESPECIALES 
		$nombre= filter_var($nombre, FILTER_SANITIZE_STRING);
		# code...
	}else{
		$errores .= ' Por favor ingresa un nombre <b/>';
	}

	if (!empty($correo)) {

		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL ); 
		if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa un correo valido <br />';
		}

		# code...
	}else{
		$errores .= 'Por favor ingresa un correo <br />';
	}

	if (!empty($mensaje)) {
		$mensaje= htmlspecialchars($mensaje);
		$mensaje= trim($mensaje);
		$mensaje= stripslashes($mensaje);
		# code...
	}else{
		$errores .= 'Por favor escribe un mensaje <br /> ';
	}


	if (!$errores) {

		$enviar_a = 'trejos2410@gmail.com';
		$asunto = 'correo enviado desde cacSanCarlos.com';
	    $mensaje_preparado = " de: $nombre \n ";
	    $mensaje_preparado .= " Correo :  $correo \n";
	    $mensaje_preparado .=  " Mensaje:" . $mensaje;

	    mail($enviar_a, $asunto, $mensaje_preparado);
	    $enviado= 'true';
		# code...
	}

}






 ?>