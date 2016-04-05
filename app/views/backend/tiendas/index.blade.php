@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Administracion de tiendas ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
Gestor Productos Tienda
		<div class="pull-right">
			<a href="{{ route('create/tienda') }}" class="btn btn-small btn-info"><i class="fa fa-plus-square-o"></i> Crear</a>
		</div>
	</h3>
</div>
<!---estos son los mensajes de error y que se inserto correctamente   no borrar-->
@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">{{ Session::get('error') }}</div>
@endif
<!---estos son los mensajes de error y que se inserto correctamente   no borrar-->

{{ $tiendas->links() }}   

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
			
			<th class="span6">@lang('admin/tiendas/table.title')</th>
			<th class="span2">Cantidad Total Productos</th>
			
			<th class="span2">@lang('table.actions')</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tiendas as $tienda)
		<tr>
			<td>{{ $tienda->first_name }}</td>
			<td>{{ $tienda->total }}</td>
			
			
			<td>
		
			<a href="{{ route('update/tienda', $tienda->id_tienda) }}" class="btn btn-small btn-danger"> Ver</a>
			</td>
		</tr>
		@endforeach
	</tbody>
	
</table>

{{ $tiendas->links() }}
@stop
