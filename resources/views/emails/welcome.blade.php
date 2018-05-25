@component('mail::message')
<h1>Hai, {{$user->name}} ! Terima kasih telah mendaftar di Kopigenik.</h1>
Kamu sudah dapat menggunakan layanan berlangganan kopi di Kopigenik. Silahkan langsung klik tombol di bawah ini untuk langsung masuk ke website Kopigenik.

@component('mail::button', ['url' => 'http://alvinthehostinger.esy.es'])
Berlangganan Sekarang
@endcomponent

Selamat berpetualang,<br>
{{ config('app.name') }}
@endcomponent
