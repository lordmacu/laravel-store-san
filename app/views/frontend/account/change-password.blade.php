@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Cambiar Contraseña
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
<form method="post" action="" class="form-horizontal" autocomplete="off">
                    <fieldset>
                      <legend>Sus Datos Personales</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Contraseña antigua <span class="require">*</span></label>
                        <div class="col-lg-8">
                        	<input type="password" class="form-control" name="old_password" id="old_password" value="" />
			{{ $errors->first('old_password', '<span class="help-block">:message</span>') }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Contraseña nueva <span class="require">*</span></label>
                        <div class="col-lg-8">
                         <input type="password" class="form-control" name="password" id="password" value="" />
			{{ $errors->first('password', '<span class="help-block">:message</span>') }}
	
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Confirmar Contraseña  <span class="require">*</span></label>
                        <div class="col-lg-8">
                   	<input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" />
			{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
	
                        </div>
                      </div>
                    </fieldset>
             
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Editar Contraseñas</button>
                      </div>
                    </div>
                  </form>
                </div>
        
              </div>
            </div>




@stop

