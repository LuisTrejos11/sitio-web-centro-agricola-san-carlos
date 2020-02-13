
<?php 
 require_once 'models/articulo.php';
 $articulo= new Articulo();
 $articulos = $articulo->getAll(); 

 $articulos_pagina= 3;
 $total_articulos= mysqli_num_rows($articulos);
 
 $paginas = $total_articulos/ $articulos_pagina;
 $paginas = ceil($paginas);
?>
<?php  

if(!$_GET){
  echo '<script type="text/javascript">
  window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/articulo/index?pagina=1");
  </script>';
}

if($_GET['pagina']>$paginas){
  echo '<script type="text/javascript">
  window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/articulo/index?pagina=1");
  </script>';
}


$iniciar = ($_GET['pagina']-1)*$articulos_pagina;
        
$sentencia_articulos= new Articulo();
$resultado_articulos= $sentencia_articulos->getTres($iniciar,$articulos_pagina);
?>








      <div class="container">
          <h2 class="lead" >Boletines de interes</h2>
          <p class="lead">Autoría Centro Cantonal Agrícola de San Carlos</p>
          <hr>
          <?php while($art =  $resultado_articulos->fetch_object()): ?>
        <div class="row">
            <div class="col-3">
            <img class="img-fluid" src="<?=base_url?>uploads/images/<?php echo $art->imagen?>" alt="">
                <p class="lead text-muted text-center"><?php echo $art->fecha?></p>
            </div>
            <div class="col-9">
            <h3 class= "text-success"><?php echo $art->nombre?></h3>

            <?php $extracto= substr( $art->descripcion,0,200) ?>
                <div class="parrafo">
                <p id="extracto"><?php echo $extracto?></p>
                </div>

            <a href="<?=base_url?>articulo/single&id=<?=$art->id?>" class="continuar">Continuar Leyendo</a>
            </div>
          </div>
          <hr>
        <?php  endwhile; ?>
        
      </div>

  <!-- PAGINACION -->
         
    
    
  <div class="container paginacion ">
            <div class="row justify-content-center ">
            <ul class="pagination">
             <li class=" page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>"
              ><a class ="page-link" href="<?=base_url?>articulo/index?pagina=<?php echo $_GET['pagina']-1?>">
               Anterior</a></li>
    
             <?php for($i=0; $i<$paginas; $i++): ?>
             <li class=" page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?> " ><a class ="page-link" href="<?=base_url?>articulo/index?pagina=<?php echo $i+1;?> ">
               <?php echo $i+1; ?> 
             </a></li>
              <?php endfor;?>
    
             <li class=" page-item  <?php echo $_GET['pagina']>=$paginas ? 'disabled':'' ?>"
             ><a class ="page-link" href="<?=base_url?>articulo/index?pagina=<?php echo $_GET['pagina']+1?>">
             Siguiente</a></li>
         </ul>
            </div>
         
       </div>
       
       

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        



        <script>
       
               $(document).ready(function(){ 
                 $('#leer_mas',this).on('click',function(){
                   $(this).css('color', 'green');
                     $("#desc_completa",this).toggle();
                 });
               });
       </script>




