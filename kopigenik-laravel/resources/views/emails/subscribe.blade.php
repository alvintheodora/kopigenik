@component('mail::message')
<h1>Hai, {{$user->name}}. Pesanan kamu sedang diproses.</h1>
Pesanan : {{$transaction->plan->name}} sudah diterima dan sedang dalam proses.

Silahkan lakukan pembayaran ke rekening bank kami. Sertakan juga ID Pesanan untuk mempermudah proses konfirmasi pesanan.

@component('mail::button', ['url' => 'http://localhost:8000/payment-confirmation/' .$transaction->id])
Konfirmasi Pembayaran
@endcomponent


Nomor Rekening Kami
<ul><h4>Kopigenik</h4>
	<li>Nama Bank : Bank Central Asia (BCA)</li>
	<li>Branch : KCU Alam Sutera</li>
	<li>Nomor Rekening : 6038 483 222</li>
</ul>

<br><br>

<h3>Detail Pesanan</h3>
ID Pesanan : {{$transaction->id}}<br>
Tanggal Pesanan : {{$transaction->created_at}}
	<table style="width:100%">
		<tr>
			<th>Produk</th>
			<th>Berat (gram)</th>
			<th>Harga</th>
		</tr>
		<tr>
			<td>{{$transaction->plan->name}}</td>
			<td style="text-align:right">{{$transaction->plan->weight}}</td>
			<td style="text-align:right">{{$transaction->plan->price}}</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;">============================================================</td>
		</tr>
		<tr>
			<td colspan="2">Subtotal : </td>
			<td style="text-align:right">{{$transaction->plan->price}}</td>
		</tr>
		<tr>
			<td colspan="2">Pengiriman : </td>
			<td style="text-align:right">x</td>
		</tr>
		<tr>
			<td colspan="2">Metode Pembayaran : </td>
			<td style="text-align:right">Transfer Bank</td>
		</tr>
		<tr>
			<td colspan="2">Total : </td>
			<td style="text-align:right">{{$transaction->plan->price}} + x</td>
		</tr>
		<tr>
			<td colspan="3" style="text-align: center;">============================================================</td>
		</tr>
	</table>

<br><br>

<h3>Detail Pelanggan</h3>
Email : {{$user->email}}<br><br>
Alamat Pengiriman: <br>
{{$user->name}}<br>
{{$transaction->shipment->phone}}<br>
{{$transaction->shipment->address}}<br>
{{$transaction->shipment->district}}<br>
{{$transaction->shipment->city}}<br>
{{$transaction->shipment->province}}<br>
{{$transaction->shipment->zipcode}}<br><br>


Selamat berpetualang,<br>
{{ config('app.name') }}
@endcomponent
