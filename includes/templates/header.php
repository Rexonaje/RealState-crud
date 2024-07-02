<?php 
if(!isset($_SESSION)){
    session_start();
}
    
    $auth=$_SESSION['login']??false;
   // var_dump($auth);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="/bienesraices/build/css/app.css">
</head>
<body>
   
<header class="header <?php echo $inicio ? 'inicio':''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices/index.php"><img src="/bienesraices/build/img/logo.svg" alt="Logotipo"></a>
                <div class="mobile-menu">
                    <img src="/bienesraices/build/img/barras.svg" alt="icono-menu-responsive">
                </div>
                <div class="derecha">
                    <img class="dark-mode-btn" src="/bienesraices/build/img/dark-mode.svg" alt="dark-mode-btn ">
                    <nav class="navegacion">
                        <a href="/bienesraices/nosotros.php">Nosotros</a>
                        <a href="/bienesraices/anuncios.php">Anuncios</a>
                        <a href="/bienesraices/blog.php">Blog</a>
                        <a href="/bienesraices/contacto.php">Contacto</a>
                        <?php if($auth):?>
                                <a href="/bienesraices/cerrar-sesion.php">Cerrar Sesion</a>
                                <a href="/bienesraices/admin/index.php">Administrar</a>
                        <?php endif; ?>
                        <?php
                        if(!$auth):?>
                                <a href="/bienesraices/login.php">Iniciar Sesion</a>
                        <?php endif; ?>
                        
                    </nav>
                </div>
                
            </div>
            <?php if($inicio){ ?>
                <h1  >Venta de Casas y Departamentos de lujo</h1>
            <?php }?>
              
            
        </div>
        
    </header>