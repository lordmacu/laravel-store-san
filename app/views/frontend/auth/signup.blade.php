@extends('frontend/layouts/default')

{{-- Page title --}}
@section('title')
Crear una cuenta
@parent
@stop

{{-- Page content --}}
@section('content')

<div class="main">
      <div class="container">
   
        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
 
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
            <h1>Crear una Cuenta</h1>
            <div class="content-form-page">
              <div class="row">
                <div class="col-md-6 col-sm-6">
                		<form method="post" action="{{ route('signup') }}" class="form-horizontal" role="form" autocomplete="off">

                    <fieldset>
                      <legend>Tus datos personales</legend>
                      <div class="form-group">
                        <label for="firstname" class="col-lg-4 control-label">Primer nombre  <span class="require">*</span></label>
                        <div class="col-lg-8">

<input class="form-control" type="text" name="first_name" id="first_name" value="{{ Input::old('first_name') }}" />
				{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="lastname" class="col-lg-4 control-label"> Apellido <span class="require">*</span></label>
                        <div class="col-lg-8">
<input type="text" class="form-control" name="last_name" id="last_name" value="{{ Input::old('last_name') }}" />
				{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
		

                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                        <div class="col-lg-8">
	<input type="email" class="form-control" name="email" id="email" value="{{ Input::old('email') }}" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}
		

                        </div>
                      </div>
                           <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Reescribe Email <span class="require">*</span></label>
                        <div class="col-lg-8">
<input type="text" class="form-control" name="email_confirm" id="email_confirm" value="{{ Input::old('email_confirm') }}" />
				{{ $errors->first('email_confirm', '<span class="help-block">:message</span>') }}
		

                        </div>
                      </div>
                    </fieldset>
                    <fieldset>
                      <legend>Tu contraseña</legend>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label">Contraseña <span class="require">*</span></label>
                        <div class="col-lg-8">
	<input class="form-control" type="password" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="confirm-password" class="col-lg-4 control-label">Confirmar contraseña <span class="require">*</span></label>
                        <div class="col-lg-8">
	<input  class="form-control" type="password" name="password_confirm" id="password_confirm" value="" />
				{{ $errors->first('password_confirm', '<span class="help-block">:message</span>') }}
		

                        </div>
                      </div>
                    </fieldset>
               
                    <div class="row">
                      <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">    
                         	
                      	                    
                        <button type="submit" class="btn btn-primary">Crear una cuenta</button>
                        <a href="#" href="{{ route('home') }}" class="btn btn-default">Cancelar</a>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6 col-sm-6 pull-right">
                  <div class="form-info">
                    <h2><em>Estas registrado?</em></h2>
                
<form method="post" action="{{ route('signin') }}" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

                    <fieldset>
                      <div class="form-group">
                        <label for="email" class="col-lg-4 control-label">Email  <span class="require">*</span></label>
                        <div class="col-lg-8">

	<input type="text" class="form-control placeholder-no-fix"name="email" id="email" value="{{ Input::old('email') }}" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}			
              </div>
                      </div>
                      <div class="form-group">
                        <label for="password" class="col-lg-4 control-label"> Contraseña <span class="require">*</span></label>
                        <div class="col-lg-8">
<input type="password" class="form-control placeholder-no-fix" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
			

                        </div>
                      </div>
                 
                        
                    </fieldset>
          
                                       <button type="submit" class="btn btn-primary">Ingresar</button>

                  
                  </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- END CONTENT -->
        </div>
        <!-- END SIDEBAR & CONTENT -->
      </div>
    </div>






@stop
