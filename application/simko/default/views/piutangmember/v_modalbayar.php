<div class="row">
	<h4 class="text-center">Bukti Penerimaan Pembayaran & Deposit Member <span class="">ID</span></h4>
	<div class="col-xs-6">
		<table class="table no-border table-condensed">
			<tbody>
				<tr>
					<td>NIK</td>
					<td>: <span id="bayar_member_code"></span></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>: <span id="bayar_member_name"></span></td>
				</tr>
				<tr>
					<td>ID Data Center</td>
					<td>: <span id="bayar_iddatacenter"></span></td>
				</tr>
				<tr>
					<td>Departemen</td>
					<td>: <span id="bayar_department_name"></span></td>
				</tr>
				<tr>
					<td>Saldo</td>
					<td>: <span id="bayar_balance"></span></td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="col-xs-6">
		<input type="hidden" id="idmember">
		<div class="input-nominal">
			<input type="text" name="nominal_bayar" id="nominal_bayar" value="" class="form-control input-lg" placeholder="Nominal">
		</div>
		<div class="form-inline">
			<label for="akun_penerima">Akun Penerima: </label>
			<select id="idaccount" name="idaccount" class="form-control select select2-ajax">
			</select>
			<input type="checkbox" name="cetak" value="1" id="yes_cetak">
			<label for="yes_cetak">Cetak?</label>
		</div>
		<div class="input-terbilang">
			<input type="text" name="terbilang_bayar" value="" class="form-control input-lg" placeholder="Terbilang Pembayaran/Deposit">
		</div>
	</div>
</div>

<!-- "http://localhost/simko/master_account/get_data",  -->