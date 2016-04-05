<?php

class ImagenesProducto extends Eloquent {
protected $table = 'imagenes_producto';
    protected $primaryKey = 'id';
	
	
	  public function producto()
    {
              return $this->belongsTo('Producto','id');

       
    }   
	

	public function todasimagenes($idproducto) {
		return $this->select('id', 'url','id')->where("id_producto",$idproducto)->get();
	}
	
	public function delete()
	{
	//$this->delete()
		return parent::delete();
	}

	
}
