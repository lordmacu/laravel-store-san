@extends('frontend/layouts/default')
@section('script')
               <script type="text/javascript" src="{{ asset('/sanvicto/public/modulos/listarproductos.js') }}"></script>


@stop
@section('content')

<div class="main">
      <div class="container">
    
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
       <div class="sidebar col-md-3 col-sm-5">
            <ul class="list-group margin-bottom-25 sidebar-menu">
              <li class="list-group-item clearfix dropdown">
                <a href="javascript:void(0);" class="">
                  <i class="fa fa-angle-right"></i>
                  Catetorias
                  <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu" style="display: none;">
                	                  <li><a href="/productos?page=0&limit=24&sort=created_at&order=ASC"><i class="fa fa-circle"></i> Todos</a></li>

                	@foreach($categorias as $categoria)
                	
                	

                	                   @if(count($categoria["hijos"])!=0)

                	 <li class="list-group-item dropdown clearfix">
                    <a href="javascript:void(0);" class=""><i class="fa fa-circle"></i> {{strtoupper($categoria["padre"]["nombre"])}}  <i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu" style="display: none;">
                      	                      	@foreach($categoria["hijos"] as $cat)

                                        <li><a href="/productos?page=0&categorias={{$cat["id"]}}"><i class="fa fa-circle"></i> {{strtoupper($cat["nombre_categoria"])}}</a></li>
                                        @endforeach
                    
                      </ul>  
                  </li>
                  @else
                    <li><a href="/productos?page=0&categorias={{$categoria["padre"]["id"]}}"><i class="fa fa-circle"></i> {{$categoria["padre"]["nombre"]}} </a></li>

                  @endif
                	@endforeach
                 
              
                </ul>
              </li>
