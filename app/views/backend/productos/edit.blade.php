@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Edicion de Productos::
@parent
@stop

{{-- Page content --}}
@section('scripts')
<script src="{{ asset('/modulos/editproducto.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/bootstrap-maxlength.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/plupload.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('/assets/plugins/datatable.js') }}" type="text/javascript"></script>

<script>
	jQuery(document).ready(function() {
		EcommerceProductsEdit.init();
	});

	function borrarimagencarro(id) {
		$("#row_" + id).remove();
	}
	
	function borrarimagencarrocrear(id){
		
		  $.ajax({
        data: {id: id},
        url: '/borrarimagenproducto',
        type: 'post',
        success: function(response) {
            var response = JSON.parse(response);
            if (response.resp == true) {
               				$("#oldimage_" + id).remove();

            } else {
               // alertify.error(response.resp);

            }

        }
    });

		
	}
</script>
@stop
@section('content')

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

<div class="row">
	<div class="col-md-12">
		{{ Form::open(array('class'=>'form-horizontal form-row-seperated','autocomplete' => 'off','method' => 'post')) }}

		<div class="portlet">
			<div class="portlet-title">
				<div class="caption">
					<i class="fa fa-shopping-cart"></i>Editar Producto
				</div>
				<div class="actions btn-set">
					<a href="{{route('productos')}}" name="back" class="btn default">
						<i class="fa fa-angle-left"></i> Atras
					</a>
					<button class="btn green">
						<i class="fa fa-check"></i> Guardar
					</button>
					

				</div>
			</div>
			<div class="portlet-body">
				<div class="tabbable">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_general" data-toggle="tab"> General </a>
						</li>

						<li>
							<a href="#tab_images" data-toggle="tab"> Imagenes </a>
						</li>
<li>
							<a href="#tab_detalles" data-toggle="tab"> Detalles </a>
						</li>
					</ul>
					<div class="tab-content no-space">
						<div class="tab-pane active" id="tab_general">
							<div class="form-body">
								<div class="form-group">
									<label class="col-md-2 control-label">Nombre producto: <span class="required"> * </span> </label>

									<div class="col-md-10">
										{{ Form::text('nombre_producto',Input::old('nombre_producto', $producto->nombre_producto),array("class"=>"form-control")) }}
										{{ $errors->first('nombre_producto', '<span class="help-inline">:message</span>') }}
									</div>
								</div>
									<div class="form-group">
									<label class="col-md-2 control-label">PLU: <span class="required"> * </span> </label>
									<div class="col-md-10">
										{{ Form::text('plu_producto',Input::old('plu_producto', $producto->plu_producto),array("class"=>"form-control")) }}
										{{ $errors->first('plu_producto', '<span class="help-inline">:message</span>') }}

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Descripcion: <span class="required"> * </span> </label>
									<div class="col-md-10">
										{{ Form::textarea('descripcion_producto',Input::old('descripcion_producto',  $producto->descripcion_producto),array("class"=>"redactor_content form-control")) }}
										{{ $errors->first('descripcion_producto', '<span class="help-inline">:message</span>') }}

									</div>
								</div>
							
							<div class="form-group">
													<label class="col-md-2 control-label">Categories:
													<span class="required">
														 *
													</span>
													</label>
													<div class="col-md-10">
														<div class="form-control height-auto">
															<div class="scroller" style="height:275px;" data-always-visible="1">
																<ul class="list-unstyled">
																	<?php 
																	
																	function comparar($array,$item){
																		$retorno=2;
																		foreach ($array as $value) {
																			if($value==$item){
																			$retorno=3;	
																			}
																		}
																		return $retorno;
																	}
																	?>
																	@foreach($categorias as $categoria)
																	
																	<?php 
																	if(comparar(json_decode($producto->categorias),$categoria["padre"]["id"])==3){
																	$checked="checked='checked'";	
																	}else{
																		$checked="";
																	}
																	?>
																	<li>
																		<label><input type="checkbox" {{$checked}}  name="product[categories][]" value="{{$categoria["padre"]["id"]}}">{{$categoria["padre"]["nombre"]}}</label>
																		<ul class="list-unstyled">
																			@foreach($categoria["hijos"] as $cat)
																																					
