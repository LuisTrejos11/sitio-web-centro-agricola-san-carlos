

<div class="container">
    <div class="row">
        <div class="col-12">
        <legend class="text-center text-success registrarse">Gestión de cinta informativa</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <button type="button" class="btn btn-success" onclick=mostrar()>Agregar </button>
        <button type="button" class="btn btn-danger" onclick=ocultar()>Eliminar</button>
        </div>
    </div>
</div>



<div class="container" id="form_crear" >
    <div class="row">
        <div class="col">
        <form action= "<?=base_url?>slider/save" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        <legend class="text-center text-success registrarse">Agregar cinta informativa</legend>

                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Ingrese el titulo</span>
                            <div class="col-md-8">
                                <input id="titulo" name="titulo" type="text" placeholder="Titulo" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Descripción</span>
                            <div class="col-md-8">
                                <input id="publicidad" name="publicidad" type="text" placeholder="Descripción" class="form-control" >
                            </div>
                        </div>


                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Imagen</span>
                            <div class="col-md-8">
                            <input type="file" name="imagen" required />
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-md-12 text-center text-success">
                                <button type="submit" class="btn btn-success btn-md">Agregar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
        </div>
    </div>
</div>
        <?php 
            require_once 'models/slider.php';
            $slider= new Slider();
            $sliders = $slider->getAll(); 
				
		?>

<div class="container" id="form_eliminar">

    <div class="row">
        <div class="col">
        <legend class="text-center text-success registrarse">Eliminar cinta informativa</legend>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table >
                <tr>
                    <th>TITULO</th>
                    <th>IMAGEN</th>
                    
                </tr>
            <?php while ($pro = $sliders->fetch_object()):?>
                
                <tr>
                    <td><?=$pro->titulo;?></td>
                    <td><?=$pro->imagen;?></td>
                   
                    <td>
                      
                    <a href="<?=base_url?>slider/eliminar&id_slider=<?=$pro->id_slider?>" class="button button-gestion button-red">Eliminar</a>	
                    </td>
                </tr>
            <?php endwhile; ?>	
        </table>
        </div>
    </div>

</div>