<?php namespace Controllers\Admin;

use AdminController;
use Input;
use Lang;
use Post;
use Redirect;
use Sentry;
use Str;
use Validator;
use View;
use Destacado;
use Producto;
class PaginaController extends AdminController {


public function postDestacados(){
	//dd(Input::all());

if(Input::get("nombre")){
$id=Input::get("nombre");
}

if(Input::get("plu")){
$id=Input::get("plu");
}

$destacadomodel= new Destacado();
$destacadomodel->id_producto=$id;
$destacadomodel->save();
			return Redirect::to('admin/pagina/destacados') -> with('success', "Se ha creado el producto destacado");

}
public function getDestacados(){
	
	$destacadomodel= new Destacado();    
$destacados= $destacadomodel->todosdestacados();

$productomodel= new Producto();
$productoslist=$productomodel->todos();
$porplu=$productomodel->todosplu();
return View::make('backend/pagina/destacados', compact('destacados'))->with("productoslist",$productoslist)->with("porplu",$porplu);
}


}
