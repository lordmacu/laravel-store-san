<?php

class Like extends Eloquent {
protected $table = 'like';
	protected $primaryKey = 'id';

public function likes($id,$tipo){
	return $this
	->where("id_cantidato",$id)
	->where("tipo",$tipo)->sum('valor');
}
 
public function voto($id,$idcandidato){
		

	return $this
	->select("id")
	->where("iddispositivo","LIKE","%".$id."%")
	->where("id_cantidato",$idcandidato)
	->get();
}
	
}
