<?php

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Register all the admin routes.
|
*/

Route::group(array('prefix' => 'admin'), function()
{

	# Blog Management
	
		Route::group(array('prefix' => 'pagina'), function()
	{
		Route::get('destacados', array('as' => 'destacados', 'uses' => 'Controllers\Admin\PaginaController@getDestacados'));
	    Route::post('destacados', 'Controllers\Admin\PaginaController@postDestacados');

	/*	Route::get('/', array('as' => 'productos', 'uses' => 'Controllers\Admin\ProductosController@getIndex'));
		Route::get('create', array('as' => 'create/productos', 'uses' => 'Controllers\Admin\ProductosController@getCreate'));
	    Route::post('create', 'Controllers\Admin\ProductosController@postCreate');
		Route::get('{idProducto}/edit', array('as' => 'update/productos', 'uses' => 'Controllers\Admin\ProductosController@getEdit'));
		Route::post('{idProducto}/edit', 'Controllers\Admin\ProductosController@postEdit');
		Route::get('{blogId}/delete', array('as' => 'delete/productos', 'uses' => 'Controllers\Admin\ProductosController@getDelete'));
	Route::get('{blogId}/restore', array('as' => 'restore/productos', 'uses' => 'Controllers\Admin\ProductosController@getRestore'));
	 * */
	});
	
	
	
		Route::group(array('prefix' => 'productos'), function()
	{

		Route::get('/', array('as' => 'productos', 'uses' => 'Controllers\Admin\ProductosController@getIndex'));
		Route::get('create', array('as' => 'create/productos', 'uses' => 'Controllers\Admin\ProductosController@getCreate'));
	    Route::post('create', 'Controllers\Admin\ProductosController@postCreate');
		Route::get('{idProducto}/edit', array('as' => 'update/productos', 'uses' => 'Controllers\Admin\ProductosController@getEdit'));
		Route::post('{idProducto}/edit', 'Controllers\Admin\ProductosController@postEdit');
		Route::get('{blogId}/delete', array('as' => 'delete/productos', 'uses' => 'Controllers\Admin\ProductosController@getDelete'));
	Route::get('{blogId}/restore', array('as' => 'restore/productos', 'uses' => 'Controllers\Admin\ProductosController@getRestore'));
	});
	
	Route::group(array('prefix' => 'blogs'), function()
	{

		Route::get('/', array('as' => 'blogs', 'uses' => 'Controllers\Admin\BlogsController@getIndex'));
		Route::get('create', array('as' => 'create/blog', 'uses' => 'Controllers\Admin\BlogsController@getCreate'));
		Route::post('create', 'Controllers\Admin\BlogsController@postCreate');
		Route::get('{blogId}/edit', array('as' => 'update/blog', 'uses' => 'Controllers\Admin\BlogsController@getEdit'));
		Route::post('{blogId}/edit', 'Controllers\Admin\BlogsController@postEdit');
		Route::get('{blogId}/delete', array('as' => 'delete/blog', 'uses' => 'Controllers\Admin\BlogsController@getDelete'));
		Route::get('{blogId}/restore', array('as' => 'restore/blog', 'uses' => 'Controllers\Admin\BlogsController@getRestore'));
	});
	
	# Tiena Management
	   Route::group(array('prefix' => 'tiendas'), function()
	{
                Route::get('/', array('as' => 'tienda', 'uses' => 'Controllers\Admin\TiendasController@index'));
				Route::get('{tiendaId}/edit', array('as' => 'update/tienda', 'uses' => 'Controllers\Admin\TiendasController@getEdit'));
				Route::post('{tiendaId}/edit', 'Controllers\Admin\TiendasController@postEdit');			
				Route::get('create', array('as' => 'create/tienda', 'uses' => 'Controllers\Admin\TiendasController@getCreate'));
				Route::post('create', 'Controllers\Admin\TiendasController@postCreate');
				Route::get('{tiendaId}/delete', array('as' => 'delete/tienda', 'uses' => 'Controllers\Admin\TiendasController@getDelete'));
				Route::get('{tiendaId}/add', array('as' => 'agregar/tienda', 'uses' => 'Controllers\Admin\TiendasController@addEdit'));
				Route::get('{tiendaId}/{productoId}/buscar', array('as' => 'buscar/tienda', 'uses' => 'Controllers\Admin\TiendasController@buscarproductotienda'));
				Route::post('{tiendaId}/add', 'Controllers\Admin\TiendasController@postCreate');
						
	});
	
	# Marca Management
	Route::group(array('prefix' => 'marcas'), function()
	{
                Route::get('/', array('as' => 'marca', 'uses' => 'Controllers\Admin\MarcasController@index'));
				Route::get('{marcaId}/edit', array('as' => 'update/marca', 'uses' => 'Controllers\Admin\MarcasController@getEdit'));
				Route::post('{marcaId}/edit', 'Controllers\Admin\MarcasController@postEdit');			
				Route::get('create', array('as' => 'create/marca', 'uses' => 'Controllers\Admin\MarcasController@getCreate'));
				Route::post('create', 'Controllers\Admin\MarcasController@postCreate');
				Route::get('{marcaId}/delete', array('as' => 'delete/marca', 'uses' => 'Controllers\Admin\MarcasController@getDelete'));
	
				
	});
	
	# Marca Management
	Route::group(array('prefix' => 'pedidos'), function()
	{
                Route::get('/', array('as' => 'pedidos', 'uses' => 'PedidoController@index'));
				Route::get('{pedidoId}/edit', array('as' => 'update/pedido', 'uses' => 'PedidoController@getEdit'));
					
				/*Route::post('{marcaId}/edit', 'Controllers\Admin\MarcasController@postEdit');			
				Route::get('create', array('as' => 'create/marca', 'uses' => 'Controllers\Admin\MarcasController@getCreate'));
				Route::post('create', 'Controllers\Admin\MarcasController@postCreate');
				Route::get('{marcaId}/delete', array('as' => 'delete/marca', 'uses' => 'Controllers\Admin\MarcasController@getDelete'));*/
	
				
	});
	
		Route::group(array('prefix' => 'categoria'), function()
	{ 
                Route::get('/', array('as' => 'categoria', 'uses' => 'Controllers\Admin\CategoriasController@index'));
				Route::post('create', 'Controllers\Admin\CategoriasController@postCreate');
				Route::get('create', array('as' => 'create/categoria', 'uses' => 'Controllers\Admin\CategoriasController@getCreate'));
				
			Route::get('{marcaId}/edit', array('as' => 'update/categoria', 'uses' => 'Controllers\Admin\CategoriasController@getEdit'));
				Route::post('{marcaId}/edit', 'Controllers\Admin\CategoriasController@postEdit');			
				//Route::get('create', array('as' => 'create/marca', 'uses' => 'Controllers\Admin\MarcasController@getCreate'));
				//Route::post('create', 'Controllers\Admin\MarcasController@postCreate');
			Route::get('{marcaId}/delete', array('as' => 'delete/categoria', 'uses' => 'Controllers\Admin\CategoriasController@getDelete'));
	
				
	});
	
	
	
	# Colores Management
	   Route::group(array('prefix' => 'colores'), function()
	{
                Route::get('/', array('as' => 'color', 'uses' => 'Controllers\Admin\ColoresController@index'));
				Route::get('{colorId}/edit', array('as' => 'update/color', 'uses' => 'Controllers\Admin\ColoresController@getEdit'));
				Route::post('{colorId}/edit', 'Controllers\Admin\ColoresController@postEdit');			
				Route::get('create', array('as' => 'create/color', 'uses' => 'Controllers\Admin\ColoresController@getCreate'));
				Route::post('create', 'Controllers\Admin\ColoresController@postCreate');
				Route::get('{colorId}/delete', array('as' => 'delete/color', 'uses' => 'Controllers\Admin\ColoresController@getDelete'));
	
				
	});
	# Tallas Management
	   Route::group(array('prefix' => 'tallas'), function()
	{
              Route::get('/', array('as' => 'talla', 'uses' => 'Controllers\Admin\TallasController@index'));
				Route::get('{tallaId}/edit', array('as' => 'update/talla', 'uses' => 'Controllers\Admin\TallasController@getEdit'));
				Route::post('{tallaId}/edit', 'Controllers\Admin\TallasController@postEdit');			
				Route::get('create', array('as' => 'create/talla', 'uses' => 'Controllers\Admin\TallasController@getCreate'));
				Route::post('create', 'Controllers\Admin\TallasController@postCreate');
				Route::get('{tallaId}/delete', array('as' => 'delete/talla', 'uses' => 'Controllers\Admin\TallasController@getDelete'));
	
				
	});
	
	# Material Management
	   Route::group(array('prefix' => 'materiales'), function()
	{
                Route::get('/', array('as' => 'material', 'uses' => 'Controllers\Admin\MaterialesController@index'));
				Route::get('{materialId}/edit', array('as' => 'update/material', 'uses' => 'Controllers\Admin\MaterialesController@getEdit'));
				Route::post('{materialId}/edit', 'Controllers\Admin\MaterialesController@postEdit');			
				Route::get('create', array('as' => 'create/material', 'uses' => 'Controllers\Admin\MaterialesController@getCreate'));
				Route::post('create', 'Controllers\Admin\MaterialesController@postCreate');
				Route::get('{materialId}/delete', array('as' => 'delete/material', 'uses' => 'Controllers\Admin\MaterialesController@getDelete'));
	
				
	});
	

	# User Management
	Route::group(array('prefix' => 'users'), function()
	{
		Route::get('/', array('as' => 'users', 'uses' => 'Controllers\Admin\UsersController@getIndex'));
		Route::get('create', array('as' => 'create/user', 'uses' => 'Controllers\Admin\UsersController@getCreate'));
		Route::post('create', 'Controllers\Admin\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));
	});
	
	# Inventarios Management
	Route::group(array('prefix' => 'inventarios'), function()
	{
		Route::get('/', array('as' => 'inventarios', 'uses' => 'Controllers\Admin\InventariosController@getIndex'));
		//Route::get('create', array('as' => 'create/inventarios', 'uses' => 'Controllers\Admin\InventariosController@getCreate'));
		/*Route::post('create', 'Controllers\Admin\UsersController@postCreate');
		Route::get('{userId}/edit', array('as' => 'update/user', 'uses' => 'Controllers\Admin\UsersController@getEdit'));
		Route::post('{userId}/edit', 'Controllers\Admin\UsersController@postEdit');
		Route::get('{userId}/delete', array('as' => 'delete/user', 'uses' => 'Controllers\Admin\UsersController@getDelete'));
		Route::get('{userId}/restore', array('as' => 'restore/user', 'uses' => 'Controllers\Admin\UsersController@getRestore'));*/
	});

	# Group Management
	Route::group(array('prefix' => 'groups'), function()
	{
                Route::get('insertarprueba', array('as' => 'contacto', 'uses' => 'HomeController@saludo'));

		Route::get('/', array('as' => 'groups', 'uses' => 'Controllers\Admin\GroupsController@getIndex'));
		Route::get('create', array('as' => 'create/group', 'uses' => 'Controllers\Admin\GroupsController@getCreate'));
		Route::post('create', 'Controllers\Admin\GroupsController@postCreate');
		Route::get('{groupId}/edit', array('as' => 'update/group', 'uses' => 'Controllers\Admin\GroupsController@getEdit'));
		Route::post('{groupId}/edit', 'Controllers\Admin\GroupsController@postEdit');
		Route::get('{groupId}/delete', array('as' => 'delete/group', 'uses' => 'Controllers\Admin\GroupsController@getDelete'));
		Route::get('{groupId}/restore', array('as' => 'restore/group', 'uses' => 'Controllers\Admin\GroupsController@getRestore'));
	});

        
     
	# Dashboard
	Route::get('/', array('as' => 'admin', 'uses' => 'Controllers\Admin\DashboardController@getIndex'));

});

/*
|--------------------------------------------------------------------------
| Authentication and Authorization Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'auth'), function()
{

	# Login
	Route::get('signin', array('as' => 'signin', 'uses' => 'AuthController@getSignin'));
	Route::post('signin', 'AuthController@postSignin');

	# Register
	Route::get('signup', array('as' => 'signup', 'uses' => 'AuthController@getSignup'));
	Route::post('signup', 'AuthController@postSignup');

	# Account Activation
	Route::get('activate/{activationCode}', array('as' => 'activate', 'uses' => 'AuthController@getActivate'));

	# Forgot Password
	Route::get('forgot-password', array('as' => 'forgot-password', 'uses' => 'AuthController@getForgotPassword'));
	Route::post('forgot-password', 'AuthController@postForgotPassword');

	# Forgot Password Confirmation
	Route::get('forgot-password/{passwordResetCode}', array('as' => 'forgot-password-confirm', 'uses' => 'AuthController@getForgotPasswordConfirm'));
	Route::post('forgot-password/{passwordResetCode}', 'AuthController@postForgotPasswordConfirm');

	# Logout
	Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

});

/*
|--------------------------------------------------------------------------
| Account Routes
|--------------------------------------------------------------------------
|
|
|
*/

Route::group(array('prefix' => 'account'), function()
{

	# Account Dashboard
	Route::get('/', array('as' => 'account', 'uses' => 'Controllers\Account\DashboardController@getIndex'));

	# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');

});

Route::group(array('prefix' => 'pedido'), function()
{

	# Account Dashboard
	Route::post('/enviarcarrito', array('as' => 'enviarcarrito', 'uses' => 'PedidoController@enviarcarrito'));
	Route::post('/borraritem', array('as' => 'borraritem', 'uses' => 'PedidoController@borraritem'));
	Route::post('/verificarcantidad', array('as' => 'verificarcantidad', 'uses' => 'PedidoController@verificarcantidad'));
	Route::post('/verificarcombos', array('as' => 'verificarcombos', 'uses' => 'PedidoController@verificarcombos'));
	

Route::post('/cambiarcolormuestra', 'HomeController@cambiarcolormuestra');

	/*# Profile
	Route::get('profile', array('as' => 'profile', 'uses' => 'Controllers\Account\ProfileController@getIndex'));
	Route::post('profile', 'Controllers\Account\ProfileController@postIndex');

	# Change Password
	Route::get('change-password', array('as' => 'change-password', 'uses' => 'Controllers\Account\ChangePasswordController@getIndex'));
	Route::post('change-password', 'Controllers\Account\ChangePasswordController@postIndex');

	# Change Email
	Route::get('change-email', array('as' => 'change-email', 'uses' => 'Controllers\Account\ChangeEmailController@getIndex'));
	Route::post('change-email', 'Controllers\Account\ChangeEmailController@postIndex');
*/
});


Route::group(array('prefix' => 'tienda'), function()
{

Route::post('/verificarcombos', array('as' => 'verificarcombos', 'uses' => 'Controllers\Admin\TiendasController@verificarcombos'));
Route::post('/verificarcombosplu', array('as' => 'verificarcombosplu', 'uses' => 'Controllers\Admin\TiendasController@verificarcombosplu'));
Route::post('/buscarproductotienda', array('as' => 'buscarproductotienda', 'uses' => 'Controllers\Admin\TiendasController@buscarproductotienda'));

});

Route::group(array('prefix' => 'home'), function()
{

	# Account Dashboard
	Route::post('/suscribete', array('as' => 'suscribete', 'uses' => 'HomeController@suscribete'));



});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('about-us', function()
{
	//
	return View::make('frontend/about-us');
});
 


Route::post('buscarpedidotienda', 'PedidoController@buscarpedidotienda');
Route::post('descontarcantidad', 'PedidoController@descontarcantidad');
Route::get('twitter', array('as' => 'twitter', 'uses' => 'HomeController@twitter'));


Route::post('checkout', 'PedidoController@postcheckout');
Route::get('mispedidos', array('as' => 'mispedidos', 'uses' => 'PedidoController@mispedidos'));

Route::get('checkout', array('as' => 'checkout', 'uses' => 'PedidoController@checkout'));

Route::get('carritodecompras', array('as' => 'carritodecompras', 'uses' => 'PedidoController@carritodecompras'));

Route::get('contact-us', array('as' => 'contact-us', 'uses' => 'ContactUsController@getIndex'));
Route::post('contact-us', 'ContactUsController@postIndex');
Route::post('subirimagenproducto', 'HomeController@subirimagenproducto');
Route::post('/borrarimagenproducto', 'Controllers\Admin\ProductosController@borrarimagenproducto');

Route::post('subirimageneditor', 'HomeController@subirimageneditor');


Route::get('blog/{postSlug}', array('as' => 'view-post', 'uses' => 'BlogController@getView'));
Route::post('blog/{postSlug}', 'BlogController@postView');
//Route::get('home', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('zohoverify/verifyforzoho.html', function(){
	return"1397064603699";
});  
	Route::get('/productos', array('as' => 'productosfront', 'uses' => 'HomeController@productos'));
Route::get('voto', 'HomeController@voto');
Route::get('noticia', 'HomeController@noticia');
Route::get('push', 'HomeController@push');



Route::get('/', array('as' => 'home', 'uses' => 'HomeController@getIndex'));
Route::get('/single/{id}', array('as' => 'single', 'uses' => 'HomeController@single'));
//Route::get('/productos/', array('as' => 'productos', 'uses' => 'HomeController@productos'));
Route::get('/suscribete/', array('as' => 'suscribete', 'uses' => 'HomeController@suscribete'));
