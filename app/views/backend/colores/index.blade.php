@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Administracion de Colores ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
Administración de Colores
		<div class="pull-right">
			<a href="{{ route('create/color') }}" class="btn btn-small btn-info"><i class="fa fa-plus-square-o"></i> Crear</a>
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

{{ $colores->links() }}   

<table class="table table-bordered table-striped table-hover">
	<thead>
		<tr>
		
			<th class="span6">@lang('admin/colores/table.title')</th>
			<th class="span2">@lang('table.actions')</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($colores as $color)
		<tr>
			<td>{{ $color->nombre_color }}</td>
			<td>
				<a href="{{ route('update/color', $color->id) }}" class="btn btn-mini btn-default">@lang('button.edit')</a>
				<a href="{{ route('delete/color', $color->id) }}" class="btn btn-mini btn-danger">@lang('button.delete')</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>

{{ $colores->links() }}
@stop
