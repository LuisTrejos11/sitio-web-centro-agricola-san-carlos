<?php if(!isset($_SESSION['identity'])) :?>
    <div class="container no_registrado">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
        <h3 id="alert_red">Usuario no registrado</h3>
        <a class="link" href="<?=base_url?>">Volver al inicio <span class="sr-only">(current)</span></a>
        </div>
    </div>
</div>

                  
<?php else: ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
        <h3> Bienvenido(a) : <?=$_SESSION['identity']->nombre ?> <?=$_SESSION['identity']->apellidos?></h3>
        </div>
    </div>
</div>
    
<?php endif; ?>


<?php if(isset($_SESSION['admin'])):?>
<div class="container gestion">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center">
            <div class="list-group">
                <li class="list-group-item"><a href="<?=base_url?>slider/crear" >Gestionar cinta informativa</a></li> 
                <li class="list-group-item"><a href="<?=base_url?>capacitacion/crear" >Gestionar actividades</a></li> 
                <li class="list-group-item"><a href="<?=base_url?>producto/crear" >Gestionar venta de productos</a></li>
                <li class="list-group-item"><a href="<?=base_url?>reserva/gestion" >Gestionar reservas</a></li> 
                <li class="list-group-item"><a href="<?=base_url?>usuario/registro" >Gestionar usuarios</a></li>
                <li class="list-group-item"><a href="<?=base_url?>articulo/crear" >Gestionar boletines</a></li>
                <li class="list-group-item"><a href="#" >Generar Reportes</a></li> 

            </div>
            <h6 class="links_gestion"> <a class="btn btn-success btn-sm" href="#">Cambiar contraseña</a></h6>
                    <h6 class="links_gestion"> <a class="btn btn-success btn-sm" href="<?=base_url?>usuario/logout">Cerrar sesión</a></h6>
        </div>
    </div>
</div>


<?php endif;?>

<?php if(isset($_SESSION['identity'])&& !isset($_SESSION['admin'])) :?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8 align-self-center text-align-center">
                <div class="list-group">
                        
                        <li class="list-group-item"><a href="<?=base_url?>producto/crear" >Gestionar venta de productos</a></li> 
                        <li class="list-group-item"><a href="#" >Generar Reportes</a></li> 

                 </div>
                    <h6 class="links_gestion"> <a href="#">Cambiar contraseña</a></h6>
                    <h6 class="links_gestion"> <a href="<?=base_url?>usuario/logout">Cerrar sesión</a></h6>
        </div>
    </div>
</div>

<?php endif;?>


