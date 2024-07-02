<?php
namespace App;
use App\ActiveRecord;

    class Vendedores extends ActiveRecord{
        protected static $tabla='vendedores';
        protected static $columnasBD=['id','nombre','apellido','telefono'];

        public $id;
        public $nombre;
        public $apellido;
        public $telefono;
        public function __construct($args= [])
        {
            $this->id=$args['id'] ?? null;
            $this->nombre=$args['nombre'] ?? '';
            $this->apellido=$args['apellido'] ?? '';
            $this->telefono=$args['telefono'] ?? '';
            
        }
        public function validar(){
            //validacion de errores
            if(!$this->nombre){
               self::$errores[]=' Debe añadir nombre';
            }
            if(!$this->apellido){
               self::$errores[]=' Debe añadir apellido';
            }
            if(!$this->telefono){
            self::$errores[]=' Debe añadir Telefono';
            }
            if(!preg_match('/[0-9]{10}/',$this->telefono)){
                self::$errores[]='Formato Invalido';
            }
            return self::$errores;
        }
    }
?> 