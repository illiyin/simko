		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class=""><a href="#tab_history" aria-controls="History" role="tab" data-toggle="tab">History Piutang Member</a></li>
			<li role="presentation" class=""><a href="#tab_piutang" aria-controls="Piutang" role="tab" data-toggle="tab">Piutang Member</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_history">
				<h4 class="text-center">History Transaksi Piutang & Deposit</h4>
				<?php //echo $history;?>
				<?php //var_dump($piutang);?>
				<?= $piutang->render()?>
				
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_piutang">
				<h4 class="text-center">Transaksi Bayar</h4>
				<?php //echo $history;?>
				<?php //var_dump($piutang);?>
				<?= $bayar->render()?>
			</div>
		</div>


<!-- Modal cetak bukti-->
<div class="modal fade" id="modal_cetakbukti" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="az-modal-close" data-dismiss="modal" aria-hidden="true">
					<div class="caret-close"></div>
					<div class="modal-btn-close">
						<button type="button" class="close">X</button>
					</div>
				</div>
				<h4 class="text-center modal-title" id="myModalLabel">KOP UNIT PT. AISIN INDONESIA</h4>
				<div class="small text-center">Ejip Plot 5 J Cikarang Selatan Bekasi 17550 </div>
			</div>
			<div class="modal-body">
				<h4 class="text-center">Bukti Penerimaan Pembayaran & Deposit Member</h4>
				<table class="table no-border table-condensed">
					<tbody>
						<tr>
							<td>Tanggal</td>
							<td>: 4 Januari 2018</td>
							<td></td><td></td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>: 97897</td>
							<td>Jumlah</td>
							<td>: Rp. 340.449</td>
						</tr>
						<tr>
							<td>Nama</td>
							<td>: Doraemon</td>
							<td>Saldo Akhir</td>
							<td>: Rp. 340.449</td>
						</tr>
						<tr>
							<td>ID Data Center</td>
							<td>: 97897</td>
							<td>Keterangan</td>
							<td>: Lorem ipsum</td>
						</tr>
					</tbody>
				</table>
				<div class="text-center cetak-terbilang">
					Tigaratus empat puluh ribu rupiah
				</div>
				<div class="row">
					<div class="col-xs-6 text-center">
						Penyetor
						<br><br><br>
						Doraemon
					</div>
					<div class="col-xs-6 text-center">
						Penerima
						<br><br><br>
						Dorayaki
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success">EXCEL</button>
				<button type="button" class="btn btn-danger">PDF</button>
				<button type="button" class="btn btn-default">CETAK</button>
			</div>
		</div>
	</div>
</div> <!-- end modal -->
<!-- Modal detail piutang -->
<div class="modal fade" id="modal_detailpiutang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="az-modal-close" data-dismiss="modal" aria-hidden="true">
					<div class="caret-close"></div>
					<div class="modal-btn-close">
						<button type="button" class="close">X</button>
					</div>
				</div>
				<h4 class="text-center modal-title" id="myModalLabel">KOP UNIT PT. AISIN INDONESIA</h4>
				<div class="small text-center">Ejip Plot 5 J Cikarang Selatan Bekasi 17550 </div>
			</div>
			<div class="modal-body">
				<h4 class="text-center">Laporang Mutasi Saldo Member</h4>
				<table class="table no-border table-condensed">
					<tbody>
						<tr>
							<td>Nama</td>
							<td>: Doraemon</td>
							<td>ID Data Center</td>
							<td>: 97897</td>
						</tr>
						<tr>
							<td>NIK</td>
							<td>: 97897</td>
							<td>Departemen</td>
							<td>: Kasir</td>
						</tr>
					</tbody>
				</table>

				<table class="table table-bordered table-condensed">
					<thead>
						<th>Tanggal</th>
						<th>No. Bukti</th>
						<th>Keterangan</th>
						<th>Debet/Kredit</th>
						<th>Saldo Akhir</th>
					</thead>
					<tbody>
						<tr>
							<td>2-12-2017</td>
							<td>2232</td>
							<td>Gelap</td>
							<td>Debet</td>
							<td>340.099</td>
						</tr>
						<tr>
							<td>2-12-2017</td>
							<td>2232</td>
							<td>Gelap</td>
							<td>Debet</td>
							<td>340.099</td>
						</tr>
						<tr>
							<td>2-12-2017</td>
							<td>2232</td>
							<td>Gelap</td>
							<td>Debet</td>
							<td>340.099</td>
						</tr>
					</tbody>
				</table>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success">EXCEL</button>
				<button type="button" class="btn btn-danger">PDF</button>
				<button type="button" class="btn btn-default">CETAK</button>
			</div>
		</div>
	</div>
</div> <!-- end modal -->
<!-- Modal Bayar piutang -->
<div class="modal fade" id="modal_bayarpiutang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<div class="az-modal-close" data-dismiss="modal" aria-hidden="true">
					<div class="caret-close"></div>
					<div class="modal-btn-close">
						<button type="button" class="close">X</button>
					</div>
				</div>
				<h4 class="text-center modal-title" id="myModalLabel">Bayar Piutang Member & Deposit Saldo</h4>
			</div>
			<div class="modal-body">
				<div class="row">
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
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-success">Proses</button>
			</div>
		</div>
	</div>
</div> <!-- end modal -->

<style>
.nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover
{
	background-color:#fdfbfb;
}
.cetak-terbilang{
	padding:10px;
	border:2px solid #000;
	margin: 10px 0 20px;
	font-size: 16px;
	font-weight: bold;
}
.modal-body>h4{
	margin-bottom: 20px;
	font-size: 16px;
}
.table.no-border tr td,
.table.no-border tr th{
	border: none;
}
.filter{
	margin: 10px 0 20px;
}
.input-nominal{
	padding: 3px;
	margin-bottom: 15px;
}
.input-terbilang{
	padding: 3px;
}
form .form-inline{
	padding: 3px;
	margin-bottom: 15px;
}
form .form-inline select{
	margin-right: 10px;
}
</style>