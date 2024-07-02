<?php

require '../../includes/app.php';  
use App\Vendedores;
estaAutenticado();
//validar que sea un id correcto 
$id= $_GET['id'];
$id=filter_var($id,FILTER_VALIDATE_INT);

if(!$id){
    header('Location: /admin');
}
    
    //obtener arreglo del vendedor
$vendedor= Vendedores::find($id);
//debugear($vendedor);
    //arrreglo de errores
$errores=Vendedores::getErrores();
    
    //Ejecuta el codigo despues que el usuario envie el formulario 
if($_SERVER["REQUEST_METHOD"]==="POST"){
    //asignar valores    
    $args=$_POST['vendedor'];
    //sincronizar valores escritos con valores en obj en memoria
    $vendedor->sincronizar($args);
    //validar
    $errores=$vendedor->validar();
    if(empty($errores)){
        $vendedor->guardar();
    }    
 }
    
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
        <h1>Actualizar Vendedor/a</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?> 
            </div>
        <?php endforeach; ?>   
            
        <form action="" class="formulario" method="POST" action=" admin/vendedores/actualizar.php" >
            <?php include '../../includes/templates/formulario_vendedores.php';?>
            <input type="submit" value="Guardar Cambios" class="boton boton-verde">
        </form>

    </main>
<?php      
    include '../../includes/templates/footer.php';
?>