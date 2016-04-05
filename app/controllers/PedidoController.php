<?php

class PedidoController extends BaseController {
	
public function index() {

		$pedidomodelo = new Pedido();
		
		$pedidos=$pedidomodelo->obtenerdatso();

		// mostrar pagina
		return View::make('backend/pedidos/index', compact('pedidos'));
}
	
	public function buscarpedidotienda(){
		$inventario= new Inventario();
		$inventariotodo=$inventario->buscarinventarioparametros();
		
		echo $inventariotodo->toJson();
	}
	
	public function descontarcantidad(){
		//(Input::all());
		
		$cantidad=Input::get("cantidad");
		$inventario= new Inventario();
		$inventariotodo=$inventario->todastiendasporid(Input::get("tienda"),Input::get("producto"));


$tablainventarios= new Tablainventarios();
$tablainventarios->id_pedido=Input::get("pedido");
$tablainventarios->id_tienda=Input::get("tienda");
$tablainventarios->cantidad=$cantidad;
$tablainventarios->save();

		foreach ($inventariotodo->toArray() as  $inventario) {
			
			
			$inventariindi=Inventario::find($inventario["id"]);
			if($inventariindi->cantidad!=0){
				
		
				if($cantidad!=0){
						
					if($cantidad==$inventario["cantidad"]){
									$total= (((int)$inventario["cantidad"])-((int)$cantidad));			
									$cantidad=0;
									$inventariindi->cantidad=$total;
					}else{
						
						if($cantidad<$inventario["cantidad"]){
									$total= (((int)$inventario["cantidad"])-((int)$cantidad));			
									$cantidad=0;
									$inventariindi->cantidad=$total;
							
						}else{
									$total= (((int)$cantidad)-((int)$inventario["cantidad"]));			
									$cantidad=$total;
									$inventariindi->cantidad=0;
											
							
						}
						
					}
					
					$inventariindi->save();
					
					
					
			}
				}


		}
	}
	
	public function getEdit($pedidoId = null) {
		
		$pedidomodelo = new Pedido();
		
		$pedido=$pedidomodelo->datosporusuario($pedidoId);
		
		$productomodel= new Producto();
		
		$productos=	$productomodel->todos();
		$productos["selector"]="Seleccione un producto";
		
		$inventariomodelo = new Inventario();
		
		$tiendas=$inventariomodelo->productosinventario();
		
		$tiendas["selector"]="Seleccione una tienda";
		


		return View::make('backend/pedidos/edit')	
		-> with("pedido",$pedido)
		-> with("productos",$productos)
		-> with("tienda",$tiendas);
	}
	
	
	
	public function verificarcantidad(){
		
		
		$tienda=$_POST["valor"];
		
		$producto=$_POST["producto"];
		

		$inventariomodelo = new Inventario();
		
		$existencia=$inventariomodelo->verificarexistencia($tienda,$producto);
		
		foreach ($existencia as $k ) {
			
			return $cantidad=$k->cantidad;
			
		}
		

	 }	
		

	

public function limpiarcarro(){
	
		Session::forget("cart");
						Session::forget("color");
						Session::forget("precio");
						Session::forget("imagen");
								Session::forget("cantidad");
		
}

public function postcheckout(){
		$adicional= new Adicional();
	
		$adicionalveri=$adicional->porusuario(Sentry::getUser()->id);
		$adicional=Adicional::find($adicionalveri[0]->id);

		$adicional->telefono=Input::get("telephone");
		$adicional->celular=Input::get("celular");
		$adicional->direccion=Input::get("direccion");
		$adicional->ciudad=Input::get("ciudad");
		$adicional->id_usuario=Sentry::getUser()->id;
		$adicional->save();
		$carrotemporal=json_decode($this->enviarcarrito());
		foreach ($carrotemporal->productos as $key => $value) {
	
$pedido= new Pedido();
$pedido->id_producto=$value->id;
if(isset($value->color)){
		$pedido->talla=$value->color;
}
if(isset($value->talla)){
		$pedido->color=$value->talla;
}
	$pedido->cantidad=$value->cantidad;
	$pedido->id_usuario=Sentry::getUser()->id;
	
$pedido->save();
		}



	$this->limpiarcarro();
	return Redirect::route('mispedidos');
}


public function borraritem(){
		//dd(Input::get("producto"));
	
		Session::forget('cart.'. Input::get("producto"));
						Session::forget('color.'. Input::get("producto"));
						Session::forget('precio.'. Input::get("producto"));
						Session::forget('imagen.'. Input::get("producto"));
								Session::forget('cantidad.'. Input::get("producto"));
		
}

public function mispedidos(){
	                    	if (Sentry::check()){
	                    		
	                    	
	
	
	$pedido= new Pedido();
	$pedidos=$pedido->pedidoporusuario();
	//dd($pedidos);
	return View::make('frontend/producto/mispedidos')->with("pedidos",$pedidos);
							}else{
											return Redirect::route('signup');
								
							}
	}

