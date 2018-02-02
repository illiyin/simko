		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class=""><a href="#tab_history" aria-controls="History" role="tab" data-toggle="tab">History Piutang Member</a></li>
			<li role="presentation" class=""><a href="#tab_piutang" aria-controls="Piutang" role="tab" data-toggle="tab">Piutang Member</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_history">
				<h4 class="text-center">History Transaksi Piutang & Deposit</h4>
				<button class="btn btn-primary">Cek Piutang</button>
				
				<table class="az-table table table-bordered table-striped table-condensed table-hover dt-responsive display nowrap dataTable no-footer dtr-inline">
					<thead>
						<th>Tanggal</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>ID Data Center</th>
						<th>Jumlah</th>
						<th>Saldo Akhir</th>
						<th>Keterangan</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>Santi</td>
							<td>1212</td>
							<td>2</td>
							<td>240.000</td>
							<td>Terang</td>
							<td class="text-center"><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_cetakbukti"><span class="glyphicon glyphicon-print"></span> Cetak Bukti</button></td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>Santi</td>
							<td>1212</td>
							<td>2</td>
							<td>240.000</td>
							<td>Terang</td>
							<td class="text-center"><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_cetakbukti"><span class="glyphicon glyphicon-print"></span> Cetak Bukti</button></td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>Santi</td>
							<td>1212</td>
							<td>2</td>
							<td>240.000</td>
							<td>Terang</td>
							<td class="text-center"><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_cetakbukti"><span class="glyphicon glyphicon-print"></span> Cetak Bukti</button></td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>Santi</td>
							<td>1212</td>
							<td>2</td>
							<td>240.000</td>
							<td>Terang</td>
							<td class="text-center"><button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_cetakbukti"><span class="glyphicon glyphicon-print"></span> Cetak Bukti</button></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_piutang">
				<form class="filter form-inline">
					<label for="saldo">Saldo: </label>
					<select class="form-control" name="saldo" id="saldo">
						<option value="" selected> -- --</option>
						<option value="1"> > 300.000</option>
						<option value="2"> < 300.000</option>
					</select>
					<label for="keyword">Cari: </label>
					<input type="text" name="keyword" value="" id="keyword" placeholder="..." class="form-control">
				</form>
				<table class="az-table table table-bordered table-striped table-condensed table-hover dt-responsive display nowrap dataTable no-footer dtr-inline">
					<thead>
						<th>Nomer</th>
						<th>NIK</th>
						<th>ID Data Center</th>
						<th>Nama</th>
						<th>Departemen</th>
						<th>Saldo</th>
						<th>Sisa Limit</th>
						<th>Aksi</th>
					</thead>
					<tbody>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>1212</td>
							<td>Santi</td>
							<td>Kasir</td>
							<td>240.000</td>
							<td>20.000</td>
							<td class="text-center">
								<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_detailpiutang"><span class="glyphicon glyphicon-file"></span> Detail</button>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_bayarpiutang"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
							</td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>1212</td>
							<td>Santi</td>
							<td>Kasir</td>
							<td>240.000</td>
							<td>20.000</td>
							<td class="text-center">
								<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_detailpiutang"><span class="glyphicon glyphicon-file"></span> Detail</button>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_bayarpiutang"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
							</td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>1212</td>
							<td>Santi</td>
							<td>Kasir</td>
							<td>240.000</td>
							<td>20.000</td>
							<td class="text-center">
								<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_detailpiutang"><span class="glyphicon glyphicon-file"></span> Detail</button>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_bayarpiutang"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
							</td>
						</tr>
						<tr>
							<td>19 Desember 2017</td>
							<td>008</td>
							<td>1212</td>
							<td>Santi</td>
							<td>Kasir</td>
							<td>240.000</td>
							<td>20.000</td>
							<td class="text-center">
								<button class="btn btn-default btn-xs" data-toggle="modal" data-target="#modal_detailpiutang"><span class="glyphicon glyphicon-file"></span> Detail</button>
								<button class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_bayarpiutang"><span class="glyphicon glyphicon-usd"></span> Bayar</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>