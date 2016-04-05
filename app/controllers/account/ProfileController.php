<?php namespace Controllers\Account;

use AuthorizedController;
use Input;
use Redirect;
use Sentry;
use Validator;
use View;
use Adicional;

class ProfileController extends AuthorizedController {

	/**
	 * User profile page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Get the user information
		$user = Sentry::getUser();
$adicional= new Adicional();
$info=$adicional->porusuario($user->id);
		// Show the page
		return View::make('frontend/account/profile', compact('user'))->with("adicional",$info[0]);
	}

	/**
	 * User profile form processing page.
	 *
	 * @return Redirect
	 */
	public function postIndex()
	{
		
		// Declare the rules for the form validation
		$rules = array(
			'first_name' => 'required|min:3',
			'last_name'  => 'required|min:3',
		);

		// Create a new validator instance from our validation rules
		$validator = Validator::make(Input::all(), $rules);

		// If validation fails, we'll exit the operation now.
		if ($validator->fails())
		{
			// Ooops.. something went wrong
			return Redirect::back()->withInput()->withErrors($validator);
		}

		// Grab the user
		$user = Sentry::getUser();

		// Update the user information
		$user->first_name = Input::get('first_name');
		$user->last_name  = Input::get('last_name');
		$user->save();


$adicional= new Adicional();
$info=$adicional->porusuario(Sentry::getUser()->id);
$adicional=Adicional::find($info[0]->id);
$adicional->telefono=Input::get('telefono');
$adicional->celular=Input::get('celular');
$adicional->direccion=Input::get('direccion');
$adicional->ciudad=Input::get('ciudad');
$adicional->save();


		// Redirect to the settings page
		return Redirect::route('profile')->with('success', 'Se ha actualizado con éxito');
	}

}
