@component('mail::layout')

{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{ config('app.name') }}
@endcomponent
@endslot

Haz clic en el botón de abajo para iniciar sesión en {{ config('app.name') }}. 
Este botón caducará en 10 minutos.
@component('mail::button', ['url' => $url])
Iniciar sesión
@endcomponent

¿No se muestra el botón? [Haz clic aquí]
<br>
<a href="{{$url}}"> {{$url}} </a>
 

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot

@endcomponent
