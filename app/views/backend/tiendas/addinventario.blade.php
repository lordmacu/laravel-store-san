@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Create a New Blog Post ::
@parent
@stop

{{-- Page content --}}
@section('content')

@section('scripts')
<script src="{{ asset('/assets/plugins/select2/select2.min.js') }}" type="text/javascript"></script>
<script>
	$(document).ready(function(){  
  
    $("#seleccion_producto").click(function() {  
        if($("#seleccion_producto").is(':checked')) {  
            $("#campo_producto").show()
            $("#seleccion_plu").hide()
             
        } else {  
            $("#campo_producto").hide() 
            $("#seleccion_plu").show()
        }  
    });
    
      $("#seleccion_plu").click(function() {  
        if($("#seleccion_plu").is(':checked')) {  
            $("#campo_plu").show()
            $("#seleccion_producto").hide()
             
        } else {  
            $("#campo_plu").hide()
            $("#seleccion_producto").show() 
        }  
    });

})

	$("#codigo_producto").change(function() {

		producto = ($("#codigo_producto").val())

		$.ajax({
			type : "POST",
			url : "/tienda/verificarcombos",
			data : {
				producto : producto
			},
			success : function(datos) {

				var json = JSON.parse(datos);

				$("#codigo_color1").select2({
					placeholder : "Selecione un color",
					allowClear : true,
					data : json["colores"]
				});
				$("#codigo_tallas").select2({
					placeholder : "Selecione una talla",
					data : json["tallas"]
				});

			}
		});
	});
	
	$("#plu_producto").change(function() {

		plu = ($("#plu_producto").val())

		$.ajax({
			type : "POST",
			url : "/tienda/verificarcombosplu",
			data : {
				plu : plu
			},
			success : function(datos) {

				var json = JSON.parse(datos);

				$("#codigo_color1").select2({
					placeholder : "Selecione un color",
					allowClear : true,
					data : json["colores"]
				});
				$("#codigo_tallas").select2({
					placeholder : "Selecione una talla",
					data : json["tallas"]
				});

			}
		});
	});

</script>
@stop

<div class="page-header">
	<h3><strong> Agregar productos Tienda <?php echo $tienda?></strong>
	<div class="pull-right">
		<a href="{{ route('tienda') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
	</div></h3>
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

{{ Form::open(array('autocomplete' => 'off','method' => 'post','enctype'=>'multipart/form-data')) }}
<div class="row">

	<div class="col-sm-12 camposform">

		<input type="hidden" name="codigo_tienda" id="codigo_tienda" value="<?php echo $cod_tienda?>" />
	</div>

	<div class="col-sm-12 camposform">

		<input type="checkbox" name="seleccion_producto" id="seleccion_producto"  />

		{{ Form::label('seleccion', 'Producto') }}

		<div id="campo_producto" style="display:none">
			{{ Form::select('codigo_producto',$productos,"selector",array("placeholder"=>"selecciona un producto","class"=>"select","id"=>"codigo_producto","style"=>"width:200px") )}}
		</div>

	</div>

	<div class="col-sm-12 camposform">

		<input type="checkbox" name="seleccion_plu" id="seleccion_plu"  />

		{{ Form::label('seleccion', 'PLU') }}

		<div id="campo_plu" style="display:none">
			{{ Form::select('plu_producto',$plus,"selector",array("placeholder"=>"seleccione un plu","class"=>"select","id"=>"plu_producto","style"=>"width:200px") )}}
		</div>

	</div>

	<div class="col-sm-12 camposform">
		{{ Form::label('codigo_color', 'Color') }}

		<div>

			<input type="text" id="codigo_color1" name="codigo_color1"/>

		</div>
		{{ $errors->first('codigo_color', '<span class="help-inline">:message</span>') }}
	</div>

	<div class="col-sm-12 camposform">
		{{ Form::label('codigo_talla', 'Talla') }}
		<div>

			<input type="text" id="codigo_tallas" name="codigo_tallas"/>
		</div>
		{{ $errors->first('codigo_talla', '<span class="help-inline">:message</span>') }}
	</div>

	<div class="col-sm-12 camposform">
		{{ Form::label('cantidad', 'Cantidad') }}
		<div>
			<input type="text" name="cantidad" id="cantidad" value="{{ Input::old('cantidad') }}" />
		</div>
		{{ $errors->first('cantidad', '<span class="help-inline">:message</span>') }}
	</div>

	<div class="col-sm-12 camposform">
		{{ Form::label('comentarios', 'Comentarios') }}
		{{ Form::text('comentarios',Input::old('comentarios', ""),array("class"=>"form-control","style"=>"width:600px")) }}
		{{ $errors->first('comentarios', '<span class="help-inline">:message</span>') }}
	</div>

	<div class="col-sm-12" style="margin-top: 20px">

		<div class="btn-group">
			<a class="btn btn-default" href="{{ route('tienda') }}">Cancelar</a>
			{{ Form::button('Crear',array("type"=>"submit","class"=>"btn btn-default")) }}
		</div>
	</div>
</div>

{{ Form::close() }}

@stop
