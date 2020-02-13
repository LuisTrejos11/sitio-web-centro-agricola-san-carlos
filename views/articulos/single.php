<?php  
 require_once 'models/articulo.php';
 $articulo= new Articulo();

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $articulo->setId($id);
    $art = $articulo->getOne();
}
?>

<div class="container boletin">
    <div class="row">
        <div class="col">
            <div class=" col col-md-offset-5">
            <section class="post">
			<article>
				<h2 class="titulo"><?php echo $art->nombre ?></h2>
				<p class="fecha"><p class="fecha"><?php echo $art->fecha; ?></p></p>
				<div class="thumb">
					<img src="<?=base_url?>uploads/images/<?php echo $art->imagen?>"alt="<?php echo $art->nombre ?>">
				</div>
				<!-- Con la funcion nl2br insertamos un salto de linea antes de todas las lineas nuevas de un string. -->
				<p class="descripcion"><?php echo nl2br($art->descripcion); ?></p>
			</article>
		</section>
            </div>
        </div>
    </div>
</div>


<div class="contenedor">
		
	</div>