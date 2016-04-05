<?php

class Medida extends Eloquent {



	public function todasmedidas() {
		return $this->lists('nombre_medida', 'id');
	}
	
}
