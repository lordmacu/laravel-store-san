<?php

namespace Controllers\Admin;
use AdminController;
use Input;
use Lang;



use Redirect;
use Sentry;
use Str;
use Validator;
use View;
use Producto;


use Tienda; //es la tabla con la que estamos trabajando
use Inventario;
use Color;
use Talla;
use User;

class TiendasController extends AdminController {


public function index() {

$inventariomodelo = new Inventario();

$tiendas=$inventariomodelo->obtenerdatso();

//dd($tiendas);
return View::make('backend/tiendas/index', compact('tiendas'));
}

public function getEdit($tiendaId = null) {

$inventariomodelo = new Inventario();

$tienda=$inventariomodelo->datosportienda($tiendaId);

$nombre_tienda=$tienda[0]["first_name"];


return View::make('backend/tiendas/edit', compact('tienda'))-> with("nombre_tienda",$nombre_tienda);
}

public function addEdit($tiendaId = null) {

$inventariomodelo = new Inventario();


$tienda=$inventariomodelo->datosportienda($tiendaId);

$nombre_tienda=$tienda[0]["first_name"];
$codigo_tienda=$tienda[0]["id_tienda"];



$productomodel= new Producto();

$productos=	$productomodel->todos();
$productos["selector"]="Seleccione un producto";


$plus=	$productomodel->todosplu();

$plus["selector"]="Seleccione un plu";

$colormodel= new Color();

$colores=	$colormodel->todoscolores();
$colores["selector"]="Seleccione un color";


$tallamodel= new Talla();

$tallas=$tallamodel->todastallas();
$tallas["selector"]="Seleccione una talla";



$usermodel= new User();


$inventarios=$usermodel->todogs();

$inventarios["selector"]="Seleccione una tienda";


// mostrar la pagina
return View::make('backend/tiendas/addinventario')
-> with("productos",$productos)
-> with("plus",$plus)
-> with("inventarios",$inventarios)
-> with("tienda",$nombre_tienda)
-> with("cod_tienda",$codigo_tienda);


}


public function buscarproductotienda($tiendaId = null,$productoId = null){


		$inventario= new Inventario();
		$inventariotodo=$inventario->buscarproducto($productoId,$tiendaId);
		
		$tienda=$inventario->datosportienda($tiendaId);

		$nombre_tienda=$tienda[0]["first_name"];
		
	
	
		
		return View::make('backend/tiendas/productostienda')
		-> with("inventarios",$inventariotodo)
		-> with("nombre_tienda",$nombre_tienda);
		
	
}

public function verificarcombos() {


$producto=$_POST["producto"];

$productomodelo = new Producto();

$coloresproductos=$productomodelo->productocolores($producto);


$tallasproductos=$productomodelo->productotallas($producto);


	$arraytotal = array();
		
		$coloresjson = json_decode($coloresproductos[0]->colores);
		if (count($coloresjson) != 0) {
			foreach ($coloresjson as $key => $value) {
			
				$coloresdatos = Color::find($value);
                 if(count($coloresdatos)!=0){
				$arraytotal["colores"][$key]["id"] = $coloresdatos -> id;
				$arraytotal["colores"][$key]["text"] = $coloresdatos -> nombre_color;
									 
                                 }
			}
		}
	
		
		$tallasjson = json_decode($tallasproductos[0]->tallas);
		if (count($tallasjson) != 0) {
			foreach ($tallasjson as $key => $value) {
			
				$tallasdatos = Talla::find($value);
                 if(count($tallasdatos)!=0){
				$arraytotal["tallas"][$key]["id"] = $tallasdatos -> id;
				$arraytotal["tallas"][$key]["text"] = $tallasdatos -> nombre_talla;
									 
                                 }
			}
		}
		
echo json_encode($arraytotal);


}


public function verificarcombosplu() {


$plu=$_POST["plu"];



$productomodelo = new Producto();

$coloresproductos=$productomodelo->plucolores($plu);


$tallasproductos=$productomodelo->plutallas($plu);


	$arraytotal = array();
		
		$coloresjson = json_decode($coloresproductos[0]->colores);
		if (count($coloresjson) != 0) {
			foreach ($coloresjson as $key => $value) {
			
				$coloresdatos = Color::find($value);
                 if(count($coloresdatos)!=0){
				$arraytotal["colores"][$key]["id"] = $coloresdatos -> id;
				$arraytotal["colores"][$key]["text"] = $coloresdatos -> nombre_color;
									 
                                 }
			}
		}
	
		
		$tallasjson = json_decode($tallasproductos[0]->tallas);
		if (count($tallasjson) != 0) {
			foreach ($tallasjson as $key => $value) {
			
				$tallasdatos = Talla::find($value);
                 if(count($tallasdatos)!=0){
				$arraytotal["tallas"][$key]["id"] = $tallasdatos -> id;
				$arraytotal["tallas"][$key]["text"] = $tallasdatos -> nombre_talla;
									 
                                 }
			}
		}
		
echo json_encode($arraytotal);


}



public function postEdit($tiendaId = null) {
// verificarsi existe
if (is_null($tienda = Tienda::find($tiendaId))) {
// Redireccionar a listar tiendas
return Redirect::to('admin/tiendas') -> with('error', Lang::get('message.does_not_exist'));
}

// Esta es una validacion
$rules = array('nombre_tienda' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
);

// Validar las reglas
$validator = Validator::make(Input::all(), $rules);

//  verificar si la validacion se hizo
if ($validator -> fails()) {
// juemadre algo mal
return Redirect::back() -> withInput() -> withErrors($validator);
}

// actualizar datos
$tienda -> nombre_tienda = e(Input::get('nombre_tienda'));
// la e()  es para limpiar el string

// verificar si se actualizo zon exito
if ($tienda -> save()) {
// mensaje de verificacion qeu si se actualizo
return Redirect::to("admin/tiendas/$tiendaId/edit") -> with('success', Lang::get('message.update.success'));
}

// juemadre no se actualizo
return Redirect::to("admin/tiendas/$tiendaId/edit") -> with('error', Lang::get('message.update.error'));
}

public function getCreate() {




$productomodel= new Producto();

$productos=	$productomodel->todos();
$productos["selector"]="Seleccione un producto";

$plus=	$productomodel->todosplu();
$plus["selector"]="Seleccione un plu";

$colormodel= new Color();

$colores=	$colormodel->todoscolores();
$colores["selector"]="Seleccione un color";


$tallamodel= new Talla();

$tallas=$tallamodel->todastallas();
$tallas["selector"]="Seleccione una talla";



$usermodel= new User();


$inventarios=$usermodel->todogs();

$inventarios["selector"]="Seleccione una tienda";


// mostrar la pagina
return View::make('backend/tiendas/create')
-> with("productos",$productos)
-> with("plus",$plus)
-> with("inventarios",$inventarios);


}

public function postCreate() {



$productomodel= new Producto();
$inventario = new Inventario;

$inventario -> id_tienda = e(Input::get('codigo_tienda'));


$plu=$_POST["plu_producto"];

if($plu!="selector"){

	$productos=	$productomodel->todospluproducto($plu);
		
	$inventario -> id_producto = $productos[0]["id"];

	
}else{
		
$inventario -> id_producto = e(Input::get('codigo_producto'));
}


$inventario -> id_color = e(Input::get('codigo_color1'));
$inventario -> id_talla = e(Input::get('codigo_tallas'));
$inventario -> cantidad = e(Input::get('cantidad'));
$inventario -> comentario = e(Input::get('comentarios'));

$inventario -> user_id = Sentry::getId();


if ($inventario -> save()) {

return Redirect::to("admin/tiendas") -> with('success', Lang::get('message.create.success'));
}

return Redirect::to('admin/tiendas') -> with('error', Lang::get('message.create.error'));
}




public function getDelete($tiendaId) {
// verificar si existe
if (is_null($tienda = Tienda::find($tiendaId))) {
// si no existe tira error
return Redirect::to('admin/tiendas') -> with('error', Lang::get('message.not_found'));
}

// Borrar coso
$tienda -> delete();

if($tienda -> delete()){
return Redirect::to('admin/tiendas') -> with('success', Lang::get('message.delete.success'));

}
return Redirect::to('admin/tiendas') -> with('error', Lang::get('message.delete.error'));
// Redireccionar coso
}

}