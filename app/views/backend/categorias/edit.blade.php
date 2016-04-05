@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Actualizar Categoria ::
@parent
@stop

{{-- Page content --}}
@section('content')
<div class="page-header">
	<h3>
		Actualizar Categoria

		<div class="pull-right">
			<a href="{{ route('categoria') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
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
    		
		   <div class="col-sm-6 camposform">
{{ Form::label('padre', 'Categoria padre?') }}
{{ Form::select('padre',$categorias,$categoria->padre,array("class"=>"form-control")) }}
{{ $errors->first('padre', '<span class="help-inline">:message</span>') }} 
		   </div>   
    	   <div class="col-sm-12 camposform">
{{ Form::label('nombre_categoria', 'Nombre Categoria') }}
{{ Form::text('nombre_categoria',Input::old('nombre_categoria', $categoria->nombre_categoria),array("class"=>"form-control")) }}
{{ $errors->first('nombre_categoria', '<span class="help-inline">:message</span>') }}
		   </div>	
    <div class="col-sm-12 camposform">
{{ Form::label('descripcion_categoria', 'Descripcion categoria') }}
{{ Form::text('descripcion_categoria',Input::old('descripcion_categoria', $categoria->descripcion_categoria),array("class"=>"form-control")) }}
{{ $errors->first('descripcion_categoria', '<span class="help-inline">:message</span>') }}
		   </div>		
   <div class="col-sm-12 camposform">
<label>Imagen Categoria</label>
<input type="file" name="imagecategoria"/>      
		  </div>	 
		   @if($categoria->imagen)
		   <div class="col-sm-12" style="margin-top: 20px">
		   	
		   	  	<img src="{{$categoria->imagen}}"/>

		   </div>
		   @endif
    	   <div class="col-sm-12" style="margin-top: 20px">
  <div class="btn-group">
  	<a class="btn btn-default" href="{{ route('categoria') }}">Cancelar</a>
  	{{ Form::button('Publicar',array("type"=>"submit","class"=>"btn btn-default")) }}
  </div>
    </div>
</div>
{{ Form::close() }}


@stop
