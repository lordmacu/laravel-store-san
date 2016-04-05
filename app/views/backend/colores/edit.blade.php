@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Actualizar Color ::
@parent
@stop
{{-- Page content --}}
@section('scripts')
 
  <script src="{{ asset('/assets/scripts/spectrum/spectrum.js') }}" type="text/javascript"></script>
 <link href="{{ asset('/assets/scripts/spectrum/spectrum.css') }}" rel="stylesheet" type="text/css"/>
 
 <script>

 
$("#showPalette").spectrum({
    showPalette: true,
    palette: [
        ['black', 'white', 'blanchedalmond'],
        ['rgb(255, 128, 0);', 'hsv 100 70 50', 'lightyellow']
    ]
});
 
 
 	
 </script>
@stop

@section('content')
<div class="page-header">
	<h3>
		Actualizar Color

		<div class="pull-right">
			<a href="{{ route('color') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
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
    <div class="row">
    	   <div class="col-sm-12 camposform">
{{ Form::label('nombre_color', 'Nombre Color') }}
{{ Form::text('nombre_color',Input::old('nombre_color', $color->nombre_color),array("class"=>"form-control")) }}
{{ $errors->first('nombre_color', '<span class="help-inline">:message</span>') }}
		   </div>
		   
		   	   <div class="col-sm-12 camposform">



{{ Form::text('codigo_color',Input::old('codigo_color', ""),array("class"=>"form-control","id"=>"showPaletteOnly")) }}

		   </div>		

    	   <div class="col-sm-12">

  <div class="btn-group">
  	<a class="btn btn-default" href="{{ route('color') }}">Cancelar</a>
  	{{ Form::button('Publicar',array("type"=>"submit","class"=>"btn btn-default")) }}
  </div>
    </div>
</div>
{{ Form::close() }}


@stop
