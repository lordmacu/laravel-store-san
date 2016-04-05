<?php

class Tienda extends Eloquent {

	public function delete()
	{
	//$this->delete()
		return parent::delete();
	}
	
	public function  obtenerdatso(){
			
	return tienda::orderby('created_at', 'desc') -> paginate(10);
	
		
	}
	
	

	
}
