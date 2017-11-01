@component('mail::message')
<h1>Hai, {{$user->name}}. Pembayaran untuk ID transaksi : {{$transaction->id}}, sudah dikonfirmasi</h1>
Pesanan Anda akan dikirimkan setiap tanggal 14 dan 28. <br><br>

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
		<br><br>
	</table>


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


