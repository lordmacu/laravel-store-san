@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Administracion de Productos ::
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
<div class="page-header">
	<h3> Administración de Productos
	<div class="pull-right">
		<a href="{{ route('create/productos') }}" class="btn btn-sm btn-default"><i class="fa fa-plus-square-o"></i> Crear</a>
	</div></h3>

</div>
<div class="row" style="padding: 10px">

	<div class="col-sm-5" style="text-align: center">
		<button onclick="buscarnombre()" class="btn  btn-xs   btn-default">
			Buscar
		</button>

		{{ Form::select('size',$todos,"selector",array("placeholder"=>"selecciona uno","class"=>"select","id"=>"nombrebusqueda","style"=>"width:200px") )}}
	</div>
	<div class="col-sm-2">
		<a href="{{ route('productos') }}" class="btn btn-xs btn-default"> Borrar busqueda</a>
	</div>
	<div class="col-sm-5" style="text-align: center">
		<button onclick="buscarplu()"  class="btn btn-xs btn-default">
			Buscar
		</button>

		{{ Form::select('size',$plus,"selector",array("placeholder"=>"selecciona uno","class"=>"select","id"=>"plubusqueda","style"=>"width:200px") )}}

	</div>
</div>
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
<!---estos son los mensajes de error y que se inserto correctamente   no borrar-->

{{ $productos->links() }}

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
		@foreach ($productos as $producto)
		<tr>
			<td>{{ $producto->nombre_producto }}</td>
			<td>{{ $producto->plu_producto }}</td>
			<td>{{ $producto->precio_producto }}</td>

			<td>
				<a href="{{ route('update/productos', $producto->id) }}" class="btn btn-mini btn-default">
					@lang('button.edit')
					</a>
					<a href="{{ route('delete/productos', $producto->id) }}" class="btn btn-mini btn-danger">
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
{{ $productos->links() }}
@stop
