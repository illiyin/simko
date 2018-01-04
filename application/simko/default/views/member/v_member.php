<form class="form-horizontal az-form" id="form" name="form" method="POST">
	<input type="hidden" name="idmember" id="idmember">
	<ul class="nav nav-tabs member-tab">
		<?php 
			if (aznav('role_data_umum_anggota')) {
		?>
		<li class="active"><a data-toggle="tab" href="#tab_general_data">Data Umum</a></li>
		<?php
			}
			if (aznav('role_data_keuangan_anggota')) {
		?>
		<li><a data-toggle="tab" href="#tab_finance_data">Keuangan</a></li>
		<?php 
			}
			if (aznav('role_data_lain_anggota')) {
		?>
		<li><a data-toggle="tab" href="#tab_other_data">Lain</a></li>
		<?php 
			}
		?>
	</ul>

	<div class="tab-content">
		<?php 
			if (aznav('role_data_umum_anggota')) {
		?>
		<div id="tab_general_data" class="tab-pane fade in active">
			<div class="container-tab">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label col-md-4"><?php echo azlang('Name');?> <red>*</red></label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="member_name" name="member_name"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Nomor KTP <red>*</red></label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="identity_card" name="identity_card"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">ID Datacenter</label>
							<div class="col-md-8">
								<input type="text" class="form-control" readonly id="iddatacenter" name="iddatacenter"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Agama</label>
							<div class="col-md-8">
								<select class="form-control select" name="religion" id="religion">
									<option value="ISLAM">ISLAM</option>
									<option value="KRISTEN PROTESTAN">KRISTEN PROTESTAN</option>
									<option value="KRISTEN KATOLIK">KRISTEN KATOLIK</option>
									<option value="HINDU">HINDU</option>
									<option value="BUDHA">BUDHA</option>
									<option value="LAINNYA">LAINNYA</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Provinsi</label>
							<div class="col-md-8">
								<?php echo az_select_province();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Kecamatan</label>
							<div class="col-md-8">
								<?php echo az_select_district();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Ibu kandung</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="biological_mother" name="biological_mother"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Departemen</label>
							<div class="col-md-8">
								<?php echo az_select_department();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Status Karyawan <red>*</red></label>
							<div class="col-md-8">
								<select class="form-control select" name="employee_status" id="employee_status">
									<option value="TETAP">TETAP</option>
									<option value="KONTRAK">KONTRAK</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">No Rek. Bank</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="account_number" name="account_number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Saldo/Tgh Berjalan</label>
							<div class="col-md-8">
								<input type="text" disabled placeholder="0" class="form-control format-number-minus txt-right" id="balance" name="balance"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Nomor Kendaraan</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="vehicle_number" name="vehicle_number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Telepon</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="phone" name="phone" data-role="tagsinput"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Foto</label>
							<div class="col-md-8">
								<?php echo $photo;?>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label col-md-4">NIK <red>*</red></label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="member_code" name="member_code"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">NPWP</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="tax_number" name="tax_number"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Tgl Lahir</label>
							<div class="col-md-8">
								<?php echo $birthdate;?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Alamat</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="address" name="address"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Kota/Kabupaten</label>
							<div class="col-md-8">
								<?php echo az_select_city();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Tgl Bergabung <red>*</red></label>
							<div class="col-md-8">
								<?php echo $join_date;?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Jabatan</label>
							<div class="col-md-8">
								<?php echo az_select_position();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Golongan Darah</label>
							<div class="col-md-8">
								<select class="form-control select" name="blood_group" id="blood_group">
									<option value="A">A</option>
									<option value="B">B</option>
									<option value="AB">AB</option>
									<option value="O">O</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Tgl Expired <red class="red-expired">*</red></label>
							<div class="col-md-8">
								<?php echo $expired_date;?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Nama Rek. Bank</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="account_number_type" name="account_number_type"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">SHU Berjalan</label>
							<div class="col-md-8">
								<input type="text" disabled placeholder="0" class="form-control txt-right format-number-minus" id="shu_running" name="shu_running"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Pin Transaksi</label>
							<div class="col-md-8">
								<input type="password" class="form-control" id="transaction_pin" name="transaction_pin"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Email</label>
							<div class="col-md-8">
								<input type="email" class="form-control" id="email" name="email"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">ID Barcode</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="idbarcode" name="idbarcode"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">ID Telegram</label>
							<div class="col-md-8">
								<input type="text" class="form-control" id="idtelegram" name="idtelegram"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Level Anggota <red>*</red></label>
							<div class="col-md-8">
								<?php echo az_select_member_level();?>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-4">Status Anggota <red>*</red></label>
							<div class="col-md-8">
								<select class="form-control select" id="member_status" name="member_status">
									<option value="AKTIF">AKTIF</option>
									<option value="NONAKTIF">NONAKTIF</option>
								</select>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			}
			if (aznav('role_data_keuangan_anggota')) {
		?>
		<div id="tab_finance_data" class="tab-pane">
			<div class="container-tab">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label col-sm-4">Simpanan Pokok</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="s_pokok">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Simpanan Wajib</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="s_wajib">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Simpanan Lain</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="s_lain">
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label col-sm-4">Potongan Wajib</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="p_wajib">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Potongan Sukarela</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="p_sukarela">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4">Potongan Lain</label>
							<div class="col-sm-8">
								<input type="text" readonly class="form-control format-number-decimal txt-right" id="p_lain">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label col-sm-2">Options</label>
							<div class="col-sm-4">
								<div class="checkbox">
									<label><input type="checkbox" class="x-hidden" id="autosp" checked name="autosp" value="1">Auto SP</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
			}
			if (aznav('role_data_umum_anggota')) {
		?>
		<div id="tab_other_data" class="tab-pane">
			<div class="container-tab">

			</div>
		</div>
		<?php
			}
		?>
	</div>
</form>