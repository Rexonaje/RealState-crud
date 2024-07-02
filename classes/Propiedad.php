<?php
namespace App;
//<>
class Propiedad extends ActiveRecord{
    protected static $tabla='propiedades';
    protected static $columnasBD=['id','titulo','precio','imagen','descripcion','habitaciones','wc','estacionamiento','vendedores_id'];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creacion;
    public $vendedores_id;

    public function __construct($args= [])
    {
        $this->id=$args['id'] ?? null;
        $this->titulo=$args['titulo'] ?? '';
        $this->precio=$args['precio'] ?? '';
        $this->imagen=$args['imagen'] ?? 'imagen.jpg';// no lo esta encontrando y las iamgenes no cargan y no se borran 
        $this->descripcion=$args['descripcion'] ?? '';
        $this->habitaciones=$args['habitaciones']?? '';
        $this->wc=$args['wc']?? '';
        $this->estacionamiento=$args['estacionamiento']?? '';
        $this->creacion=date('y/m/d');
        $this->vendedores_id=$args['vendedores_id']?? '';
    }
    
    public function validar(){
        //validacion de errores
        if(!$this->titulo){
           self::$errores[]=' debe añadir titulo';
       }
       if(!$this->precio){
           self::$errores[]='debe especificar un precio';
       }
   
       if(strlen($this->descripcion)<50){
           self::$errores[]='la descripcion debe ser de al menos 50 caracteres';
       }
       if(!$this->habitaciones){
           self::$errores[]='debe especificar cantidad de habitaciones';
       }
       if(!$this->wc){
           self::$errores[]='debe especificar cantidad de baños';
       }
       if(!$this->estacionamiento){
           self::$errores[]='debe especificar cantidad de estacionamientos';
       }
       if(!$this->vendedores_id){
           self::$errores[]='debe elegir vendedor';
       }
        
       if(!$this->imagen){
           self::$errores[]="se necesita una imagen";
       }
      
       return self::$errores;
   }
}