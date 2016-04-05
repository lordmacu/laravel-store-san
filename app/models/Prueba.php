<?php

class Prueba extends Eloquent {
         protected $table = 'pruebas';
         protected $primaryKey = 'id';
        
         public function traertodos($id){
           return  $this->where("id",$id)->get();
        }

        public function insertarnombre(){
           
             $this->nombre="joselito";
             $this->apellido="carnaval";
              return $this->save();
           
             
        }
}
