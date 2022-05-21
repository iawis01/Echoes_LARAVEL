@component('mail::message')
# Has recibiro una nueva calificacion

Haz login para ver tus notificaciones

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
login
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
