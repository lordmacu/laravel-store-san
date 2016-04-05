<?php

class Categoriaproductos extends Eloquent {

	
	public function  categoriasproducto(){
			
return $this->where("estado",1)->get();
	
		
	}
	
		public function  categoriasproductoporpadre($id){
			
return $this->where("padre",$id)->get();
	
	}
		
	public function  categoriasproductopadre($id){
			
return $this->where("padre",$id)->get();
	
	}
		public function  categoriasproductosinpadre($id){
			
return $this->where("padre","<>",0)->get();
	
		
	}

	public function todasmarcas() {
		return $this->where("padre","0")->lists('nombre_categoria', 'id');
	}

	public function  obtenerdatso(){
			
	return Categoriaproductos::orderby('created_at', 'desc')->get();
	
		
	} 
}
