<?php

class HomeController extends BaseController {

	/*
	 |--------------------------------------------------------------------------
	 | Default Home Controller
	 |--------------------------------------------------------------------------
	 |
	 | You may wish to use controllers instead of, or in addition to, Closure
	 | based routes. That's great! Here is an example controller method to
	 | get you started. To route to this controller, just add the route:
	 |
	 |	Route::get('/', 'HomeController@showWelcome');
	 |
	 */
	 
	 
	 public function push(){
	 	
    /*** SETUP ***************************************************/

    $key        = "4PRmAQGrDMpLcvEh2jPI4CNjKZ0SnvJp";         //GET FROM APP MANAGEMENT (ACS)
    $username   = "admin";
    $password   = "karina";
    $channel    = "PUSH_CHANNEL";
    $message    = "YOUR_MESSAGE";
    $title      = "YOUR_ANDROID_TITLE";
    $tmp_fname  = 'cookie.txt';
    $json       = '{"alert":"'. $message .'","title":"'. $title .'","vibrate":true,"sound":"default"}';
 
    /*** PUSH NOTIFICATION ***********************************/
 
    $post_array = array('login' => $username, 'password' => $password);
 
    /*** INIT CURL *******************************************/
    $curlObj    = curl_init();
    $c_opt      = array(CURLOPT_URL => 'https://api.cloud.appcelerator.com/v1/users/login.json?key='.$key,
                        CURLOPT_COOKIEJAR => $tmp_fname, 
                        CURLOPT_COOKIEFILE => $tmp_fname, 
                        CURLOPT_RETURNTRANSFER => true, 
                        CURLOPT_POST => 1,
                        CURLOPT_POSTFIELDS  =>  "login=".$username."&password=".$password,
                        CURLOPT_FOLLOWLOCATION  =>  1,
                        CURLOPT_TIMEOUT => 60);
 
    /*** LOGIN **********************************************/
    curl_setopt_array($curlObj, $c_opt); 
    $session = curl_exec($curlObj);     
 
    /*** SEND PUSH ******************************************/
    $c_opt[CURLOPT_URL]         = "https://api.cloud.appcelerator.com/v1/push_notification/notify.json?key=".$key; 
    $c_opt[CURLOPT_POSTFIELDS]  = "channel=".$channel."&payload=".$json; 
 
    curl_setopt_array($curlObj, $c_opt); 
    $session = curl_exec($curlObj);     
 
    /*** THE END ********************************************/
    curl_close($curlObj);


    echo $session;
	 }
	 
	 public function twitter(){
	 	
			 	define('BASE', dirname(__FILE__));
	// Pon aquí tus datos
	define('APP_CONSUMER_KEY', 'UVUE5PlPzSDtjrtF0UhHeX8Nx');
	define('APP_CONSUMER_SECRET', 'F8bQhn5nJfM04VjYlSnTsVem3nalIpS9rRYSPNWhXvUtHGPaKL');
	define('ACCESS_TOKEN', '95109918-ZXImVORtDQiWBKau1BxlBrv9GSbVyzD0lVe6iReMu');
	define('ACCESS_TOKEN_SECRET', 'MdqtePBiydSyjB9hmHucQUqNUxMSzlXcj6FCdjCqy3pvq');
	// activar la caché?
	define('CACHE_ENABLED', false);
	

	// Si estamos en la página de resultados
	try{
	if( isset($_GET['q']) && !empty($_GET['q']) ) {


		
			// Incluímos la librería, hacemos la búsqueda y lo guardamos
        require_once(app_path() . '/clases/twitteroauth.php');
			$twitteroauth = new TwitterOAuth(APP_CONSUMER_KEY, APP_CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
			$results = $twitteroauth->get('search/tweets', array(
				'q' => $_GET['q'], // Nuestra consulta
				'lang' => 'es', // Lenguaje (español)
				'count' => 5, // Número de tweets 
				'include_entities' => false, // No nos interesa información adicional. Ver: https://dev.twitter.com/docs/tweet-entities
			));
		$variable=$_GET['q'];

		$tweets = $twitteroauth->get("https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=".$variable."&count=10");

	}
	
	
				}catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
	
	exit();
}
	$infoajax=array();

foreach ($tweets as $key=> $tweet ) {
	$infoajax["twitter"][$key]["text"]= $tweet->text;
	 	
} 

$arrayi=$this->obtenerlikes($_GET["id"]);;
$infoajax["like"]=$arrayi["like"];
$infoajax["dislike"]=$arrayi["dislike"];
echo json_encode($infoajax);
		
	 }

