<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.1.1
Version: 2.0.2
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->

<!-- Head BEGIN -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
  <meta charset="utf-8">
  <title>MiSanvictorino</title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">
  <link href="../../favicon.ico" rel="SHORTCUT ICON" type="image/ico">

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700&subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow&subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('/f/assets/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="{{ asset('/f/assets/plugins/fancybox/source/jquery.fancybox.css') }}" rel="stylesheet">              
  <link href="{{ asset('/f/assets/plugins/bxslider/jquery.bxslider.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/f/assets/plugins/layerslider/css/layerslider.css') }}" type="text/css">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="{{ asset('/f/assets/css/style-metronic.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/f/assets/css/style.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('/f/assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css">  
  <link href="{{ asset('/f/assets/css/custom.css') }}" rel="stylesheet" type="text/css">
  <!-- Theme styles END -->
</head>
<!-- Head END -->
        
<!-- Body BEGIN -->
<body>
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                    	@if (Sentry::check())
                   	 @if(Sentry::getUser()->hasAccess('mayorista'))
					 										<li><a href="javascript::void(0)"><i class="fa fa-check-square-o"></i><b> MAYORISTA</b></a></li>

@endif			 
    @endif	                  
                    </ul>
                </div>
                <!-- END TOP BAR LEFT PART -->
                <!-- BEGIN TOP BAR MENU -->
                <div class="col-md-6 col-sm-6 additional-nav">
                    <ul class="list-unstyled list-inline pull-right">
                    
                      
				       @if (Sentry::check())
					 										<li><a href="/mispedidos"><i class="icon-cog"></i> Mis pedidos</a></li>
					 										<li><a href="/account/profile"><i class="icon-cog"></i> Mi Perfil</a></li>

				               <li>Bienvenid@, {{ Sentry::getUser()->first_name }}</li>
			
						
 @if(Sentry::getUser()->hasAccess('admin'))
										<li><a href="/admin"><i class="icon-cog"></i> Administracion</a></li>
										@endif
									
										<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Salir</a></li>
         
      
        
        						
        @else
        										<li><a href="{{ route('signup') }}"><i class="icon-off"></i> Ingresar</a></li>

        @endif						
										
                    </ul>
                </div>
                <!-- END TOP BAR MENU -->
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div role="navigation" class="navbar header no-margin">
        <div class="container">
            <div class="navbar-header">
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button> 
                <!-- END RESPONSIVE MENU TOGGLER -->
                <a href="http://www.misanvictorino.com.co/" class="navbar-brand"><img src="https://lh5.googleusercontent.com/-Spn3ZpFdcII/UzbZNOKqfyI/AAAAAAAAE10/amuv4LqkpMs/s150/logos.png" alt="Metronic Shop UI"></a><!-- LOGO -->
            </div>
            <!-- BEGIN CART -->
            <div class="cart-block">
                <div class="cart-info">
                    <a href="javascript:void(0);" class="cart-info-count"><span class="cantidadproductoscar">0</span> Articulos</a>
                    <a href="javascript:void(0);" class="cart-info-value">$0</a>
                </div>
                <span id="carroicono">  
                <i class="fa fa-shopping-cart"></i>
                </span>  
                <!-- BEGIN CART CONTENT -->
                <div class="cart-content-wrapper">
                  <div class="cart-content">
                    <ul class="scroller " id="conttienda" style="height: 250px;">
                      
                   
                    
                    </ul>
                    <div class="text-right">
                    	<a style="float: left;margin-left: 10px;" href="javascript::void(0)" onclick="cerrarcarro()" class="btn btn-primary btn-xs">Cerrar</a>

                      <a href="/carritodecompras" class="btn btn-default">Ver Carrito</a>
                      <a href="/checkout" class="btn btn-primary">Finalizar Compra</a>
                    </div>
                  </div>
                </div>
                <!-- END CART CONTENT -->
            </div>
            <!-- END CART -->
            <!-- BEGIN NAVIGATION -->
             
            <?php
                        		$categoriasproductos = new Categoriaproductos();
                        
                        $categoriaspadre=$categoriasproductos->categoriasproductopadre(0);
//var_dump($categoriaspadre);
$cont=0;
foreach ($categoriaspadre as $key => $value) {
	
	
//echo $value->id;
$categoriashead[$cont]["hijos"]=$categoriasproductos->categoriasproductoporpadre($value->id)->toArray();
$categoriashead[$cont]["padre"]["id"]=$value->id ; 
$categoriashead[$cont]["padre"]["nombre"]= strtoupper($value->nombre_categoria);
	  
	$cont++;
}
		//	var_dump($categorias);
                          ?>
            <div class="collapse navbar-collapse mega-menu">
            
<ul class="nav navbar-nav">
                    <li><a href="/productos?page=0&limit=24&sort=created_at&order=ASC">TODOS</a></li>
																	@foreach($categoriashead as $categoria)

                   @if(count($categoria["hijos"])!=0)
<li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" data-delay="0" data-close-others="false" data-target="/productos?page=0&categorias={{$categoria["padre"]["id"]}}" href="/productos?page=0&categorias={{$categoria["padre"]["id"]}}">
                        {{$categoria["padre"]["nombre"]}} 
                        
                        
                        <i class="fa fa-angle-down"></i>
                      </a>
                      <!-- BEGIN DROPDOWN MENU -->
                     
                    
                      <ul class="dropdown-menu">
                      	@foreach($categoria["hijos"] as $cat)

                        <li><a href="/productos?page=0&categorias={{$cat["id"]}}">{{strtoupper($cat["nombre_categoria"])}}</a></li>
                     @endforeach
                      </ul>
                   
                      <!-- END DROPDOWN MENU -->
                    </li>
                       @else
                                           <li><a href="/productos?page=0&categorias={{$categoria["padre"]["id"]}}">{{$categoria["padre"]["nombre"]}}</a></li>

                       @endif
                    @endforeach
               
                  
                   
                    <!-- BEGIN TOP SEARCH -->
                    <li class="menu-search">
                        <span class="sep"></span>
                        <i class="fa fa-search search-btn"></i>
                        <div class="search-box">
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" placeholder="Buscar" class="form-control">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </span>
                                </div>
                            </form>
                        </div> 
                    </li>
                    <!-- END TOP SEARCH -->
                </ul>
            </div>
            <!-- END NAVIGATION -->
        </div>
    </div>
    <!-- END HEADER -->

    <!-- BEGIN SLIDER -->
   

                    @yield('content')


    <!-- BEGIN BRANDS -->
  
    <!-- END BRANDS -->

    <!-- BEGIN STEPS -->
    <div class="steps3 steps3red">
      <div class="container">
        <div class="row">
          <div class="col-md-4 steps3-col">
            <i class="fa fa-truck"></i>
            <div>
              <h2>El envio libre</h2>
              <em>PLAZO DE ENTREGA 3 DIAS</em>
            </div>
            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps3-col">
            <i class="fa fa-gift"></i>
            <div>
              <h2>regalos</h2>

              <em>3 Precios Bajos</em>
            </div>

            <span>&nbsp;</span>
          </div>
          <div class="col-md-4 steps3-col">
            <i class="fa fa-phone"></i>
            <div>
              <h2>2433833</h2>
              <em>24/7 Atencion al cliente</em>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- END STEPS -->

    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
       
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Información</h2>
            <ul class="list-unstyled">
              <li><i class="fa fa-angle-right"></i> <a href="#">Quienes Somos</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Servicios</a></li>
              
            </ul>
          </div>
          <!-- END INFO BLOCK -->
          <!-- BEGIN TWITTER BLOCK --> 
          <!--<div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Latest Tweets</h2>
            <dl class="dl-horizontal f-twitter">
              <dt><i class="fa fa-twitter"></i></dt>
              <dd>
                <a href="#">@keenthemes</a>
                Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                <span>3 min ago</span>
              </dd>
            </dl>                    
            <dl class="dl-horizontal f-twitter">
              <dt><i class="fa fa-twitter"></i></dt>
              <dd>
                <a href="#">@keenthemes</a>
                Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                <span>3 min ago</span>
              </dd>
            </dl> 
            <dl class="dl-horizontal f-twitter">
              <dt><i class="fa fa-twitter"></i></dt>
              <dd>
                <a href="#">@keenthemes</a>
                Imperdiet condimentum diam dolor lorem sit consectetur adipiscing
                <span>3 min ago</span>
              </dd>
            </dl>           
          </div>--->
          <!-- END TWITTER BLOCK -->
          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>Otros Contactos</h2>
            <address class="margin-bottom-40">
             Carrera 10 N° 10-01 Oficina-306<br>
              Telefonos: 243 3833 - 6014724<br>
              Celular: 3132869250<br>
              Email: <a href="mailto:info@metronic.com">gerencia@misanvictorino.com.co</a><br>
              Skype: <a href="skype:metronic">misanvictorino</a>
            </address>
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
        <hr>
        <div class="row">
          <!-- BEGIN SOCIAL ICONS -->
          <div class="col-md-6 col-sm-6">
            <ul class="social-icons">
              <li><a class="rss" data-original-title="rss" href="#"></a></li>
              <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
              <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
              <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
              <li><a class="linkedin" data-original-title="linkedin" href="#"></a></li>
              <li><a class="youtube" data-original-title="youtube" href="#"></a></li>
              <li><a class="vimeo" data-original-title="vimeo" href="#"></a></li>
              <li><a class="skype" data-original-title="skype" href="#"></a></li>
            </ul>
          </div>
          <!-- END SOCIAL ICONS -->
          <!-- BEGIN NEWLETTER -->
          <div class="col-md-6 col-sm-6">
            <div class="pre-footer-subscribe-box pull-right">
              <h2>Boletin</h2>
              <form action="#">
                <div class="input-group">
                	
                  <input id="email_suscripcion" type="text" placeholder="tumail@mail.com" class="form-control">
                  <span class="input-group-btn">
                    <button class="btn btn-primary" id="suscripcion" >Suscribete</button>
                 
                  </span>
                </div>
                 <div class="input-group">
                  <div id="resultado"></div>
                </div>
              </form>
            </div> 
          </div>
          <!-- END NEWLETTER -->
        </div>
      </div>
    </div>
    <!-- END PRE-FOOTER -->

    <!-- BEGIN FOOTER -->
    <div class="footer padding-top-15">
      <div class="container">
        <div class="row">
          <!-- BEGIN COPYRIGHT -->
          <div class="col-md-6 col-sm-6 padding-top-10">
            2014 © MiSanvictorino 
          </div>
          <!-- END COPYRIGHT -->
          <!-- BEGIN PAYMENTS -->
          <div class="col-md-6 col-sm-6">
            <ul class="list-unstyled list-inline pull-right margin-bottom-15">
              <li><img src="/f/assets/img/payments/western-union.jpg" alt="We accept Western Union" title="We accept Western Union"></li>
              <li><img src="/f/assets/img/payments/american-express.jpg" alt="We accept American Express" title="We accept American Express"></li>
              <li><img src="/f/assets/img/payments/MasterCard.jpg" alt="We accept MasterCard" title="We accept MasterCard"></li>
              <li><img src="/f/assets/img/payments/PayPal.jpg" alt="We accept PayPal" title="We accept PayPal"></li>
              <li><img src="/f/assets/img/payments/visa.jpg" alt="We accept Visa" title="We accept Visa"></li>
            </ul>
          </div>
          <!-- END PAYMENTS -->
        </div>
      </div>
    </div>
    <!-- END FOOTER -->

    <!-- BEGIN fast view of a product -->
    <div id="product-pop-up" style="display: none; width: 700px;">
            <div class="product-page product-pop-up">
              <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-3">
                  <div class="product-main-image">
                    <img src="/f/assets/temp/products/model7.jpg" alt="Cool green dress with red bell" class="img-responsive">
                  </div>
                  <div class="product-other-images">
                    <a href="#" class="active"><img alt="Berry Lace Dress" src="/f/assets/temp/products/model3.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="/f/assets/temp/products/model4.jpg"></a>
                    <a href="#"><img alt="Berry Lace Dress" src="/f/assets/temp/products/model5.jpg"></a>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-9">
                  <h1>Cool green dress with red bell</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                      <strong><span>$</span>47.00</strong>
                      <em>$<span>62.00</span></em>
                    </div>
                    <div class="availability">
                      Availability: <strong>In Stock</strong>
                    </div>
                  </div>
                  <div class="description">
                    <p>Lorem ipsum dolor ut sit ame dolore  adipiscing elit, sed nonumy nibh sed euismod laoreet dolore magna aliquarm erat volutpat 
Nostrud duis molestie at dolore.</p>
                  </div>
                  <div class="product-page-options">
                    <div class="pull-left">
                      <label class="control-label">Size:</label>
                      <select class="form-control input-sm">
                        <option>L</option>
                        <option>M</option>
                        <option>XL</option>
                      </select>
                    </div>
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                      <select class="form-control input-sm">
                        <option>Red</option>
                        <option>Blue</option>
                        <option>Black</option>
                      </select>
                    </div>
                  </div>
                  <div class="product-page-cart">
                    <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly name="product-quantity" class="form-control input-sm">
                    </div>
                    <button class="btn btn-primary" type="submit">Add to cart</button>
                    <button class="btn btn-default" type="submit">More details</button>
                  </div>
                </div>

                <div class="sticker sticker-sale"></div>
              </div>
            </div>
    </div>
    <!-- END fast view of a product -->

    <!-- Load javascripts at bottom, this will reduce page load time -->
    <!-- BEGIN CORE PLUGINS (REQUIRED FOR ALL PAGES) -->
    <!--[if lt IE 9]>
    <script src="{{ asset('/f/assets/plugins/respond.min.js') }}"></script>  
    <![endif]-->  
    <script src="{{ asset('/f/assets/plugins/jquery-1.10.2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/f/assets/plugins/jquery-migrate-1.2.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/f/assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>      
    <script type="text/javascript" src="{{ asset('/f/assets/plugins/back-to-top.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/f/assets/plugins/jQuery-slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script type="text/javascript" src="{{ asset('/f/assets/plugins/fancybox/source/jquery.fancybox.pack.js') }}"></script><!-- pop up -->
    <script type="text/javascript" src="{{ asset('/f/assets/plugins/bxslider/jquery.bxslider.min.js') }}"></script><!-- slider for products -->
    <script type="text/javascript" src='{{ asset('/f/assets/plugins/zoom/jquery.zoom.min.js') }}'></script><!-- product zoom -->
    <script src="{{ asset('/f/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js') }}" type="text/javascript"></script><!-- Quantity -->

    <!-- BEGIN LayerSlider -->
    <script src="{{ asset('/f/assets/plugins/layerslider/jQuery/jquery-easing-1.3.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/f/assets/plugins/layerslider/jQuery/jquery-transit-modified.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/f/assets/plugins/layerslider/js/layerslider.transitions.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/f/assets/plugins/layerslider/js/layerslider.kreaturamedia.jquery.js') }}" type="text/javascript"></script>
    <!-- END LayerSlider -->

    <script type="text/javascript" src="{{ asset('/f/assets/scripts/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/f/assets/scripts/index.js') }}"></script>
	<script src="{{ asset('/assets/scripts/suscribete.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        jQuery(document).ready(function() {
            App.init();    
            App.initBxSlider();
            Index.initLayerSlider();
            App.initImageZoom();
            App.initTouchspin();
        });
        

        
    </script>
    
                  @section('script')

        @show
    <!-- END PAGE LEVEL JAVASCRIPTS -->
<!-- END BODY -->
</html>
<!-- Localized -->