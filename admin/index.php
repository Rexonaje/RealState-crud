<?php    
    require '../includes/app.php'; 
    //importar clases
    estaAutenticado();
    use App\Propiedad;
    use App\Vendedores;

    //implementa un metodo static para obtener todas las props 
    $propiedades= Propiedad::all();
    $vendedores= Vendedores::all();
    

    $_resultado=$_GET['resultado'] ??null;
    
   
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //validar id
            //debugear($_POST);
        $_id= $_POST['id'];
        $_id=filter_var($_id, FILTER_VALIDATE_INT);
        if($_id){
            $tipo=$_POST['tipo'];
            if(validarTipoContenido($tipo)){
                if($tipo=='propiedad'){
                    $propiedad=Propiedad::find($_id);
                    $propiedad->eliminar();
                }
                if($tipo=='vendedor'){
                    $vendedor=Vendedores::find($_id);
                    $vendedor->eliminar();
                }
            }
        }
        
    }


    includirTemplate('header' );   
    /*echo "<pre>";
        var_dump($_resultado);
    echo "</pre>";*/
       

    
?>
    <main class="contenedor seccion">
        <h1>Administrador de bienes raices</h1>

        <a href="/bienesraices/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>
        <a href="/bienesraices/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>
        <?php 
            $mensaje=mostrarNotificaciones(intval($_resultado));//inval convierte string a int
            if($mensaje){ ?>
                <p class="alerta exito"><?php echo sanitizar($mensaje);?>  </p>
            <?php };?>
        <h1>Propiedades</h1>
            <table class="propiedades">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($propiedades as $propiedad): ?>
                    <tr>
                        <th><?php echo $propiedad->id; ?></th>
                        <th><?php echo $propiedad->titulo; ?></th>
                        <th class="propiedades__imagen">
                            <img src="/BIENESRAICES/imagenes/<?php echo $propiedad->imagen; ?>" alt="Propiedad imagen">
                        </th>
                        <th>$<?php echo $propiedad->precio; ?></th>
                        <th>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                                <input type="hidden" name="tipo" value="propiedad">
                                <input  type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="propiedades/actualizar.php?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </th>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>
            <h1>Vendedores</h1>
            <table class="propiedades">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
                            <th>acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($vendedores as $vendedor): ?>
                    <tr>
                        <th><?php echo $vendedor->id; ?></th>
                        <th><?php echo $vendedor->nombre . " ". $vendedor->apellido; ?></th>
                        <th><?php echo $vendedor->telefono; ?></th>
                        <th>
                            <form method="POST" class="w-100">
                                <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                                <input type="hidden" name="tipo" value="vendedor">
                                <input  type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            <a href="vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </th>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
            </table>
    </main>
<?php      
    include '../includes/templates/footer.php';
?>