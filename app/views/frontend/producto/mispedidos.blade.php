@extends('frontend/layouts/default')




{{-- Page content --}}
@section('content')
<div class="main">
      <div class="container">
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        	
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Mis Pedidos</h1>
            <div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart">
                  <tbody><tr> 
                    <th class="shopping-cart-image">Imagen</th>
                    <th class="shopping-cart-description">Descripción</th>
                    <th class="shopping-cart-ref-no">Ref No</th>
                    <th class="shopping-cart-quantity">Cantidad</th>
                    <th class="shopping-cart-price">Precio unitario</th>
                    <th class="shopping-cart-total" >Total</th>
                                        <th class="shopping-cart-total">Estado</th>

                  </tr>
                  
                  @foreach($pedidos as $item)
                  
                  <tr>
                    <td class="shopping-cart-image">
                      <a href="#"><img src="{{Framework::recortarimagen(array("imagen" =>$item->principal, "ancho" => 75, "largo" => 75))}}" alt="{{$item->nombre}}"></a>
                    </td>
                    <td class="shopping-cart-description">   
                      <h3><a href="/single/{{$item->id}}">{{$item->nombre_producto}}</a></h3>
                      <p> @if(isset($item->color)) Color: {{$item->nombrecolor}}; @endif  @if(isset($item->talla)) Talla: {{$item->nombretalla}}; @endif </p>
                    </td> 
                    <td class="shopping-cart-ref-no">
                      {{$item->plu_producto}}
                    </td>
                 <td class="shopping-cart-quantity">
                      <div class="product-quantity">

                      <strong><span></span>{{$item->cantidad}}</strong>

                      </div>
                    </td> 
                    <td class="shopping-cart-price">
                    	                   	 @if(Sentry::getUser()->hasAccess('mayorista'))
                      <strong><span>$</span>{{number_format($item->precio_producto_m)}}</strong>
                      @else
                                            <strong><span>$</span>{{number_format($item->precio_producto)}}</strong>

                      @endif
                    </td>
                    <td class="shopping-cart-total">
                    	       	 @if(Sentry::getUser()->hasAccess('mayorista'))
                      <strong><span>$</span><?php echo number_format(($item->cantidad* $item->precio_producto_m)) ?></strong>
                      @else
                      <strong><span>$</span><?php echo number_format(($item->cantidad* $item->precio_producto)) ?></strong>

                      @endif
                    </td>
                    <td class="del-goods-col">  
@if($item->estado==1)
Pendiente
@elseif($item->estado==2)
Enviado
@else
Completado
@endif
                    </td>
                  </tr>
                 @endforeach

                </tbody></table>
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