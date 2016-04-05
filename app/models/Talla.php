<?php

class Talla extends Eloquent {



	public function todastallas() {
		return $this->lists('nombre_talla', 'id');
	}
	
	
	public function todastallasmode() {
		return $this->select('nombre_talla', 'id')->get();
	}
	
	public function  obtenerdatso(){
			
	return talla::orderby('created_at', 'desc') -> paginate(10);
	
		
	}
	
}
