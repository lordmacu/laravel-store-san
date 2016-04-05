@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Your Profile
@stop

{{-- Account page content --}}
@section('account-content')
@if($errors->has())
   @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
  @endforeach
@endif
@if(Session::has('success'))
<div class="alert alert-success">{{ Session::get('success') }}</div>
@endif
  <h1> Editar cuenta</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                		<form method="post" action="" class="form-horizontal" role="form" autocomplete="off">
                    <fieldset>
                      <legend>Sus Datos Personales</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Nombre <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="first_name" value="{{$user->first_name}}" class="form-control" id="firstname">
                          				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Apellido <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="last_name" value="{{$user->last_name}}" class="form-control" id="lastname">
                          				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                       <div class="form-group">
                        <label for="telefono" class="col-lg-4 control-label">Telefono <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="telefono" value="{{$adicional->telefono}}" class="form-control" id="telefono">
                          {{ $errors->first('telefono', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                         <div class="form-group">
                        <label for="celular" class="col-lg-4 control-label">Calular <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="celular" value="{{$adicional->celular}}" class="form-control" id="celular">
                          {{ $errors->first('celular', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                        <div class="form-group">
                        <label for="direccion" class="col-lg-4 control-label">Direccion <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="direccion" value="{{$adicional->direccion}}" class="form-control" id="direccion">
                          {{ $errors->first('direccion', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                        <div class="form-group">
                        <label for="ciudad" class="col-lg-4 control-label">Ciudad <span class="require">*</span></label>
                        <div class="col-lg-8">
                          <input type="text" name="ciudad" value="{{$adicional->ciudad}}" class="form-control" id="ciudad">
                          {{ $errors->first('ciudad', '<span class="help-block">:message</span>') }}

                        </div>
                      </div>
                      
                    
                    </fieldset>
             
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Editar Cuenta</button>
                      </div>
                    </div>
                  </form>
                </div>
        
              </div>
            </div>

@stop