	 public function checkout(){
	 	if (Sentry::check()){
		$carrotemporal=$this->enviarcarrito();
		if(!isset(json_decode($carrotemporal)->productos)){

        $carrotemporal=0;
			$total=0;
		}else{
			$total=json_decode($carrotemporal)->total;
		}
	

		   $adicional= new Adicional();
		   //	exit();
	$adicionalveri=$adicional->porusuario(Sentry::getUser()->id);
		//dd(Sentry::getUser()->id);
	
	$adicionalveri=$adicionalveri[0];
	//dd($adicionalveri->telefono);
		return View::make('frontend/producto/checkout')
				->with("itemscarro",json_decode($carrotemporal))
				->with("total",$total)
				->with("adicional",$adicionalveri);
		}else{
														return Redirect::route('signup');
			
		}
	 }
	 
	 public function carritodecompras(){
	 	
		$carrotemporal=$this->enviarcarrito();
		   	if(!isset(json_decode($carrotemporal)->productos)){

        $carrotemporal=0;
			$total=0;
		}else{
			$total=json_decode($carrotemporal)->total;
		} 
		
		return View::make('frontend/producto/carritodecompras')
		->with("itemscarro",json_decode($carrotemporal))->with("total",$total);
	 }
	 

	public function enviarcarrito(){
	
	if(Input::get("producto")!=0){
		
	
	$product = Producto::find(Input::get("producto"));
		
	Session::put('cart.'. Input::get("producto"), $product->nombre_producto);
	Session::put('referencia.'. Input::get("producto"), $product->plu_producto);
	
	Session::put('descripcion.'. Input::get("producto"), $product->nombre_producto);
	Session::put('cantidad.'. Input::get("producto"), Input::get("cantidad"));
        
      	                    	if (Sentry::check()){

            
      
	                     if(Sentry::getUser()->hasAccess('mayorista')){
	                     		Session::put('precio.'. Input::get("producto"), $product->precio_producto_m);
							
	                     }else{
	                     		Session::put('precio.'. Input::get("producto"), $product->precio_producto);
							
	                     }     
                               }else{
                                 	                     		Session::put('precio.'. Input::get("producto"), $product->precio_producto);
  
                               }    
	
	Session::put('imagen.'. Input::get("producto"), Framework::recortarimagen(array("imagen" => $product->principal, "ancho" => 75, "largo" => 75)));
	
	if(Input::get("color")){
	$colorproducto= Color::find(Input::get("color"));
	Session::put('nombrecolor.'. Input::get("producto"), $colorproducto->nombre_color);	
	Session::put('color.'. Input::get("producto"), Input::get("color"));	
	}
	
	
	if(Input::get("talla")){
		$tallaproducto= Talla::find(Input::get("talla"));
		
	Session::put('tallaproducto.'. Input::get("producto"), $tallaproducto->nombre_talla);	
		
	Session::put('talla.'. Input::get("producto"), Input::get("talla"));	
	}

	}
	$data = Session::get('precio');

		if(count(Session::get('color'))!=0){
		$colorproducto=Session::get('color');
		$nombrecolor=Session::get('nombrecolor');
			
			}
		//dd($colorproducto);
		

	if(count(Session::get('talla'))!=0){
$tallaproducto=Session::get('talla');
		$nombretalla=Session::get('tallaproducto');
		
}



$precioarray=Session::get('precio');
	$cantidadproducto=Session::get('cantidad');
	$nombreproducto=Session::get('cart');
		$referenciaproducto=Session::get('referencia');
	
		$imagenproducto=Session::get('imagen');
	
	$total=0;
	
	if(isset($precioarray)){
		foreach ($precioarray as $key => $value) {
		$total+=($value*$cantidadproducto[$key]);
	}
	}else{
		$total=0;
	}
	
	Session::put('total', $total);
$productoarrayfin=array();
		$productoarrayfin["total"]="$ ".number_format(Session::get('total'));
$incremento=0;

if(count($precioarray)!=0){
	
foreach ($precioarray as $key => $value) {
	if($key){
		
	
		$productoarrayfin["productos"][$incremento]["imagen"]=$imagenproducto[$key];
	    $productoarrayfin["productos"][$incremento]["nombre"]=$nombreproducto[$key];
		    $productoarrayfin["productos"][$incremento]["referenciaproducto"]=$referenciaproducto[$key];
	
		
		if(isset($colorproducto[$key])){
	
			
			        $productoarrayfin["productos"][$incremento]["nombrecolor"]=$nombrecolor[$key];
			
        $productoarrayfin["productos"][$incremento]["color"]=$colorproducto[$key];
				}
				if(isset($tallaproducto[$key])){
								//	dd($nombretalla[$key]);
					
					        $productoarrayfin["productos"][$incremento]["nombretalla"]=$nombretalla[$key];
					
        $productoarrayfin["productos"][$incremento]["talla"]=$tallaproducto[$key];
				}
		$productoarrayfin["productos"][$incremento]["cantidad"]=$cantidadproducto[$key];
	    $productoarrayfin["productos"][$incremento]["precioun"]=$precioarray[$key];
		$productoarrayfin["productos"][$incremento]["preciototal"]=number_format(($precioarray[$key]*$cantidadproducto[$key]));
	    $productoarrayfin["productos"][$incremento]["id"]=$key;
	    $incremento++;
	}
	}
}
return json_encode($productoarrayfin);
	}

}
