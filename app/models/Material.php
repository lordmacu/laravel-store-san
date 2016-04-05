<?php

class Material extends Eloquent {

	public function delete()
	{
	//$this->delete()
		return parent::delete();
	}
	
	public function  obtenerdatso(){
			
	return material::orderby('created_at', 'desc') -> paginate(10);
	
		
	}
	public function todasmaterial() {
		return $this->lists('nombre_material', 'id');
	}
	
	
	public function todasmaterialesmode() {
		return $this->select('nombre_material', 'id')->get();
	}
	

}
