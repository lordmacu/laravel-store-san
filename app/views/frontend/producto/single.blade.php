@extends('frontend/layouts/default')
@section('script')




@if($producto->docena==2)
<script>
	    $(".product-quantity .form-control").TouchSpin({
                buttondown_class: "btn quantity-down",
                buttonup_class: "btn quantity-up"
            });
            $(".quantity-down").html("<i class='fa fa-angle-down'></i>");
            $(".quantity-up").html("<i class='fa fa-angle-up'></i>");
</script>
@@else
<script>
	    $(".product-quantity .form-control").TouchSpin({
                buttondown_class: "btn quantity-down",
                buttonup_class: "btn quantity-up",
                step:12
            });
            $(".quantity-down").html("<i class='fa fa-angle-down'></i>");
            $(".quantity-up").html("<i class='fa fa-angle-up'></i>");
</script>
@endif
               <script type="text/javascript" src="{{ asset('/modulos/singular.js') }}"></script>


@stop




{{-- Page content --}}
@section('content')
<div class="main">
      <div class="container">
       
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
       <div class="sidebar col-md-3 col-sm-5">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              
<li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Tallas
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" style="display:none;">
                @foreach($tallas as $talla)
                  <li><a href="product-list.html"><i class="fa fa-circle"></i> {{$talla->nombre_talla}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Marcas
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" style="display:none;">
                @foreach($marcas as $marca)
                  <li><a href="product-list.html"><i class="fa fa-circle"></i> {{$marca->nombre_marca}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Material
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" style="display:none;">
                @foreach($materiales as $material)
                  <li><a href="product-list.html"><i class="fa fa-circle"></i> {{$material->nombre_material}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              
                <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Colores
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" style="display:none;">
                @foreach($colores as $color)
                  <li><a href="product-list.html"><i class="fa fa-circle"></i> {{$color->nombre_color}}</a></li>
                  @endforeach
                 
                </ul>
              </li>            
            </ul>

            <div class="sidebar-products clearfix">
              <h2>Productos similares</h2>
              
              @foreach($similares as $similar)
              <div class="item">
                <a href="/single/{{$similar['id']}}"><img src="{{Framework::recortarimagen(array("imagen" =>$similar["principal"], "ancho" => 65, "largo" => 65))}}" alt="{{$similar['nombre']}}"></a>
                <h3><a href="/single/{{$similar['id']}}">{{$similar['nombre']}}</a></h3>
                                    	@if (Sentry::check())

                                                         @if(Sentry::getUser()->hasAccess('mayorista'))
            @if($similar['preciom'])
                <div class="price">${{number_format($similar['preciom'])}}</div>
                
                @else
                                <div class="price">$ 0</div>

                @endif
                @else
                                <div class="price">${{number_format($similar['precio'])}}</div>
 
                @endif
                      @else
                                                      <div class="price">${{number_format($similar['precio'])}}</div>

                      
                      @endif
              </div>
              @endforeach
            </div>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="product-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                	 <div class="product-main-image">
                    <img src="{{$producto->principal}}" alt="Cool green dress with red bell" class="img-responsive imgprin" data-BigImgSrc="{{$producto->principal}}">
                  </div>
                  <div class="product-other-images">
                  	 	@foreach($todaimagenes as $allimagenes)


					<a href="javascript:void(0)" onclick="reemplazarimagen('{{$allimagenes->url}}')" class="active">
                                            <img alt="{{$producto->nombre_producto}}" src="{{Framework::recortarimagen(array("imagen" =>$allimagenes->url, "ancho" => 65, "largo" => 65))}}">
                                        </a>
						
					@endforeach
                  	
                  
                  </div>
                                	
           
                </div>
                <div class="col-md-6 col-sm-6">
                  <h1>{{$producto->nombre_producto}}</h1>
                  <div class="price-availability-block clearfix">
                    <div class="price">
                    	                                        	@if (Sentry::check())

                     @if(Sentry::getUser()->hasAccess('mayorista'))

                      <strong><span>$</span><?php echo $producto->precio_producto_m ?></strong>
                      
    <p class="help-block">Precio mayorista</p>

                      @else
                                            <strong><span>$</span><?php echo $producto->precio_producto ?></strong>

                      @endif
                       @else
                                                                   <strong><span>$</span><?php echo $producto->precio_producto ?></strong>

                       @endif
                    </div>
                    <div class="availability">
                      Disponible: <strong>En Stock</strong>
                    </div>
                  </div>
                                      @if(count($coloreslist)!=0)

                  <div class="muestracolor row">
                 <div class="muestreocolor col-xs-6 ">
                 	
                 </div>
                   <div class=" col-xs-6 ">
                 	Color muestra
                 </div>
                
               
                  </div>
                  @endif
                   @if(count($tallaslist)!=0  || count($coloreslist)!=0)
                  <div class="product-page-options">
                    @if($tallaslist)  <div class="pull-left">
                       
                        <label class="control-label">Tallas:</label>
                      
                      
                   
               {{ Form::select('talla_producto',$tallaslist,1,array("placeholder"=>"selecciona una Talla","class"=>"form-control input-sm","id"=>"talla_producto") )}}

                      
                    
                    </div>
                    @endif
                    @if(count($coloreslist)!=0)
                    <div class="pull-left">
                      <label class="control-label">Color:</label>
                       {{ Form::select('color_producto',$coloreslist,1,array("placeholder"=>"selecciona un color","class"=>"form-control input-sm","id"=>"color_producto") )}}

                    </div>
                    @endif
                  </div>
                   @endif
                  <div class="product-page-cart">
                   
                   
                   
                   
                      <div class="product-quantity">
                        <input id="product-quantity" type="text" value="1" readonly class="form-control input-sm">
                    </div>
                    
                    <a href="javascript::void(0)" id="agregarcarro" data-producto="{{$producto->id}}" class="btn btn-primary " >Agregar Carrito</a>
                  </div>
                    @if($producto->docena==1)
                        <p class="help-block">                 * Este producto solo se vende por docena
</p>

                 @endif
                  <div class="review"> 
                    <input type="range" value="4" step="0.25" id="backing4" style="display: none;">
                    <div class="rateit" data-rateit-backingfld="#backing4" data-rateit-resetable="false" data-rateit-ispreset="true" data-rateit-min="0" data-rateit-max="5">
                    <button id="rateit-reset-2" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-2" style="display: none;"></button><div id="rateit-range-2" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-2" aria-valuemin="0" aria-valuemax="5" aria-valuenow="4" aria-readonly="false" style="width: 80px; height: 16px;"><div class="rateit-selected rateit-preset" style="height: 16px; width: 64px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                   <!-- <a href="#"></a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="#">Opina</a>-->
                  </div>
                 <!--- <ul class="social-icons">
                    <li><a class="facebook" data-original-title="facebook" href="#"></a></li>
                    <li><a class="twitter" data-original-title="twitter" href="#"></a></li>
                    <li><a class="googleplus" data-original-title="googleplus" href="#"></a></li>
                    <li><a class="evernote" data-original-title="evernote" href="#"></a></li>
                    <li><a class="tumblr" data-original-title="tumblr" href="#"></a></li>
                 </ul>-->
                </div>

                <div class="product-page-content">
                  <ul id="myTab" class="nav nav-tabs">
                    <li><a href="#Description" data-toggle="tab">Descripcion</a></li>
                    <li><a href="#Information" data-toggle="tab">Informacion</a></li>
                    <!--<li class="active"><a href="#Reviews" data-toggle="tab">Observaciones(2)</a></li>-->
                  </ul>
                  <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="Description">
					<p>
					<?php echo $producto->descripcion_producto ?>
					</p>
                    </div>
                    <div class="tab-pane fade " id="Information">
                      <table class="datasheet">
                        <tbody><tr>
                          <th colspan="2">Datos del producto</th>
                        </tr>
                        
                        
                        
                        
                        @if($materialeslist)
                        <tr>
                        	
                          <td class="datasheet-features-type">Material</td>
                  			 <td> 
@foreach($materialeslist as $material)
<p>{{$material}}</p>
@endforeach
                  			 	 </td>
                     
                        </tr>
                          @endif
                        <tr>
                          <td class="datasheet-features-type">Marca</td>
                          <td>{{$nombremarca}}</td>
                        </tr>
                                                @if($coloreslist)

                        <tr>
                          <td class="datasheet-features-type">Color</td>
                          
                        <?php
                        
                         ?>
                          <td>
@foreach($coloreslist as $color)
<p>{{$color}}</p>
@endforeach
                          	</td>
                        </tr>
                        @endif
                                                                        @if($tallaslist)

                        <tr>
                          <td class="datasheet-features-type">Talla</td>
                             <td>
@foreach($tallaslist as $talla)
<p>{{$talla}}</p>
@endforeach
                          	</td>
                          

                        </tr>
                        
                        
                        @endif
                        
                         
                        
                      </tbody></table>
                    </div>
                    <div class="tab-pane fade " id="Reviews">
                      <!--<p>There are no reviews for this product.</p>-->
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Bob</strong>
                          <em>30/12/2013 - 07:37</em>
                          <div class="rateit" data-rateit-value="5" data-rateit-ispreset="true" data-rateit-readonly="true"><button id="rateit-reset-3" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-3" style="display: none;"></button><div id="rateit-range-3" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-3" aria-valuemin="0" aria-valuemax="5" aria-valuenow="5" aria-readonly="true" style="width: 80px; height: 16px;"><div class="rateit-selected rateit-preset" style="height: 16px; width: 80px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Muy buenos jeans</p>
                        </div>
                      </div>
                      <div class="review-item clearfix">
                        <div class="review-item-submitted">
                          <strong>Mary</strong>
                          <em>13/12/2013 - 17:49</em>
                          <div class="rateit" data-rateit-value="2.5" data-rateit-ispreset="true" data-rateit-readonly="true"><button id="rateit-reset-4" data-role="none" class="rateit-reset" aria-label="reset rating" aria-controls="rateit-range-4" style="display: none;"></button><div id="rateit-range-4" class="rateit-range" tabindex="0" role="slider" aria-label="rating" aria-owns="rateit-reset-4" aria-valuemin="0" aria-valuemax="5" aria-valuenow="2.5" aria-readonly="true" style="width: 80px; height: 16px;"><div class="rateit-selected rateit-preset" style="height: 16px; width: 40px;"></div><div class="rateit-hover" style="height: 16px;"></div></div></div>
                        </div>                                              
                        <div class="review-item-content">
                            <p>Excelente jeans.</p>
                        </div>
                      </div>

                      <!-- BEGIN FORM-->
                      <form action="#" class="reviews-form" role="form">
                        <h2>OPINA</h2>
                        <div class="form-group">
                          <label for="name">NOMBRE <span class="require">*</span></label>
                          <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                          <label for="review">OBSERVACION <span class="require">*</span></label>
                          <textarea class="form-control" rows="8" id="review"></textarea>
                        </div>
                   
                        <div class="padding-top-20">                  
                          <button type="submit" class="btn btn-primary">ENVIAR</button>
                        </div>
                      </form>
                      <!-- END FORM--> 
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->

      
      </div>
    </div>
    
@stop