<script>
	jQuery('body').on('click', '.btn-search-lmember', function() {
		show_modal('lmember');
	});

	jQuery('body').on('click', '.btn-choose-lmember', function() {
		var id = jQuery(this).attr('data-id');
		var name = jQuery(this).attr('data-name');
		member_selected(id, name);
	});

	jQuery('body').on('click', '.btn-remove-selected-lmember', function() {
		var the = jQuery(this).parent('.container-lmember');
		jQuery('#idmember').val('');
		jQuery('#member_text').val('');
		jQuery(this).addClass('hide');
		jQuery('#member_text').attr('readonly', false);
	});

	jQuery('body').on('keydown', '#member_text', function(evt) {
		if (evt.keyCode == 13) {
			scanning();
		}
	});

	function member_selected(id, name) {
		jQuery('#idmember').val(id).change();
		jQuery('#member_text').val(name);
		jQuery('.btn-remove-selected-lmember').removeClass('hide');
		jQuery('#member_text').attr('readonly', true);
		hide_modal('lmember');
	}

	function scanning() {
		var code = jQuery('#member_text').val();
		if (code.length > 0) {
			var type = jQuery('.barcode-radio:checked').val();
			jQuery.ajax({
				url: app_url + 'data_member/scanning',
				type: 'POST',
				dataType: 'JSON',
				data: {
					type: type,
					code: code
				},
				success: function(response) {
					if (response.err_code > 0) {
						bootbox.alert({
							title: "Kesalahan",
							message: response.err_message,
							callback: function() {
								jQuery('#member_text').focus();
							}
						});
					}
					else {
						member_selected(response.id, response.name);
					}
				},
				error: function(response) {}
			});			
		}

	}