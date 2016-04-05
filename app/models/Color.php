<?php

class Color extends Eloquent {

	public function delete()
	{
	//$this->delete()
		return parent::delete();
	}
	
	public function  obtenerdatso(){
			
	return color::orderby('created_at', 'desc') -> paginate(10);
	
		
	}
	public function todoscolores() {
		return $this->lists('nombre_color', 'id','codigo_color');
	}
	
	public function todoscoloreslist() {
		return $this->lists('nombre_color', 'id');
	}
	public function todascoloresmode() {
		return $this->select('nombre_color', 'id')->get();
	}
	
	

	
}
