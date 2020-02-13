<?php
require_once 'models/capacitacion.php';
$capacitacion= new Capacitacion();
$capacitaciones= $capacitacion->getTodo();

error_reporting(0);

$articulos_pagina= 3;
$total_articulos= mysqli_num_rows($capacitaciones);

$paginas = $total_articulos/ $articulos_pagina;
$paginas = ceil($paginas);


?>

<?php  

        if(!$_GET){
        echo '<script type="text/javascript">
        window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/?pagina=1");
        </script>';
        }

        if($_GET['pagina']>$paginas){
          echo '<script type="text/javascript">
          window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/?pagina=1");
          </script>';
        }
?>

<?php  

        $iniciar = ($_GET['pagina']-1)*$articulos_pagina;
        
        $sentencia_capacitaciones = new Capacitacion();
        $resultado_capacitaciones= $sentencia_capacitaciones->getTres($iniciar,$articulos_pagina);
        
       
       
 ?>
 <!-- Aqui inicia el contenerdor de capacitaciones -->
<div class="container">
<div class="row justify-content-center sinpadding">
      <div class="col justify-content-center text-center text-success text-success">
      <h2>Capacitaciones</h2> 
      </div>
      </div>
     <!-- mwnsaje de exito en reservas -->
   <?php if($_SESSION['reserva']== "complete"):?>

      <div class="row justify-content-center sinpadding">
      <div class="col justify-content-center text-center text-success text-success">
      <h4>*La reserva se realizo con exito*</h4> 
      </div>
      </div>
    <?php $_SESSION['reserva']= ""; ?>
  <?php endif;?>
</div>

<?php while($capac =  $resultado_capacitaciones->fetch_object()): ?>
  <div class="container publicacion">
    <div class="row justify-content-center sinpadding">

    
      <div class="col justify-content-center text-center text-success text-success">
      <h4><?= $capac->nombre ?> </h4>
      
      </div>
    </div>
      <div class="row justify-content-center sinpadding">
          <div class="col-12 col-md-8  justify-content-center text-center">
            <img  id="img_publicacion"src="<?=base_url?>uploads/images/<?php echo $capac->imagen?>" alt="">
          </div>
          <div class="col-12 col-md-4  justify-content-center text-center">
            <p ><?= $capac->descripcion ?></p>
              
         <button type="submit" class="btn btn-success btn-md"  data-toggle="modal" data-target="#<?php echo $capac->nombre ?>">Reservar</button>    
          </div>
          
      </div>
      <div class="row">
          <div class="col-8 text-center text-prmary">
            <p></p>
            <p>
            <?php
              if($capac->cupo <=5 ){
                $class_red = "red";
                if($capac->cupo<0){
                  $capa->cupo = 0;
                }

              }else{
                $class_red = "";
              }
            ?>
    <i class="icon-user"></i> Espacios disponibles <a class="cupo  <?php echo $class_red ?>" href="#"><?= $capac->cupo ?></a> 
              | <i class="icon-calendar"></i> <?= $capac->fecha ?>
              <i class="icon-calendar"></i> Hora: <?= $capac->hora ?>
              |
            </p>
          </div>
        </div>
      </div>
    </div>
    
   
        
    </div>

    <form action="<?=base_url?>reserva/save" method="POST">
            <div class="modal fade" id="<?php echo $capac->nombre ?>"  role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
              <input type="hidden" name="id" value="<?php echo $capac->id ?>" /> 
              <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Reservar cupo <?php echo $capac->nombre ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5 text-light">
                <input name="cupo" type="number" min="1" max="5" class="form-control validate">
                <label  data-error="wrong" data-success="right" >Cantidad de cupos</label>
                </div>
    
                <div class="md-form mb-4 text-light">
                <input name="nombre" type="text"  class="form-control validate">
                <label  data-error="wrong" data-success="right" >Ingresa tu nombre</label>
                </div>
    
              </div>
              <div class="modal-footer d-flex justify-content-center">
              <button class="btn btn-success my-2 my-sm-0" type="submit"> Reservar</button>
              
             
                
              </div>
              </div>
            </div>
            </div>
          </form>


             
              <hr>
      <?php endwhile; ?>

     
     
          <!-- MODAL DE CONTACTO -->

          <div class="container-box rotated">
<button type="button" class="btn btn-info btn-lg turned-button btn-contacto" data-toggle="modal"  data-target="#Modal" title="Escribanos su mensaje aqui"><i class="far fa-envelope"></i></button>
</div>

<!-- Modal -->
<div id="Modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content modalContacto">
<div class="modal-header">
<h4 class="modal-title">Contáctenos</h4>
<button type="button" class="close" data-dismiss="modal">×</button>

</div>
<div class="modal-body">

        <form role="form" method="post" id="reused_form" action= "<?=base_url?>contacto.php" >
        <p>
        Envíe su mensaje en el siguiente formulario y nos pondremos en contacto con usted lo antes posible.
        </p>

        <div class="form-group">
            <label for="nombre">
                Nombre:</label>
            <input type="text" class="form-control"
            id="name" name="nombre"   required maxlength="50">

        </div>
        <div class="form-group">
            <label for="email">
                Email:</label>
            <input type="email" class="form-control"
            id="email" name="correo" required maxlength="50">
        </div>
        <div class="form-group">
            <label for="name">
                Menasaje:</label>
            <textarea class="form-control" type="textarea" name="mensaje"
            id="message" placeholder="Escriba su mensaje..."
            maxlength="6000" rows="7"></textarea>
        </div>





        <button type="submit" class="btn btn-lg btn-success btn-block" id="btnContactUs">Enviar! </button>

    </form>
    <div id="success_message" style="width:100%; height:100%; display:none; ">
        <h3>Su mensaje se envio correctamente!</h3>
    </div>
    <div id="error_message"
    style="width:100%; height:100%; display:none; ">
        <h3>Error</h3>
        Lo sentimos, hubo un error al enviar su formulario.

    </div>
</div>

</div>

 </div>
</div>


         
          <!-- PAGINACION -->
         
    
    
          <div class="container paginacion ">
            <div class="row justify-content-center ">
            <ul class="pagination">
             <li class=" page-item <?php echo $_GET['pagina']<=1 ? 'disabled':'' ?>"
              ><a class ="page-link" href="<?=base_url?>?pagina=<?php echo $_GET['pagina']-1?>">
               Anterior</a></li>
    
             <?php for($i=0; $i<$paginas; $i++): ?>
             <li class=" page-item <?php echo $_GET['pagina']==$i+1 ? 'active':'' ?> " ><a class ="page-link" href="<?=base_url?>?pagina=<?php echo $i+1;?> ">
               <?php echo $i+1; ?> 
             </a></li>
              <?php endfor;?>
    
             <li class=" page-item  <?php echo $_GET['pagina']>=$paginas ? 'disabled':'' ?>"
             ><a class ="page-link" href="<?=base_url?>?pagina=<?php echo $_GET['pagina']+1?>">
             Siguiente</a></li>
         </ul>
            </div>
         
       </div>


  