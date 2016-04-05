<?php

class Noticia extends Eloquent {


public function getnoticias($id){
	return $this
	->where("id_cantidato","=",$id)
	->get();
}

	
}
 