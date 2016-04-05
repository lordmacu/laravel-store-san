<?php

class Inventario extends Eloquent {
	protected $table = 'inventarios';
	protected $primaryKey = 'id';

	public function obtenerdatso() {
		return $this
		 -> select("productos.nombre_producto", "users.first_name", "inventarios.id_tienda", DB::raw('SUM(inventarios.cantidad) as total')) 
		 -> join('users', 'users.id', '=', 'inventarios.id_tienda')
		 -> join('productos', 'productos.id', '=', 'inventarios.id_producto') 
		 -> groupby('inventarios.id_tienda') 
		 -> orderby('inventarios.created_at', 'desc') -> paginate(10);

	}

	public function datosportienda($tiendaId) {
		return $this -> select("productos.nombre_producto", "productos.precio_producto", "productos.precio_producto_m", "users.first_name", "inventarios.id_tienda", DB::raw('SUM(inventarios.cantidad) as total'), "inventarios.id_producto") -> join('users', 'users.id', '=', 'inventarios.id_tienda') -> join('productos', 'productos.id', '=', 'inventarios.id_producto') -> groupby('inventarios.id_producto') -> where("inventarios.id_tienda", $tiendaId) -> get();

	}

	public function todastiendasporid($id, $producto) {
		return $this -> where("id_tienda", $id) -> where("id_producto", $producto) -> get();
	}

	public function buscarinventarioparametros() {
		$query = Inventario::query();
		$query -> select("id_tienda", DB::raw('SUM(cantidad) as cantidad'), "first_name", "id_producto", "users.last_name");

		if (Input::get("talla") != 0) {
			$query -> where("id_tala", Input::get("talla"));
		}

		if (Input::get("color") != 0) {
			$query -> where("id_color", Input::get("color"));
		}

		$query -> where("id_producto", Input::get("producto"));

		$query -> join('users', 'users.id', '=', 'inventarios.id_tienda');
		$query -> orderby('cantidad', 'desc');
		$query -> groupby('id_tienda');

		return $query -> get();

	}

	public function buscarproducto($producto,$tienda) {
		$query = Inventario::query();
		$query -> select("id_tienda", 'cantidad', "first_name", "id_producto", "users.last_name", "productos.nombre_producto", "inventarios.created_at", "inventarios.comentario", "tallas.nombre_talla", "colors.nombre_color");

		
		$query-> where("id_tienda", $tienda);
		$query-> where("id_producto", $producto);

		$query -> join('users', 'users.id', '=', 'inventarios.id_tienda');
		$query -> join('productos', 'productos.id', '=', 'inventarios.id_producto');
		$query -> join('colors', 'colors.id', '=', 'inventarios.id_color');
		$query -> join('tallas', 'tallas.id', '=', 'inventarios.id_talla');
		$query -> orderby('inventarios.created_at', 'desc');

		return $query -> get();

	}

	public function productosinventario() {
		return $this -> join('users', 'users.id', '=', 'inventarios.id_tienda') -> lists('users.first_name', 'id_tienda');

		//	return $this->where('tipo_cuenta', 1) -> lists('first_name', 'id');

		//return $this->lists('nombre_producto', 'id');

	}

	public function verificarexistencia($tienda, $producto) {
		return $this -> select("cantidad") -> where("id_tienda", $tienda) -> where("id_producto", $producto) -> get();
	}

}
