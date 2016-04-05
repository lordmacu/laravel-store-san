<?php

class Framework {

    
    
    /*
 * Method to strip tags globally.
 */
 
 
 
 public  function validaritemarrayid($id,$array){
 	$respuesta=3;
	
	if(isset($array)){
		

	foreach ($array as $value) {
		if($id==$value){
			$respuesta=2;
		}
		
	}
		}
	return $respuesta;
}
 
 
public static function globalXssClean()
{
    // Recursive cleaning for array [] inputs, not just strings.
    $sanitized = static::arrayStripTags(Input::get());
    Input::merge($sanitized);
}


 
public static function traerimagenes($palabra,$page){
    
  
 

 $search = 'http://flickr.com/services/rest/?method=flickr.photos.search&api_key=3e110ef8bec5903202318dc1befab038&tags='.$palabra.'&per_page=10&format=php_serial&license=1%2C2%2C3%2C4%2C5%2C6%2C7&page='.$page;
		$result = file_get_contents($search); 
		$result = unserialize($result); 
            $imagenes=array();
                foreach($result['photos']['photo'] as $photo) { 

                    $imagenes[]["url"]='' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '';
//	echo '<img src="' . 'http://farm' . $photo["farm"] . '.static.flickr.com/' . $photo["server"] . '/' . $photo["id"] . '_' . $photo["secret"] . '.jpg">'; 
}

return json_encode($imagenes);
}


public static function limpiar($array,$tags)
{
    $result = array();
 
    foreach ($array as $key => $value) {
        // Don't allow tags on key either, maybe useful for dynamic forms.
        $key = strip_tags($key);
        $key = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $key);

        // If the value is an array, we will just recurse back into the
        // function to keep stripping the tags out of the array,
        // otherwise we will set the stripped value.
        if (is_array($value)) {
            $result[$key] = static::arrayStripTags($value,$tags);
        } else {
            // I am using strip_tags(), you may use htmlentities(),
            // also I am doing trim() here, you may remove it, if you wish.
            $result[$key] = trim(strip_tags($value,$tags));
            $result[$key]= preg_replace('/(<[^>]+) style=".*?"/i', '$1',  $result[$key]);

        }
    }
 
    return $result;
}
    
public static function armarmensajemuro($mensajes) {
        $arrayprueba=array();
        if (Auth::check()) {
        
  
     foreach ($mensajes as $key=> $value) {
        //  $framework= new Framework();
        $tiempo= Framework::hacetantostatic(strtotime($value["created_at"]));
        $proip=false;
        if(Auth::user()->CODIGO_USUARIO==$value["CODIGO_USUARIO"] || Auth::user()->ID_ROL==2){
        $proip=true;
        }
        
               $credenciales = Credencial::where('USUARIO', '=', Auth::user()->CODIGO_USUARIO)->select("CODIGO_TIPO_PROVEEDOR")->get();
            
                            $loginface='loginsocial(1)';  
                            $logintw='loginsocial(2)';  
             foreach ($credenciales as $values) {
                if ($values->CODIGO_TIPO_PROVEEDOR == 2) {
                  $loginface='compartirmuro('.$value["id"].',1)';
                } else if ($values->CODIGO_TIPO_PROVEEDOR == 4) {
                  $logintw='compartirmuro('.$value["id"].',2)';
                }
            }
                       
        
        $textlink=  Framework::makeLinks($value["texto"]);
        $arrayprueba[$key]["texto"]=Framework::emoticons($value["texto"]); 
         $arrayprueba[$key]["NOMBRE_USUARIO"]=$value["NOMBRE_USUARIO"]; 
         $arrayprueba[$key]["IMAGEN_USUARIO"]=Framework::recortarimagen(array("imagen" =>$value["IMAGEN_USUARIO"], "ancho" => 60, "largo" => 60)); 
         $arrayprueba[$key]["CODIGO_USUARIO"]=$value["CODIGO_USUARIO"]; 
         $arrayprueba[$key]["created_at"]=$value["created_at"]; 
         $arrayprueba[$key]["updated_at"]=$value["updated_at"]; 
         $arrayprueba[$key]["id"]=$value["id"]; 
         $arrayprueba[$key]["json"]= json_decode(($value["json"])); 
         $arrayprueba[$key]["urlusuario"]=Framework::format_uris($value["NOMBRE_USUARIO"], "_", "u",$value["CODIGO_USUARIO"]);
         $arrayprueba[$key]["hace"]=$tiempo; 
         $arrayprueba[$key]["propio"]=$proip; 
           $arrayprueba[$key]["funciontw"]=$logintw; 
                      $arrayprueba[$key]["funcionfb"]=$logintw; 

         }
         return $arrayprueba;
           }
}


//public function comentario

public static function pintarmuro($args){
    
       $template='';
          if(isset($args["recurso"])){
            $template.='<input type="hidden" id="recursomuro" value="'.$args["recurso"].'"/>';
       }
        if(isset($args["tipo"])){
            $template.='<input type="hidden" id="tipocomentariorecurso" value="'.$args["tipo"].'"/>';
       }
       $tienetw=0;
       $tieneface=0;
         $credenciales = Credencial::where('USUARIO', '=', Auth::user()->CODIGO_USUARIO)->select("CODIGO_TIPO_PROVEEDOR")->get();
            foreach ($credenciales as $value) {
                if ($value->CODIGO_TIPO_PROVEEDOR == 2) {
                    $tieneface = 2;
                } else if ($value->CODIGO_TIPO_PROVEEDOR == 4) {
                    $tienetw = 2;
                }
            }
       $template.='<div class="textwallgen">  <textarea rows="2" placeholder="Ingresa un comentario.." class="editsimple" id="comentariorecurso"></textarea> '
               . ' <div class="btn-group" data-toggle="buttons">';
      if($tieneface==2){
           $botonfb='  <label class=" botonestexto btn btn-default facebook popovers" data-container="body"  data-content="Publicar en facebook" >
    <input id="comentariocheckfacebook" type="checkbox"><i class="fa fa-facebook-square"></i> 
  </label>';
      }else{
          $botonfb='<label id="twitterc" class="botonestexto btn btn-default facebook " onclick="loginsocial(1)" >
    <input  type="checkbox">Vincular facebook
  </label>';
      }
        if($tienetw==2){
          $bootontw='<label id="twitterc" class="botonestexto btn btn-default twitter popovers" data-container="body" data-content="Publicar en twitter" >
    <input id="comentariochecktwitter"  type="checkbox"><i class="fa fa-twitter-square"></i> 
  </label>';
      }else{
          $bootontw='<label id="twitterc" class="botonestexto btn btn-default twitter " onclick="loginsocial(2)" >
    <input   type="checkbox">Vincular twitter
  </label>';
      }
       
    
       
   $template.=' 
'.$botonfb.' '.$bootontw.'

</div>
</div>';
       $template.='  <div class=" contadjunprev">
          
            <div class="resultaadoadjuntopreview row">
                
            </div>
            
            <div id="muroajaxres">';
  
                      $Muro= new Muro();
                      
                      if(isset($args["recurso"])){
                                                $muro= $Muro->todosmensajesbyrecurs($args["cantidad"],$args["actual"],$args["recurso"],$args["tipo"]);

                      }else{
                                                $muro= $Muro->todosmensajes($args["cantidad"],$args["actual"]);

                      }
                      $mensajes=  Framework::armarmensajemuro($muro);
  
                     foreach ($mensajes as $mensaje) {
                        
                           if(count($mensaje["json"])!=0){
                         }                  

                         $template.='<div class="contgenwallad modcoment_'.$mensaje["id"].' row">
                            <a class=" col-xs-2" style="padding-left: 0px;" href="'.$mensaje["urlusuario"].'">
                                <img src="'.$mensaje["IMAGEN_USUARIO"].'">
                            </a>
                            <div class=" col-xs-9 col-sm-10  textomurowalld ">
                                <p><a href="'.$mensaje["urlusuario"].'">'.$mensaje["NOMBRE_USUARIO"].'</a> ';
                                          if($mensaje["propio"]){
                                             $template.='  <button class="btn btn-default btn-xs pull-right" onclick="borrarwalls('.$mensaje["id"].')">X</button>';
                                          }
                                $template.='  </p>
                                <p>'.$mensaje["texto"].' </p>
                            </div>
                            ';
                                 if(count($mensaje["json"])!=0){
                          $json=$mensaje["json"][0]->response;
                          $urlembed=0;
                          if(isset($json->urlembed)){
                              $urlembed=$json->urlembed;
                          }
                          
                          $texto1=str_replace('"', "", $json->titulo);
                     
                          $desc="";
                          if(isset($json->desc)){
                              $desc=$json->desc;
                          }
                          
                         
                          
                            $imagen="";
                          if(isset($json->imagen)){
                              $imagen=$json->imagen;
                          }
                          
                         
                          
                           $template.=' <div class=" col-sm-12  contadjwall">
                                <div onclick="popuplink({urlembed:\''.$urlembed.'\',url:\''.$json->url.'\',type:\''.$json->type.'\',titulo:\''.$texto1.'\'})" class="col-sm-6 textpintcontad">
                                    <div class="tituloajuntowallpreviw">'.$json->titulo.'</div>
                                    <div class="descripcionadjuntowallpreviw">'.$desc.'</div>
                                </div>
                                <div  onclick="popuplink({urlembed:\''.$json->urlembed.'\',url:\''.$json->url.'\',type:\''.$json->type.'\',titulo:\''.$texto1.'\'})" class="col-sm-6 imagprinwallad">
                                    <img class="imagenpreviews" src="'.$imagen.'">
                                </div> 
                            </div> ';
                              }
                               $credenciales = Credencial::where('USUARIO', '=', Auth::user()->CODIGO_USUARIO)->select("CODIGO_TIPO_PROVEEDOR")->get();
            
                            $loginface='loginsocial(1)';  
                            $logintw='loginsocial(2)';  
             foreach ($credenciales as $value) {
                if ($value->CODIGO_TIPO_PROVEEDOR == 2) {
                  $loginface='compartirmuro('.$mensaje["id"].',1)';
                  $textocompartir="Publicar en Facebook";
                } else if ($value->CODIGO_TIPO_PROVEEDOR == 4) {
                  $logintw='compartirmuro('.$mensaje["id"].',2)';
                  $textocompartir="Publicar en Twitter";

                }
            }
                              
                              
                               $template.='<div class="col-sm-12 contcomwal comentariowallindi_56">
                                <div class="hacetantowall col-xs-4"><button onclick="loginsocial('.$mensaje["id"].')"  class="btn btn-default btn-xs pull-left popovers" data-container="body" data-content="Ver publicación"><i class="fa fa-external-link"></i></button> <button onclick="'.$loginface.'" class="facebook btn btn-default btn-xs pull-left popovers" data-container="body"  data-content="'.$textocompartir.'"><i class="fa fa-facebook-square"></i></button>  <button  onclick="'.$logintw.'"  class="twitter btn btn-default btn-xs pull-left popovers" data-container="body"  data-content="Publicar en facebook"><i class="fa fa-twitter-square"></i></button> '.$mensaje["hace"].'</div>
                                <div class="col-xs-4 btn-link btn" onclick="mostrarcomentarioswall('.$mensaje["id"].',5)">Ver comentarios</div>
                                <div class="col-xs-4 btn-link btn" onclick="viewcomment('.$mensaje["id"].')">Comentar</div>
                            </div>
                            <div class="col-xs-12 textmens repwall_'.$mensaje["id"].'"></div>
                            <div class="col-xs-12 repcomwall_'.$mensaje["id"].'"></div>
                    </div>';   
                     }
                     $template.='</div> <input type="hidden" id="actual" value="'.$args["actual"].'"/>';
                                $template.='    <div class="centrar" id="botonmostrarmas">
                                 <button class="btn btn-default btn-lg" onclick="mostrarmas()">Mostrar mas mensaje</button>  
                             </div> ';
                          $template.='</div>';
                     return $template;
}

