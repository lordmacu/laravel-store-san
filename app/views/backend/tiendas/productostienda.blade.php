@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Actualizar Tienda ::
@parent
@stop

{{-- Page content --}}
@section('content')


<div class="page-header">
	<h3>
		<h2 style="text-align: center"><strong>Tienda <?php echo $nombre_tienda?> </strong></h2>
		<div class="pull-right">
			<a href="{{ route('tienda') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
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


{{ Form::open(array('autocomplete' => 'off','method' => 'post')) }}


<table class="table table-bordered table-striped table-hover">
	
	<thead>
		<tr>
    
		  <th>Producto</th>
          <th>Color</th>
          <th>talla</th>
          <th>Cantidad</th>
          <th>Fecha Ingreso</th>
          <th>Comentarios</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($inventarios as $tienda)
		<tr>
			<td>{{ $tienda->nombre_producto }}</td>
			<td>{{ $tienda->nombre_color }}</td>
			<td>{{ $tienda->nombre_talla }}</td>
			
			<td>{{ $tienda->cantidad }}</td>
			<td>{{ $tienda->created_at }}</td>
			<td>{{ $tienda->comentario }}</td>

		</tr>
		@endforeach
	</tbody>
	
</table>

{{ Form::close() }}


@stop
