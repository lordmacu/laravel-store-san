@extends('backend/layouts/default')

{{-- Page title --}}
@section('title')
Pedidos
@parent
@stop

{{-- Page content --}}
@section('content')

@section('scripts')

<script>

	$("#codigo_tienda").change(function() {

		valor = ($("#codigo_tienda").val())
		
		producto = ($("#codigo_producto").val())
			

		$.ajax("/pedido/verificarcantidad", {
			"type" : "post", 
			"success" : function(result) {
				
				if(result==""){
					
				alert("No hay existencias en la tienda ");
				
					($("#cantidad").val(0))
				}else{
					
				alert("Cantidad disponible en esta tienda " + result);
				($("#cantidad").val(result))
				}
				
		
			},
			"data" : {valor: valor,producto: producto},
			"async" : true,
		});

	});
	
	

	$("#agregarcarro").click(function (e){
		
		alert("entro");
		
		
		valor = ($("#codigo_tienda").val())
		
		producto = ($("#codigo_producto").val())
		
		cantidad_solicitud = ($("#cantidad").val())
			
alert(cantidad_solicitud);


	});
	var keyupfunction = function(e){
    alert('up');
    console.log('up');
}
$(document).on('keyup', '.cantidades', function() {
	


				
	if(parseInt($("#cantidadinputpedido").val())>=parseInt(this.value)){
					$(".solohaydanger").hide()
				   $(".solohaydiv").hide()
$("#boton_"+this.id).show()


	}else{
		$("#boton_"+this.id).hide()

		$(".solicitudhay").html(this.value);
		$(".solohayaler").html($("#cantidadinputpedido").val())
		
		$(".solohaydanger").show()
		$(".solohaydiv").show()

													   $(".nohaycantidad").hide()

				//	console.log("no  funciona")

	}

});
  

function crearpedido(cantidad,producto,color,talla,pedido){
	
	
	
	$("#cantidadspanpedido").html(cantidad)
		$("#cantidadinputpedido").val(cantidad)

	$.ajax({
        type: "POST",
        url: "/buscarpedidotienda",
        data: {cantidad:cantidad,producto:producto,color:color,talla:talla},
        success: function(datos){

var json= JSON.parse(datos);
var html="";
for (var i=0; i < json.length; i++) {  
  if(json[i].cantidad!=0){
  	

  
  html+=' <tr><td>'+json[i].first_name+' '+json[i].last_name+'</td><td>'+json[i].cantidad+'<input id="cants_'+json[i].id_tienda+'" type="hidden" value="'+json[i].cantidad+'"/></td><td><input type="number" id="'+json[i].id_tienda+'" class="cantidades form-control" value="0"/></td><td><button id="boton_'+json[i].id_tienda+'" onclick="enviarcantidad('+json[i].id_tienda+','+json[i].id_producto+','+cantidad+','+producto+','+color+','+talla+','+pedido+')" class="btn btn-sm btn-default">Pedir</button></td></tr>';
}
};
$("#body_modalpedido").html(html)
	$('#modalpedido').modal('show')
  
      }
});


} 

function enviarcantidad(id,producto,cantidad,producto,color,talla,pedido){
	
	
	if(parseInt($("#"+id).val())>parseInt($("#cants_"+id).val())){
		
$(".solohaydanger").show()
$(".nohayinventario").show()
    
return false
	}else{
	$(".solohaydanger").hide()
$(".nohayinventario").hide()
	
	}
 
	
		if(!!!$("#"+id).val()){
							$("#"+id).val(0);
							
											  
							return false
						}

	
	$.ajax({
        type: "POST",
        url: "/descontarcantidad",
        data: {pedido:pedido,producto:producto,tienda:id,cantidad:$("#"+id).val()},
        success: function(datos){
	var total=parseInt($("#cantidadinputpedido").val())-parseInt($("#"+id).val());
	
if(total==0){
	$("#hacerpedido_"+pedido).hide()
	
	$("#pedidocompleto").show()

window.location="";
}else{
	crearpedido(cantidad,producto,color,talla,pedido)

}	

	//$('#modalpedido').modal('hide')

$("#cantidadinputpedido").val(total)
$("#cantidadspanpedido").html(total)


      }
});


}
</script>
@stop
 
<div class="page-header">
	<h2> Pedidos
	<div class="pull-right">
		<a href="{{ route('pedidos') }}" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-o-left"></i> Atras</a>
	</div></h2>
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
	<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th class="span6">Nombre Producto</th>
				<th class="span2">Cantidad Pedido</th>
				<th class="span6">talla</th>
				<th class="span6">Color</th>
				<th class="span6">Accion</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($pedido as $pedidos)
			<tr>
				<td>{{ $pedidos->nombre_producto }}</td>
					<?php 
					$tablainventario= new Tablainventarios();
					$cantidades=$tablainventario->inventariosporid($pedidos->coso);
					$cantidadtodal=0;
					if(count($cantidades)==0){
						$cantidadtodal=$pedidos->cantidad;
					}else{
						foreach ($cantidades as   $cantidad) {
					$cantidadtodal	+=$cantidad->cantidad;
					}
				$cantidadtodal=	$pedidos->cantidad-$cantidadtodal;
					}
					
					?>
				
				<td>{{ $cantidadtodal }}</td>
			
				<td>{{ $pedidos->nombre_talla }}</td>
				<td>{{ $pedidos->nombre_color }}</td>
				<td>
					
					
				
				
    			
    			@if($cantidadtodal==0)
    			<div class="alert alert-success" id="pedidocompleto" >
				<i class="fa fa-check-square-o"></i> Pedido Completo
    			</div>
    			
    			@else
    				<button type="button" class="btn btn-default" id="hacerpedido_{{ $pedidos->coso }}" onclick="crearpedido({{ $cantidadtodal }},{{ $pedidos->id_producto }},{{ $pedidos->color }},{{ $pedidos->talla }},{{ $pedidos->coso }})">Hacer pedido</button>
				<div class="alert alert-success" id="pedidocompleto" style="display: none">
				<i class="fa fa-check-square-o"></i> Pedido Completo
    			</div>
    			@endif
					</td>

			</tr>
	
			@endforeach
		</tbody>
		

	</table>

	


	
	

</div>



{{ Form::close() }}

<div class="modal fade" id="modalpedido" tabindex="-1" role="dialog"  aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Creación de pedido</h4>
      </div>
      <div class="modal-body " style="padding-top: 0;">
      	<div class="row">
      		<h2 style="text-align: center"><span>Cantidad de solicitada </span ><span id="cantidadspanpedido">0</span></h2>
      		<input type="hidden" id="cantidadinputpedido" value="0"/>
      	<div class="alert alert-danger solohaydanger" style="display:none">
      		
      	<div class="solohaydiv" style="display: none">	Hay <strong><span class="solohayaler">0</span></strong> en el peido y estas solicitando <strong><span class="solicitudhay">0</span</strong></div>
    
    <div class="nohaycantidad"  style="display: none">Tienes que escribir un numero</div>
        <div class="nohayinventario"  style="display: none">El numero que digitaste es mayor al inventario en la tienda</div>

    </div>
      	</div>
      <table class="table table-hover">
      <thead>
        <tr>
          <th>Tienda</th>
          <th>Disponible</th>
          <th>Cantidad</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="body_modalpedido">
       
      
      
      </tbody>
    </table>
      </div>
      <div class="modal-footer">
        
        <a href="/admin/pedidos/18/edit" class="btn btn-default">Cerrar</a>
      </div>
    </div>
  </div>
</div>

@stop