@component('mail::message')
<h1>Welcome to Kopigenik, {{$user->name}}</h1>

@component('mail::button', ['url' => 'http://alvinthehostinger.esy.es'])
Go to Kopigenik
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
