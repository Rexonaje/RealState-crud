<?php
//APP.PHP MANEJA AHORA FUNCIONES, BASE DE DATOS Y CLASSES
require 'funciones.php';//FUNCIONES
require 'config/database.php';//BD
require __DIR__ . "/../vendor/autoload.php";//CLASES

use App\ActiveRecord;

$bd=conectarDB();
ActiveRecord::setDB($bd);
//$propiedad=new Propiedad;

//var_dump($propiedad);