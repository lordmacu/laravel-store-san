@extends('frontend/layouts/default')

    <!-- END SLIDER -->
{{-- Page content --}}
@section('content')
 
    
<div id="carousel-example-captions" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-captions" data-slide-to="0" class=""></li>
        <li data-target="#carousel-example-captions" data-slide-to="1" class="active"></li>
        <li data-target="#carousel-example-captions" data-slide-to="2" class=""></li>
      </ol>
      <div class="carousel-inner">
        <div class="item">
        	
          <img  src="/baner12.jpg">
     
        </div>
        <div class="item active">
          <img  src="/baner12.jpg">
         
        </div>
        <div class="item">
          <img  src="/baner12.jpg">
          
        </div>
      </div>
      <a class="left carousel-control" href="#carousel-example-captions" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-captions" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    
    
    <div class="main" style="margin-top: 30px">
      <div class="container">
        <!-- BEGIN SALE PRODUCT & NEW ARRIVALS -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          
          
           <div class="col-md-12 sale-product">
            <h2>Nuevos Productos</h2>
            <div class="bxslider-wrapper">
              <ul class="bxslider" data-slides-phone="1" data-slides-tablet="2" data-slides-desktop="5" data-slide-margin="15">
                
             
              
               	
              	@foreach($ultimoshome as $ultimo)
              	
              	<li>
                  <div class="product-item">
                    <div class="pi-img-wrapper">
                      <img src="{{Framework::recortarimagen(array("imagen" => $ultimo->principal, "ancho" => 200, "largo" => 200))   }}" class="img-responsive" alt="Berry Lace Dress">
                      <div>
                        <a href="/single/{{$ultimo->id}}" class="btn btn-default ">Ver</a>
                      </div>
                    </div>
                    <h3><a href="item.html">{{$ultimo->nombre_producto}}</a></h3>
                                        	@if (Sentry::check())

                                         @if(Sentry::getUser()->hasAccess('mayorista'))

                    <div class="pi-price">${{number_format($ultimo->precio_producto_m)}}</div>
                    @else
                                        <div class="pi-price">${{number_format($ultimo->precio_producto)}}</div>

                    @endif
                       @else
                                                               <div class="pi-price">${{number_format($ultimo->precio_producto)}}</div>

                       @endif
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
    
        <!-- END SIDEBAR & CONTENT -->

        <!-- BEGIN TWO PRODUCTS & PROMO -->
       
        <!-- END TWO PRODUCTS & PROMO -->
      </div>
    </div>
      <div class="brands">
      <div class="container">
        <div class="row">
          <div class="bxslider-wrapper">
            <ul class="bxslider">
            	@foreach($marcas as $marca)
              <li><a href="#">
              	 <img src="{{Framework::recortarimagen(array("imagen" => $marca->imagen, "ancho" => 152, "largo" => 92))   }}"  title="{{$marca->nombre_marca}}"  alt="{{$marca->nombre_marca}}">

              	</a></li>
@endforeach
            </ul> 
          </div>
        </div>
      </div>
    </div>
@stop
