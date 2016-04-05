@extends('frontend/layouts/default')

    <!-- END SLIDER -->
{{-- Page content --}}
@section('content')
  <div class="page-slider margin-bottom-35">
      <!--LayerSlider begin-->
      <div id="layerslider" style="width: 100%; height: 494px; margin: 0 auto;">
          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer1" style="slidedirection: right; transition2d: 24,25,27,28; ">
            <img src="/f/assets/temp/sliders/slide1/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 title" style=" top: 96px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              Tones of <strong>shop UI features</strong> designed
            </div>
            <div class="ls-s-1 mini-text" style=" top: 338px; left: 35%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; showuntil : 4000; white-space: nowrap;">
              Lorem ipsum dolor sit amet  constectetuer diam<br > adipiscing elit euismod ut laoreet dolore.
            </div>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer2" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="/f/assets/temp/sliders/slide2/bg.jpg" class="ls-bg" alt="Slide background">
            <div class="ls-s-1 ls-title title" style=" top: 40%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              <strong class="title">Unlimted</strong>
              Layout Options
              <em class="title"></em>
            </div>

            <div class="ls-s-2 ls-price title" style=" top: 50%; left: 45%; slidedirection : fade; slideoutdirection : fade; durationout : 109750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
              <b>from</b>
              <strong><span>$</span></strong>
            </div>

            <a href="#" class="ls-s-1 ls-more mini-text" style=" top: 72%; left: 21%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; easingout : easeInOutQuint; delayin : 0; delayout : 0; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; display: inline-block; white-space: nowrap;">
              See More Details
            </a>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer3" style="slidedirection: right; transition2d: 92,93,105; ">
            <img src="/f/assets/temp/sliders/slide3/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 ls-title" style=" top: 83px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
          ejemplo
              <strong>de banner</strong>
              Is Ready For Your Project
            </div>

            <div class="ls-s-1" style=" top: 333px; left: 33%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap; font-size: 20px; font: 20px 'Open Sans Light', sans-serif;">
              <a href="#" class="ls-buy">
                Buy It Now!
              </a>
              <div class="ls-price">
                <span>All these for only:</span>
                <strong>25<sup>$</sup></strong>
              </div>
            </div>
          </div>

          <!--LayerSlider layer-->
          <div class="ls-layer ls-layer5" style="slidedirection: right; transition2d: 110,111,112,113; ">
            <img src="/f/assets/temp/sliders/slide5/bg.jpg" class="ls-bg" alt="Slide background">

            <div class="ls-s-1 title" style=" top: 35%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationin : 750; durationout : 750; easingin : easeOutQuint; rotatein : 90; rotateout : -90; scalein : .5; scaleout : .5; showuntil : 4000; white-space: nowrap;">
              The most<br>
              wanted bijouterie
            </div>

            <div class="ls-s-1 mini-text" style=" top: 70%; left: 60%; slidedirection : fade; slideoutdirection : fade; durationout : 750; easingin : easeOutQuint; delayin : 300; scalein : .8; scaleout : .8; showuntil : 4000; white-space: nowrap;">
              <span>Lorem ipsum and</span>
              <a href="#">Buy It Now!</a>
            </div>
          </div>
      </div>
      <!--LayerSlider end-->
    </div>
    <div class="main">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h2>Últimos productos</h2>
            <div class="bxslider-wrapper">
              <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="5" data-slide-margin="15">
              	
              	@foreach($ultimoshome as $ultimo)
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="{{Framework::recortarimagen(array("imagen" => $ultimo->principal, "ancho" => 200, "largo" => 200))   }}" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/single/{{$ultimo->id}}" class="btn btn-default ">link</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">Ver</a>
                      </div>
                    </div>
                    <h3><a href="item.html">{{$ultimo->nombre_producto}}</a></h3>
                    <div class="pi-price">${{number_format($ultimo->precio_producto)}}</div>
                    <a href="#" class="btn btn-default add2cart">Agregar</a>
                   <!-- <div class="sticker sticker-sale"></div>-->
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          <!-- END SALE PRODUCT -->
        </div>
        <!-- END SALE PRODUCT & NEW ARRIVALS -->

        <!-- BEGIN SIDEBAR & CONTENT -->
      <!_--  <div class="row margin-bottom-40 ">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-4">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              
          @foreach($categorias as $categoria)
              <li class="list-group-item clearfix"><a href="product-list.html"><i class="fa fa-angle-right"></i> {{$categoria->nombre_categoria	}}</a></li>
            @endforeach
            
            </ul>
          </div>
       
          <div class="col-md-9 col-sm-8">
            <h2>Destacados</h2>
            <div class="bxslider-wrapper">
              <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="3" data-slide-margin="15">
             
              @foreach($destacados as $destacado)
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                    	
                   <img src="{{Framework::recortarimagen(array("imagen" => $destacado->principal, "ancho" => 200, "largo" => 200))   }}" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/f/assets/temp/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="item.html">{{$ultimo->nombre_producto}}</a></h3>
                    <div class="pi-price">${{number_format($ultimo->precio_producto)}}</div>
                    <a href="#" class="btn btn-default add2cart">Add to cart</a>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
       
        </div>
          -->
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
        <div class="row margin-bottom-35 ">
          <!-- BEGIN TWO PRODUCTS -->
          <div class="col-md-6 two-items-bottom-items">
            <h2>Dos Articulos</h2>
            <div class="bxslider-wrapper">
              <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="2" data-slide-margin="15">
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="/f/assets/temp/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/f/assets/temp/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="item.html">Berry Vestido de encaje</a></h3>
                    <div class="pi-price">$29.00</div>
                    <a href="#" class="btn btn-default add2cart">Agregar Carrito</a>
                  </div>
                </li>
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="/f/assets/temp/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/f/assets/temp/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="item.html">Berry Vestido de encaje</a></h3>
                    <div class="pi-price">$29.00</div>
                    <a href="#" class="btn btn-default add2cart">Agregar Carrito</a>
                  </div>
                </li>
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="/f/assets/temp/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/f/assets/temp/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="item.html">Berry Vestido de encaje</a></h3>
                    <div class="pi-price">$29.00</div>
                    <a href="#" class="btn btn-default add2cart">Agregar Carrito</a>
                  </div>
                </li>
                <li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="/f/assets/temp/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/f/assets/temp/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
                        <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
                      </div>
                    </div>
                    <h3><a href="item.html">Berry Vestido de encaje</a></h3>
                    <div class="pi-price">$29.00</div>
                    <a href="#" class="btn btn-default add2cart">Agregar Carrito</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <!-- END TWO PRODUCTS -->
          <!-- BEGIN PROMO -->
          <div class="col-md-6">
            <div class="content-slider">
              <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                  <li data-target="#myCarousel" data-slide-to="1"></li>
                  <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item active">
                    <img src="/f/assets/temp/index-sliders/slide1.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="/f/assets/temp/index-sliders/slide2.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                  <div class="item">
                    <img src="/f/assets/temp/index-sliders/slide3.jpg" class="img-responsive" alt="Berry Lace Dress">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END PROMO -->
        </div>        
        <!-- END TWO PRODUCTS & PROMO -->
      </div>
    </div>
    
@stop
