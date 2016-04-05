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


use Marca; //es la tabla con la que estamos trabajando

class MarcasController extends AdminController {


	public function index() {

	
		$marcamodelo = new Marca();
		
		$marcas=$marcamodelo->obtenerdatso();

		// mostrar pagina
		return View::make('backend/marcas/index', compact('marcas'));
	}

	public function getEdit($marcaId = null) {
		// verificar si existe
		if (is_null($marca = Marca::find($marcaId))) {
			// redireccionar al administrador
			return Redirect::to('admin/marcas') -> with('error', Lang::get('message.does_not_exist'));
		}

		// mostrar pagina

		return View::make('backend/marcas/edit', compact('marca'));
	}
	
		public function postEdit($marcaId = null) {
			
			
			if($_FILES["imagenmarca"]["tmp_name"]){
				
		
       				$framework = new Framework(); 
$imagenesamrca=$framework->subirfoto($_FILES["imagenmarca"]);

				}
			
		// verificarsi existe
		if (is_null($marca = Marca::find($marcaId))) {
			// Redireccionar a listar marcas
			return Redirect::to('admin/marcas') -> with('error', Lang::get('message.does_not_exist'));
		}

		// Esta es una validacion
		$rules = array('nombre_marca' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
		);

		// Validar las reglas
		$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo
		if ($validator -> fails()) {
			// juemadre algo mal
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// actualizar datos
		$marca -> nombre_marca = e(Input::get('nombre_marca'));
			if($_FILES["imagenmarca"]["tmp_name"]){		
				$marca -> imagen =	$imagenesamrca["resp"][0];
					}
	
		// la e()  es para limpiar el string

		// verificar si se actualizo zon exito
		if ($marca -> save()) {
			// mensaje de verificacion qeu si se actualizo
			return Redirect::to("admin/marcas/$marcaId/edit") -> with('success', Lang::get('message.update.success'));
		}

		// juemadre no se actualizo
		return Redirect::to("admin/marcas/$marcaId/edit") -> with('error', Lang::get('message.update.error'));
	}

	public function getCreate() {
		// mostrar la pagina
		return View::make('backend/marcas/create');
	}

	public function postCreate() {

		// declarar las reglas de validacion
		$rules = array('nombre_marca' => 'required|min:3', );

if($_FILES["imagenmarca"]["tmp_name"]){
				
		
       				$framework = new Framework(); 
$imagenesamrca=$framework->subirfoto($_FILES["imagenmarca"]);

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
		$marca = new Marca;

		//  poner los campos en la tabla
		$marca -> nombre_marca = e(Input::get('nombre_marca'));
		$marca -> descripcion_marca = e(Input::get('descripcion_marca'));
		$marca -> user_id = Sentry::getId();
	if($_FILES["imagenmarca"]["tmp_name"]){
		
				$marca -> imagen =	$imagenesamrca["resp"][0];
					}
		// guardar los campos
		if ($marca -> save()) {
			// si se creo la cosa
			return Redirect::to("admin/marcas/$marca->id/edit") -> with('success', Lang::get('message.create.success'));
		}

		// no se creo nada mijo
		return Redirect::to('admin/marcas/create') -> with('error', Lang::get('message.create.error'));
	}

	public function getDelete($marcaId) {
		// verificar si existe
		if (is_null($marca = Marca::find($marcaId))) {
		
			// si no existe tira error
			return Redirect::to('admin/marcas') -> with('error', Lang::get('message.not_found'));
		}

		// Borrar coso
		$marca -> delete();
		
		if($marca -> delete()){
		return Redirect::to('admin/marcas') -> with('success', Lang::get('message.delete.success'));
		
		}
			return Redirect::to('admin/marcas') -> with('error', Lang::get('message.delete.error'));
		// Redireccionar coso
	}

}
