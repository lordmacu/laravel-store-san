@extends('emails/layouts/default')

@section('content')
<p>Hola {{ $user->first_name }},</p>

<p>Bienvenido a Misanvictorino! Por favor, haz clic en el siguiente enlace para confirmar tu cuenta Misanvictorino:</p>

<p><a href="{{ $activationUrl }}">{{ $activationUrl }}</a></p>

<p>Muchas gracias,</p>

<p>Misanvictorino.com.co</p>
@stop
