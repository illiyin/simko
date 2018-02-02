<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_product extends CI_Controller {
	function get_data_productx() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();

		$crud->set_select('product_conversion.idproduct_conversion, product_conversion.idproduct, sku, barcode, product_name, product_conversion.idproduct_unit, product_unit.name as unit_name, product_category.name as category_name, sell_price');
		
		$crud->set_select('product.idproduct, sku, barcode');

		$crud->set_select_table('sku, barcode, product_name, unit_name, category_name, sell_price');
		$crud->set_filter('sku,barcode,product_name');
		$crud->set_sorting('sku, barcode, product_name, unit_name, category_name, sell_price');
		$crud->set_id('product_conversion');
		$crud->add_join('product_unit');
		$crud->add_join('product');
		$crud->add_join('product_category', '', 'product', 'idproduct_category');
		$crud->add_where("product_conversion.status > 0");
		$crud->add_where("product.status > 0");
		$crud->add_where('is_active = 1');
		$crud->set_table('product_conversion');
		$crud->set_order_by('product.sku');
		$crud->set_custom_style('custom_style_product');
		$crud->set_edit(false);
		$crud->set_delete(false);
		$crud->set_select_decimal('5');
		$crud->set_select_align(',,,,,right,center');
		echo $crud->get_table();
	}

	function get_data_product() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();

		$is_consignment = @$_REQUEST['is_consignment'];
		$idsupplier = @$_REQUEST['idsupplier'];
		if ($is_consignment) {
			$crud->add_where('product.is_consignment = 1');
			if (strlen($idsupplier) > 0) {
				$crud->add_where('product.idsupplier = "'.$idsupplier.'"');
			}
		}
		else if ($is_consignment == "0") {
			$crud->add_where('(product.is_consignment is null or product.is_consignment = 0)');
		}

		$crud->set_select('product.idproduct, product.barcode_1, product.barcode_2, product.barcode_3, product.idproduct_unit_1, product.idproduct_unit_2, product.idproduct_unit_3, "the_barcode", "unit", "the_sell_price", sku, product_name, unit_1.name as unit_1_name, unit_2.name as unit_2_name, unit_3.name as unit_3_name, product_category.name as product_category_name, product.sell_price_1, product.sell_price_2, product.sell_price_3, product_type, is_active, "the_stock", is_decimal, modal_price, per_unit_1, per_unit_2, per_unit_3');
		$crud->set_select_table("idproduct, sku, product_name, product_category_name, the_barcode, unit, the_sell_price, the_stock");
		$crud->set_filter('product_name,sku,barcode_1,barcode_2,barcode_3');
		$crud->add_join_manual('product_unit as unit_1', 'product.idproduct_unit_1 = unit_1.idproduct_unit', 'left');
		$crud->add_join_manual('product_unit as unit_2', 'product.idproduct_unit_2 = unit_2.idproduct_unit', 'left');
		$crud->add_join_manual('product_unit as unit_3', 'product.idproduct_unit_3 = unit_3.idproduct_unit', 'left');
		$crud->add_join('product_category', 'left');
		$crud->set_sorting('sku, product_name, product_category_name, barcode_1, unit_1.name, sell_price_1, product_type');
		$crud->set_id('product');
		$crud->set_select_align(',,,,center,right,center');
		$crud->add_where("product.status > 0");
		$crud->set_table('product');
		$crud->set_order_by('product_name');
		$crud->set_custom_style('custom_style_product');
		$crud->set_edit(false);
		$crud->set_delete(false);
		echo $crud->get_table();
	}

	function custom_style_product($key, $value, $data) {
		$this->load->helper('az_core');
		$this->load->library('simko');

		$idoutlet = $this->session->userdata('idoutlet');
		if (strlen($idoutlet) == 0) {
			$idoutlet = $_REQUEST['idoutlet'];
		}
		if ($key == 'the_barcode') {
			$barcode_1 = azarr($data, 'barcode_1');
			$barcode_2 = azarr($data, 'barcode_2');
			$barcode_3 = azarr($data, 'barcode_3');

			$lbl = '';
			if (strlen($barcode_1) > 0) {
				$lbl .= "<label class='label label-success'>".$barcode_1."</label><br>";
			}
			if (strlen($barcode_2) > 0) {
				$lbl .= "<label class='label label-info'>".$barcode_2."</label><br>";
			}
			if (strlen($barcode_3) > 0) {
				$lbl .= "<label class='label label-warning'>".$barcode_3."</label>";
			}

			return $lbl;
		}

		if ($key == 'the_sell_price') {
			$sell_price_1 = azarr($data, 'sell_price_1');
			$sell_price_2 = azarr($data, 'sell_price_2');
			$sell_price_3 = azarr($data, 'sell_price_3');

			$lbl = '';
			if (strlen($sell_price_1) > 0 && $sell_price_1 != 0) {
				$lbl .= "<label class='label label-success'>".az_thousand_separator($sell_price_1)."</label><br>";			
			}
			if (strlen($sell_price_2) > 0 && $sell_price_2 != 0) {
				$lbl .= "<label class='label label-info'>".az_thousand_separator($sell_price_2)."</label><br>";			
			}
			if (strlen($sell_price_3) > 0 && $sell_price_3 != 0) {
				$lbl .= "<label class='label label-warning'>".az_thousand_separator($sell_price_3)."</label>";
			}
			return $lbl;
		}

		$unit_1 = azarr($data, 'unit_1_name');
		$unit_2 = azarr($data, 'unit_2_name');
		$unit_3 = azarr($data, 'unit_3_name');
		if ($key == 'unit') {
			$lbl = '';
			if (strlen($unit_1) > 0) {
				$lbl .= "<label class='label label-success'>".$unit_1."</label><br>";
			}
			if (strlen($unit_2) > 0) {
				$lbl .= "<label class='label label-info'>".$unit_2."</label><br>";
			}
			if (strlen($unit_3) > 0) {
				$lbl .= "<label class='label label-warning'>".$unit_3."</label>";
			}

			return $lbl;
		}

		if ($key == 'the_stock') {
			$idproduct = azarr($data, 'idproduct');
			$stock = $this->simko->get_product_stock($idproduct, $idoutlet);
			$is_decimal = azarr($data, 'is_decimal');
			$stock = az_thousand_separator($stock);
			if ($is_decimal) {
				$stock = az_thousand_separator_decimal($stock);
			}

			$product_type = azarr($data, 'product_type');
			if ($product_type == 'JASA') {
				$stock = '-';
			}
			return $stock;
		}

		$idproduct = azarr($data, 'idproduct');
		$product_name = azarr($data, 'product_name');

		// $unit_selected = azarr($data, 'unit_name');

		if ($key == 'action') {
			$btn = '';
			$is_decimal = azarr($data, 'is_decimal', 0);
			$modal_price = azarr($data, 'modal_price');
			if (strlen($unit_1) > 0) {
				$price = azarr($data, 'sell_price_1');
				$key_product = $idproduct.'-'.azarr($data, 'idproduct_unit_1');
				$unit_type = 1;
				$per_unit_1 = azarr($data, 'per_unit_1');
				$modal_price = $modal_price * $per_unit_1;
				$btn .= "<button data-modal-price='".$modal_price."' data-decimal='".$is_decimal."' data-idproduct='".$idproduct."' data-unit-type='".$unit_type."' data-product-key='".$key_product."' data-unit='".$unit_1."' data-name='".$product_name."' data-price='".$price."' class='btn-choose-product btn btn-success btn-xs' type='button'><i class='fa fa-arrow-down'></i> Pilih</button>";
			}
			if (strlen($unit_2) > 0) {
				$price = azarr($data, 'sell_price_2');
				$key_product = $idproduct.'-'.azarr($data, 'idproduct_unit_2');
				$unit_type = 2;
				$per_unit_2 = azarr($data, 'per_unit_2');
				$modal_price = $modal_price * $per_unit_2;
				$btn .= "<button data-modal-price='".$modal_price."' data-decimal='".$is_decimal."' data-idproduct='".$idproduct."' data-unit-type='".$unit_type."' data-product-key='".$key_product."' data-unit='".$unit_2."' data-name='".$product_name."' data-price='".$price."' class='btn-choose-product btn btn-info btn-xs' type='button'><i class='fa fa-arrow-down'></i> Pilih</button>";
			}
			if (strlen($unit_3) > 0) {
				$price = azarr($data, 'sell_price_3');
				$key_product = $idproduct.'-'.azarr($data, 'idproduct_unit_3');
				$unit_type = 3;
				$per_unit_3 = azarr($data, 'per_unit_3');
				$modal_price = $modal_price * $per_unit_3;
				$btn .= "<button data-modal-price='".$modal_price."' data-decimal='".$is_decimal."' data-idproduct='".$idproduct."' data-unit-type='".$unit_type."' data-product-key='".$key_product."' data-unit='".$unit_3."' data-name='".$product_name."' data-price='".$price."' class='btn-choose-product btn btn-warning btn-xs' type='button'><i class='fa fa-arrow-down'></i> Pilih</button>";
			}

			if (azarr($data, 'product_type') == 'JASA') {
				$price = azarr($data, 'sell_price_1');
				$btn .= "<button data-modal-price='".$modal_price."' data-decimal='x' data-idproduct='".$idproduct."' data-name='".$product_name."' data-price='".$price."' class='btn-choose-product btn btn-warning btn-xs' type='button'><i class='fa fa-arrow-down'></i> Pilih</button>";
			}

			return $btn;
		}
		return $value;
	}

	function edit_data_product() {}
	function delete_data_product() {}

	function get_product_barcode() {
		$barcode = $this->input->post('barcode');
		$this->load->helper('az_config');
		$code_digit = az_get_config('code_digit');
		$unit_type = '';

		$this->db->select('product.idproduct, product_name, unit_1.name as unit_1, unit_2.name as unit_2, unit_3.name as unit_3, sell_price_1, sell_price_2, sell_price_3, per_unit_1, per_unit_2, per_unit_3, is_decimal');
		
		if (substr($barcode, 0, 1) == 'q') {
			// CARI DI SATUAN 2
			$this->db->where('product.barcode_2', substr($barcode, 1));
			$unit_type = 2;
		}
		else if (substr($barcode, 0, 2) == 'qq') {
			// CARI DI SATUAN 3
			$this->db->where('product.barcode_3', substr($barcode, 2));
			$unit_type = 2;
		}
		else if (strlen($barcode) == $code_digit) {
			// CARI SKU
			$this->db->where('product.sku', $barcode);
			$unit_type = 1;
		}
		else {
			//CARI BARCODE BIASA
			$this->db->where('product.barcode_1', $barcode);
			$unit_type = 1;
		}
		
		$this->db->where('product.status', 1);
		$this->db->where('product.is_active', 1);
		$this->db->join('product_unit unit_1', 'product.idproduct_unit_1 = unit_1.idproduct_unit', 'left');
		$this->db->join('product_unit unit_2', 'product.idproduct_unit_2 = unit_2.idproduct_unit', 'left');
		$this->db->join('product_unit unit_3', 'product.idproduct_unit_3 = unit_3.idproduct_unit', 'left');
		$data = $this->db->get('product');


		$err_code = 0;
		$err_message = '';
		$ret_data = array();

		if ($data->num_rows() == 0) {
			$err_code++;
			$err_message = 'Produk tidak ditemukan';
		}

		if ($err_code == 0) {
			$row = $data->row();
			$ret_data = array(
				'idproduct' => $row->idproduct,
				'product_name' => $row->product_name,
				'qty' => $this->input->post('qty'),
				'discount' => '0,00',
				'is_decimal' => $row->is_decimal
			);

			if ($unit_type == 1) {
				$ret_data['unit_name'] = $row->unit_1;
				$ret_data['price'] = $row->sell_price_1;
				$ret_data['total'] = $row->sell_price_1 * $this->input->post('qty');
				$ret_data['unit_type'] = 1;
			}
			if ($unit_type == 2) {
				$ret_data['unit_name'] = $row->unit_2;
				$ret_data['price'] = $row->sell_price_2;
				$ret_data['total'] = $row->sell_price_2 * $this->input->post('qty');
				$ret_data['unit_type'] = 2;
			}
			if ($unit_type == 3) {
				$ret_data['unit_name'] = $row->unit_3;
				$ret_data['price'] = $row->sell_price_3;
				$ret_data['total'] = $row->sell_price_3 * $this->input->post('qty');
				$ret_data['unit_type'] = 3;
			}

			$ret_data['key_product'] = $row->idproduct.'-'.$ret_data['unit_type'];
		}

		$return = array(
			'err_code' => $err_code,
			'err_message' => $err_message,
			'data' => array(),
			'data_detail' => array(0 => $ret_data)
		);

		echo json_encode($return);
	}
}