	 public function cambiarcolormuestra(){
	 	  
		  
		if(Input::get("color")){
				$color= Color::find(Input::get("color"));
			//	dd($color->codigo_color);
		return $color->codigo_color;
		}

		
	 }  

public function obtenerlikes($id){
	
	$infoajax=array();
	if($id==1){
		$cantidadlike=1359;
		$cantidaddislike=278;
		
	}
	if($id==2){
		$cantidadlike=1400;
		$cantidaddislike=1130;
		
	}
	if($id==3){
		$cantidadlike=1366;
		$cantidaddislike=870;
		
	}
	if($id==4){
		$cantidadlike=1127;
		$cantidaddislike=400;
		
	}
	if($id==5){
		$cantidadlike=1512;
		$cantidaddislike=690;
		
	}
	if($id==7){
		$cantidadlike=4;
		$cantidaddislike=2;
		
	}
	
	$like= new Like();
$infoajax["like"]=($like->likes($id,1))+$cantidadlike;
$infoajax["dislike"]=($like->likes($id,2))+$cantidaddislike;
return $infoajax;
	
}

	 public function productos(){
	 	
		   
                        		$categoriasproductos = new Categoriaproductos();
                        
                        $categoriaspadre=$categoriasproductos->categoriasproductopadre(0);

$cont=0;
foreach ($categoriaspadre as $key => $value) {
$categorias[$cont]["hijos"]=$categoriasproductos->categoriasproductoporpadre($value->id)->toArray();
$categorias[$cont]["padre"]["id"]=$value->id ; 
$categorias[$cont]["padre"]["nombre"]= strtoupper($value->nombre_categoria);
	
	$cont++;
}
	 	$producto= new Producto();
		$tallas= Talla::all();
		$marcas= Marca::all();
		$materiales= Material::all();
		$colores= Color::all();
		$productosunicos= $producto->obtenerdatsocustom();
	 		return View::make('frontend/producto/productos')
	 		->with("tallas",$tallas)
	 		->with("marcas",$marcas)
	 		->with("materiales",$materiales)
			->with("productosunicos",$productosunicos)
			->with("categorias",$categorias)
	 		->with("colores",$colores);
	 }
	 
	 public function noticia(){
	 	$noticia= new Noticia();
		$noticias=$noticia->getnoticias(Input::get("id"));
		
		echo json_encode($noticias->toArray());
	 }
	 
