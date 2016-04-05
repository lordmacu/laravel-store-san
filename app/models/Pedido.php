<?php

class Pedido extends Eloquent {

public function pedidoporusuario(){
	return $this
	->where("id_usuario",Sentry::getUser()->id)
	            ->join('productos', 'productos.id', '=', 'pedidos.id_producto')
	
	->get();
}


	public function  obtenerdatso(){
		
	
		return $this 
		-> select("productos.nombre_producto", "users.first_name","pedidos.id","pedidos.id_usuario")
		-> join('users', 'users.id', '=', 'pedidos.id_usuario')
		-> join('productos', 'productos.id', '=', 'pedidos.id_producto')
		-> groupby('pedidos.id_usuario')
		-> where("pedidos.estado", 1)
		-> orderby('pedidos.created_at', 'desc')-> paginate(10);
	
		
	}
	
	
		public function datosporusuario($usuarioId) {
		return $this 
		-> select("pedidos.id","colors.nombre_color","tallas.nombre_talla","pedidos.id as coso","pedidos.id_producto","pedidos.color","pedidos.talla","productos.nombre_producto","productos.precio_producto","productos.precio_producto_m","pedidos.id_usuario","pedidos.cantidad")
		//-> join('users', 'users.id', '=', 'pedidos.id_usuario')
		-> join('productos', 'productos.id', '=', 'pedidos.id_producto')
		-> join('tallas', 'tallas.id', '=', 'pedidos.talla')
		-> join('colors', 'colors.id', '=', 'pedidos.color')
		-> where("pedidos.id_usuario", $usuarioId) -> get();
		
	}
		
	
		
	
	
}
