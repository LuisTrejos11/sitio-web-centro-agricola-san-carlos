<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>CAC San Carlos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="<?=base_url?>css/fontello.css">
	<link rel="stylesheet" href="<?=base_url?>css/styles.css">
	<link href="https://fonts.googleapis.com/css?family=Bitter&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/fb615381fc.js" crossorigin="anonymous"></script>
	<script type= "text/javascript"src="<?=base_url?>js/scripts.js"></script>
	<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css"/>
	<script type= "text/javascript" src="<?=base_url?>js/jquery.expander.js"></script>
	
	
</head>
<body>
	<header>
		<div class="container">

			<!-- logo+menu -->
			<div class="nav row rounded-top align-items-center justify-content-center">
			<!-- Logotipo -->
				<div class="col logo d-flex align-items-center justify-content-start justify-content-lg-start">
				<img class= "logo_img"src="<?=base_url?>img/logo.jpg" alt="logo"/>
					<h2>Centro Agrícola Cantonal de San Carlos</h2>
				</div>
			

			</div>
		</div>

				
					<nav class="navbar navbar-expand-lg ">
	
						  <button class="navbar-toggler btn_menu" type="button" data-toggle="collapse" 
						          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
						          aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars icon_menu"></i></button>
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    <ul class="navbar-nav mr-auto">
						      <li class="nav-item active">
						        <a class="nav-link" href="<?=base_url?>">Inicio <span class="sr-only">(current)</span></a>
						      </li>
						     
						      <li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" 
						           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          Servicios
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          <a class="dropdown-item" href="#">Investigación</a>
						          <a class="dropdown-item" href="#">Asistencia Técnica</a>
						          <div class="dropdown-divider"></div>
						          <a class="dropdown-item" href="#">Coordinación Interinstitucional</a>
						        </div>
						      </li>
						      <li class="nav-item active">
						        <a class="nav-link" href="<?=base_url?>producto/index?pagina=1">Venta de productos</a>
						      </li>
						       <li class="nav-item active">
						        <a class="nav-link" href="<?=base_url?>capacitacion/mision">Quienes somos</a>
							  </li>
							  <li class="nav-item active">
						        <a class="nav-link" href="<?=base_url?>articulo/index?pagina=1">Boletines</a>
							  </li>
							  <?php if(isset($_SESSION['identity'])): ?>
								<li class="nav-item active">
						        <a class="nav-link" href="<?=base_url?>usuario/gestion">Gestión</a>
						      </li>
							  <?php endif; ?>
							  
						    </ul>
						    <button class="btn btn-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#modalLoginForm">Iniciar Sesión</button>
						   <!--  <a class="nav-link registro" style-background="red" href="<?=base_url?>usuario/registro">Registrarse</a>-->
						    
						  </div>
					</nav>
				</div>
				<!-- MODAL INICIO DE SESION  -->
				<form action="<?=base_url?>usuario/login" method="POST">
				<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
					<div class="modal-header text-center">
						<h4 class="modal-title w-100 font-weight-bold">Iniciar Sesión</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-3">
						<div class="md-form mb-5 text-light">
						<i class="fas fa-envelope prefix text-light"></i>
						<input name="email" type="email" id="defaultForm-email" class="form-control validate">
						<label  data-error="wrong" data-success="right" for="defaultForm-email">Ingresa tu email</label>
						</div>

						<div class="md-form mb-4 text-light">
						<i class="fas fa-lock prefix text-light"></i>
						<input name="password" type="password" id="defaultForm-pass" class="form-control validate">
						<label  data-error="wrong" data-success="right" for="defaultForm-pass">Ingresa tu contraseña</label>
						</div>

						<div class="md-form mb-4 text-light">
						<i class="fas fa-lock prefix text-light"></i>
						<input name="codigo" type="password" id="defaultForm-pass" class="form-control validate">
						<label  data-error="wrong" data-success="right" for="defaultForm-pass">Ingresa tu código de afiliado</label>
						</div>
					

					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button class="btn btn-default btn-success">Iniciar sesión</button>
						<a  href="<?=base_url?>usuario/registro">Registrarse</a>
					</div>
					</div>
				</div>
				</div>
			</form>
				




	</header>


<!-- Slider -->
<div class="container">
	<div class="row slider">
		<div class="col-12 justify-content-center">
			<div class="carousel slide" id="principal-carousel" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#principal-carousel" data-slide-to="0" class="active"></li>
					<li data-target="#principal-carousel" data-slide-to="1"></li>
					<li data-target="#principal-carousel" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">

				<?php 
					require_once 'models/slider.php';
					$slider= new Slider();
					$sliders = $slider->getAll(); 
					//echo var_dump($sliders->fetch_object());
					//die();
					$nums_slides=mysqli_num_rows($sliders);
					$menor= $slider->obtenerMenor();

					
				//echo var_dump($valor);
				//die();
						
						

					
?>
					
					<?php while ($pro = $sliders->fetch_object()):?>
						<?php $menor= $slider->obtenerMenor();
						$valor = current( (Array)$menor );
						?>
					<div class="carousel-item <?php if($pro->id_slider==$valor){echo "active";}?>">
						<img src="<?=base_url?>uploads/images/<?php echo $pro->imagen?>" alt="">
						<div class="carousel-caption">
						<h3 class="titulo_slider"><?php echo $pro->titulo?></h3>
						<p class="desc_slder"><?php echo $pro->publicidad?></p>
						</div>
						
					</div>
						<?php endwhile; ?>	

		
				
					
				</div>


				<a href="#principal-carousel" class="carousel-control-prev" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Anterior</span>
				</a>
				<a href="#principal-carousel" class="carousel-control-next" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Siguiente</span>
				</a>
			</div>
		</div>
	</div>

</div>

