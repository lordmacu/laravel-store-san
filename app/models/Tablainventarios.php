<?php

class Tablainventarios extends Eloquent {


protected $table = 'tabla_inventarios';
    protected $primaryKey = 'id';
		
	function inventariosporid($id){
	return $this->where("id_pedido",$id)->get();	
	}
	
}
