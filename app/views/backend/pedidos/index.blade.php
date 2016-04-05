@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Administracion de Pedidos ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
Administración de Pedidos
		<div class="pull-right">
			
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

{{ $pedidos->links() }}   

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
		
			<th class="span6">Numero de pedido</th>
			<th class="span2">Usuario</th>
			<th class="span2">Producto</th>
			<th class="span2">Visualizar</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($pedidos as $pedido)
		<tr>
			<td>{{ $pedido->id }}</td>
			<td>{{ $pedido->first_name}}</td>
			<td>{{ $pedido->nombre_producto}}</td>
			
				<td>
		
			<a href="{{ route('update/pedido', $pedido->id_usuario) }}" class="btn btn-small btn-danger"> Ver</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $pedidos->links() }}
@stop
