<script>
	jQuery("body").on("click", ".hidden-menu-text", function() {
		jQuery("menu ul:eq(0)").slideToggle('fast');
		jQuery("menu .hidden-menu-text i").toggleClass("fa-caret-square-o-up fa-caret-square-o-down");
	});

	jQuery('.img-btn-language').click(function() {
		var lang = jQuery(this).attr('data-id');
		jQuery.ajax({
			url: app_url+'home/change_language/'+lang,
			success:function(respond){
				location.reload();
			},
		});
	});

	//flag color
	<?php 
		$ci =& get_instance();
		$lang = $ci->session->userdata('azlang');
	?>
	var selected_lang = "<?php echo $lang;?>";
	if (selected_lang == 'indonesian') {
		jQuery('.img-btn-language[data-id="id"]').css('opacity', 1);
		jQuery('.img-btn-language[data-id="en"]').css('opacity', 0.5);
	}
	else {
		jQuery('.img-btn-language[data-id="id"]').css('opacity', 0.5);
		jQuery('.img-btn-language[data-id="en"]').css('opacity', 1);
	}

	var menu = jQuery('.az-menu li a');
	jQuery(menu).each(function(adata, bdata) {
		var txtLink = jQuery(bdata).attr('href');
		var theLast = txtLink.substring(txtLink.lastIndexOf('/'));
		if (theLast == '/#') {
			jQuery(bdata).css('color', 'red');
		}
	});

	jQuery('body').on('click', '.btn-remove-tr', function() {
		var id = jQuery(this).attr('data-id');
		var old_val = jQuery('#x_remove_tr').val();
		var new_val = jQuery(this).parents('tr').find('.' + id).val();
		if (new_val.length > 0) {
			var val_remove = old_val + ',' + new_val;
			jQuery("#x_remove_tr").val(val_remove);
		}

		jQuery(this).parents('tr').remove();

		reset_number();

		if (typeof calculate_total == 'function') {
			calculate_total();
			if (typeof calculate_percent == 'function') {
				calculate_percent('percent', 'discount');
				calculate_percent('percent', 'tax');
				calculate_total();
			}
		}
	});

	function reset_number() {
		var numb = jQuery('table tbody').find('.numb');
    	jQuery(numb).each(function(adata, bdata) {
    		jQuery(bdata).text((adata + 1));
    	});
	}

	function success_data_edit(response, elm, clear) {
		var clear = clear || 'false';
		var content = jQuery('#field_table_' + elm).text();
		jQuery.each(response.data, function(adata, bdata){
			jQuery('#'+adata).val(bdata);
			if (jQuery('#'+adata).hasClass('format-number-decimal')) {
				jQuery('#'+adata).val(thousand_separator_decimal(bdata));
			}

			var arr_ajax = [];
			var ajax_ = adata;

	        if (ajax_.indexOf("ajax_") >= 0) {
	            arr_ajax.push(ajax_);
	        }

			if (arr_ajax.length > 0) {
	            jQuery.each(arr_ajax, function(index_arr, value_arr) {
	                var idajax = value_arr.replace("ajax_", "");
	                if (response.data[value_arr] != null) {
	                    jQuery("#"+idajax+".select2-ajax").append(new Option(response.data[value_arr], response.data[idajax], true, true)).trigger('change');
	                }
	            });
	        }
		});


		if (clear == 'false') {
			jQuery('#transaction_' + elm + ' tbody').html('');
		}
		var telm = 'id' + elm + '_detail';
		jQuery.each(response.data_detail, function(adata, bdata) {
			jQuery('#transaction_' + elm + ' tbody').append(content);
			jQuery('.tid' + elm + '_detail').last().val(bdata[telm]); 
			jQuery('.tidproduct').last().val(bdata.idproduct); 
			jQuery('.tunit_type').last().val(bdata.unit_type); 
			jQuery('.product-barcode').last().val(bdata.product_name);
			jQuery('.tkey_product').last().val(bdata.key_product); 
			var format_qty = '';
			if (bdata.is_decimal == 1) {
				format_qty = thousand_separator_decimal(bdata.qty);
			}
			else {
				format_qty = thousand_separator(bdata.qty);
			}
			jQuery('.tqty').last().val(format_qty); 
			
			jQuery('.tproduct-unit').last().val(bdata.unit_name); 
			jQuery('.tprice').last().val(thousand_separator(bdata.price)); 
			jQuery('.tdiscount').last().val(thousand_separator(bdata.discount)); 
			jQuery('.ttotal').last().val(thousand_separator(bdata.total));

			// jQuery('.tprice').last().attr('readonly', false);
			jQuery('.tqty').last().attr('readonly', false);
			// jQuery('.tdiscount').last().attr('readonly', false);

			reset_number();
		});
	}

	generate_height();
	function generate_height() {
		var height = jQuery('.az-menu').height();
		jQuery('.az-ltheme-right').css('min-height', height + 'px');
	}

	<?php 
		$arr_page = array(
			'purchase_order',
			'purchase',
			'purchase_return',
			'sales',
			'sales_return',
			'transfer',
			'stock_opname',
		);

		$the_page = $this->uri->segment(1);

		if (in_array($the_page, $arr_page)) {
	?>
	jQuery('body').on('change', '#idoutlet, #is_consignment', function() {
		reset_table();
	});

	function reset_table() {
		var dtable = jQuery('#product').dataTable({bRetrieve: true});
        dtable.fnDraw();
	}
	<?php
		}
	?>

	// jQuery(window).scroll(function(){
	//   	var sticky = jQuery('.container-header');
	//     var scroll = jQuery(window).scrollTop();

	//   	if (scroll >= 40) {
	//   		sticky.addClass('fixed');
	//   	}
	//   	else {
	//   		sticky.removeClass('fixed');
	// 	}
	// });