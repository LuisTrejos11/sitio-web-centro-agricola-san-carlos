<div class="container">
    <div class="row">
        <div class="col-12">
        <legend class="text-center text-success registrarse">Gestión de productos</legend>
        </div>
    </div>
                <?php if(isset($edit) && isset($pro) && is_object($pro)): ?>
                <div class="row">
                    <div class="col">
                    <legend class="text-center text-info ">Editar producto <?=$pro->nombre?></legend>
                    </div>
                </div>
                
                <?php $url_action = base_url."producto/save&id=".$pro->id; ?>
                
                 <?php else:?>
                
                <?php $url_action = base_url."producto/save"; ?>
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
                        <legend class="text-center text-success registrarse">Agregar nuevo producto</legend>

                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Ingrese el titulo</span>
                            <div class="col-md-8">
                                <input id="nombre" name="nombre" type="text" placeholder="Titulo" class="form-control" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Seleccione categoría</span>
                            <select name="categoria1" id='Categoria1' onChange="mostrar1()" class=" col-md-8 form-control">
                                    <option>Ganaderia</option>
                                    <option>Agricultura</option>
                                  
                                    </select>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Seleccione Subcategoría</span>
                            
                            <select name="subcategoria" id="Ganaderia" class=" col-md-8 form-control" style='display:none;'>

                                

                                <option value="1">Ganado Bovino</option>

                                <option value="2">Ganado Porcino</option>

                                <option value="2">Ganado ovino y caprino</option>

                                <option value="2">Aves de corral</option>

                            </select>
                            <select name="subcategoria" id="Agricultura" class=" col-md-8 form-control" style='display:none;'>

                                

                                    <option value="1">Raices y tuberculos</option>

                                    <option value="2">Ornamentales y frutales</option>

                            </select>
                            
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Descripción</span>
                            <div class="col-md-4">

                            <textarea class="form-control" rows="3" name="descripcion" placeholder= "" required></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Cantidad</span>
                            <div class="col-md-4">
                                <input id="stock" name="stock" type="text" placeholder="cantidad" class="form-control" required >
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Precio</span>
                            <div class="col-md-4">
                                <input id="precio" name="precio" type="text" placeholder="precio" class="form-control" required >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success">Telefono de contacto</span>
                            <div class="col-md-4">
                                <input id="telefono" name="telefono" type="text" placeholder="telefono" class="form-control" required >
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
            require_once 'models/producto.php';
            $producto= new Producto();
            $productos = $producto->getAll(); 

           $id_user= $_SESSION['identity']->id;
            $productosPorUsuario = $producto->getByUsuario($id_user);
				
        ?>
 <?php if (isset($_SESSION['admin'])): ?>
        <div class="container" id="form_eliminar">

    <div class="row">
        <div class="col">
        <legend class="text-center text-success registrarse">Editar mis productos</legend>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table >
                <tr>
                    <th>TITULO</th>
                    <th>ID</th>
                    
                </tr>
            <?php while ($pro = $productos->fetch_object()):?>
                
                <tr>
                    <td><?=$pro->nombre;?></td>
                    <td><?=$pro->id;?></td>
                   
                    <td>
                      
                    <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>	
                    </td>
                   
                </tr>
            <?php endwhile; ?>	
        </table>
        </div>
    </div>

</div>
  <?php elseif(isset($_SESSION['identity'])): ?>
    <div class="container" id="form_eliminar">

<div class="row">
    <div class="col">
    <legend class="text-center text-success registrarse">Editar mis productos</legend>
    </div>
</div>

<div class="row">
    <div class="col">
    <table >
            <tr>
                <th>TITULO</th>
                <th>ID</th>
                <th>Cambiar estado de producto</th>
                
            </tr>
        <?php while ($pro = $productosPorUsuario->fetch_object()):?>
            
            <tr>
                <td><?=$pro->nombre;?></td>
                <td><?=$pro->id;?></td>
               
                <td>
                  
                <a href="<?=base_url?>producto/eliminar&id=<?=$pro->id?>" class="button button-gestion button-red">Eliminar</a>	
                </td>
                <td>
                 
                <a href="<?=base_url?>producto/vendido&id=<?=$pro->id?>"  class=" button-editar"> <?php echo $pro->estado   ?></a>	
                </td>
            </tr>
        <?php endwhile; ?>	
    </table>
    </div>
</div>

</div>
    
  <?php endif;?>
        




<script type="text/javascript">

function mostrar1(){

valor = document.getElementById("Categoria1").value;

var x = document.getElementsByTagName("SELECT");

var i;

for (i = 0; i < x.length; i++) {

 

    x[i].style.display = 'none';

}

document.getElementById('Categoria1').style.display = 'block';

document.getElementById(valor).style.display = 'block';}



        $(document).ready(function(){ 
          $('.button-estado',this).('click',function(){
            $(this).css('color', 'red');
            $(this).text('vendido');
          });
        });


</script>