public static function emoticons($text) {
    $icons = array(
            ':)'    =>  ' <i class="emot car1"></i>',
            '>:)'   =>   ' <i class="emot car2"></i>',
            'B)'    =>   ' <i class="emot car3"></i>',
            ':D'    =>    ' <i class="emot car4"></i>',
            ':P'    =>    ' <i class="emot car5"></i>',
            'XD'    =>    ' <i class="emot car6"></i>',
            ':|'   =>   ' <i class="emot car7"></i>',
            'o.O'   =>    ' <i class="emot car8"></i>',
            ' ?'    =>    ' <i class="emot car9"></i>',
            'o_o'    =>    ' <i class="emot car10"></i>',
           
    );
    return strtr($text, $icons);
}

public static function creaciondenotificacion($argas){
    
      $array=array();
   if(!isset($argas["t"])){
        $array[0]["response"]["imagen"]=$argas["imagen"];
        $array[0]["response"]["titulo"]=$argas["titulo"];
        $array[0]["response"]["type"]=$argas["type"];
        $array[0]["response"]["desc"]=$argas["desc"];
        $array[0]["response"]["url"]=$argas["desc"];
         }
    $jsonvar=  json_encode($array);
    $muro= new Muro();
    $muro->texto=$argas["texto"];
    $muro->CODIGO_USUARIO=$argas["usuario"];
    $muro->json=$jsonvar;
  echo   $muro->save();
}
    public function hola(){
        return "hola";
    }
      
         public static function bloquepreguntas($argas) {
             
             $framework= new Framework();
                $hacetanto=  $framework->hacetanto(strtotime($argas["updated_at"]));
$arraytags=  json_decode($argas["tags"]);
             $textotags="";
             foreach ($arraytags as $tags) {
                 $textotags.="<a class='btn btn-default btn-xs' onclick='abrirurl(\"/listapreguntas?tag=".$tags->id."\")' >#".$tags->id."</a>";
             }
             $html='<div style="margin-bottom: 10px;padding-bottom: 10px;"  class="work prolist col-xs-3 prod_"><div class="work-inner">
                    
<div class="work-img">
                            <img src="'.$argas["imagenrecurso"].'" alt="">
                            <div class="mask">
                                <p> 
                                
  
    </p>
                            </div>
                        </div>

                        
                        <div class="preg-desc">
                            <h4 style="margin-bottom: 10px;font-weight: normal;color: black;">'.$argas["nombrerecurso"].'</h4>
                        </div>
                   
                         
 <div class="preuntabloquelistar" onclick="openurl(\'pas/'.$argas["codigo_pregunta"].'/'.$argas["codigo_recurso"].'\')">
        <div onclick="" style="color: black;">
       
                       
	'.$argas["textopregunta"].'

                        </div>
<div class="contfooterpre"  >

 <span class="pull-right">  Hace  '.$hacetanto.' </span>
'.$textotags.'
</div>
                        </div>
                    </div></div>';
return $html;
/*

        $bloque = '';

        $framework= new Framework();
$pretuntasasesoria= new Preguntaasesoria();


$preguntastxt="";

    

    
   $hacetanto=  $framework->hacetanto(strtotime($pretunta->updated_at));
   
     	$arraytags=  json_decode($pretunta->TAGS);
             $textotags="";
             foreach ($arraytags as $tags) {
                 $textotags.="<a class='btn btn-default btn-xs' onclick='abrirurl(\"/listapreguntas?tag=".$tags->id."\")' >#".$tags->id."</a>";
             }
             
    $preguntastxt.=' <div class="preuntabloquelistar">
        <div  onclick="openurl(\'pas/'.$pretunta->CODIGO_PREGUNTA.'/'.$pretunta->CODIGO_PROYECTO.'\')" >
       
                            '.$pretunta->TEXTO_PREGUNTA.' 
                        </div>
<div class="contfooterpre">

 <span class="pull-right">  Hace    '.$hacetanto.'</span>
     '.$textotags.'
</div>
                        </div>';

       
         
$IMAGEN=Framework::recortarimagen(array("imagen" => $argas["imagen"], "ancho" => 370, "largo" => 165));
        $bloque.='  <div style="margin-bottom: 10px;padding-bottom: 10px;"  class="work prolist col-xs-3 prod_">
                    <div class="work-inner">
                    
<div class="work-img">
                            <img src="' . $IMAGEN . '" alt=""/>
                            <div class="mask">
                                <p> 
                                
'.$argas["autor"].'  
    </p>
                            </div>
                        </div>

                        
                        <div class="preg-desc">
                            <h4 style="margin-bottom: 10px;font-weight: normal;color: black;">'.$argas["nombre"].'</h4>
                        </div>
                   
                         
'.$preguntastxt.'
                    </div>
                </div>';
        //}
        
       // return $bloque;
 
 */
        
    }
    
    
 public static function formatUrlsInText($text){
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
            preg_match_all($reg_exUrl, $text, $matches);
            $usedPatterns = array();
            foreach($matches[0] as $pattern){
                if(!array_key_exists($pattern, $usedPatterns)){
                    $usedPatterns[$pattern]=true;
                    $text = str_replace  ($pattern, "<a href=".$pattern." >".$pattern."</a> ", $text);   
                }
            }
            return Framework::emoticons($text);            
}


