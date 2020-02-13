<?php 
require_once 'models/capacitacion.php'; 
require_once 'models/reserva.php'; 
if(isset($_GET['id'])){
    $id_capacitacion= $_GET['id'];
}else{
    
		echo '<script type="text/javascript">
        window.location.assign("http://localhost:8080/proyecto_cac_sancarlos/reserva/gestion");
        </script>';
}
$capacitacion= new Capacitacion();
$capa= $capacitacion->getUno($id_capacitacion);

$reserva= new Reserva();
$reservas= $reserva->getByCapacitacion($id_capacitacion);

?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3 class=" text-center text-success">Registro de reservas para la capacitacion <?php echo $capa->nombre ?></h3>
        </div>
    </div>
</div>


<div class="container" id="form_reserva">

   
    <div class="row">
        <div class="col">
        <table >
                <tr>
                    <th>Nombre</th>
                    <th>Cupos reservados</th>
                    
                </tr>
            <?php while ($rese = $reservas->fetch_object()):?>
                
                <tr>
                    <td><?=$rese->nombre_usuario;?></td>
                    <td><?=$rese->cupo;?></td>
                   
                </tr>
            <?php endwhile; ?>	
        </table>
        </div>
    </div>

</div>