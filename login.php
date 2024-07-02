
<?php
require 'includes/app.php';
$db=conectarDB();

$errores=[]; 
 
if($_SERVER['REQUEST_METHOD']==='POST'){
    //var_dump($_POST);

    $email=mysqli_real_escape_string($db, filter_var( $_POST['email'] , FILTER_VALIDATE_EMAIL)) ;
    $password=mysqli_real_escape_string($db,$_POST['password']) ;
    
    if(!$email){
        $errores[]="email es obligatorio o no es valido";
    }
    if(!$password){
        $errores[]="password es obligatorio o no es valido";
    }

    if(empty($errores)){//si errores esta vacio es por que se ingresaron ambos datos
            //ver si usuario existe 
            $query="SELECT * FROM usuario WHERE mail= '{$email}';";//busca mail en db con el usuario ingresado
            $resultado=mysqli_query($db,$query);
            if($resultado->num_rows){
                //Almaceno en usuario los dato de la base
                $usuario=mysqli_fetch_assoc($resultado);
                //comparo con lo ingresado
                $auth=password_verify($password,$usuario['password']);
                //var_dump($auth);
                if($auth){
                    //usuario autenticado
                    session_start();
                    $_SESSION['usuario']=$usuario['mail'];
                    $_SESSION['login']=true;
                    //var_dump($auth);
                    header('location: /bienesraices/admin/index.php');
                     
                }else{
                    $errores[]="El password es incorrecto";
                }
            }else{
                $errores[]="El usuario no existe";
            }
    }
   // var_dump($errores);  
}  

//require 'includes/funciones.php';  
includirTemplate('header' );   
?>
<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesion</h1>
    <div class="alerta error">
        <?php //agregado solo a modo de prueba
         echo " entrar con correo@correo.com 123456";?> 
    </div>
    <form method="POST" class="formulario">
        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?> 
            </div>
        <?php endforeach;?> 
    <fieldset>
                <legend>Email y Password</legend>

                <label for="email">email</label>
                <input type="email" name="email" placeholder="Tu email" id="email">
                
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Tu Password" id="password">
                
           </fieldset>
           <input type="submit" value="iniciar sesion" class="boton boton-verde">
    </form>
</main>
<?php      
    include './includes/templates/footer.php';
?>