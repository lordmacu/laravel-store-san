@extends('backend/layouts/default')

{{-- Web site Title --}}
@section('title')
Group Update ::
@parent
@stop

{{-- Content --}}
@section('content')
<div class="page-header">
	<h3>
		Actualizar grupo

		<div class="pull-right">
			<a href="{{ route('groups') }}" class="btn btn-xs btn-default"><i class="icon-circle-arrow-left icon-white"></i> Anterior</a>
		</div>
	</h3>
</div>

<!-- Tabs -->
<ul class="nav nav-tabs">
	<li class="active"><a href="#tab-general" data-toggle="tab">General</a></li>
	<li><a href="#tab-permissions" data-toggle="tab">Permisos</a></li>
</ul>

<form class="form-horizontal" method="post" action="" autocomplete="off">
	<!-- CSRF Token -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}" />

	<!-- Tabs Content -->
	<div class="tab-content">
		<!-- General tab -->
		<div class="tab-pane active" id="tab-general">
			<!-- Name -->
			<div class="control-group {{ $errors->has('name') ? 'error' : '' }}">
				<label class="control-label" for="name">Nombre</label>
				<div class="controls">
                                    <input class="form-control" type="text" name="name" id="name" value="{{ Input::old('name', $group->name) }}" />
					{{ $errors->first('name', '<span class="help-inline">:message</span>') }}
				</div>
			</div>
		</div>

		<!-- Permissions tab -->
		<div class="tab-pane" id="tab-permissions">
			<div class="controls">
				<div class="control-group">

					@foreach ($permissions as $area => $permissions)
					<fieldset>
						<legend>{{ $area }}</legend>

						@foreach ($permissions as $permission)
						<div class="control-group row">
							<label class="control-group">{{ $permission['label'] }}</label>
                                                        <div class="col-sm-6">
                                                      
							<div class="radio inline">
								<label for="{{ $permission['permission'] }}_allow" onclick="">
									<input type="radio" value="1" id="{{ $permission['permission'] }}_allow" name="permissions[{{ $permission['permission'] }}]"{{ (array_get($groupPermissions, $permission['permission']) === 1 ? ' checked="checked"' : '') }}>
									Allow
								</label>
							</div>
                                        </div>
							<div class="col-sm-6">
                                                        <div class="radio inline">
								<label for="{{ $permission['permission'] }}_deny" onclick="">
									<input type="radio" value="0" id="{{ $permission['permission'] }}_deny" name="permissions[{{ $permission['permission'] }}]"{{ ( ! array_get($groupPermissions, $permission['permission']) ? ' checked="checked"' : '') }}>
									Deny
								</label>
							</div>
                                                            </div>
						</div>
						@endforeach

					</fieldset>
					@endforeach

				</div>
			</div>
		</div>
	</div>

	<!-- Form Actions -->
        <div class="control-group" style="margin-top: 100px">
		<div class="controls">
			<a class="btn btn-default" href="{{ route('groups') }}">Cancelar</a>

			<button type="reset" class="btn">Resetear</button>

			<button type="submit" class="btn btn-success">Actualizar grupo</button>
		</div>
	</div>
</form>
@stop
