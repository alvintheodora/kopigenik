@component('mail::message')
<h1>Hello, {{$user->name}}. Your payment on subscription plan: {{$transaction->plan->name}}, has been approved by Kopigenik</h1>

@component('mail::button', ['url' => 'http://alvinthehostinger.esy.es/check-shipments'])
Check your subscription plans
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
