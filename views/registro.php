<div class="container">
    <div class="row">
        <div class="col-12">
        <legend class="text-center text-success registrarse">Gestión de usuarios</legend>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
        <button type="button" class="btn btn-success" onclick=mostrar()>Agregar </button>
        <button type="button" class="btn btn-danger" onclick=ocultar()>Eliminar</button>
        </div>
    </div>
</div>



<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="well well-sm">
            <?php if (isset($_SESSION['register']) && $_SESSION['register'] == 'complete'): ?>
            <strong id="alert_green">El registro fue completado exitosamente</strong>
            <?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
            <strong id="alert_red">Registro fallido, ingresa bien los datos</strong>
            <?php endif; ?>
            <?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'): ?>
            <strong id="alert_red">Se elimino el usuario exitosamente</strong>
            <?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] == 'failed'): ?>
            <strong id="alert_red">No se pudo eliminar el usuario</strong>
            <?php endif; ?>
            <?php Utils::deleteSession('register'); ?>
                <form action= "<?=base_url?>usuario/save" id ="form_crear"class="form-horizontal" method="POST">
                    <fieldset>
                        <legend class="text-center text-success registrarse">Registro</legend>

                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="name" name="nombre" type="text" placeholder="Nombre" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center text-success"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="email" placeholder="Email " class="form-control" required>
                            </div>
                        </div>

                         <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success"><i class="fas fa-lock bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="password" type="password" placeholder="Contraseña" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group ">
                            <span class="col-md-1 col-md-offset-2 text-center text-success"><i class="fas fa-lock bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="password" name="codigo" type="password" placeholder="Código de afiliado" class="form-control" required>
                            </div>
                        </div>


                        <div class="form-group ">
                            <div class="col-md-12 text-center text-success">
                                <button type="submit" class="btn btn-success btn-lg">Registrarse</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>



<?php 
            require_once 'models/usuario.php';
            $usuario= new Usuario();
            $usuarios = $usuario->getAll(); 
				
		?>

<div class="container" id="form_eliminar">

    <div class="row">
        <div class="col">
        <legend class="text-center text-success registrarse">Eliminar Usuarios</legend>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <table >
                <tr>
                    <th>Nombre</th>
                    <th>Id</th>
                    
                </tr>
            <?php while ($usu = $usuarios->fetch_object()):?>
                
                <tr>
                    <td><?=$usu->nombre;?></td>
                    <td><?=$usu->id;?></td>
                   
                    <td>
                      
                    <a href="<?=base_url?>usuario/eliminar&id_user=<?=$usu->id?>" class="button button-gestion button-red">Eliminar</a>	
                    </td>
                </tr>
            <?php endwhile; ?>	
        </table>
        </div>
    </div>

</div>