<li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Tallas
                  <i class="fa fa-angle-down"></i>
                </a>
                @if(Input::get("talla")) <ul class="dropdown-menu" style="display:block;">  @else <ul class="dropdown-menu" style="display:none;"> @endif
                @foreach($tallas as $talla)
                  <li><a href="/productos?page=0&limit=24&talla={{$talla->id}}"><i class="fa fa-circle"></i> {{$talla->nombre_talla}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Marcas
                  <i class="fa fa-angle-down"></i>
                </a>
                @if(Input::get("marca")) <ul class="dropdown-menu" style="display:block;">  @else <ul class="dropdown-menu" style="display:none;"> @endif

                @foreach($marcas as $marca)
                  <li><a href="/productos?page=0&limit=24&marca={{$marca->id}}"><i class="fa fa-circle"></i> {{$marca->nombre_marca}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Material
                  <i class="fa fa-angle-down"></i>
                </a>
                
                @if(Input::get("materiales")) <ul class="dropdown-menu" style="display:block;">  @else <ul class="dropdown-menu" style="display:none;"> @endif
                @foreach($materiales as $material)
                  <li><a href="/productos?page=0&limit=24&materiales={{$material->id}}"><i class="fa fa-circle"></i> {{$material->nombre_material}}</a></li>
                  @endforeach
                 
                </ul>
              </li>
              
                <li class="list-group-item clearfix dropdown ">
                <a href="javascript:void(0);" >
                  <i class="fa fa-angle-right"></i>
                  Colores
                  <i class="fa fa-angle-down"></i>
                </a>
                @if(Input::get("colores")) <ul class="dropdown-menu" style="display:block;">  @else <ul class="dropdown-menu" style="display:none;"> @endif
                @foreach($colores as $color)
                  <li><a href="/productos?page=0&limit=24&colores={{$color->id}}"><i class="fa fa-circle"></i> {{$color->nombre_color}}</a></li>
                  @endforeach
                 
                </ul>
              </li>            
            </ul>

       
          </div>
          <!-- END SIDEBAR -->
          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-7">
            <div class="row list-view-sorting clearfix">
              <div class="col-md-2 col-sm-2 list-view">
                <a href="#"><i class="fa fa-th-large"></i></a>
                <a href="#"><i class="fa fa-th-list"></i></a>
              </div>
              <div class="col-md-10 col-sm-10">
              	<div class="paginacion pull-right">        	
              	    	
        	
              	@if(Input::get("categorias"))
              	              			{{$productosunicos->appends(array('order' => Input::get("order")))->appends(array('sort' => Input::get("sort")))->appends(array('categorias' => Input::get("categorias")))->links()}}
		
		              	@if(Input::get("sort"))
		              	
		              	@else
		              	              	{{$productosunicos->appends(array('categorias' => Input::get("categorias")))->links()}}
		
		              	@endif
              	@elseif(Input::get("sort"))
              			{{$productosunicos->appends(array('order' => Input::get("order")))->appends(array('sort' => Input::get("sort")))->appends(array('categorias' => Input::get("categorias")))->links()}}

              	@else
              	        {{ $productosunicos->links() }}

              	@endif	
              		
              	
              </div>
                <div class="pull-right">
                  <label class="control-label">Mostrar:</label>
                  <select class="form-control input-sm" id="cantidadpagina">
                    <option value="limit=24" selected="selected">24</option>
                    <option value="limit=25">25</option>
                    <option value="limit=50">50</option>
                    <option value="limit=75">75</option>
                    <option value="limit=100">100</option>
                  </select>
                </div>
                <div class="pull-right">
                  <label class="control-label">Organizar por: </label>
                  <select class="form-control input-sm" id="sortby">
                  	<option value="0" selected="selected" selected="selected">Seleccione uno</option>
                    <option value="sort=created_at&amp;order=ASC" >Nada</option>
                    <option value="sort=nombre_producto&amp;order=ASC">Nombre (A - Z)</option>
                    <option value="sort=nombre_producto&amp;order=DESC">Nombre (Z - A)</option>
                    <option value="sort=precio_producto&amp;order=ASC">Precio (Bajo &gt; Alto)</option>
                    <option value="sort=precio_producto&amp;order=DESC">Precio (Alto &gt; Bajo)</option>
                 
                  </select>
                </div>
                  
              </div>
            </div>
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
              <!-- PRODUCT ITEM START -->
                @foreach($productosunicos as $producto)
              <div class="col-md-4 col-sm-6 col-xs-12">
              
                  
                <div class="product-item">
                  <div class="pi-img-wrapper">
                    <img src="{{Framework::recortarimagen(array("imagen" =>$producto->principal, "ancho" => 238, "largo" => 238))}}" class="img-responsive" alt="{{$producto->nombre_producto}}">
                    <div>
                      <a href="/single/{{$producto->id}}" class="btn btn-default ">Ver</a>
                    </div>
                  </div>
                  <h3 style="height: 60px;"><a href="/single/{{$producto->id}}">{{$producto->nombre_producto}}</a></h3>
                  <div class="pi-price">${{ number_format($producto->precio_producto)}}</div>         
                </div>
              </div>
                @endforeach
              <!-- PRODUCT ITEM END -->

            </div>
            <!-- END PRODUCT LIST -->
            <!-- BEGIN PAGINATOR -->
            <div class="row">
              <div class="col-md-8 col-sm-8 paginacion">
              	
              	@if(Input::get("categorias"))
              	              	{{$productosunicos->appends(array('order' => Input::get("order")))->appends(array('sort' => Input::get("sort")))->appends(array('categorias' => Input::get("categorias")))->links()}}
		
		              	@if(Input::get("sort"))
		              	
		              	@else
		              	              	{{$productosunicos->appends(array('categorias' => Input::get("categorias")))->links()}}
		
		              	@endif
              	@elseif(Input::get("sort"))
              			{{$productosunicos->appends(array('order' => Input::get("order")))->appends(array('sort' => Input::get("sort")))->appends(array('categorias' => Input::get("categorias")))->links()}}

              	@else
              	        {{ $productosunicos->links() }}

              	@endif	
              	

              	
           
              </div>
            </div>
            <!-- END PAGINATOR -->
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>
          
@stop