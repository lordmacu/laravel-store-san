@extends('frontend/layouts/account')

{{-- Page title --}}
@section('title')
Cambiar email
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
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <fieldset>
                      <legend>Sus Datos Personales</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Nuevo email <span class="require">*</span></label>
                        <div class="col-lg-8">
                      	<input class="form-control" type="text" name="email" id="email" value="" />
			{{ $errors->first('email', '<span class="help-block">:message</span>') }}
			        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Confirmar email<span class="require">*</span></label>
                        <div class="col-lg-8">
                     	<input class="form-control" type="text" name="email_confirm" id="email_confirm" value="" />
			{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label">Confirmar Contraseña  <span class="require">*</span></label>
                        <div class="col-lg-8">
                 <input class="form-control" type="password" name="current_password" id="current_password" value="" />
			{{ $errors->first('current_password', '<span class="help-block">:message</span>') }}
		
                        </div>
                      </div>
                    </fieldset>
             
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                        <button type="submit" class="btn btn-primary">Editar Email</button>
                      </div>
                    </div>
                  </form>
                </div>
        
              </div>
            </div>




@stop





