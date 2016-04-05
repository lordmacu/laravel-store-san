@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Actualizar Marca ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		Actualizar marca

		<div class="pull-right">
			<a href="{{ route('marca') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
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

{{ Form::open(array('autocomplete' => 'off','method' => 'post','enctype'=>'multipart/form-data')) }}
    <div class="row">
    	   <div class="col-sm-12 camposform">
{{ Form::label('nombre_marca', 'Nombre marca') }}
{{ Form::text('nombre_marca',Input::old('nombre_marca', $marca->nombre_marca),array("class"=>"form-control")) }}
{{ $errors->first('nombre_marca', '<span class="help-inline">:message</span>') }}
		   </div>	
    <div class="col-sm-12 camposform">
{{ Form::label('descripcion_marca', 'Descripcion marca') }}
{{ Form::text('descripcion_marca',Input::old('descripcion_marca', $marca->descripcion_marca),array("class"=>"form-control")) }}
{{ $errors->first('descripcion_marca', '<span class="help-inline">:message</span>') }}
		   </div>		
   <div class="col-sm-12 camposform">
<label>Imagen Marca</label>
<input type="file" name="imagenmarca"/>      
		   </div>	
		   @if($marca->imagen)
		   <div class="col-sm-12" style="margin-top: 20px">
		   	
		   	  	<img src="{{$marca->imagen}}"/>

		   </div>
		   @endif
    	   <div class="col-sm-12" style="margin-top: 20px">
  <div class="btn-group">
  	<a class="btn btn-default" href="{{ route('marca') }}">Cancelar</a>
  	{{ Form::button('Publicar',array("type"=>"submit","class"=>"btn btn-default")) }}
  </div>
    </div>
</div>
{{ Form::close() }}


@stop
