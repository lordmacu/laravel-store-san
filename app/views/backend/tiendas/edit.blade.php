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
		<strong>Actualizar Stock De tienda <?php echo $nombre_tienda?></strong>

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
					
			<th class="span6">Nombre Producto</th>
			<th class="span6">Precio Producto</th>
			<th class="span6">Precio Mayorista</th>
			<th class="span2">Cantidad</th>
			<th class="span2">Seguimiento</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($tienda as $tienda)
		<tr>
			<td>{{ $tienda->nombre_producto }}</td>
			<td>{{ $tienda->precio_producto }}</td>
			<td>{{ $tienda->precio_producto_m }}</td>
			
			<td>{{ $tienda->total }}</td>
			<td><a href="{{ route('buscar/tienda', array($tienda->id_tienda, $tienda->id_producto)) }}" class="btn btn-small btn-info">visualizar</a></td>
			
		</tr>
		@endforeach
	</tbody>
	
</table>
    <div class="row">
    	   <div class="col-sm-12 camposform">


		   </div>	

  	
    	   <div class="col-sm-12">

  <div class="btn-group">
<a href="{{ route('agregar/tienda', $tienda->id_tienda) }}" class="btn btn-small btn-danger"><i class="fa fa-plus-square-o"></i> Adicionar Productos</a>
  </div>
    </div>
</div>
{{ Form::close() }}






@stop
