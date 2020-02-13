
 <!--Inicio del contenedor-->
 <div class="container"> 


   <?php
require_once 'models/usuario.php';
require_once 'models/producto.php';
error_reporting(0);


  $producto= new Producto();
  $productos= $producto->getAll();

$articulos_pagina= 6;
$total_articulos= mysqli_num_rows($productos);

$paginas = $total_articulos/ $articulos_pagina;
$paginas = ceil($paginas);



?>



<?php  

$iniciar = ($_GET['pagina']-1)*$articulos_pagina;

$sentencia_productos = new Producto();
$resultado_productos= $sentencia_productos->getSix($iniciar,$articulos_pagina);



?>

<legend class="text-success text-center"> Productos en venta </legend>

<!--Buscador-->
  <form action="<?=base_url?>producto/index"  method="POST">
       <input type="text" name="buscar">
       <input type="submit" value="Buscar">
       
  </form>
       
       <?php if(isset($_POST['buscar'])):?>
        <?php 
           $productoBusqueda= new Producto();
          $busqueda= $productoBusqueda->buscar($_POST['buscar']);
           //echo var_dump($busqueda);
           //die();
        ?>
    <!--Fin Buscador--> 

    <!--Mostrar productos segun buscador--> 
    <div class="row">   
        <?php while($pro = mysqli_fetch_array($busqueda)): ?>
          <div class="col-lg-4 col-md-12 producto " >
        <?php
           /* Comprobar si el usuario es admin*/
           $usuario= new Usuario();
          $user= $usuario->getOne($pro['id_usuario']);
          
        ?>
          <a href=""><img id="img_producto" src="<?=base_url?>uploads/images/<?= $pro['imagen']?>" alt="Generic placeholder image"></a>
          
          <h2 class ="text-center "><?= $pro['nombre'] ?></h2>
          <?php if($user->rol=="admin"):?>   
          <div class ="text-center producto_centro"><h4 >Producto del Centro Agricola</h4></div>
          
         <?php endif;?>
          <p><span class="text-success">Precio:  <?= $pro['precio'] ?> Cantidad:  <?= $pro['stock'] ?></span></p> 
          <p>Publicado : <?= $pro['fecha'] ?></p> 
          <p><?= $pro['descripcion'] ?></p>
          
          <p>

          <?php if($pro['estado'] !== "disponible"){
            $clase_estado ="vendido";
          }else{
            $clase_estado ="disponible";
          } ?>
          <div class="estado <?php echo $clase_estado ?> "><?= $pro['estado'] ?></div>
          <br>
        <button type="button" class="btn btn-default btn_detalles"  data-container="body" data-toggle="popover" data-placement="top" >
           Detalles de contacto <i class="fa fa-eye"></i>          
          <p id="desplegar" style="display:none;">Telefono: <?= $pro['telefono'] ?></p> </button>
        

         
          
        </p>
        </div><!-- /.col-lg-4 -->
       
     

          <?php endwhile; ?>
          </div><!-- /.row --> 
       <?php else: ?>


      <!--Mostrar productos si no hay busqueda --> 
       <div class="row">
       <?php while($pro =  $resultado_productos->fetch_object()): ?>
           <br><br>

        <div class="col-lg-4 col-md-12 producto " >
        <?php
           /* Comprobar si el usuario es admin*/
           $usuario= new Usuario();
          $user= $usuario->getOne($pro->id_usuario);
          
        ?>

   
          <div class="">
          <img id="img_producto" src="<?=base_url?>uploads/images/<?php echo $pro->imagen?>" alt="Generic placeholder image">
          <div class="etiqueta">
                <?php if($user->rol=="admin"):?>   
                <div ><span >Producto del Centro Agricola</span></div>
                
              <?php endif;?>
          </div>
          </div>
          
          
          <h2 class ="text-center "><?php echo $pro->nombre ?></h2>
          <p><span class="text-success">Precio:  <?php echo $pro->precio ?> Cantidad:  <?php echo $pro->stock ?></span></p> 
          <p>Publicado : <?php echo $pro->fecha ?></p> 
          <p><?php echo $pro->descripcion ?></p>
          
          <p>

          <?php if($pro->estado !== "disponible"){
            $clase_estado ="vendido";
          }else{
            $clase_estado ="disponible";
          } ?>
          <div class="estado <?php echo $clase_estado ?> "><?php echo $pro->estado ?></div>
          <br>
        <div  class="btn btn-sm btn-default btn_detalles "  data-container="body" data-toggle="popover" data-placement="top" >
           Detalles de contacto <i class="fa fa-eye"></i>          
          <p id="desplegar" style="display:none;">Telefono: <?php echo $pro->telefono ?></p> 
           <a  class= "wathsapp-btn" id="desplegar" style="display:none;" href="https://api.whatsapp.com/send?phone=506<?=$pro->telefono?>">Wathsapp</a>
        
        
        </div>
        

         
          
        </p>
        </div><!-- /.col-lg-4 -->
       
     
      
<!--Fin del contenedor-->

  <?php endwhile; ?>
 
  </div><!-- /.row -->
        <?php endif; ?>


      
      
  <div class="container paginacion ">
            <div class="row justify-content-center ">
            <ul class="pagination">
             <li class=" page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>"
              ><a class ="page-link" href="<?=base_url?>producto/index?pagina=<?php echo $_GET['pagina']-1?>">
               Anterior</a></li>
    
             <?php for($i=0; $i<$paginas; $i++): ?>
             <li class=" page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?> " ><a class ="page-link" href="<?=base_url?>producto/index?pagina=<?php echo $i+1;?> ">
               <?php echo $i+1; ?> 
             </a></li>
              <?php endfor;?>
    
             <li class=" page-item  <?php echo $_GET['pagina']>=$paginas ? 'disabled':'' ?>"
             ><a class ="page-link" href="<?=base_url?>producto/index?pagina=<?php echo $_GET['pagina']+1?>">
             Siguiente</a></li>
         </ul>
            </div>
         
       </div>
      
      
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        



 <script>

        $(document).ready(function(){ 
          $('.btn_detalles',this).on('click',function(){
            $(this).css('color', 'green');
              $("#desplegar",this).toggle();
          });
        });
</script>

