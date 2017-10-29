@component('mail::message')
<h1>Hi, {{$user->name}} ! Terima kasih telah mendaftar di Kopigenik.</h1>

@component('mail::button', ['url' => 'http://alvinthehostinger.esy.es'])
Go to Kopigenik
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
