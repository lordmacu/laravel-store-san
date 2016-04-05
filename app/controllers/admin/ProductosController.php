<?php

namespace Controllers\Admin;

use AdminController;

use Input;

use Lang;

use Redirect;

use Sentry;

use Str;

use Validator;
use Talla;
use View;
use Material;
use Categoriaproductos;

use Framework;
use Marca;
use ImagenesProducto;
use Color;
use Medida;
use Producto;
//es la tabla con la que estamos trabajando

class ProductosController extends AdminController {

	public function getindex() {

		$productomodelo = new Producto();

		if (Input::get("borrados")) {
			$productos = $productomodelo -> obtenerdatsoborrados();

		} else {

			if (Input::get("id")) {
				$productos = $productomodelo -> todosporid(Input::get("id"));
			} else {
				$productos = $productomodelo -> obtenerdatso();

			}
		}

		$todosdrop = $productomodelo -> todos();
		
		$todosplu = $productomodelo -> todosplu();
		
		$todosplu["selector"] = "Escriba un plu";

		$todosdrop["selector"] = "Escriba un ombre";

		return View::make('backend/productos/index', compact('productos')) -> with("plus", $todosplu) -> with("todos", $todosdrop);

	}

	public function getRestore($id = null) {
		try {

			$producto = Producto::withTrashed() -> find($id);

			$producto -> restore();

			return Redirect::to('admin/productos') -> with('success', Lang::get('message.delete.success'));
		} catch (UserNotFoundException $e) {
			// Prepare the error message
			$error = Lang::get('admin/users/message.user_not_found', compact('id'));

			return Redirect::to('admin/productos') -> with('error', "no se puede restaurar");
		}
	}

	public function borrarimagenproducto() {

		//dd(Input::all());

		// verificar si existe

		if (is_null($imagen = ImagenesProducto::find(Input::get("id")))) {

			return json_encode(array("resp" => false));

		}

		$imagen -> delete();

		return json_encode(array("resp" => true));

	}


	public function postEdit($idproducto = null) {
		// verificarsi existe

		if (is_null($producto = Producto::find($idproducto))) {

			// Redireccionar a listar tiendas

			return Redirect::to('admin/productos') -> with('error', Lang::get('message.does_not_exist'));

		}

		// Esta es una validacion

		// declarar las reglas de validacion

		$rules = array('precio_producto' => 'numeric|min:3|required', 'nombre_producto' => 'required');

		// Validar las reglas

		$validator = Validator::make(Input::all(), $rules);

		//  verificar si la validacion se hizo

		if ($validator -> fails()) {

			// juemadre algo mal

			return Redirect::back() -> withInput() -> withErrors($validator);

		}

		$producto -> nombre_producto = e(Input::get('nombre_producto'));

		$producto -> descripcion_producto = Input::get('descripcion_producto');

if (isset($_POST["product"]["categories"])) {

$categoriasencodadas= json_encode($_POST["product"]["categories"]);;
	
			$producto -> categorias = json_encode($_POST["product"]["categories"]);

		}
				if (isset($_POST["color_producto"])) {

			$producto -> colores = json_encode($_POST["color_producto"]);

			}
			if (isset($_POST["talla_producto"])) {

			$producto -> tallas = json_encode($_POST["talla_producto"]);

		}
		
			if (isset($_POST["material_producto"])) {

			$producto -> material = json_encode($_POST["material_producto"]);

		}
			if (isset($_POST["medida_producto"])) {

			$producto -> medidas = json_encode($_POST["medida_producto"]);

		}
		if (isset($_POST["principal"])) {

			$producto -> principal = Input::get("principal");

		}
		
            
	if (isset($_POST["precio_producto_m"])) {

		$producto -> precio_producto_m = e(ltrim(Input::get('precio_producto_m'), '.'));
 
		}
		

		$producto -> status = e(Input::get('status'));

		$producto -> precio_producto = e(ltrim(Input::get('precio_producto'), '.'));
		$producto -> marca = e(Input::get('marca_producto'));

		$producto -> plu_producto = e(Input::get('plu_producto'));

		if ($producto -> save()) {

			if (Input::get("imagenproducto")) {

				foreach (Input::get("imagenproducto") as $imagen) {

					$imagenesproducto = new ImagenesProducto();
if(Input::get("principal")==$imagenesproducto -> url){
						$imagenesproducto -> principal = 2;
	
}else{
							$imagenesproducto -> principal = 1;
	
}
					$imagenesproducto -> url = $imagen;

					$imagenesproducto -> id_producto = $producto -> id;

					$imagenesproducto -> save();

				}

			}

			// mensaje de verificacion qeu si se actualizo

			return Redirect::to("admin/productos/$idproducto/edit") -> with('success', Lang::get('message.update.success'));

		}

		// juemadre no se actualizo

		return Redirect::to("admin/productos/$idproducto/edit") -> with('error', Lang::get('message.update.error'));

	}


