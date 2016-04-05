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


use Color; //es la tabla con la que estamos trabajando

class ColoresController extends AdminController {


	public function index() {

	
		$colormodelo = new Color();

		
		$colores=$colormodelo->obtenerdatso();
		// mostrar pagina
		return View::make('backend/colores/index', compact('colores'));
	}

	
	public function getEdit($colorId = null) {
		// verificar si existe

		if (is_null($color = Color::find($colorId))) {
			// redireccionar al administrador			
			
		return Redirect::to('admin/colores') -> with('error', Lang::get('message.does_not_exist'));
		}
		// mostrar pagina
		
		$colormodel= new Color();
		$colores= $colormodel->todoscolores();
		
		

		return View::make('backend/colores/edit', compact('color'))->with("colores",$colores);
		
	}
	
		public function postEdit($colorId = null) {
		// verificarsi existe
		if (is_null($color = Color::find($colorId))) {
			
			

			// Redireccionar a listar marcas
			return Redirect::to('admin/colores') -> with('error', Lang::get('message.does_not_exist'));
		}

		// Esta es una validacion
		$rules = array('nombre_color' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
		);

		// Validar las reglas
		$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo
		if ($validator -> fails()) {
			// juemadre algo mal
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// actualizar datos
		$color -> nombre_color = e(Input::get('nombre_color'));
		// la e()  es para limpiar el string

		// verificar si se actualizo zon exito
		if ($color -> save()) {
			// mensaje de verificacion qeu si se actualizo
			return Redirect::to("admin/colores/$colorId/edit") -> with('success', Lang::get('message.update.success'));
		}

		// juemadre no se actualizo
		return Redirect::to("admin/colores/$colorId/edit") -> with('error', Lang::get('message.update.error'));
	}

	public function getCreate() {
		// mostrar la pagina
		return View::make('backend/colores/create');
	}

	public function postCreate() {

		// declarar las reglas de validacion
		$rules = array('nombre_color' => 'required|min:3', );

		// crear el validador con las reglas
		$validator = Validator::make(Input::all(), $rules);

		// verificar el validador
		if ($validator -> fails()) {
			// juamdre algo mal con el validador
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// crear la tienda
		$color = new Color;

		//  poner los campos en la tabla
		$color -> nombre_color = e(Input::get('nombre_color'));
		$color -> codigo_color = e(Input::get('codigo_color'));
		//$marca -> user_id = Sentry::getId();

		// guardar los campos
		if ($color -> save()) {
			// si se creo la cosa
			return Redirect::to("admin/colores/$color->id/edit") -> with('success', Lang::get('message.create.success'));
		}

		// no se creo nada mijo
		return Redirect::to('admin/colores/create') -> with('error', Lang::get('message.create.error'));
	}

	public function getDelete($colorId) {
		// verificar si existe
		if (is_null($color = Color::find($colorId))) {
		
			// si no existe tira error
			return Redirect::to('admin/colores') -> with('error', Lang::get('message.not_found'));
		}

		// Borrar coso
		$color -> delete();
		
		if($color -> delete()){
		return Redirect::to('admin/colores') -> with('success', Lang::get('message.delete.success'));
		
		}
			return Redirect::to('admin/colores') -> with('error', Lang::get('message.delete.error'));
		// Redireccionar coso
	}

}
