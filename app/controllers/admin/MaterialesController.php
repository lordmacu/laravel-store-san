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


use Material; //es la tabla con la que estamos trabajando

class MaterialesController extends AdminController {


	public function index() {

	
		$materialmodelo = new Material();
		
		$materiales=$materialmodelo->obtenerdatso();

		// mostrar pagina
		return View::make('backend/materiales/index', compact('materiales'));
	}

	public function getEdit($materialId = null) {
		// verificar si existe
		if (is_null($material = Material::find($materialId))) {
			// redireccionar al administrador
			return Redirect::to('admin/materiales') -> with('error', Lang::get('message.does_not_exist'));
		}

		// mostrar pagina

		return View::make('backend/materiales/edit', compact('material'));
	}
	
		public function postEdit($materialId = null) {
		// verificarsi existe
		if (is_null($material = Material::find($materialId))) {
			// Redireccionar a listar marcas
			return Redirect::to('admin/materiales') -> with('error', Lang::get('message.does_not_exist'));
		}

		// Esta es una validacion
		$rules = array('nombre_material' => 'required|min:3', // el nombre de la tienda tiene que tener minimo tres letras
		);

		// Validar las reglas
		$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo
		if ($validator -> fails()) {
			// juemadre algo mal
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// actualizar datos
		$material -> nombre_material = e(Input::get('nombre_material'));
		// la e()  es para limpiar el string

		// verificar si se actualizo zon exito
		if ($material -> save()) {
			// mensaje de verificacion qeu si se actualizo
			return Redirect::to("admin/materiales/$materialId/edit") -> with('success', Lang::get('message.update.success'));
		}

		// juemadre no se actualizo
		return Redirect::to("admin/materiales/$materialId/edit") -> with('error', Lang::get('message.update.error'));
	}

	public function getCreate() {
		// mostrar la pagina
		return View::make('backend/materiales/create');
	}

	public function postCreate() {

		// declarar las reglas de validacion
		$rules = array('nombre_material' => 'required|min:3', );

		// crear el validador con las reglas
		$validator = Validator::make(Input::all(), $rules);

		// verificar el validador
		if ($validator -> fails()) {
			// juamdre algo mal con el validador
			return Redirect::back() -> withInput() -> withErrors($validator);
		}

		// crear la tienda
		$material = new Material;

		//  poner los campos en la tabla
		$material -> nombre_material = e(Input::get('nombre_material'));
		/*$marca -> descripcion_marca = e(Input::get('descripcion_marca'));
		$marca -> user_id = Sentry::getId();*/

		// guardar los campos
		if ($material -> save()) {
			// si se creo la cosa
			return Redirect::to("admin/materiales/$material->id/edit") -> with('success', Lang::get('message.create.success'));
		}

		// no se creo nada mijo
		return Redirect::to('admin/materiales/create') -> with('error', Lang::get('message.create.error'));
	}

	public function getDelete($materialId) {
		// verificar si existe
		if (is_null($material = Material::find($materialId))) {
		
			// si no existe tira error
			return Redirect::to('admin/materiales') -> with('error', Lang::get('message.not_found'));
		}

		// Borrar coso
		$material -> delete();
		
		if($material -> delete()){
		return Redirect::to('admin/materiales') -> with('success', Lang::get('message.delete.success'));
		
		}
			return Redirect::to('admin/materiales') -> with('error', Lang::get('message.delete.error'));
		// Redireccionar coso
	}

}
