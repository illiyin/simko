<div class="col-xs-6">
	<table class="table no-border table-condensed">
		<tbody>
			<tr>
				<td>NIK</td>
				<td>: 008</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>: Doraemon</td>
			</tr>
			<tr>
				<td>ID Data Center</td>
				<td>: 97897</td>
			</tr>
			<tr>
				<td>Departemen</td>
				<td>: Kasir</td>
			</tr>
			<tr>
				<td>Saldo</td>
				<td>: 300.090</td>
			</tr>
		</tbody>
	</table>
</div>
<div class="col-xs-6">
	<form action="index.html" method="post">
		<div class="input-nominal">
			<input type="text" name="nominal_bayar" value="" class="form-control input-lg" placeholder="Nominal">
		</div>
		<div class="form-inline">
			<label for="akun_penerima">Akun Penerima: </label>
			<select name="penerima" id="akun_penerima" class="form-control">
				<option value="">-- Pilih --</option>
				<option value="1">Susi</option>
				<option value="2">Dona</option>
			</select>
			<input type="checkbox" name="cetak" value="1" id="yes_cetak">
			<label for="yes_cetak">Cetak?</label>
		</div>
		<div class="input-terbilang">
			<input type="text" name="terbilang_bayar" value="" class="form-control input-lg" placeholder="Terbilang Pembayaran/Deposit">
		</div>
	</form>
</div>