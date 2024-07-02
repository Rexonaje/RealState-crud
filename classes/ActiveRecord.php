<?php
 namespace App;

use GuzzleHttp\Psr7\Query;

 class ActiveRecord{
    protected static $db;
    protected static $columnasBD=[];

    protected static $tabla='';
    //errores
    protected static $errores=[];


    
    
   
    public static function setDB($database){
        self::$db=$database;
    }

    public function guardar(){
        if(!is_null($this->id)){
            //actualizando
            $this->actualizar();
        }
        else{
            //creando
            $this->crear();
        }
    }
    public function crear(){
        $atributos=$this->sanitizado();
 
        $query="INSERT INTO " . static::$tabla ." (";
        $query .=join(',' ,array_keys($atributos));
        $query .=" ) VALUES ('";
        $query .=join("','" ,array_values($atributos));
        $query .= "') ";

       
       //debugear($query);

        $resultado=self::$db->query($query);
        if($resultado){
            //redireccionar al user para evitar entradas duplicadas
            header('location: /BIENESRAICES/admin?resultado=1'); 
            }
    }
    public function actualizar(){
        $atributos= $this->sanitizado();
        $valores=[];//va a memoria y une atributos con valores
                               //key  y valores del arreglo
        foreach($atributos as $key => $value){
            $valores[]="{$key}='{$value}'";
        }
        $query="UPDATE ". static::$tabla ." SET ";
        $query.=join(',',$valores);
        $query .=" WHERE id='" . self::$db->escape_string( $this->id) . "'";
        $query .="LIMIT 1";

        $resultado =self::$db->query($query);
        if($resultado){
            //redireccionar al user para evitar entradas duplicadas
            header('location: /BIENESRAICES/admin?resultado=2'); 
          }
    }
    public function atributos(){
      $atributos=[];
        foreach(static::$columnasBD as $columna){
            if($columna==='id')continue;
           $atributos[$columna]=$this->$columna;
        }
      return $atributos;
    }
    public function eliminar(){
        $query="DELETE FROM ". static::$tabla . " WHERE id= ". self::$db->escape_string($this->id) . " LIMIT 1";
       
        $resultado=self::$db->query($query);
        if($resultado){
            //redireccionar al user para evitar entradas duplicadas
        $this->borrarImagen();
            header('location: /BIENESRAICES/admin?resultado=3'); 
          }
    }
    public function sanitizado(){
        $atributos=$this->atributos();
        $sanitizado=[];
        foreach($atributos as $key =>$value){
           $sanitizado[$key]=self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    public function setImage($image){
        //eliminar archivo previo
       $this->borrarImagen();

        if($image){

            $this->imagen=$image;
        }
    }
    public function borrarImagen(){
        if(!is_null($this->id)){//si hay id es por que estamos editando, sino estamos creando//isset revisa que exista
            if(file_exists(CARPETA_IMAGENES . $this->imagen)){//si existe la imagen previa
                unlink(CARPETA_IMAGENES . $this->imagen);//entonces la elimina
            }
        }
    }
    //validar
    public static function getErrores(){
        return static::$errores;
    }
    public function validar(){
      static::$errores=[];
        return static::$errores;
    }
    public static function all(){
        $query="SELECT  * FROM ". static::$tabla;
        $resultado=self::consultarSql($query);
        return $resultado;
        
    }
    //obtiene una cantidad determinada de registro
    public static function get($cantidad){
        $query="SELECT  * FROM ". static::$tabla . " LIMIT " . $cantidad;
        $resultado=self::consultarSql($query);
        return $resultado;
    }
    


    //buscar un registro por su id
    public static function find($id){
        $query="SELECT * From ". static::$tabla ." WHERE id={$id}";
        $resultado=self::consultarSql($query);
        return array_shift($resultado);//arrayshift devuelve el primer elemento del arreglo
    }

    public static function consultarSql($query){
        //consultar base
        $resultado=self::$db->query($query);
        //iterar resultado
        $array=[];
        while($registro=$resultado->fetch_assoc()){
            $array[]=static::crearObj($registro);
        }
        //liberar memoria 
        $resultado->free();
        //retornar resultado
        return $array;
    }
    public static function crearObj($registro){
        $obj=new static;
        foreach ($registro as $key =>$value){
            //compara si el objeto tiene un parametro igual a key 
            if(property_exists($obj, $key)){
                //asigna el valor de key al objeto 
                $obj->$key=$value;
            }
        }
        return $obj;
    }
    //sincronizar obj en memoria con los cambios realizados por usuario
    public function sincronizar($args=[]){
       foreach($args as $key =>$value){
        if(property_exists($this,$key) && !is_null($value)){//compara los datos del objeto prop con los del arreglo 
            $this->$key=$value;//this tiene la variable del obj actual
        }
       }
    }  
 }
?>