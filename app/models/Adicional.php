<?php

class Adicional extends Eloquent {

public function porusuario($id){
	
//	dd($id);  
	return $this->where("id_usuario",$id)->get();
}

	
}
