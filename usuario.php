<?php
//importar la conexion 
    require './includes/config/database.php';
    $bd=conectarDB();
//crear mail y pasword
    $user="correo@correo.com";
    $password="123456";
    $passwordHash=password_hash($password,PASSWORD_BCRYPT); //REQUIERE UN char(60) en la bd

//query para crear usuario 
$query ="INSERT INTO usuario (mail,password) VALUES ('{$user}','{$passwordHash}');";
 

mysqli_query($bd,$query);
//agregar a la bd  
 ?>
