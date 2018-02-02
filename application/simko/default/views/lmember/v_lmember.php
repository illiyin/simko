<div style='display:table;width:100%;' class='container-lmember'>
	<div style='display:table-cell;vertical-align:top;position:relative;'>
		<input type='text' name='member_text' id='member_text' class='form-control' placeholder='Scan Barcode'/>
		<input type='hidden' name='idmember' id='idmember' data-w='true' data-id='<?php echo $data_id;?>' class='<?php echo $data_class;?>'/>
		<button style='position:absolute;right:5px;top:6px;' class='btn btn-danger btn-xs hide btn-remove-selected-lmember' type='button'><i class='fa fa-remove'></i></button>
	</div>
	<div style='display:table-cell;vertical-align:top;width:30px'>
		<button class='btn btn-info btn-search-lmember' type='button'><i class='fa fa-search'></i></button>
	</div>
</div>
<div>
	<div class='radio'>
		<label><input class='barcode-radio' type='radio' name='optradio' value='barcode' checked>Barcode</label>&nbsp;&nbsp;
		<label><input class='barcode-radio' type='radio' name='optradio' value='nik'>NIK</label>
	</div>
</div>