<?php 
																		$checkeduno="";


																				if(comparar(json_decode($producto->categorias),$cat["id"])==3){
																	$checkeduno="checked='checked'";	
																	}
																				?>
																			<li>
																				<label><input type="checkbox" {{$checkeduno}} name="product[categories][]" value="{{$cat["id"]}}">{{$cat["nombre_categoria"]}}</label>
																			</li>
																			@endforeach
																		</ul>
																	</li>
																@endforeach
																
																</ul>
															</div>
														</div>
														<span class="help-block">
															Seleccione una o mas categorias
														</span>
													</div>
												</div>

							
							
								
								<!---	<div class="form-group">
								<label class="col-md-2 control-label">Available Date:
								<span class="required">
								*
								</span>
								</label>
								<div class="col-md-10">
								<div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
								<input type="text" class="form-control" name="product[available_from]">
								<span class="input-group-addon">
								to
								</span>
								<input type="text" class="form-control" name="product[available_to]">
								</div>
								<span class="help-block">
								availability daterange.
								</span>
								</div>
								</div>-->
							
								<div class="form-group">
									<label class="col-md-2 control-label">Precio Minorista: <span class="required"> * </span> </label>
									<div class="col-md-10">
										{{ Form::text('precio_producto',Input::old('precio_producto', $producto->precio_producto),array("class"=>"form-control")) }}
										{{ $errors->first('precio_producto', '<span class="help-inline">:message</span>') }}

									</div>
								</div>
									<div class="form-group">
									<label class="col-md-2 control-label">Precio Mayorista: <span class="required"> * </span> </label>
									<div class="col-md-10">
										{{ Form::text('precio_producto_m',Input::old('precio_producto_m', $producto->precio_producto_m),array("class"=>"form-control")) }}
										{{ $errors->first('precio_producto_m', '<span class="help-inline">:message</span>') }}

									</div>
								</div>
								
								<!---<div class="form-group">
								<label class="col-md-2 control-label">Tax Class:
								<span class="required">
								*
								</span>
								</label>
								<div class="col-md-10">
								<select class="table-group-action-input form-control input-medium" name="product[tax_class]">
								<option value="">Select...</option>
								<option value="1">None</option>
								<option value="0">Taxable Goods</option>
								<option value="0">Shipping</option>
								<option value="0">USA</option>
								</select>
								</div>
								</div>-->
									<div class="form-group">
									<label class="col-md-2 control-label">Marcas: <span class="required"> * </span> </label>
									<div class="col-md-10">
									{{ Form::select('marca_producto',$marcas,$producto->marca,array("placeholder"=>"selecciona una marca","class"=>"select","id"=>"marca_producto","style"=>"width:200px") )}}

									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Estado: <span class="required"> * </span> </label>
									<div class="col-md-10">
										{{ Form::select('size', array(1 => 'Publicado', 0 => 'No publicado'), $producto->status,array("class"=>"select"))}}

									</div>
								</div>
							</div>
						</div>
						<!---	<div class="tab-pane" id="tab_meta">
						<div class="form-body">
						<div class="form-group">
						<label class="col-md-2 control-label">Meta Title:</label>
						<div class="col-md-10">
						<input type="text" class="form-control maxlength-handler" name="product[meta_title]" maxlength="100" placeholder="">
						<span class="help-block">
						max 100 chars
						</span>
						</div>
						</div>
						<div class="form-group">
						<label class="col-md-2 control-label">Meta Keywords:</label>
						<div class="col-md-10">
						<textarea class="form-control maxlength-handler" rows="8" name="product[meta_keywords]" maxlength="1000"></textarea>
						<span class="help-block">
						max 1000 chars
						</span>
						</div>
						</div>
						<div class="form-group">
						<label class="col-md-2 control-label">Meta Description:</label>
						<div class="col-md-10">
						<textarea class="form-control maxlength-handler" rows="8" name="product[meta_description]" maxlength="255"></textarea>
						<span class="help-block">
						max 255 chars
						</span>
						</div>
						</div>
						</div>
						</div>-->
						<div class="tab-pane" id="tab_images">
							
							<div id="tab_images_uploader_container" class="text-align-reverse margin-bottom-10">
								<a id="tab_images_uploader_pickfiles" href="javascript:;" class="btn yellow"> <i class="fa fa-plus"></i> Seleccionar Archivos </a>
								<a id="tab_images_uploader_uploadfiles" href="javascript:;" class="btn green"> <i class="fa fa-share"></i> Subir Imagenes </a>
							</div>
							<div class="row">
								<div id="tab_images_uploader_filelist" class="col-md-6 col-sm-12"></div>
							</div>
							<table class="table table-bordered table-hover">
								<thead>
									<tr role="row" class="heading">
										<th width="8%"> Image </th>

										<th width="10%"></th>
																				<th width="10%">Principal</th>

									</tr>
								</thead>
								<tbody id="productoscarro">

								</tbody>
								<tbody >
@foreach($producto->imagenes as $imagen)
	<tr id="oldimage_{{$imagen->id}}"> 
										<td ><a href="#" class="fancybox-button" data-rel="fancybox-button"><img class="img-responsive" src="{{$imagen->url}}" alt=""> </a></td>
										<td><a href="javascript:;" class="btn default btn-sm" onclick="borrarimagencarrocrear({{$imagen->id}})"> <i class="fa fa-times"></i> Borrar </a></td>
										<td><label> <input type="radio" value="{{$imagen->url}}" name="principal"></td></label>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
	<div class="tab-pane" id="tab_detalles">
							
<div class="form-body">
							
								
						
									
								<div class="form-group">
									<label class="col-md-2 control-label">Colores: <span class="required"> * </span> </label>
									<div class="col-md-10">
									{{ Form::select('color_producto[]',$colores,json_decode($producto->colores),array("placeholder"=>"Selecciona colores","multiple"=>"","class"=>"select","id"=>"color_producto","style"=>"width:200px") )}}

									</div>
								</div>
									
								<div class="form-group">
									<label class="col-md-2 control-label">Tallas: <span class="required"> * </span> </label>
									<div class="col-md-10">
									{{ Form::select('talla_producto[]',$tallas,json_decode($producto->tallas),array("placeholder"=>"Selecciona tallas","multiple"=>"","class"=>"select","id"=>"talla_producto","style"=>"width:200px") )}}

									</div>
								</div>
								
									<div class="form-group">
									<label class="col-md-2 control-label">Material: <span class="required"> * </span> </label>
									<div class="col-md-10">
									{{ Form::select('material_producto[]',$materiales,json_decode($producto->material),array("placeholder"=>"Selecciona materiales","multiple"=>"","class"=>"select","id"=>"material_producto","style"=>"width:200px") )}}

									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-2 control-label">Calidad: <span class="required"> * </span> </label>
									<div class="col-md-10">
										
																			{{ Form::select('calidad',array("1"=>1,"2"=>2,"3"=>3,"4"=>4,"5"=>5),$producto->calidad,array("placeholder"=>"selecciona la calidad","class"=>"select","id"=>"marca_producto","style"=>"width:200px") )}}

										
								
									</div>
								</div>
								   
							</div>						



						</div>
					</div>
				</div>
			</div>
		</div>
		{{ Form::close() }}

	</div>
</div>

@stop
