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


use Talla; //es la tabla con la que estamos trabajando

class TallasController extends AdminController {


	public function index() {

	
		$tallasmodel = new Talla();
		
		$tallas=$tallasmodel->obtenerdatso();

		// mostrar pagina
		return View::make('backend/tallas/index', compact('tallas'));
	}

	public function getEdit($tallaId = null) {
		// verificar si existe
		if (is_null($talla = Talla::find($tallaId))) {
			// redireccionar al administrador
			return Redirect::to('admin/tallas') -> with('error', Lang::get('message.does_not_exist'));
		}

		// mostrar pagina

		return View::make('backend/tallas/edit', compact('talla'));
	}
	
		public function postEdit($tallaId = null) {
		// verificarsi existe
		if (is_null($talla = Talla::find($tallaId))) {
			// Redireccionar a listar marcas
			return Redirect::to('admin/tallas') -> with('error', Lang::get('message.does_not_exist'));
		}

		// Esta es una validacion
		$rules = array('nombre_talla' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
		);

		// Validar las reglas
		/*$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo
		if ($validator -> fails()) {
			// juemadre algo mal
			return Redirect::back() -> withInput() -> withErrors($validator);
		}*/

		// actualizar datos
		$talla -> nombre_talla = e(Input::get('nombre_talla'));
		// la e()  es para limpiar el string

		// verificar si se actualizo zon exito
		if ($talla -> save()) {
			// mensaje de verificacion qeu si se actualizo
			return Redirect::to("admin/tallas/$tallaId/edit") -> with('success', Lang::get('message.update.success'));
		}

		// juemadre no se actualizo
		return Redirect::to("admin/tallas/$tallaId/edit") -> with('error', Lang::get('message.update.error'));
	}

	public function getCreate() {
		// mostrar la pagina
		return View::make('backend/tallas/create');
	}

	public function postCreate() {

		// declarar las reglas de validacion
		$rules = array('nombre_talla' => 'required|min:3', );

		// crear el validador con las reglas
		/*$validator = Validator::make(Input::all(), $rules);

		// verificar el validador
		if ($validator -> fails()) {
			// juamdre algo mal con el validador
			return Redirect::back() -> withInput() -> withErrors($validator);
		}*/

		// crear la tienda
		$talla = new Talla;

		//  poner los campos en la tabla
		$talla -> nombre_talla = e(Input::get('nombre_talla'));

		//$marca -> user_id = Sentry::getId();

		// guardar los campos
		if ($talla -> save()) {
			// si se creo la cosa
			return Redirect::to("admin/tallas/$talla->id/edit") -> with('success', Lang::get('message.create.success'));
		}

		// no se creo nada mijo
		return Redirect::to('admin/tallas/create') -> with('error', Lang::get('message.create.error'));
	}

	public function getDelete($tallaId) {
		// verificar si existe
		if (is_null($talla = Talla::find($tallaId))) {
		
			// si no existe tira error
			return Redirect::to('admin/tallas') -> with('error', Lang::get('message.not_found'));
		}

		// Borrar coso
		$talla -> delete();
		
		if($talla -> delete()){
		return Redirect::to('admin/tallas') -> with('success', Lang::get('message.delete.success'));
		
		}
			return Redirect::to('admin/tallas') -> with('error', Lang::get('message.delete.error'));
		// Redireccionar coso
	}

}
