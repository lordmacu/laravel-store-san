@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Administracion de Destacados ::
@parent
@stop

@section("scripts")

<script>
	function buscarplu() {
		var valornmbre = $("#plubusqueda").val()
		console.log(valornmbre);

		window.location = "?id=" + valornmbre;
	}

	function buscarnombre() {
		var valornmbre = $("#nombrebusqueda").val()
		console.log(valornmbre);
		window.location = "?id=" + valornmbre;

	}
</script>
@stop

{{-- Page content --}}
@section('content')


<!---estos son los mensajes de error y que se inserto correctamente   no borrar-->
@if(Session::has('success'))
<div class="alert alert-success">
	{{ Session::get('success') }}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
	{{ Session::get('error') }}
</div>
@endif
<div class="row" style="padding: 10px;text-align: center">
	
	<div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          Agregar por referencia
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
{{ Form::open(array('autocomplete' => 'off','method' => 'post')) }}
{{ Form::select('nombre',$productoslist,"",array("placeholder"=>"Selecciona producto","class"=>"select","id"=>"nombre","style"=>"width:200px") )}}
<hr>
		<button class="btn  btn-default">
						<i class="fa fa-check"></i> Agregar popular
					</button>

{{ Form::close() }}

      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
          Agregar por plu
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body">
{{ Form::open(array('autocomplete' => 'off','method' => 'post')) }}
{{ Form::select('plu',$porplu,"",array("placeholder"=>"Selecciona producto","class"=>"select","id"=>"plu","style"=>"width:200px") )}}
<hr>
		<button class="btn  btn-default">
						<i class="fa fa-check"></i> Agregar popular
					</button>

{{ Form::close() }}
      </div>
    </div>
  </div>
 
</div>
	
	

</div>


<!---estos son los mensajes de error y que se inserto correctamente   no borrar-->

{{ $destacados->links() }}

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			<th class="span6">@lang('admin/tiendas/table.title')</th>
			<th class="span2">Plu producto</th>
			<th class="span2">Precio producto</th>
			<th class="span2">@lang('table.actions')</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($destacados as $destacado)
		<tr>
			<td>{{ $destacado->nombre_producto }}</td>
			<td>{{ $destacado->plu_producto }}</td>
			<td>{{ $destacado->precio_producto }}</td>

			<td>
			
					<a href="{{ route('delete/productos', $destacado->id) }}" class="btn btn-mini btn-danger">
						@lang('button.delete')
						</a>
				</td>  
		</tr>
		@endforeach
	</tbody>
</table>
@if(Input::get("borrados"))
<a href="{{route('productos')}}" name="back" class="btn default btn-xs">Ver activos</a>

@else
<a href="?borrados=1" class=" btn-xs btn btn-warning">Ver borrados</a>

@endif
{{ $destacados->links() }}
@stop
