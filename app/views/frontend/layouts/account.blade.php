@extends('frontend/layouts/default')

{{-- Page content --}}
@section('content')
<div class="row margin-bottom-40">
          <!-- BEGIN SIDEBAR -->
          <div class="sidebar col-md-3 col-sm-3">
            <ul class="list-group margin-bottom-25 sidebar-menu">
       		<li class="list-group-item clearfix"><a href="{{ URL::route('mispedidos') }}">Mis pedidos</a></li>

		<li class="list-group-item clearfix"><a href="{{ URL::route('profile') }}">Perfil</a></li>
		<li class="list-group-item clearfix"><a href="{{ URL::route('change-password') }}">Cambiar Contraseña</a></li>
		<li class="list-group-item clearfix"><a href="{{ URL::route('change-email') }}">Cambiar  Email</a></li>

            </ul>
          </div>
          <!-- END SIDEBAR -->

          <!-- BEGIN CONTENT -->
          <div class="col-md-9 col-sm-9">
          		@yield('account-content')

          </div>
          <!-- END CONTENT -->
        </div>
 


@stop