public static function makeLinks($str) {
	$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
	$urls = array();
	$urlsToReplace = array();
	if(preg_match_all($reg_exUrl, $str, $urls)) {
		$numOfMatches = count($urls[0]);
		$numOfUrlsToReplace = 0;
		for($i=0; $i<$numOfMatches; $i++) {
			$alreadyAdded = false;
			$numOfUrlsToReplace = count($urlsToReplace);
			for($j=0; $j<$numOfUrlsToReplace; $j++) {
				if($urlsToReplace[$j] == $urls[0][$i]) {
					$alreadyAdded = true;
				}
			}
			if(!$alreadyAdded) {
				array_push($urlsToReplace, $urls[0][$i]);
			}
		}
		$numOfUrlsToReplace = count($urlsToReplace);
		for($i=0; $i<$numOfUrlsToReplace; $i++) {
			$str = str_replace($urlsToReplace[$i], "<a href=\"".$urlsToReplace[$i]."\">".$urlsToReplace[$i]."</a> ", $str);
		}
		return $str;
	} else {
		return $str;
	}
}
    
    public function obtenerbotontwitter($oauth_token, $oauth_token_secret) {

        require_once(app_path() . '/twitteroauth/twitteroauth.php');
        require_once(app_path() . '/twitteroauth/OAuth.php');


        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);

        $connection->get('account/verify_credentials');

        return $connection;
    }

    public function carousel($datos) {


        $circulitos = "";
        $items = '';
        $paginadores = "";
        
       
        if (count($datos["items"]) > 1) {


            foreach ($datos["items"] as $key => $value) {

                if ($key == 0) {
                    $circulitos.='<li data-target="#' . $datos["id"] . '" data-slide-to="0" class="active"></li>';
                } else {
                    $circulitos.='<li data-target="#' . $datos["id"] . '" data-slide-to="1" class=""></li>';
                }
            }

            $paginadores = ' 
      <a <button type="button"  class="left carousel-control" href="#' . $datos["id"] . '" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#' . $datos["id"] . '" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>';
        }
$cont=0;
        foreach ($datos["items"] as $key => $value) {
         
               $urlamigable="";
               $textopopover="";
               
               $editarbotones=0;
                   if(  isset($datos["tipo"])){
                                      
                       if($datos["tipo"]=="proyecto"){
                       $urlamigable = Framework::format_uris($value["NOMBRE"], "_", "",$value["CODIGO"]);
                       
                      $editar="editarproyecto";
                     $borrar="borrarproyecto";
                     $textopopover=" proyecto";
                     $editarbotones=1;
                       }
                       if($datos["tipo"]=="producto"){
                       $urlamigable = Framework::format_uris($value["NOMBRE"], "_", "p",$value["CODIGO"]);
                       $editar="editarproducto";
                     $borrar="borrarproducto";
                     $textopopover=" producto";
$editarbotones=1;
                       }
      if($datos["tipo"]=="equipo"){
                       $urlamigable = Framework::format_uris($value["NOMBRE"], "_", "o",$value["CODIGO"]);
                         $editar="editarequipo";
                       $borrar="borrarequipo";
                     $textopopover=" equipo";
                     
                     $miembrosorganizacion= new Organizacion();
                   $organizacionuusario=  $miembrosorganizacion->getorganizacipnorusuario($value["CODIGO"], Auth::user()->CODIGO_USUARIO);

                   
                   if(count($organizacionuusario)!=0){
                       $editarbotones=1;
                   }
                       }
    
                       }

                      
                       
            if ($cont == 0) {
                $items.='  <div data-container="body" data-placement="left" data-content="'.$value["NOMBRE"].'"   class="popovers item active"><img  onclick="openurl(\''.$urlamigable.'\')"  class="imagencaorusel" src="' . Framework::recortarimagen(array("imagen" => $value["IMAGEN"], "ancho" => 284, "largo" => 206)) . '"> ';
  
                if($editarbotones==1){
                    
          
                $items.=  '<div class="botonesproceso">
                          <div class="btn-group">
  <button data-container="body" data-toggle="popover" data-placement="left" data-content="Borrar '.$textopopover.'" onclick="'.$borrar.'('.$value["CODIGO"].')" type="button" class="btn btn-default btn-sm"><i class="fa fa-minus-square"></i></button>
  <button data-container="body" data-toggle="popover" data-placement="left" data-content="Editar '.$textopopover.'" onclick="'.$editar.'('.$value["CODIGO"].')" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></button>
</div>
</div>';
                      }
                $items.='</div>';
                
            } else {

                $items.='  <div class="item "><img onclick="openurl(\''.$urlamigable.'\')"  class="imagencaorusel" src="' . Framework::recortarimagen(array("imagen" => $value["IMAGEN"], "ancho" => 284, "largo" => 206)) . '">';
                             if($editarbotones==1){  
                $items.=  '<div class="botonesproceso">
                          <div class="btn-group">
 <button  data-container="body" data-toggle="popover" data-placement="left" data-content="Borrar '.$textopopover.'"  onclick="'.$borrar.'('.$value["CODIGO"].')" type="button" class="btn btn-default btn-sm"><i class="fa fa-minus-square"></i></button>
  <button data-container="body" data-toggle="popover" data-placement="left" data-content="Editar '.$textopopover.'" onclick="'.$editar.'('.$value["CODIGO"].')" type="button" class="btn btn-default btn-sm"><i class="fa fa-pencil-square-o"></i></button>
</div>
</div>';
                   }
                       $items.='</div>';
            }
        $cont++;
        }



        $formulario = ' <div id="' . $datos["id"] . '" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
       ' . $circulitos . '
      </ol>
      <div class="carousel-inner">
       
      ' . $items . '
     </div>
    ' . $paginadores . '
    </div>';
        return $formulario;
    }

        
        public static function hacetantostatic($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(12 * 30 * 24 * 60 * 60 => 'año',
            30 * 24 * 60 * 60 => 'mes',
            24 * 60 * 60 => 'dia',
            60 * 60 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ';
            }
        }
    }
        public function hacetanto($ptime) {
        $etime = time() - $ptime;

        if ($etime < 1) {
            return '0 seconds';
        }

        $a = array(12 * 30 * 24 * 60 * 60 => 'año',
            30 * 24 * 60 * 60 => 'mes',
            24 * 60 * 60 => 'dia',
            60 * 60 => 'hora',
            60 => 'minuto',
            1 => 'segundo'
        );

        foreach ($a as $secs => $str) {
            $d = $etime / $secs;
            if ($d >= 1) {
                $r = round($d);
                return $r . ' ' . $str . ($r > 1 ? 's' : '') . ' ';
            }
        }
    }

    public function stripAccents($str) {
        return strtr(utf8_decode($str), utf8_decode('àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ'), 'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUY');
    }

    function format_uri($string, $separator = '-', $controlador, $codigo) {
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array('&' => 'and');
        $string = mb_strtolower(trim($string), 'UTF-8');
        $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
        $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        return "/" . $controlador . "/" . $codigo . "/" . $string . ".html";
    }

    public static function format_uris($string, $separator = '-', $controlador, $codigo) {
        $retorno="";
        $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
        $special_cases = array('&' => 'and');
        $string = mb_strtolower(trim($string), 'UTF-8');
        $string = str_replace(array_keys($special_cases), array_values($special_cases), $string);
        $string = preg_replace($accents_regex, '$1', htmlentities($string, ENT_QUOTES, 'UTF-8'));
        $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
        $string = preg_replace("/[$separator]+/u", "$separator", $string);
        if($controlador!=""){
            $retorno .="/" . $controlador;
        }
        
        $retorno.=   "/" . $codigo . "/" . $string . ".html";
        
        return $retorno;
    }

    public function amigable($nombre, $codigo, $controlador) {
        $nombre = trim($nombre);

        $nombre = $this->stripAccents($nombre);
        $urlenriquecida = str_replace("  ", '', $nombre);

        $urlenriquecida = str_replace(array('[\', \']'), '', $nombre);
        $urlenriquecida = preg_replace('/\[.*\]/U', '', $nombre);
        $nombre = trim($nombre);

        $urlenriquecida = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $nombre);
        $urlenriquecida = htmlentities($nombre, ENT_COMPAT, 'utf-8');
        $nombre = trim($nombre);

        $urlenriquecida = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $nombre);
        $urlenriquecida = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '_', $nombre);



        if ($controlador) {
            "/" . $controladorfin = $controlador . "/";
        } else {
            $controladorfin = "/";
        }
        $fin = $controladorfin . $codigo . "/" . $urlenriquecida . ".html";
        return trim($fin);
    }

    public static function amigables($nombre, $codigo, $controlador) {
        $nombre = trim($nombre);

        $nombre = $this->stripAccents($nombre);
        $urlenriquecida = str_replace("  ", '', $nombre);

        $urlenriquecida = str_replace(array('[\', \']'), '', $nombre);
        $urlenriquecida = preg_replace('/\[.*\]/U', '', $nombre);
        $nombre = trim($nombre);

        $urlenriquecida = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '', $nombre);
        $urlenriquecida = htmlentities($nombre, ENT_COMPAT, 'utf-8');
        $nombre = trim($nombre);

        $urlenriquecida = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $nombre);
        $urlenriquecida = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '_', $nombre);



        if ($controlador) {
            "/" . $controladorfin = $controlador . "/";
        } else {
            $controladorfin = "";
        }
        $fin = $controladorfin . $codigo . "/" . $urlenriquecida . ".html";
        return trim($fin);
    }

    public static function selectize($array, $param) {
        $options = '';
        $atributos = "";
        foreach ($array as $value) {
            $options.=' <option value="' . $value["value"] . '"> ' . $value["name"] . '</option>';
        };

        if (isset($param["multiple"])) {
            $atributos.=" multiple ";
        }
        $message = '   <select ' . $atributos . ' class="' . $param["class"] . '" id="' . $param["id"] . '">
                          ' . $options . '
                                            </select>';
        return $message;
    }

    public static function bloquetextocomentario($args) {
        $formulario = "";
        $textarea = "";
        $tieneface = 0;
        $tienetw = 0;
        $tienegm = 0;
        $bototonface = "";
        $bototontw = "";
        $asesoria = "";
        $funcion = "";
        if (isset($args["sincompartir"])) {
            $sincompartir = $args["sincompartir"];
        }

        if (isset($args["function"])) {
            $funcion = $args["function"];
        } elseif (isset($_SESSION['f'])) {
            $funcion = $_SESSION['f'];
        }
        /*  if (isset($args["asesoria"])) {

          if($args["tipo"]==1){
          $asesoria='';
          $sincomentarios=4;
          }else{
          $sincomentarios=  $args["asesoria"];
          }



          } */
        $sincomentarios = $args["asesoria"];


        if (Auth::user()) {

            $urlamigable = Framework::format_uris(Auth::user()->NOMBRE_USUARIO, "_", "u", Auth::user()->CODIGO_USUARIO);

            $credenciales = Credencial::where('USUARIO', '=', Auth::user()->CODIGO_USUARIO)->select("CODIGO_TIPO_PROVEEDOR")->get();
            foreach ($credenciales as $value) {
                if ($value->CODIGO_TIPO_PROVEEDOR == 2) {
                    $tieneface = 2;
                } else if ($value->CODIGO_TIPO_PROVEEDOR == 4) {
                    $tienetw = 2;
                }
            }

            // $sincompartir



            if ($tieneface == 0) {
                $bototonface = '<a href="/loginface" class=" facebook" ><i class="fa fa-facebook facebooki"></i> Vincular facebook</a>';
            } else {
                $bototonface = '<input type="checkbox" checked="true" name="facebook" id="facebook">  <i class="fa fa-facebook facebooki"></i> Compartir en Facebook';
            }
            if ($tienetw == 0) {
                $bototontw = '<a href="/logintw" class=" twitter" ><i class="fa fa-twitter twitteri"></i> Vincular twitter</a>';
            } else {
                $bototontw = ' <input type="checkbox"  checked="true"  name="twitter" id="twitter">  <i class="fa fa-twitter twitteri"></i>  Compartir en Twitter';
            }
            $botonescompoartircompentario = "";
            if ($sincomentarios == 3) {


                $botonescompoartircompentario = ' <div class="col-sm-11">
                                                            <label  class="labelcompartir">
                                                            
                                                                ' . $bototonface . '
                                                            </label>
                                                            <label  class="labelcompartir" >
                                                                ' . $bototontw . '
                                                            </label>
                                                            ' . $asesoria . '
                                                           </div>';
            }
        }
        if (Auth::check()) {
            $textarea = '    
 <input type="hidden" value="0" id="paginador"/>
                                                    <input type="hidden" value="' . $args["tipo"] . '" id="tipo"/>                

<div class="col-sm-1 col-xs-3" style="padding: 0;">
                                                           <a href="' . $urlamigable . '"> <img src="' . Framework::recortarimagen(array("imagen" => Auth::user()->IMAGEN_USUARIO, "ancho" => 100, "largo" => 100)) . '" style="width: 54px;height: 54px"/></a>
                                                        </div>
                                                        <div class="col-sm-9 col-xs-6" style="padding: 0;">
                                                            <textarea  id="comentariosproyecto"  placeholder="Escribe un comentario" class="form-control"></textarea>
                                                        </div>
                                                        <div class="col-sm-2 col-xs-3" style="padding-right:0">
                                                            <button id="comentarproyecto" class="btn btn-default btn-lg botoncoment">
                                                                Comentar  
                                                            </button>
                                                        </div>
                                                        <div class="col-sm-1">

                                                        </div>
                                                        
' . $botonescompoartircompentario . '
                                                       ';
        } else {
            $textarea = '    <div class="botones" style="text-align: center;">
                                                            <h1>Para comentar tienes que estar registrado</h1>
                                                             <a href="/loginface" class="btn btn-default facebook btn-lg"><i class="fa fa-facebook"></i>  Iniciar con Face</a>
                                                            <a href="javascript:void(0)" onclick="pop(\'/logintw?wlogin=2&f=' . $args["function"] . '\', \'logueo twitter\',0)" class="btn btn-default twitter btn-lg"><i class="fa fa-twitter"></i>  Iniciar con Twitter</a>
                                                        </div> ';
        }

        return $textarea;
    }

    public static function botoncompartir($args) {

        if (Auth::check()) {
            $tienetw = 0;
            $tieneface = 0;
            $credenciales = Credencial::where('USUARIO', '=', Auth::user()->CODIGO_USUARIO)->select("CODIGO_TIPO_PROVEEDOR")->get();
            foreach ($credenciales as $value) {
                if ($value->CODIGO_TIPO_PROVEEDOR == 2) {
                    $tieneface = 2;
                } else if ($value->CODIGO_TIPO_PROVEEDOR == 4) {
                    $tienetw = 2;
                }
            }
            if ($tieneface == 2) {
                $botoncompartirface = '<a href="javascript:void(0)" onclick="compartir(1)" class="btn btn-default facebook btn-lg"><i class="fa fa-facebook"></i> FACEBOOK</a>';
            } else {
                $botoncompartirface = '   <a href="/loginface" class="btn btn-default facebook btn-lg"><i class="fa fa-facebook"></i>  Vincular a Facebook</a>';
            }
            if ($tienetw == 2) {
                $botoncompartirtw = '<a href="javascript:void(0)" onclick="compartir(2)" class="btn btn-default twitter btn-lg"><i class="fa fa-twitter"></i>  TWITTER</a>';
            } else {
                $botoncompartirtw = ' <a href="/logintw"  class="btn btn-default twitter btn-lg"><i class="fa fa-twitter"></i>    Vincular a Twitter</a>';
            }
            $botonescompartir = '    <div class="botones" style="text-align: center;">
                                                           ' . $botoncompartirface . ' 
                                                               ' . $botoncompartirtw . '
                                                        </div> ';
        } else {


            $botonescompartir = '    <div class="botones" style="text-align: center;">
<a href="/loginface" class="btn btn-default facebook btn-lg"><i class="fa fa-facebook"></i>   Compartir en  Facebook</a>
<a href="javascript:void(0)" onclick="pop(\'/logintw?compartir=2&wlogin=2&f=' . $args["function"] . '\', \'logueo twitter\',0)" class="btn btn-default twitter btn-lg"><i class="fa fa-twitter"></i>  Compartir en Twitter</a>
                                                        </div> ';
        }
        return $botonescompartir;
    }

    public function getCurrentUrl() {

        $domain = $_SERVER['HTTP_HOST'];

        $url = "http://" . $domain . $_SERVER['REQUEST_URI'];

        return $url;
    }

    public function devolvercomentariosrecurso($args) {

        $codigopropietario = $args["codigopropietario"];
        $limitegeneral = $args["limitegeneral"];
        $tiporecurso = $args["tiporecurso"];
        $codigorecurso = $args["codigorecurso"];
     //   $sencillos = 0;
       // if (isset($args["sencillos"])) {
         //   $sencillos = $args["sencillos"];
        //}
        if (isset($args["clase"])) {
            $clase = $args["clase"];
        }



        $asersoriaproyecto = new Asesoriaproyecto();


        if (isset($_POST["hash"])) {
            $todos = DB::table('COMENTARIO')
                    ->skip($limitegeneral)
                    ->take(1000)
                    ->join('USUARIO', 'COMENTARIO.CODIGO_USUARIO', '=', 'USUARIO.CODIGO_USUARIO')
                    ->select("TEXTO_COMENTARIO", "NOMBRE_USUARIO", "COMENTARIO.created_at", "CODIGO_COMENTARIO", "TIPO_USUARIO", "IMAGEN_USUARIO", "USUARIO.CODIGO_USUARIO")
                    ->where("CLASE_COMENTARIO", "=", $clase)
                    ->where("TIPO_RECURSO", "=", $tiporecurso)
                    ->where("TEXTO_COMENTARIO", "LIKE", "%" . $_POST["hash"] . "%")
                    ->where("CODIGO_RECURSO", "=", $codigorecurso)
                    ->orderBy('COMENTARIO.created_at', 'desc')
                    ->get();
        } elseif (isset($_POST["hashgeneral"])) {
            $todos = DB::table('COMENTARIO')
                    ->skip($limitegeneral)
                    ->take(1000)
                    ->join('ASESORIAPROYECTO', 'ASESORIAPROYECTO.CODIGO_RECURSO', '=', 'COMENTARIO.CODIGO_COMENTARIO')
                    ->join('ASESORIAPROYECTO_HASH', 'ASESORIAPROYECTO_HASH.CODIGO_ASESORIA', '=', 'ASESORIAPROYECTO.id')
                    ->where("CODIGO_HASH", "=", $_POST["hashgeneral"])
                    ->join('USUARIO', 'COMENTARIO.CODIGO_USUARIO', '=', 'USUARIO.CODIGO_USUARIO')
                    ->select("TEXTO_COMENTARIO", "NOMBRE_USUARIO", "COMENTARIO.created_at", "CODIGO_COMENTARIO", "TIPO_USUARIO", "IMAGEN_USUARIO", "USUARIO.CODIGO_USUARIO")
                    ->where("CLASE_COMENTARIO", "=", $clase)
                    ->where("COMENTARIO.TIPO_RECURSO", "=", $tiporecurso)
                    ->where("COMENTARIO.CODIGO_RECURSO", "=", $codigorecurso)
                    ->orderBy('COMENTARIO.created_at', 'desc')
                    ->get();
        } else {
            $todos = DB::table('COMENTARIO')
                    ->skip($limitegeneral)
                    ->take(1000)
                    ->join('USUARIO', 'COMENTARIO.CODIGO_USUARIO', '=', 'USUARIO.CODIGO_USUARIO')
                    ->select("TEXTO_COMENTARIO", "NOMBRE_USUARIO", "COMENTARIO.created_at", "CODIGO_COMENTARIO", "TIPO_USUARIO", "IMAGEN_USUARIO", "USUARIO.CODIGO_USUARIO")
                    ->where("CLASE_COMENTARIO", "=", $clase)
                    ->where("TIPO_RECURSO", "=", $tiporecurso)
                    ->where("CODIGO_RECURSO", "=", $codigorecurso)
                    ->orderBy('COMENTARIO.created_at', 'desc')
                    ->get();
     
        }

        $plantilla = "";
        $calificacion = new Calificacioncomentario();

        foreach ($todos as $value) {
            ///if(count($USUARIO)!=0){
            $tipo = "";
            if ($value->TIPO_USUARIO == 2) {
                $tipo = '<span class="label label-primary asesorlb" style="color:white">Asesor</span>';
            }
            $posicion = "";
            $color = "";
            if ($codigopropietario == $value->CODIGO_USUARIO) {
                $posicion = "left";
                $color = "background-color:#fff";

                $classleft = "col-sm-10 col-xs-8";
                $classriwhgt = "col-sm-2 col-xs-2";
            } else {
                $posicion = "right";
                $color = "background-color: rgb(250, 250, 250);";
                $classriwhgt = "col-sm-10 col-xs-8";
                $classleft = "col-sm-2 col-xs-2";
            }
            $botoneslogueo = "";

            // promediocalificacion
            $botoncalificar = "";
            $prom=0;
              if (Auth::check()) {
            if (Auth::user()->CODIGO_USUARIO != $value->CODIGO_USUARIO) {
                $prom = $calificacion->promediocalificacion($value->CODIGO_COMENTARIO);

              



                    $califif = $calificacion->obtenercalificacioncomentario($value->CODIGO_COMENTARIO);


                    if (count($califif) == 0) {

                        $botoncalificar = '<button class="btn btn-default " onclick="calificar(' . $value->CODIGO_COMENTARIO . ')"><i class="fa fa-thumbs-up"></i></button>';
                    } else {
                        $botoncalificar = '<button class="btn btn-default " >Ya calificaste este comentario</button>';
                    }
                }

                $botoneslogueo = ' <div class="row" id="btn_' . $value->CODIGO_COMENTARIO . '">
                                        <div class="input-group ">
                                              <span class="input-group-addon">' . round((int)$prom, 2) . '/5</span>
                                              ' . $botoncalificar . '
                                        </div>
                         </div>
                                                                      <div  class="puntaje  row" id="reccont_' . $value->CODIGO_COMENTARIO . '" style="display:none">
                                                                          <div class="col-sm-4">
                                                                              
                                                                          </div>
                                                                            <div class="col-sm-3 calificatext" id="textocoment_' . $value->CODIGO_COMENTARIO . '">
                                                                              Califica el comentario
                                                                          </div>
                                                                         <div class="col-sm-5" id="contslider_' . $value->CODIGO_COMENTARIO . '" >
                                                                             <div class="califi">
                                                                                 
                                                                           <input type="text" class="slider" id="rec_' . $value->CODIGO_COMENTARIO . '" value="" data-slider-min="1" data-slider-max="5" data-slider-step="1" data-slider-value="1" data-slider-orientation="horizontal" data-slider-tooltip="hide">

                                                                              </div>
                                                                             <div class="numberscalid">
                                                                                 <div class="1">1</div><div class="2">2</div><div class="3">3</div><div class="4">4 <span style="float: right;">5</span></div>
                                                                             </div>
                                                                         </div> 

                                                                     </div>';
            }
            $botonrating = "";

            if (Auth::check() && $codigopropietario != $value->CODIGO_USUARIO) {
                if (isset($args["asesoria"])) {
                    if (Auth::user()->CODIGO_USUARIO == $codigopropietario) {
                        if (isset($args["codigoestado"])) {
                            if ($args["codigoestado"] != 4) {
                                $botonrating = $botoneslogueo;
                            }
                        }
                    }
                }
            }
            $tags = "";
            


            $hace = $this->hacetanto(strtotime($value->created_at));
            $urlamigable = $this->format_uri($value->NOMBRE_USUARIO, "_", "u", $value->CODIGO_USUARIO);
            $plantilla.='<article id="chat-id-1" class="chat-item ' . $posicion . '"> 
                                                         <a href="' . $urlamigable . '" class="pull-' . $posicion . ' thumb-sm avatar">
                                                             <img src="' . $value->IMAGEN_USUARIO . '">
                                                         </a> 
                                                         <section class="chat-body">
                                                             <div class="panel b-light text-sm m-b-none"> 
                                                                 <div class="panel-body textpa " style="' . $color . '"> 
                                                                     <span class="arrow ' . $posicion . '">
                                                                         
                                                                     </span>
                                                                     <p class="m-b-none">
                                                                     </p>
                                                                     <div style="text-align:' . $posicion . '">
                                                                      <div class="nombrecoment">' . $value->NOMBRE_USUARIO . ' ' . $tipo . ' </div>
                                                                     <p class="comentariotexto">' . ($value->TEXTO_COMENTARIO) . '</p> 
                                                                     </div>
                                                                     ' . $tags . '
                                                                ' . $botonrating . '
                                                                 </div> 
                                                             </div>
                                                             <small class="text-muted" style="float: ' . $posicion . ';">hace ' . $hace . '</small>
                                                         </section>
                                                     </article>';
            // }
        }

        //  $inputsencillos="";
        //if($sencillos!=0){
        //  $inputsencillos='<input type="hidden" id="sencillos" value="'.$sencillos.'" />';
        //}
        $inputclase = "";
        if ($clase == 1 || $clase == 2 || $clase == 10) {
            if (!isset($args["sinclase"])) {
                $inputclase = ' <input type="hidden" id="clase" value="' . $clase . '" />';
            }
        }
        return $inputclase . $plantilla;
    }

    public function quitar_tildes($cadena) {
        $no_permitidas = array("á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹");
        $permitidas = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E");
        $texto = str_replace($no_permitidas, $permitidas, $cadena);
        return $texto;
    }

    public function arrobaporusuario($strTweet) {
        $strTweet = $this->quitar_tildes($strTweet);
        if (Auth::check()) {
            $strTweet = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1#<a href="javascript:void(0)" onclick="refrescarhash(\'\2\')">\2</a>', $strTweet);
        } else {
            $strTweet = preg_replace('/(^|\s)#(\w*[a-zA-Z_]+\w*)/', '\1#<a href="javascript:void(0)">\2</a>', $strTweet);
        }
        return $strTweet;
    }

    
    
     public function tagsasesoria($tipo) {


        $tasrecurso = new Tags();
        $tags = $tasrecurso->tagsasesoria($tipo);
        
     
        $textotags = "";
        for ($index = 0; $index < count($tags); $index++) {
            $textotags.="'".$tags[$index]->TEXTO_TAGS."'";
            if ($index != count($tags) - 1) {
                $textotags.=",";
            }
        }
        return $textotags;
    }
    
    public function tagscomas($recurso, $tipo) {


        $tasrecurso = new Tagsrecurso();
        $tags = $tasrecurso->obtenertagsrecursotipo($recurso, $tipo);
        $textotags = "";
        for ($index = 0; $index < count($tags); $index++) {
            $tag = Tags::find($tags[$index]->TAGS);
            $textotags.=$tag->TEXTO_TAGS;
            if ($index != count($tags) - 1) {
                $textotags.=",";
            }
        }
        return $textotags;
    }

        public function tagssolos($recurso, $tipo) {


        $tasrecurso = new Tagsrecurso();
        $tags = $tasrecurso->obtenertagsrecursotipo($recurso, $tipo);
        $textotags = "";
        for ($index = 0; $index < count($tags); $index++) {
            $tag = Tags::find($tags[$index]->TAGS);
            $textotags.=$tag->TEXTO_TAGS." ";
        
        }
        return $textotags;
    }

    
    public static function comentarioswallindi($valor){
        
        $comentario= new Comentario();
       $arrs = $comentario->comentariorecuro($valor["id"])->toArray();
    
    $resp=array();
    $cantidad=0;
       foreach ($arrs as $key=>$value) {
           if($cantidad<$valor["cantidad"]){
               
        
          $resp[$key]["comentario"]=$value["comentario"] ;
          $resp[$key]["urlus"]= Framework::format_uris($value["nombu"], "_", "u",$value["codus"]);
          $resp[$key]["imgus"]=Framework::recortarimagen(array("imagen" => $value["imgus"], "ancho" => 40, "largo" => 40)) ;
          $resp[$key]["comentario"]=$value["comentario"] ;
          $resp[$key]["nombu"]=$value["nombu"] ;
             }
          $cantidad++;
          }
          if(count($arrs)>5){
              $mostrarmas=true;
          }else{
             $mostrarmas=false; 
          }
       
       return json_encode(array("resp" => $resp,"codcom" => $valor["id"],"cantidad" => count($arrs),"mostrar"=>$mostrarmas));
    }
    
    public function tagsnum($recurso, $tipo) {


        $tasrecurso = new Tagsrecurso();
        $tags = $tasrecurso->obtenertagsrecursotipo($recurso, $tipo);
        $textotags = "";
        for ($index = 0; $index < count($tags); $index++) {
            $tag = Tags::find($tags[$index]->TAGS);
            $textotags.="<button class='btn btn-default'><i class='fa fa-tags'></i> " . $tag->TEXTO_TAGS . "</button> ";
        }
        return $textotags;
    }

    public function publicartw($args) {
        require_once(app_path() . '/clases/config.php');
        require_once(app_path() . '/clases/twitteroauth.php');

        $authtw = new Authtw();
        $prueba = $authtw->obtenertokentw();
        $connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $prueba[0]->OAUTH_TOKEN, $prueba[0]->OAUTH_TOKEN_SECRET);


        try {
            return $ff = $connection->post('statuses/update', array('status' => $args["mensaje"]));
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

     public static function invitarfacebook($user_ids) {
        $facebook = new Authfb();

        Facebook::setAccessToken($facebook->obtenertokenface());


        try {
		return Facebook::api('/apprequests', 'POST',array("message"=>"prueba",));

          //  return $res = Facebook::api('/me/friends');


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public static function obtenerusuariosfacebook() {
        $facebook = new Authfb();

        Facebook::setAccessToken($facebook->obtenertokenface());


        try {
        //    return $Facebook::api('/me/friends');
                        return $res = Facebook::api('/me/friends');


        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    public function publicarface($args) {
        $facebook = new Authfb();

        Facebook::setAccessToken($facebook->obtenertokenface());

        $req = array(
            'message' => $args["mensaje"],
            'name' => $args["nombre"],
            'link' => $args["link"],
            'description' => $args["descripcion"],
            'picture' => $args["imagen"]);

        try {
            return $res = Facebook::api('/me/feed', 'POST', $req);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function redireccionar() {
        $ruta = Route::getCurrentRoute()->getPath();

      
        if ($ruta != "login" && $ruta != "crearproyecto" && $ruta != "/" && $ruta != "" && $ruta != "logintw" && $ruta != "logingm" && $ruta != "loginface" && $ruta != "loginWithtwcall" && $ruta != "ingresarusuario" ) {
          
       
            Session::put("urllogout", $this->getCurrentUrl());
             } else {
             

                             
            Session::put("urllogout", "/muro");
        }
    }
    
    
 

    public static function recortarimagen($args) {

        
                $imagenrev= (parse_url($args["imagen"]));
              $explode=  explode("/", $imagenrev["path"]) ;
              $url="";
              if(isset($imagenrev["scheme"])){
                  
              if(count($explode)!=7){
                 $url= $imagenrev["scheme"]."://".$imagenrev["host"].$explode[0]."/".$explode[1]."/".$explode[2]."/".$explode[3]."/".$explode[4]."/"."s0"."/".$explode[5];
                  $args["imagen"]= $url;
                 }
                  }
              ///echo json_encode($imagenrev);
            
        $google = strpos($args["imagen"], "google");
        $facebook = strpos($args["imagen"], "facebook");
        $twitter = strpos($args["imagen"], "twimg");
        $imagen = "";
        if ($google) {
            $imagen3 = str_replace("/s0/", "/w" . $args["ancho"] . "-h" . $args["largo"] . "-c/", $args["imagen"]);
            $imagen1 = str_replace("s444", "w" . $args["ancho"] . "-h" . $args["largo"] . "-c", $imagen3);
            $imagen = str_replace("w770-h343-c", "w" . $args["ancho"] . "-h" . $args["largo"] . "-c", $imagen1);
        }
        if ($facebook) {
            
            if(isset($args["min"])){
                            $imagen = str_replace("square", "normal", $args["imagen"]);

            }else{
                                            $imagen = str_replace("square", "large", $args["imagen"]);

            }
        }
        if ($twitter) {
            $imagen = str_replace("_normal", "", $args["imagen"]);
        }

        return $imagen;
    }
    public static function recortarimagens($args) {

        
        
        $google = strpos($args["imagen"], "google");
        $facebook = strpos($args["imagen"], "facebook");
        $twitter = strpos($args["imagen"], "twimg");
        $imagen = "";
        if ($google) {
            $imagen3 = str_replace("/s0/", "/w" . $args["ancho"] . "-h" . $args["largo"] . "-c/", $args["imagen"]);
            $imagen1 = str_replace("s444", "w" . $args["ancho"] . "-h" . $args["largo"] . "-c", $imagen3);
            $imagen = str_replace("w770-h343-c", "w" . $args["ancho"] . "-h" . $args["largo"] . "-c", $imagen1);
        }
        if ($facebook) {
            
            if(isset($args["min"])){
                            $imagen = str_replace("square", "normal", $args["imagen"]);

            }else{
                                            $imagen = str_replace("square", "large", $args["imagen"]);

            }
        }
        if ($twitter) {
            $imagen = str_replace("_normal", "", $args["imagen"]);
        }

        return $imagen;
    }

    public function destruirsesion() {
        session_unset();
        session_destroy();
    }
   public function loginregistro($usuario, $password) {
        $framework = new Framework();
        $credenciales = array(
            "email" => $usuario,
            "password" => $password
        );


        $argumento = "";
        if (isset($_SESSION['compartir'])) {
            $argumento = $_SESSION['compartir'];
        }
        $function = "";
        $functionscript = "";
        if (isset($_SESSION['f'])) {
            $function = $_SESSION['f'];

            $functionscript = "window.opener." . $function . "(" . $argumento . ");";
        }
   
        if (Auth::attempt($credenciales)) {
            
            if (isset($_SESSION['wlogin']) == 2) {
                return "<script>
function cerrarventana(){
if (window.opener && !window.opener.closed)
{
  " . $functionscript . "
      

} open('/', '_self').close();
}                    
cerrarventana();

</script>
";
            } else {

                $framework->destruirsesion();
                
                  Mail::send('emails.bienvenida', array("nombre"=>Auth::user()->NOMBRE_USUARIO), function($message)
{
    $message->to(Auth::user()->email, Auth::user()->NOMBRE_USUARIO)->subject('Bienvenido!');
});
                return Redirect::to(Session::get('urllogout'));
            }
        } else {
            $framework->destruirsesion();
            return Redirect::to("/");
        }
    }
    
    
    public static function botonesadmin($argas){
        $formulario='';
        if(Auth::check()){
            if(Auth::user()->ID_ROL==2){
                $siinacti=2;
                $botoninactivo='';
                $botonactivo='';
               if($argas["tipo"]==3){
                   $organiazacion= Organizacion::find($argas["recurso"]);
                   if($organiazacion->CODIGO_ESTADO==2){
                       $siinacti=1;
                   }
               }
                  if($siinacti==1){
               $botonactivo='         <button  class="btn btn-success btn-lg" onclick="activarrecursoadmin({tipo:'.$argas["tipo"].',recurso:'.$argas["recurso"].'})">Activar equipo</button>';
            }
                                $botoninactivo='       <button class="btn btn-danger btn-lg"  onclick="borrarrecursoadmin({tipo:'.$argas["tipo"].',recurso:'.$argas["recurso"].'})">Borrar equipo</button>';
           
        $formulario='  <div class="col-md-12 centrar" style="padding: 10px;">
            '.$botonactivo.'
        '.$botoninactivo.'
         <hr>
         <textarea id="extra" placeholder="Ingrese informacion extra sobre por que se elimina o se activa esta informacion le llegara al usario en el email" class="form-control"></textarea>
     </div> ';
            }
                 }
        return $formulario;
    }
    
    public static function email($argas){
         Mail::send('emails.templategeneral', array("nombre"=>$argas["nombreusuario"],"mensaje"=>$argas["mensaje"],"extra"=>$argas["extra"]), function($message)
{
    $message->to($this->nombre, $this->nombre)->subject($this->nombre);
});
    }
    public function loginnormal($usuario, $password) {
        $framework = new Framework();
        $credenciales = array(
            "email" => $usuario,
            "password" => $password
        );


        $argumento = "";
        if (isset($_SESSION['compartir'])) {
            $argumento = $_SESSION['compartir'];
        }
        $function = "";
        $functionscript = "";
        if (isset($_SESSION['f'])) {
            $function = $_SESSION['f'];

            $functionscript = "window.opener." . $function . "(" . $argumento . ");";
        }
   
        if (Auth::attempt($credenciales)) {
            
            if (isset($_SESSION['wlogin']) == 2) {
                return "<script>
function cerrarventana(){
if (window.opener && !window.opener.closed)
{
  " . $functionscript . "
      

} open('/', '_self').close();
}                    
cerrarventana();

</script>
";
            } else {

                $framework->destruirsesion();

                return Redirect::to(Session::get('urllogout'));
            }
        } else {
            $framework->destruirsesion();
            return Redirect::to("/");
        }
    }

    public function bloqueproyecto($argas) {
            $proyecto=$argas["proyecto"];
        $categoria = CategoriaProyecto::find($proyecto->CODIGO_CATEGORIA_PROYECTO);
        $nombre = "";
        $imagen = "";
        $resumen = "";
        $valor = 0;
        $categoria = "";
        if (isset($categoria->NOMBRE_CATEGORIA_PROYECTO)) {
            $categoria = $categoria->NOMBRE_CATEGORIA_PROYECTO;
        }
        if (isset($proyecto->IMAGEN_PROYECTO)) {
            $imagen = $proyecto->IMAGEN_PROYECTO;
        }
        if (isset($proyecto->RESUMEN_PROYECTO)) {
            $resumen = $proyecto->RESUMEN_PROYECTO;
        }

        if (isset($proyecto->NOMBRE_PROYECTO)) {
            $nombre = $proyecto->NOMBRE_PROYECTO;
        }
        if (isset($proyecto->VALOR_TOTAL_PROYECTO)) {
            $valor = "  <p>$ ".$proyecto->VALOR_TOTAL_PROYECTO."  </p>";
        }
         if(isset($argas["sinprecio"])){
            $valor="";
        }
        if(isset($argas["full"])){
            $class="col-xs-12";
        }else{
                      $class="col-xs-4";
  
        }
         
       
        $aportes= new Aporte();
       $aportess= $aportes->aportesporproyecto($proyecto->CODIGO_PROYECTO);
     if($aportess!=0){
        $valortotal=($aportess*100)/$proyecto->VALOR_TOTAL_PROYECTO; 
     }else{
         $valortotal=0;
     }
       
         $rutaamigable=  $this->amigable($proyecto->NOMBRE_PROYECTO, $proyecto->CODIGO_PROYECTO, "");

        $bloque = '';
        $bloque.='  <div class="work '.$class.' pro_' . strtolower($categoria) . '" onclick="openurl(\''.$rutaamigable.'\')">
                        <div class="work-inner">
                                <div class="work-img">
                                             <img src="' . $imagen . '" alt=""/>
                                        <div class="mask">
                                                <p>' . $resumen . '</p>
                                        </div>
                                </div>
                                <div class="work-desc">
                                        <h4 style="margin-bottom: 10px;">' . $nombre . ' ' . $proyecto->CODIGO_PROYECTO . '</h4>
                                                <div class="progress  ">
                                                    <div class="progress-bar  progress-bar-warning"  role="progressbar" aria-valuenow="'.$valortotal.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$valortotal.'%">
                                                        <span class="sr-only">'.$valortotal.'% Complete</span>
                                                    </div>
                                                </div>
                                           ' . $valor .'   
                                </div>
                        </div>
                     </div>';

        return $bloque;
    }

    public static function bloquenoticiaexterna($noticia, $url) {

        $tipoproducto = Categorianoticia::find($noticia->CATEGORIA_NOTICIA);

        $bloque = '';

        if ($noticia->IMAGEN_NOTICIA) {
$IMAGEN=Framework::recortarimagen(array("imagen" => $noticia->IMAGEN_NOTICIA, "ancho" => 370, "largo" => 208));

//    $rutaamigable=  $this->amigable($noticia->NOMBRE_NOTICIAS_EXTERNAS, $noticia->CODIGO_NOTICIAS_EXTERNAS, "noticiasext");

            $bloque.='  <div onclick="abrirurl(\'' . $url . '\')" class="work prolist col-xs-4 prod_' . strtolower($tipoproducto->NOMBRE_CATEGORIA_NOTICIA) . '">
                    <div class="work-inner">
                        <div class="work-img">
                            <img src="' . $IMAGEN . '" alt=""/>
                            <div class="mask">
                                <p>' . $noticia->RESUMEN_NOTICIAS_EXTERNAS . '</p>
                            </div>
                        </div>
                        <div class="work-desc">
                            <h4 style="margin-bottom: 10px;">' . $noticia->NOMBRE_NOTICIAS_EXTERNAS . '</h4>
                           
                        </div>
                    </div>
                </div>';
        }
        return $bloque;
    }

    public static function bloquenoticiainterna($noticia, $url,$tipo) {
        $framework= new Framework();
     $tagscomas = $framework->tagssolos($noticia->CODIGO_CONTENIDO, $tipo);

        $tipoproducto = Categorianoticia::find($noticia->CATEGORIA_NOTICIA);

        $bloque = '';

if($noticia->IMAGEN_CONTENIDO){
//    $rutaamigable=  $this->amigable($noticia->NOMBRE_NOTICIAS_EXTERNAS, $noticia->CODIGO_NOTICIAS_EXTERNAS, "noticiasext");
$IMAGEN=Framework::recortarimagen(array("imagen" => $noticia->IMAGEN_CONTENIDO, "ancho" => 370, "largo" => 208));

        $bloque.='  <div onclick="abrirurl(\'' . $url . '\')" class="work '.$tagscomas.' prolist col-xs-4 prod_' . strtolower($tipoproducto->NOMBRE_CATEGORIA_NOTICIA) . '">
                    <div class="work-inner">
                        <div class="work-img">
                            <img src="' . $IMAGEN. '" alt=""/>
                            <div class="mask">
                                <p>' . $noticia->RESUMEN_CONTENIDO . '</p>
                            </div>
                        </div>
                        <div class="work-desc">
                            <h4 style="margin-bottom: 10px;">' . $noticia->TITULO_CONTENIDO . '</h4>
                           
                        </div>
                    </div>
                </div>';
        }
        return $bloque;
    }
    
 
    
    
  public static  function word_wrap_custom($text, $chars){
 $chars = $chars;$text = $text." ";
    $countchars = strlen($text);
    if($countchars > $chars)
    {
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
    }
    return $text;
}
    

    public function bloqueproducto($producto) {

        $tipoproducto = Tipoproducto::find($producto->CODIGO_TIPO_PRODUCTO);
         $rutaamigable=  $this->amigable($producto->REFERENCIA_PRODUCTO, $producto->CODIGO_PRODUCTO, "p");

        $bloque = '';
        $bloques = '';
        $bloques.='      <div  class="prolist col-xs-4 prod_' . strtolower($tipoproducto->NOMBRE_TIPO_PRODUCTO) . '" onclick="openurl(\''.$rutaamigable.'\')">
                    <div class="work-inner">
                        <div class="work-img">
                            <img src="' . $producto->IMAGEN_PRODUCTO . '" alt=""/>
                             <div class="mask">
                                <p>hola</p>
                            </div>
                        </div>
                        <div class="work-desc">
                            <h4>' . $producto->REFERENCIA_PRODUCTO . '</h4>
                            <p>$' . number_format($producto->PRECIO_PRODUCTO) . '</p>
                        </div>
                    </div>
                </div>';

        $bloque.='  <div class="work prolist col-xs-4 prod_' . strtolower($tipoproducto->NOMBRE_TIPO_PRODUCTO) . '" onclick="openurl(\''.$rutaamigable.'\')">
                    <div class="work-inner">
                        <div class="work-img">
                            <img src="' . $producto->IMAGEN_PRODUCTO . '" alt=""/>
                            <div class="mask">
                                <p>'.$producto->DESCRIPCIONCORTAPRODUCTO.'</p>
                            </div>
                        </div>
                        <div class="work-desc">
                            <h4 style="margin-bottom: 10px;">' . $producto->REFERENCIA_PRODUCTO . '</h4>
                           
                            <p>$ ' . number_format(($producto->PRECIO_PRODUCTO)*1.16) . '   </p>
                        </div>
                    </div>
                </div>';

        return $bloque;
    }

       public function imagenremota($imageURL){
          
          $tempFilename = $_SERVER['DOCUMENT_ROOT'].'/zend3/public/tempFiles/';
         $tempFilename .= uniqid().'_'.basename( $imageURL );
if( $imgContent = @file_get_contents( $imageURL ) ){
  if( @file_put_contents( $tempFilename , $imgContent ) ){
      $framework = new Framework();
    $prueba= realpath( $tempFilename );
            $prueba=$framework->subirfoto(array("tmp_name"=>$prueba,"error"=>0,"name"=>"imagen"));
    unlink( $tempFilename );
    return $prueba["resp"][0];
  }else{
      echo "Failed to Save Image";
  }
}else{
  # Failed to Get Image
          echo "Failed to get Image";

}            
    }
    
    
    public function subirarchivo(){
        $service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
        $user = "informacion@cristiangarcia.co";
        $pass = "wgdltvbwjvklwixf";
        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
        $docs = new Zend_Gdata_Docs($client);
$newDocumentEntry = $docs->uploadFile(
    $fileToUploadTemp, 
    $fileToUpload, 
    Zend_Gdata_Docs::lookupMimeType($fileExtension),
    $location
);
    }
    
    public function subirfoto($archivo) {

        if ($archivo["error"] > 0) {
            echo "Error: " . $archivo["error"] . "<br>";
        } else {
            $imag = $archivo["tmp_name"];
        }
        $service = Zend_Gdata_Photos::AUTH_SERVICE_NAME;
          $user = "informacion@cristiangarcia.co";
        $pass = "wgdltvbwjvklwixf";
        $client = Zend_Gdata_ClientLogin::getHttpClient($user, $pass, $service);
        // update the second argument to be CompanyName-ProductName-Version
        $gp = new Zend_Gdata_Photos($client, "Google-DevelopersGuide-1.0");
        $username = "default";
        $filename = $imag;
        $photoName = $archivo["name"];
        $photoCaption = "foto";
        $photoTags = "beadch, sundshine";

        $fd = $gp->newMediaFileSource($filename);
        $fd->setContentType("image/jpeg");
        $photoEntry = $gp->newPhotoEntry();
        $photoEntry->setMediaSource($fd);
        $photoEntry->setTitle($gp->newTitle($photoName));
        $photoEntry->setSummary($gp->newSummary($photoCaption));
        $keywords = new Zend_Gdata_Media_Extension_MediaKeywords();
        $keywords->setText($photoTags);
        $photoEntry->mediaGroup = new Zend_Gdata_Media_Extension_MediaGroup();
        $photoEntry->mediaGroup->keywords = $keywords;
        $albumQuery = $gp->newAlbumQuery();
        $albumQuery->setUser($username);
        $albumQuery->setAlbumName("fotosproductos");
        $albumQuery->setThumbsize(444);



        try {  

            $insertedEntry = $gp->insertPhotoEntry($photoEntry, $albumQuery->getQueryUrl());
            $mediaContentArray = $insertedEntry->getMediaGroup()->getContent();
            $contentUrl = $mediaContentArray[0]->getUrl();
            $mediaThumbnailArray = $insertedEntry->getMediaGroup()->getThumbnail();
            $ThumbnailUrl = $mediaThumbnailArray[0]->getUrl();
            $image = $ThumbnailUrl;
            $resultadofotos[0] = str_replace("s444", "s0", $image);
            $resultadofotos[2] = $contentUrl;

            return $retorno = array("resp" => $resultadofotos);
        } catch (Zend_Gdata_App_HttpException $httpException) {
            return $retorno = array("resp" => $httpException->getRawResponseBody());
        } catch (Zend_Gdata_App_Exception $e) {
            return $retorno = array("resp" => $e->getMessage());
        }
    }

    function listYoutubeVideo($id) {
        $video = array();

        try {
            $yt = new Zend_Gdata_YouTube();

            $videoEntry = $yt->getVideoEntry($id);

            $videoThumbnails = $videoEntry->getVideoThumbnails();
            $video = array(
                'thumbnail' => $videoThumbnails[0]['url'],
                'title' => $videoEntry->getVideoTitle(),
                'description' => $videoEntry->getVideoDescription(),
                'tags' => implode(', ', $videoEntry->getVideoTags()),
                'url' => $videoEntry->getVideoWatchPageUrl(),
                'flash' => $videoEntry->getFlashPlayerUrl(),
                'dura' => $videoEntry->getVideoDuration(),
                'id' => $videoEntry->getVideoId()
            );
        } catch (Exception $e) {
            /*
              echo $e->getMessage();
              exit();
             */
        }

        return $video;
    }

    function insertartags($tags, $tipo, $recurso) {
        $tagsrecurso = new Tagsrecurso();
        $tasbd = $tagsrecurso->obtenertagsrecursotipo($recurso, $tipo);
        if (count($tags) != 0) {



            $array = array();
            foreach ($tasbd as $tabd) {
                $array[] = $tabd->TAGS;
            }

            $results = array_diff($array, $tags);



            foreach ($results as $result) {
                Tagsrecurso::where('CODIGO_RECURSO', '=', $recurso)->where('TIPO_RECURSO', '=', $tipo)->where('TAGS', '=', $result)->delete();
            }




            foreach ($tags as $tag) {
                $tagss = $tagsrecurso->obtenertagsrecursotipotag($recurso, $tipo, $tag);
                if (count($tagss) == 0) {



                    $tagsrecurso = new Tagsrecurso();
                    $tagsrecurso->TAGS = $tag;
                    $tagsrecurso->CODIGO_RECURSO = $recurso;
                    $tagsrecurso->TIPO_RECURSO = $tipo;
                    $tagsrecurso->save();
                }
            }
        }
    }

    function subirvideos($archivo, $nombre) {

        $user = "tuproyectoco@gmail.com";
        $pass = "rbqfdrehvtbgxpfg";
        $yt_source = "prueba";
        $yt_api_key = 'AI39si6At34TXYKS9SGxbxMPlbk-zgZakdWCAQZdx27AlFT4Og9NQWqvddC-kysf34sSm0vDrNM3ttVgFU_uy0cj--RO9o6sbg';
        $authenticationURL = 'https://www.google.com/youtube/accounts/ClientLogin';
        $httpClient = Zend_Gdata_ClientLogin::getHttpClient(
                        $username = $user, $password = $pass, $service = 'youtube', $client = null, $source = $yt_source, // a short string identifying your application  
                        $loginToken = null, $loginCaptcha = null, $authenticationURL);

  
        $yt = new Zend_Gdata_YouTube($httpClient, $yt_source, NULL, $yt_api_key);
        $myVideoEntry = new Zend_Gdata_YouTube_VideoEntry();

        
        $filesource = $yt->newMediaFileSource($archivo["tmp_name"]);
        $filesource->setContentType($archivo["type"]);
        $filesource->setSlug($archivo["name"]);

        $myVideoEntry->setMediaSource($filesource);

        $myVideoEntry->setVideoTitle($nombre);
        $myVideoEntry->setVideoDescription($nombre);
// Note that category must be a valid YouTube category !
        $myVideoEntry->setVideoCategory('Nonprofit');

// Set keywords, note that this must be a comma separated string
// and that each keyword cannot contain whitespace
        $myVideoEntry->SetVideoTags('proyectos,tuproyecto,colombia,tuproyecto.com');


// Optionally set the video's location
        $yt->registerPackage('Zend_Gdata_Geo');
        $yt->registerPackage('Zend_Gdata_Geo_Extension');
        $where = $yt->newGeoRssWhere();
        $position = $yt->newGmlPos('37.0 -122.0');
        $where->point = $yt->newGmlPoint($position);
        $myVideoEntry->setWhere($where);

// Upload URI for the currently authenticated user
        $uploadUrl = 'http://uploads.gdata.youtube.com/feeds/users/default/uploads';

// Try to upload the video, catching a Zend_Gdata_App_HttpException
// if availableor just a regular Zend_Gdata_App_Exception

        try {
            $newEntry = $yt->insertEntry($myVideoEntry, $uploadUrl, 'Zend_Gdata_YouTube_VideoEntry');
            $id = $newEntry->getVideoId(); // YOUR ANSWER IS HERE :)
            return $retorno = array("resp" => $id, "error" => 1);
        } catch (Zend_Gdata_App_HttpException $httpException) {
            return $retorno = array("resp" => $httpException->getRawResponseBody(), "error" => 3);
        } catch (Zend_Gdata_App_Exception $e) {
            return $retorno = array("resp" => $e->getMessage(), "error" => 3);
        }
    }

}

Form::macro('acordiontextarea', function($nombre) {
    $class = '';
    if ($nombre["id"] == 1) {
        $class = "in";
    }
    

        
        $asesoriaproyecto= new Preguntaasesoria();
       $prueba= $asesoriaproyecto->asesoriapreguntaproyecto($nombre["proyecto"], $nombre["id"]);
       
if(count($prueba)==0){
    $botones=' <button class="btn btn-default" id="btn_preg_'.$nombre["id"].'" onclick="asesoriapop('.$nombre["id"].')">Quiero asesoria <i class="fa fa-hand-o-up"></i></button>
                 
                <button style="display:none" class="btn btn-success" id="btn_verpreg_'.$nombre["id"].'" onclick="verpreguntaasesoria('.$nombre["id"].')">Ver asesoria <i class="fa fa-hand-o-up"></i></button>
';
}else{
     $botones=' 
                <button class="btn btn-success" id="btn_verpreg_'.$nombre["id"].'" onclick="verpreguntaasesoria('.$nombre["id"].')">Ver  asesoria <i class="fa fa-hand-o-up"></i></button>
';
}
    
    
    
    return '    <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#acor_' . $nombre["id"] . '">
          ' . $nombre["desc"] . '  
        </a>
      </h4>
    </div>
    <div id="acor_' . $nombre["id"] . '" class="panel-collapse collapse ' . $class . '">
      <div class="panel-body">

        <div class="row sinborde">


            <div id="proyectonombre " class="col-md-5">
                <h1>' . $nombre["tit"] . ' <i class="fa fa-check-circle-o checkform" id="check_resp_' . $nombre["id"] . '"></i></h1>
            </div>
            <div  class="col-md-7 ">
            <textarea rows="10" class="edittotal" id="resp_' . $nombre["id"] . '">' . $nombre["value"] . '</textarea>
                <div class="botonasesoria">
               '.$botones.'


                </div>
            </div>   
        </div>
      </div>
    </div>
  </div>';
});