	 public function voto(){
	 	
		try{
		
		
		
			$like= new Like();
			
			
			$verificarlike=$like->voto(Input::get("id"),Input::get("idcandidato"));
			
			if(count($verificarlike)==0){
				
			$like->iddispositivo=Input::get("id");
			$like->tipo=Input::get("tipo");
			$like->id_cantidato=Input::get("idcandidato");
			$like->valor=1;
			$like->save();
			}else{
				$likes=Like::find($verificarlike[0]->id);
			    $likes->tipo=Input::get("tipo");
				$likes->save();
			}
			
			$infoajax=array();
$arrayi=$this->obtenerlikes($_GET["idcandidato"]);;
$infoajax["like"]=$arrayi["like"];
$infoajax["dislike"]=$arrayi["dislike"];
echo json_encode($infoajax);
			}catch (Exception $e) {
    echo 'Excepción capturada: ',  $e->getMessage(), "\n";
}
	 }
	 
	 
	public function single($id) {
		
		
	
		$producto = Producto::find($id);

			$modeloproducto= new Producto();
			
		$arrayproductosimilares=array();	
foreach (json_decode($producto->categorias) as $key => $value) {
	
	//echo '"'.$value.'"';
	//echo json_encode($modeloproducto->similarescategoria('"'.$value.'"'));
//	dd($modeloproducto->similarescategoria('"'.$value.'"'));
	$listado=$modeloproducto->similarescategoria('"'.$value.'"');
	
	foreach ($listado as $key => $value) {
		
		if($value->id!=$id){
				$arrayproductosimilares[$key]["principal"]=	$value->principal;
	$arrayproductosimilares[$key]["nombre"]=	$value->nombre_producto;
	$arrayproductosimilares[$key]["id"]=	$value->id;
	$arrayproductosimilares[$key]["precio"]=	$value->precio_producto;
	$arrayproductosimilares[$key]["preciom"]=	$value->precio_producto_m;	
		}

	}
}


//echo json_encode($arrayproductosimilares);
	//dd($arrayproductosimilares);	
	//	exit();
		
		$ImagenesProductos = new ImagenesProducto();
		$todasimagenes = $ImagenesProductos -> todasimagenes($id);
		

		$tallas = new Talla();
		$todastallas = $tallas -> todastallasmode();

		$todastallaslist = $tallas -> todastallas();
$nombremarca="";
if($producto->marca!="selector"){
	$marcaproducto= Marca::find($producto->marca);
	$nombremarca=$marcaproducto->nombre_marca;
		//dd($nombremarca);
	
}

		$marcas = new Marca();
		$todasmarcas = $marcas -> todasmarcasmode();

		$todasmarcaslist = $marcas -> todasmarcas();

		$materiales = new Material();
		$todasmateriales = $materiales -> todasmaterialesmode();

		$todasmaterialeslist = $materiales -> todasmaterial();

		$colores = new Color();
		$todascolores = $colores -> todascoloresmode();

		$todascoloreslist = $colores -> todoscoloreslist();

		////cargar los colores del producto
		$arraycolor = array();
		
		$coloresjson = json_decode($producto -> colores);
		
		if (count($coloresjson) != 0) {
			foreach ($coloresjson as $key => $value) {
				$color = Color::find($value);
                                 if(count($color)!=0){
				$arraycolor[$color -> id] = $color -> nombre_color;
                                 }
			}
		}
		////fin cargar los colores del producto
		
		////cargar las tallas del producto
		$arraytalla = array();
		
		$tallasjson = json_decode($producto -> tallas);
		
		if (count($tallasjson) != 0) {
			foreach ($tallasjson as $key => $value) {
				$talla = Talla::find($value);
				$arraytalla[$talla -> id] = $talla -> nombre_talla;
			
			}
		}
		////fin cargar las tallas del producto
		
		////cargar los materiales del producto
		$arraymaterial = array();
		
		$materialjson = json_decode($producto -> material);
		
		if (count($materialjson) != 0) {
			foreach ($materialjson as $key => $value) {
				
				$material = Material::find($value);
                                if(count($material)!=0){
                              				$arraymaterial[$material -> id] = $material -> nombre_material;
            
                                }

			}
		}
		////fin cargar los materiales del producto
		
		/*////cargar las marcas del producto
		$arraymarca = array();
		
		$marcajson = $producto -> marca;
		
		if (count($marcajson) != 0) {
		//	foreach ($marcajson as $key => $value) {
				dd($value);
				$marca = Marca::find($value);
				$arraymarca[$marca -> id] = $marca -> nombre_marca;
			
			//}
		}
		////fin cargar las marcas del producto*/

		return View::make('frontend/producto/single')
		 -> with("producto", $producto)
		 -> with("tallas", $todastallas)
		 -> with("tallaslist", $arraytalla)
		 -> with("marcas", $todasmarcas)
		 //-> with("marcaslist", $arraymarca)
		 -> with("materiales", $todasmateriales)
		 -> with("materialeslist", $arraymaterial)
		 -> with("colores", $todascolores)
		 -> with("coloreslist", $arraycolor)
		 -> with("todaimagenes", $todasimagenes)
		 -> with("similares",$arrayproductosimilares)
		 ->with("nombremarca",$nombremarca)
		 		 -> with("matetiales", $todasmaterialeslist);
		 
	}

	public function getIndex() {
		$productos = new Producto();
		$ultimoshome = $productos -> ultimoshome();
		$categoria = new Categoriaproductos();
		$categorias = $categoria -> categoriasproducto();

		$destacadosmodel = new Destacado();
		$destacados = $destacadosmodel -> destacadoshome();
		$marcas= Marca::all();
		
		return View::make('frontend/home/home')
		 -> with("ultimoshome", $ultimoshome)
		 -> with("categorias", $categorias) 
		 -> with("marcas", $marcas) 
		 -> with("destacados", $destacados);

	}

	public function subirimagenproducto() {
		//   dd($_POST);
		$framework = new Framework();
		$resultado = $framework -> subirfoto($_FILES["file"]);
		echo json_encode(array("result" => "OK", "data" => $resultado));
	}

	public function subirimageneditor() {
		//   dd($_POST);
		$framework = new Framework();
		$resultado = $framework -> subirfoto($_FILES["file"]);

		echo '{ "filelink": "' . $resultado["resp"][0] . '" }';

	}

	public function saludo($id = null) {

		//$nombre=   Input::get("nombre");
		//$array=Input::all();

		// dd($array["nombre"]);

		$prueba = new Prueba();
		//$todos=  $prueba->traertodos(1);
		//var_dump($todos);

		//$insert=   $prueba->insertarnombre();
		$traertodos = $prueba -> traertodos(1);

		return View::make('saludo') -> with("info", $traertodos);
	}

	public function showWelcome() {
		return View::make('hello');
	}
	
	
	public function suscribete() {

		//dd($_POST);
		
		$suscripcion = new Suscripcion();
		$suscripcion -> email_suscriptor = $_POST["email"];
		
		if ($suscripcion -> save()) {
			
			return"1";
			
		}

	}
	
	

}