	public function getEdit($idProducto = null) {

		$framework = new Framework();

		// verificar si existe

		if (is_null($producto = Producto::find($idProducto))) {
	  
			// redireccionar al administrador

			return Redirect::to('admin/productos') -> with('error', Lang::get('message.does_not_exist'));

		}

		$categoriasproductos = new Categoriaproductos();
		$marcamodel= new Marca();
		$colormodel= new Color();
		$tallasmodel= new Talla();
		$medidasmodel= new Medida();
		$materialmodel= new Material();
		$marcas=	$marcamodel->todasmarcas();
		$marcas["selector"]="Seleccione una marca";
		$colores= $colormodel->todoscolores();
		$tallas= $tallasmodel->todastallas();
		$medidas= $medidasmodel->todasmedidas();
		$materiales= $materialmodel->todasmaterial();

		//$categorias = $categoriasproductos -> categoriasproducto();

$categoriaspadre=$categoriasproductos->categoriasproductopadre(0);

$cont=0;
foreach ($categoriaspadre as $key => $value) {
$categorias[$cont]["hijos"]=$categoriasproductos->categoriasproductoporpadre($value->id)->toArray();
$categorias[$cont]["padre"]["id"]=$value->id ; 
$categorias[$cont]["padre"]["nombre"]= strtoupper($value->nombre_categoria);
	
	$cont++;
}
//echo json_encode($categorias);

//exit();
		return View::make('backend/productos/edit', compact('producto'))->with("materiales",$materiales) -> with("categorias", $categorias) -> with("framework", $framework)->with("marcas",$marcas)->with("colores",$colores)->with("tallas",$tallas)->with("medidas",$medidas);
		

	}

	public function getCreate() {

		// mostrar la pagina

		$categoriasproductos = new Categoriaproductos();
		$marcamodel= new Marca();
		$colormodel= new Color();
		$tallasmodel= new Talla();
		$medidasmodel= new Medida();
		$materialmodel= new Material();
		$marcas=	$marcamodel->todasmarcas();
		$marcas["selector"]="Seleccione una marca";
		$colores= $colormodel->todoscolores();
		$tallas= $tallasmodel->todastallas();
		$medidas= $medidasmodel->todasmedidas();
		$materiales= $materialmodel->todasmaterial();
		
		$categorias = $categoriasproductos -> categoriasproducto();
$categoriaspadre=$categoriasproductos->categoriasproductopadre(0);
$categoriasarray=array();
$cont=0;
foreach ($categoriaspadre as $key => $value) {
$categoriasarray[$cont]["hijos"]=$categoriasproductos->categoriasproductoporpadre($value->id)->toArray();
$categoriasarray[$cont]["padre"]["id"]=$value->id ; 
$categoriasarray[$cont]["padre"]["nombre"]= strtoupper($value->nombre_categoria);
	
	$cont++;
}
		//dd($categorias);

		return View::make('backend/productos/create')->with("materiales",$materiales) -> with("categorias", $categoriasarray)->with("marcas",$marcas)->with("colores",$colores)->with("tallas",$tallas)->with("medidas",$medidas);
  
	}

	public function postCreate() {

     
		// declarar las reglas de validacion
		$rules = array('precio_producto' => 'numeric|min:3|required', 'nombre_producto' => 'required');

		// crear el validador con las reglas

		$validator = Validator::make(Input::all(), $rules);

		// verificar el validador

		if ($validator -> fails()) {

			// juamdre algo mal con el validador

			return Redirect::back() -> withInput() -> withErrors($validator);

		}

		// crear la tienda

		$producto = new Producto;

		//  poner los campos en la tabla
		
			if (isset($_POST["calidad"])) {

			$producto -> calidad = $_POST["calidad"];

		}
			if (isset($_POST["precio_producto_m"])) {

			$producto -> precio_producto_m =  e(ltrim(Input::get('precio_producto_m'), '.')); 

		}
		
		

		$producto -> nombre_producto = e(Input::get('nombre_producto'));

		$producto -> descripcion_producto = Input::get('descripcion_producto');
//dd($_POST["product"]["categories"]);    
		if (isset($_POST["product"]["categories"])) {

			$producto -> categorias = json_encode($_POST["product"]["categories"]);

		}
		
		if (isset($_POST["principal"])) {

			$producto -> principal = Input::get("principal");

		}
		
		
				if (isset($_POST["color_producto"])) {

			$producto -> colores = json_encode($_POST["color_producto"]);

			}
			if (isset($_POST["talla_producto"])) {

			$producto -> tallas = json_encode($_POST["talla_producto"]);

		}
		
			if (isset($_POST["material_producto"])) {

			$producto -> material = json_encode($_POST["material_producto"]);

		}
			if (isset($_POST["medida_producto"])) {

			$producto -> medidas = json_encode($_POST["medida_producto"]);

		}
			
			
			
			
		
		$producto -> marca = e(Input::get('marca_producto'));

		$producto -> status = e(Input::get('status'));

		$producto -> precio_producto =  e(ltrim(Input::get('precio_producto'), '.'));  e(Input::get('precio_producto'));
		
		$contador=_(rand(1,1000));
		$plu=$_POST["plu_producto"]."_".$contador;

		$producto -> plu_producto =$plu;
		

		
	//	dd($producto);

		// guardar los campos

		if ($producto -> save()) {

			// si se creo la cosa

			//return "se creo";

			if (Input::get("imagenproducto")) {

				foreach (Input::get("imagenproducto") as $imagen) {

					$imagenesproducto = new ImagenesProducto();
if(Input::get("principal")==$imagenesproducto -> url){
						$imagenesproducto -> principal = 2;
	
}else{
							$imagenesproducto -> principal = 1;
	
}
					$imagenesproducto -> url = $imagen;

					$imagenesproducto -> id_producto = $producto -> id;

					$imagenesproducto -> save();

				}

			}

			return Redirect::to("admin/productos/$producto->id/edit") -> with('success', Lang::get('message.create.success'));

		}

		// no se creo nada mijo

		return Redirect::to('admin/productos/create') -> with('error', Lang::get('message.create.error'));

	}

	public function getDelete($productoid) {

		// verificar si existe

		if (is_null($producto = Producto::find($productoid))) {

			// si no existe tira error

			return Redirect::to('admin/productos') -> with('error', Lang::get('message.not_found'));

		}

		// Borrar coso

		// Delete the user
		$producto -> delete();
		return Redirect::to('admin/productos') -> with('success', Lang::get('message.delete.success'));

		// Redireccionar coso

	}
	
	
	

}
