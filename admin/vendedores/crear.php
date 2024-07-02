<?php

require '../../includes/app.php';  

    use App\Vendedores;
     

    estaAutenticado();
    
    
    //consulta para obtenber vendedores
    $vendedor=new vendedores;
    //arrreglo de errores
    $errores=vendedores::getErrores();
    
    //Ejecuta el codigo despues que el usuario envie el formulario 
    if($_SERVER["REQUEST_METHOD"]==="POST"){
 
        //debugear($_POST);
        //crea objeto vendedor una vez enviado el formulario, se le pasa el array dentro del post para llenar los parametros con datos
        $vendedor=new Vendedores($_POST['vendedor']); 
        //debugear($vendedor);
        //validacion retorna array de errores
        $errores=$vendedor->validar();
        //si no hay errores metodo guardar 
        if(empty($errores)){
            $vendedor->guardar();
        }

 }
    
       
    includirTemplate('header' );   
    
?>
    <main class="contenedor seccion">
        <h1>Registrar Vendedor/a</h1>

        <a href="/bienesraices/admin/index.php" class="boton boton-verde">Volver</a>
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error;?> 
            </div>
        <?php endforeach; ?>   
            
        <form action="" class="formulario" method="POST" action=" admin/vendedores/crear.php" >
            <?php include '../../includes/templates/formulario_vendedores.php';?>
            <input type="submit" value="Registrar vendedor" class="boton boton-verde">
        </form>

    </main>
<?php      
    include '../../includes/templates/footer.php';
?>