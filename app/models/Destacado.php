<?php

class Destacado extends Eloquent {
    protected $table = 'destacados';


public function todosdestacados(){
	return $this->join('productos', 'productos.id', '=', 'destacados.id_producto')->paginate(10);
}

public function destacadoshome(){
	return $this->join('productos', 'productos.id', '=', 'destacados.id_producto')->get();
	
}


}
