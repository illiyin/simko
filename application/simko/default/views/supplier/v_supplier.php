<form class="form-horizontal az-form" id="form" name="form" method="POST">
	<input type="hidden" name="idsupplier" id="idsupplier">
	<div class="row">
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('Name');?> <red>*</red></label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="name" name="name"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('Address');?> <red>*</red></label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="address" name="address"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('Phone');?></label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="phone" name="phone" data-role="tagsinput"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('Email');?></label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="email" name="email"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('Province');?></label>
				<div class="col-md-8">
					<?php 
						echo az_select_province();
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('City');?></label>
				<div class="col-md-8">
					<?php 
						echo az_select_city();
					?>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4"><?php echo azlang('District');?></label>
				<div class="col-md-8">
					<?php 
						echo az_select_district();
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="form-group">
				<label class="control-label col-md-4">ID Telegram</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="idtelegram" name="idtelegram"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Default Diskon</label>
				<div class="col-md-8">
					<div class="input-group">
						<input type="text" class="form-control txt-right" id="default_discount" name="default_discount">
					    <span class="input-group-addon">%</span>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">PIC Supplier</label>
				<div class="col-md-8">
					<input type="text" class="form-control" id="pic_supplier" name="pic_supplier"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Saldo</label>
				<div class="col-md-8">
					<input type="text" class="form-control format-number-minus txt-right" disabled id="balance" placeholder="0" name="balance"/>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-md-4">Limit Piutang</label>
				<div class="col-md-8">
					<input type="text" class="form-control format-number-minus txt-right" id="limit" name="limit"/>
				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-md-4">Options</label>
				<div class="col-md-8">
					<div class="checkbox">
						<label><input type="checkbox" id="is_lock_supplier" name="is_lock_supplier" value="1">Lock Supplier</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" id="is_consignment" name="is_consignment" value="1">Konsinyasi</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" id="is_send_info" name="is_send_info" value="1">Send Info</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" id="is_report_sales" name="is_report_sales" value="1">Report Sales</label>
					</div>
					<div class="checkbox">
						<label><input type="checkbox" id="is_public_supplier" name="is_public_supplier" value="1">Public Supplier</label>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>