<?php

use App\Propiedad;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;//downgradeada a la -v 2.7 
    require '../../includes/app.php';  
 
    estaAutenticado();
    //validar url id 
    $id=$_GET['id'];
    $id=filter_var($id,FILTER_VALIDATE_INT);
    if(!$id){
        header('location:  /BIENESRAICES/admin');
    }
    
    
    //al entrar a la pagina el modo es get, cuando uno preciona el boton de submi, el metodo se convierte el post (ya que es el metodo especificado)
    $propiedad=Propiedad::find($id);
    //debugear($propiedad);

    $vendedores=Vendedores::all();

    //arreglo con mensajes de errores
    $errores=Propiedad::getErrores();
   

    //Ejecuta el codigo despues que el usuario envie el formulario 
    if($_SERVER["REQUEST_METHOD"]==="POST"){
  
     //asgnar atributos   
    $args=$_POST['propiedad'];

    $propiedad->sincronizar($args);
    //validar
    $errores=$propiedad->validar();

      //nombre de Imagen
    $nombreImagen=md5(uniqid(rand())) . ".jpg";
        //subir files
    if($_FILES['propiedad']['tmp_name']['imagen']){
        //setear la imagen y rezise
        $Image=Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
        $propiedad->setImage($nombreImagen);
    }
    //si errores esta vacio ejecuta el codigo 
  
    if(empty($errores)){
        if($_FILES['propiedad']['tmp_name']['imagen']){
          $Image->save(CARPETA_IMAGENES . $nombreImagen);
        }
        $propiedad->guardar();
    };
    
 }
   
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?> 
            </div>
        <?php endforeach; ?>   
            
        <form action="" class="formulario" method="POST" enctype="multipart/form-data">
            <?php 
                include("../../includes/templates/formulario_propiedades.php");
            ?>
            <input type="submit" value="Actualizar propiedad" class="boton boton-verde">
        </form>

    </main>
<?php      
    include '../../includes/templates/footer.php';
?>