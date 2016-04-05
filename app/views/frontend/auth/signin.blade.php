@extends('frontend/layouts/login')

{{-- Page title --}}
@section('title')
Account Sign in ::
@parent
@stop

{{-- Page content --}}
@section('content')


<form method="post" action="{{ route('signin') }}" class="form-horizontal">
		<!-- CSRF Token -->
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />

		<h3 class="form-title">Entrar</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 Ingresa el usuario y la contraseña
			</span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Email</label>



			<div class="input-icon">
				<i class="fa fa-user"></i>

				<input type="text" class="form-control placeholder-no-fix"name="email" id="email" value="{{ Input::old('email') }}" />
				{{ $errors->first('email', '<span class="help-block">:message</span>') }}

			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Contraseña</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>

	<input type="password" class="form-control placeholder-no-fix" name="password" id="password" value="" />
				{{ $errors->first('password', '<span class="help-block">:message</span>') }}
		

			</div>
		</div>
		<div class="form-actions">
			<label class="checkbox">
				<input type="checkbox" class="form-control" name="remember-me" id="remember-me" value="1" /> Recordarme

			
</label>
<button type="submit" class="btn green pull-right">
Ingresar <i class="m-icon-swapright m-icon-white"></i>
				</button>
		
		</div>
			
		
		<div class="forget-password">
			<h4>Olvido la contraseña?</h4>
			<p>
				
								<a href="{{ route('forgot-password') }}" class="btn btn-link">Recuperar</a>

			
			</p>
		</div>
		<!---<div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp;
				<a href="javascript:;" id="register-btn">
					 Create an account
				</a>
			</p>
		</div>-->
	</form>




@stop
