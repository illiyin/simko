		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class=""><a href="#tab_history" aria-controls="History" role="tab" data-toggle="tab">History Piutang Member</a></li>
			<li role="presentation" class=""><a href="#tab_piutang" aria-controls="Piutang" role="tab" data-toggle="tab">Piutang Member</a></li>
		</ul>
		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active" id="tab_history">
				<h4 class="text-center">History Transaksi Piutang & Deposit</h4>
				<?php echo $piutang->render()?>
				
			</div>
			<div role="tabpanel" class="tab-pane" id="tab_piutang">
				<h4 class="text-center">Transaksi Bayar</h4>
				<?php //echo $account()?>
				<?php echo $bayar->render()?>
			</div>
		</div>

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