<?php

class Marca extends Eloquent {

	public function delete()
	{
	//$this->delete()
		return parent::delete();
	}
	
	public function  obtenerdatso(){
			
	return marca::orderby('created_at', 'desc') -> paginate(10);
	
		
	}

	public function todasmarcas() {
		return $this->lists('nombre_marca', 'id');
	}
	
	
	public function todasmarcasmode() {
		return $this->select('nombre_marca', 'id')->get();
	}
	
	
}
