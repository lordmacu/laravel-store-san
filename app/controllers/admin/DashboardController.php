<?php namespace Controllers\Admin;

use AdminController;
use View;
use User;

class DashboardController extends AdminController {

	/**
	 * Show the administration dashboard page.
	 *
	 * @return View
	 */
	public function getIndex()
	{
		// Show the page
		
		$usuarios= User::all();
		return View::make('backend/dashboard')->with("usuarios",$usuarios);
	}

}
