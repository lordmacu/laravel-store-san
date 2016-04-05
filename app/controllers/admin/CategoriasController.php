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
use Framework;


use Categoriaproductos; //es la tabla con la que estamos trabajando

class CategoriasController extends AdminController {


	public function index() {

	
		$categoriamodel = new Categoriaproductos();
		
		$categorias=$categoriamodel->obtenerdatso();

		// mostrar pagina
		return View::make('backend/categorias/index', compact('categorias'));
	}

	public function getEdit($categoriaid = null) {
		
			
		$categoriamodel= new Categoriaproductos();
		$categorias=$categoriamodel->todasmarcas();
				$categorias[0]="Sin categoria padre";
		
		// verificar si existe
		if (is_null($categoria = Categoriaproductos::find($categoriaid))) {
			// redireccionar al administrador
			return Redirect::to('admin/categoria') -> with('error', Lang::get('message.does_not_exist'));
		}

		// mostrar pagina

		return View::make('backend/categorias/edit', compact('categoria'))->with("categorias",$categorias);;
	}
	
		public function postEdit($categoria = null) {
			
			
			if($_FILES["imagecategoria"]["tmp_name"]){
				
		
       				$framework = new Framework(); 
$imagenesamrca=$framework->subirfoto($_FILES["imagecategoria"]);

				}
			
		// verificarsi existe
		if (is_null($categoria = Categoriaproductos::find($categoria))) {
			// Redireccionar a listar marcas
			return Redirect::to('admin/categoria') -> with('error', Lang::get('message.does_not_exist'));
		}

		// Esta es una validacion
		$rules = array('nombre_categoria' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
		);

		// Validar las reglas
		$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo
		if ($validator -> fails()) {
			// juemadre algo mal
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// actualizar datos
		$categoria -> nombre_categoria = mb_strtoupper(Input::get('nombre_categoria'), 'UTF-8');
		$categoria -> descripcion_categoria = Input::get('descripcion_categoria');
						$categoria -> padre = Input::get('padre');
		
			if($_FILES["imagecategoria"]["tmp_name"]){		
				$categoria -> imagen =	$imagenesamrca["resp"][0];
					}
	
		// la e()  es para limpiar el string

		// verificar si se actualizo zon exito
		if ($categoria -> save()) {
			// mensaje de verificacion qeu si se actualizo
			return Redirect::to("admin/categoria/$categoria->id/edit") -> with('success', Lang::get('message.update.success'));
		}

		// juemadre no se actualizo
		return Redirect::to("admin/categoria/$categoria->id/edit") -> with('error', Lang::get('message.update.error'));
	}

	public function getCreate() {
		// mostrar la pagina
		
		$categoriamodel= new Categoriaproductos();
		$categorias=$categoriamodel->todasmarcas();
		
		
		$categorias[0]="Sin categoria padre";
	//	dd($categorias); 
		
		
		return View::make('backend/categorias/create')->with("categorias",$categorias);
	}
 
	public function postCreate() {
		
		  
		//dd(Input::all());

		// declarar las reglas de validacion
		$rules = array('nombre_categoria' => 'required|min:3', );
if($_FILES["imagecategoria"]["tmp_name"]){
				
		
       				$framework = new Framework(); 
$imagenesamrca=$framework->subirfoto($_FILES["imagecategoria"]);


				}
			//dd($imagenesamrca);

		// crear el validador con las reglas
		$validator = Validator::make(Input::all(), $rules);

		// verificar el validador
		if ($validator -> fails()) {
			// juamdre algo mal con el validador
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// crear la tienda
		$categoria = new Categoriaproductos();

		//  poner los campos en la tabla
		$categoria -> nombre_categoria = mb_strtoupper(Input::get('nombre_categoria'), 'UTF-8');
		$categoria -> descripcion_categoria = Input::get('descripcion_categoria');
		$categoria -> user_id = Sentry::getId();
		
									$categoria -> padre = Input::get('padre');

		
	if($_FILES["imagecategoria"]["tmp_name"]){
		
				$categoria -> imagen =	$imagenesamrca["resp"][0];
					}
		// guardar los campos
		if ($categoria -> save()) {
			// si se creo la cosa
			return Redirect::to("admin/categoria/$categoria->id/edit") -> with('success', Lang::get('message.create.success'));
		}

		// no se creo nada mijo
		return Redirect::to('admin/categoria/create') -> with('error', Lang::get('message.create.error'));
	}

	public function getDelete($marcaId) {
		// verificar si existe
		if (is_null($categoria = Categoriaproductos::find($marcaId))) {
		
			// si no existe tira error
			return Redirect::to('admin/categoria') -> with('error', Lang::get('message.not_found'));
		}

		// Borrar coso
		$categoria -> delete();
	
			return Redirect::to('admin/categoria') -> with('success', Lang::get('message.delete.success'));
		// Redireccionar coso   3052082   3118492403
	}

}
