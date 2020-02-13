<?php
require_once 'models/capacitacion.php'; 

$capacitacion= new Capacitacion();
$capacitaciones= $capacitacion->getAll();


?>
            <div class="container  lista_reservas">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-center text-success">Listado de reservas</h3>
                    </div>
                </div>
                
            <?php while ($capa = $capacitaciones->fetch_object()):?>
                <div class="row justify-content-center">
                    <div class="col-8 align-self-center">
                            <ul class="list-group">
                     <a href="<?=base_url?>reserva/listado&id=<?=$capa->id?>">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                        	
                            <?php echo $capa->nombre ?>
                            <span class="badge badge-primary badge-pill"><?php echo $capa->cupo ?> disponible</span>
                             </li>
                        </a>
                       
                        
                    </ul>
                    </div>
                </div>
           
           
     <?php endwhile; ?>	
     </div>
        