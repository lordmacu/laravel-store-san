<?php

class Producto extends Eloquent {
	protected $table = 'productos';
	protected $primaryKey = 'id';
	protected $softDelete = true;


public function ultimoshome() {
		return $this -> orderby('created_at', 'desc') -> take(10)->get();
	}


	public function imagenes() {
		return $this -> hasMany('ImagenesProducto', 'id_producto');
	}

	public function similarescategoria($categoria) {
		
		
		//return "%$categoria%";
		return $this->select("principal","nombre_producto","id","precio_producto","precio_producto_m")
		->where("categorias","LIKE","%$categoria%")->take(7)
		->get();
	}
	public function obtenerdatso() {

		return $this -> orderby('created_at', 'desc') -> paginate(10);

	} 
	 
		public function obtenerdatsocustom() {
$query = Producto::query();

if(Input::get("talla")){
	$query->where("tallas","LIKE",'%"'.Input::get("talla").'"%');
}
if(Input::get("materiales")){
	$query->where("material","LIKE",'%"'.Input::get("materiales").'"%');
}
if(Input::get("colores")){
	$query->where("colores","LIKE",'%"'.Input::get("colores").'"%');
}

if(Input::get("categorias")){
	$query->where("categorias","LIKE",'%"'.Input::get("categorias").'"%');
}
if(Input::get("marca")){
	$query->where("marca",Input::get("marca"));
} 
 
if(Input::get("sort")){
	$query-> orderby(Input::get("sort"),Input::get("order"));	
	 
}
return $query-> paginate(Input::get("limit"));

	} 

	public function obtenerdatsoborrados() {

		return $this -> withTrashed() -> orderby('created_at', 'desc') -> paginate(10);

	}

	public function todosporid($id) {
		return $this -> where("id", $id) -> get();
	}

	public function todos() {
		return $this->lists('nombre_producto', 'id');
	}


	public function todosplu() {
		return $this->where("plu_producto", "<>", "") -> lists('plu_producto', 'plu_producto');
	}
	
	public function todospluproducto($plu) {
		return $this 
		-> select("id")
		-> where("plu_producto", $plu)
		-> get();

	
	}
	
	public function productocolores($producto) {
		return $this 
		-> select("colores")
		-> where("id", $producto)
		-> get();
		
	}
	
	public function productotallas($producto) {
		return $this 
		-> select("tallas")
		-> where("id", $producto)
		-> get();
		
	}
	
	public function plucolores($plu) {
		
		return $this 
		-> select("colores")
		-> where("plu_producto", $plu)
		-> get();
		
	}
	
	public function plutallas($plu) {
		return $this 
		-> select("tallas")
		-> where("plu_producto", $plu)
		-> get();
		
	}
		

}
