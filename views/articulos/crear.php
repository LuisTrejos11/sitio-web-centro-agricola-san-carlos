<div class="container">
    <div class="row">
        <div class="col-12">
        <legend class="text-center text-success registrarse">Gestión de boletines</legend>
        </div>
    </div>
                <?php if(isset($edit) && isset($art) && is_object($art)): ?>
                <div class="row">
                    <div class="col">
                    <legend class="text-center text-info ">Editar boletin <?=$art->nombre?></legend>
                    </div>
                </div>
                
                <?php $url_action = base_url."articulo/save&id=".$art->id; ?>
                
                 <?php else:?>
                
                <?php $url_action = base_url."articulo/save"; ?>
                <div class="row">
                    <div class="col-12">
                    <button type="button" class="btn btn-success" onclick=mostrar()>Agregar </button>
                    <button type="button" class="btn btn-info" onclick=ocultar()>Editar</button>
                    </div>
                </div> 
                 <?php endif; ?>
    
</div>


<div class="container" id="form_crear" >
    <div class="row">
        <div class="col">
        <form action= "<?=$url_action?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
                    <fieldset>
                        

                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Ingrese el titulo</span>
                            <div class="col-md-8">
                            <?php if(empty($cap)){ $nombre="nombre";}
                                 else{$nombre=$cap->nombre;}?>
                                <input id="nombre" name="nombre" type="text" placeholder= "<?php  echo($nombre) ?>" class="form-control">
                            </div>
                        </div>

                     
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Descripción</span>
                            <div class="col-md-8">
                            <?php if(empty($cap)){ $descripcion="";}
                                 else{$descripcion=$cap->descripcion;}?>
                            <textarea class="form-control" rows="3" name="descripcion" placeholder= "<?php echo($descripcion)?>"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Fecha</span>
                            <div class="col-md-8">
                                <input id="fecha" name="fecha" type="date" class="form-control" >
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
            require_once 'models/articulo.php';
            $articulo= new Articulo();
            $articulos = $articulo->getAll(); 
				
		?>

<div class="container" id="form_eliminar">

    <div class="row">
        <div class="col">
        <legend class="text-center text-success registrarse">Editar boletines</legend>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table >
                <tr>
                    <th>TITULO</th>
                    <th>ID</th>
                    
                </tr>
            <?php while ($art = $articulos->fetch_object()):?>
                
                <tr>
                    <td><?=$art->nombre;?></td>
                    <td><?=$art->id;?></td>
                   
                    <td>
                      
                    <a href="<?=base_url?>articulo/eliminar&id=<?=$art->id?>" class="button button-gestion button-red">Eliminar</a>	
                    </td>
                    <td>
                      
                    <a href="<?=base_url?>articulo/editar&id=<?=$art->id?>" class="button button-gestion button-editar">Editar</a>	
                    </td>
                </tr>
            <?php endwhile; ?>	
        </table>
        </div>
    </div>

</div>