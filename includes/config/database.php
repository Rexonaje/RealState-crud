<?php

function conectarDB() : mysqli{
    $DB=new mysqli('localhost','root','root','bienesraices_crud');

    if(!$DB){
        echo "error de Conexion";
        exit;
    } 
    return $DB;
};