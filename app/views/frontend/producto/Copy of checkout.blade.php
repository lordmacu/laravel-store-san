@extends('frontend/layouts/default')




{{-- Page content --}}
@section('content')
 <div class="main">
      <div class="container">
      
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
        	    @if(is_object($itemscarro))
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
          	{{ Form::open(array('autocomplete' => 'off','method' => 'post')) }}

            <h1>Termina tu compra</h1>
            <!-- BEGIN CHECKOUT PAGE -->
            <div class="panel-group checkout-page accordion scrollable" id="checkout-page">

        

              <!-- BEGIN PAYMENT ADDRESS -->
              <div id="payment-address" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#informaciondecliente" class="accordion-toggle">
                                       Paso 1:Información de envio
                    </a>
                  </h2>
                </div>
                <div id="informaciondecliente" class="panel-collapse collapse in">
                  <div class="panel-body row">
                    <div class="col-md-6 col-sm-6">
                      <h3>Tus datos personales</h3>
                      <div class="form-group">
                        <label for="firstname">Primer nombre <span class="require">*</span></label>
                        <input type="text" id="firstname" name="firstname"  value="{{ Sentry::getUser()->first_name }}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="lastname">Segundo nombre<span class="require">*</span></label>
                        <input type="text" id="lastname" name="lastname" value="{{ Sentry::getUser()->last_name }}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="email">E-Mail <span class="require">*</span></label>
                        <input type="text" id="email" name="email" value="{{ Sentry::getUser()->email }}" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="telephone">Telefono fijo <span class="require">*</span></label>
                        <input type="text" id="telephone" value="{{$adicional->telefono}}" name="telephone" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="fax">Celular</label>
                        <input type="text" id="celular" value="{{$adicional->celular}}" name="celular" class="form-control">
                      </div>

                
                    </div>
                    <div class="col-md-6 col-sm-6">
                      <h3>Tu dirección</h3>
                   
                      <div class="form-group">
                        <label for="address1">Direccion</label>
                        <input type="text" id="address1" value="{{$adicional->direccion}}" name="direccion" class="form-control">
                      </div>
                
                      <div class="form-group">
                        <label for="city">Ciudad <span class="require">*</span></label>
                        <input type="text" value="{{$adicional->ciudad}}" id="city" name="ciudad" class="form-control">
                      </div>
                     
                 
                    </div>
                    <hr>
          <button class="btn btn-primary  pull-right collapsed" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#metododepago" id="button-payment-address">Continuar</button>
                  </div>
                </div>
              </div>
              <!-- END PAYMENT ADDRESS -->

            
         

              <!-- BEGIN PAYMENT METHOD -->
              <div id="metododepagotab" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#metododepago" class="accordion-toggle">
                     Paso 2: Información de pago
                    </a>
                  </h2>
                </div>
                <div id="metododepago" class="panel-collapse collapse">
                  <div class="panel-body row">
                    <div class="col-md-12">
                      <p>Please select the preferred payment method to use on this order.</p>
                                  
                    </div>
                       <hr>
          <button class="btn btn-primary  pull-right collapsed" type="button" data-toggle="collapse" data-parent="#checkout-page" data-target="#confirm-content" id="button-payment-address">Continuar</button>
             
                  </div>
                </div>
              </div>
              <!-- END PAYMENT METHOD -->

              <!-- BEGIN CONFIRM -->
              <div id="confirm" class="panel panel-default">
                <div class="panel-heading">
                  <h2 class="panel-title">
                    <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
                     Paso 3:Confirmar orden
                    </a>
                  </h2>
                </div>
                <div id="confirm-content" class="panel-collapse collapse">
                  <div class="panel-body row">
              
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
                    <th class="shopping-cart-total" colspan="2">Total</th>
                  </tr>
              
                  @foreach($itemscarro->productos as $item)
                  
                  <tr>
                    <td class="shopping-cart-image">
                      <a href="#"><img src="{{Framework::recortarimagen(array("imagen" =>$item->imagen, "ancho" => 75, "largo" => 75))}}" alt="{{$item->nombre}}"></a>
                    </td>
                    <td class="shopping-cart-description">   
                      <h3><a href="/single/{{$item->id}}">{{$item->nombre}}</a></h3>
                      <p> @if(isset($item->color)) Color: {{$item->nombrecolor}}; @endif  @if(isset($item->talla)) Talla: {{$item->nombretalla}}; @endif </p>
                    </td>
                    <td class="shopping-cart-ref-no">
                      {{$item->referenciaproducto}}
                    </td>
                 <td class="shopping-cart-quantity">
                      <div class="product-quantity">

                      <strong><span></span>{{$item->cantidad}}</strong>

                      </div>
                    </td> 
                    <td class="shopping-cart-price">
                      <strong><span>$</span>{{number_format($item->precioun)}}</strong>
                    </td>
                    <td class="shopping-cart-total">
                      <strong><span>$</span>{{$item->preciototal}}</strong>
                    </td>
                    <td class="del-goods-col">
                      <a class="del-goods" href="javascript::void(0)" onclick="borraritemcarrocheck({{$item->id}})"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                 @endforeach

                </tbody></table>
                </div>

                <div class="shopping-total">
                  <ul>
                  
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price">{{$total}}</strong>
                    </li>
                  </ul>
                </div>
              </div>

              <button class="btn btn-primary"  type="submit">Confirmar orden <i class="fa fa-check"></i></button>
              <button type="button" class="btn btn-default pull-right margin-right-20">Cancelar</button>
            </div>
 

                  </div>
                </div>
              </div>
              <!-- END CONFIRM -->
            </div>
            <!-- END CHECKOUT PAGE -->
          </div>
          {{ Form::close() }}
@else
<div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <p>El carrito esta vacio</p>
              </div>
            </div>
@endif
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
    
@stop