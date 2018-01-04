<script>
	function employee_status() {
		var type = jQuery('#employee_status').val();
		if (type == 'TETAP') {
			jQuery('.red-expired').hide();
			jQuery('#expired_date').prop('readonly', true);
		}
		else {
			jQuery('.red-expired').show();
			jQuery('#expired_date').prop('readonly', false);
		}
	}

	employee_status();

	jQuery('#employee_status').on('change', function() {
		employee_status();
	});