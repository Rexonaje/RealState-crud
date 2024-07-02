<?php

require '../../includes/app.php';  
    use App\Propiedad;
    use App\Vendedores;
    use Intervention\Image\ImageManagerStatic as Image;//downgradeada a la -v 2.7 

    estaAutenticado();
    
    
   //consulta para obtenber vendedores
   $vendedores=Vendedores::all();

    //Arreglo con mensaje errores
    $errores=Propiedad::getErrores();
    $propiedad=new Propiedad;//creo el objeto vacio sin () para que el obj exista fuera del scope del if 

    //Ejecuta el codigo despues que el usuario envie el formulario 
    if($_SERVER["REQUEST_METHOD"]==="POST"){
            
        $propiedad=new Propiedad($_POST['propiedad']);
        //debugear($propiedad->id);
        //subida de archivos
        
        //nombre de Imagen
        $nombreImagen=md5(uniqid(rand())) . ".jpg";

        if($_FILES['propiedad']['tmp_name']['imagen']){
            //setear la imagen y rezise
            $Image=Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
            $propiedad->setImage($nombreImagen);
        }


        $errores=$propiedad->validar();
        //si errores esta vacio ejecuta el codigo 
    
        if(empty($errores)){
            
            //crear carpeta imagenes
            if(!is_dir(CARPETA_IMAGENES)){
                mkdir(CARPETA_IMAGENES);
            }
            
            //guarda imagen en el servidor
            $Image->save(CARPETA_IMAGENES . $nombreImagen);


            //guarda imagen en bd;
            $resultado=  $propiedad->guardar();
        
           
        };
        
 }
    
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?> 
            </div>
        <?php endforeach; ?>   
            
        <form action="" class="formulario" method="POST" action=" admin/propiedades/crear.php" enctype="multipart/form-data">
            <?php include '../../includes/templates/formulario_propiedades.php';?>
            <input type="submit" value="Crear propiedad" class="boton boton-verde">
        </form>

    </main>
<?php      
    include '../../includes/templates/footer.php';
?>