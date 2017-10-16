@component('mail::message')
<h1>Hello, {{$user->name}}. You have bought a subscription plan: {{$transaction->plan->name}}</h1>

@component('mail::button', ['url' => 'http://alvinthehostinger.esy.es/check-shipments'])
Check your subscription plans
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
