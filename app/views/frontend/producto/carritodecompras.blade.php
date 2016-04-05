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
            <h1>Carro de compras</h1>
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
              <button class="btn btn-default" onclick="window.location='/productos?page=0&limit=24&sort=created_at&order=ASC'" type="submit">Continuar comprando <i class="fa fa-shopping-cart"></i></button>
              <button class="btn btn-primary"  type="submit">Pagar <i class="fa fa-check"></i></button>
            </div>
          </div>
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