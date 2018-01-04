<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simko {
	function get_product() {
		$ci =& get_instance();

		$ci->load->library('AZApp');
		$azapp = $ci->azapp;

		$crud = $azapp->add_crud();
		$crud->set_column(array(azlang('No'), 'SKU', 'Nama Produk', 'Kategori', 'Barcode', 'Satuan', 'Harga Jual', 'Stok', azlang('Action')));
		$crud->set_id("product");
		$crud->set_url("app_url+'data_product/get_data_product'");
		$crud->set_url_edit("app_url+'data_product/edit_data_product'");
		$crud->set_url_save("app_url+'data_product/save_data_product'");
		$crud->set_url_delete("app_url+'data_product/delete_data_product'");
		$crud->set_width(',,,,,,,,80px');


		$crud->add_aodata('idoutlet', 'idoutlet');
		$crud->add_aodata('is_consignment', 'is_consignment');
		$crud->add_aodata('idsupplier', 'idsupplier');
		$crud->set_btn_add(false);

		$crud = $crud->render();

		$modal = $azapp->add_modal();
		$modal->set_id('lproduct');
		$modal->set_modal_title('Produk');
		$modal->set_modal($crud);
		$ret = $modal->render();

		return $ret;
	}

	function get_product_stock($idproduct, $idoutlet = '') {
		$ci =& get_instance();

		if (strlen($idoutlet) > 0) {
			$ci->db->where('outlet.status', 1);
			$ci->db->where('outlet.idoutlet', $idoutlet);
			$outlet_type = $ci->db->get('outlet')->row()->outlet_type;

			if (in_array($outlet_type, array('GUDANG', 'TOKO UTAMA'))) {
				$ci->db->where('product.idproduct', $idproduct);
				$outlet_stock = $ci->db->get('product');
				if ($outlet_type == 'GUDANG') {
					$stock = $outlet_stock->row()->warehouse_stock;
				}
				else {
					$stock = $outlet_stock->row()->store_stock;
				}
			}
			else {
				$ci->db->where('idproduct', $idproduct);
				$ci->db->where('idoutlet', $idoutlet);
				$ci->db->where('status', 1);
				$product_stock = $ci->db->get('product_stock');

				$stock = 0;
				if ($product_stock->num_rows() > 0) {
					$stock = $product_stock->row()->stock;
				}
			}
		}
		else {
			$ci->db->where('status', 1);
			$ci->db->where('idproduct', $idproduct);
			$data_product = $ci->db->get('product');
			$stock = 0;
			if ($data_product->num_rows() > 0) {
				$stock += $data_product->row()->warehouse_stock;
				$stock += $data_product->row()->store_stock;
			}

			$ci->db->select('sum(stock) as stock');
			$ci->db->where('status', 1);
			$ci->db->where('idproduct', $idproduct);
			$product_stock = $ci->db->get('product_stock');
			if ($product_stock->num_rows() > 0) {
				$stock += $product_stock->row()->stock;
			}
		}

		return $stock;
	}

	function update_stock($the_data) {
		$ci =& get_instance();
		$idstock = $the_data['idstock'];
		$idproduct = $the_data['idproduct'];
		$idoutlet = $the_data['idoutlet'];
		$qty = $the_data['qty'];
		$type = $the_data['type'];
		$stock_type = $the_data['stock_type'];

		$ci->db->where('idproduct', $idproduct);
		$ci->db->where('product_type', 'BARANG');
		$the_product = $ci->db->get('product');
		if ($the_product->num_rows() == 0) {
			return;
		}
		
		$old_stock = $this->get_product_stock($idproduct, $idoutlet);
		
		if ($type == '+') {
			$new_stock = $old_stock + $qty;
		}
		else {
			$new_stock = $old_stock - $qty;
		}

		//if stock not same
		$ci->db->where('idproduct', $idproduct);
		$ci->db->where('idoutlet', $idoutlet);
		$ci->db->order_by('idhistory_stock', 'desc');
		$the_history = $ci->db->get('history_stock', 1);
		if ($the_history->num_rows() > 0) {
			$last_stock = $the_history->row()->stock;
			if ($last_stock != $old_stock) {
				$diff_stock = $old_stock - $last_stock;
				$arr_stock = array(
					'stock_type' => 'SYSTEM',
					'idproduct' => $idproduct,
					'idoutlet' => $idoutlet,
					'total' => $diff_stock,
					'stock' => $old_stock
				);
				az_crud_save('', 'history_stock', $arr_stock);		
			}
		}

		//insert ke stok
		$arr_stock = array(
			'idstock' => $idstock,
			'stock_type' => $stock_type,
			'idproduct' => $idproduct,
			'idoutlet' => $idoutlet,
			'total' => $type.az_crud_number($qty),
			'stock' => $new_stock
		);
		az_crud_save('', 'history_stock', $arr_stock);

		//update stok produk
		$ci->db->where('idoutlet', $idoutlet);
		$data_outlet = $ci->db->get('outlet');
		$outlet_type = $data_outlet->row()->outlet_type;
		
		$arr_stock_update = array(
			'created' => Date('Y-m-d H:i:s'),
			'createdby' => $ci->session->userdata('username'),
			'updated' => Date('Y-m-d H:i:s'),
			'updatedby' => $ci->session->userdata('username'),
		);

		if ($outlet_type == 'TOKO CABANG') {
			$ci->db->where('idproduct', $idproduct);
			$ci->db->where('idoutlet', $idoutlet);
			$check_outlet = $ci->db->get('product_stock');

			if ($check_outlet->num_rows() == 0) {
				$arr_outlet = array(
					'idproduct' => $idproduct,
					'idoutlet' => $idoutlet,
					'stock' => $type.az_crud_number($qty),
					'created' => Date('Y-m-d H:i:s'),
					'createdby' => $ci->session->userdata('username'),
					'updated' => Date('Y-m-d H:i:s'),
					'updatedby' => $ci->session->userdata('username'),
				);
				az_crud_save('', 'product_stock', $arr_outlet);
			}
			else {
				$ci->db->where('idproduct', $idproduct);
				$ci->db->where('idoutlet', $idoutlet);
				$ci->db->set("stock", "stock ".$type.' '.az_crud_number($qty), FALSE);
				$ci->db->update('product_stock', $arr_stock_update);
			}
		}
		else if ($outlet_type == 'GUDANG') {
			$ci->db->where('idproduct', $idproduct);
			$ci->db->set("warehouse_stock", "warehouse_stock ".$type.' '.az_crud_number($qty), FALSE);
			$ci->db->update('product', $arr_stock_update);
		}
		else if ($outlet_type == 'TOKO UTAMA') {
			$ci->db->where('idproduct', $idproduct);
			$ci->db->set("store_stock", "store_stock ".$type.' '.az_crud_number($qty), FALSE);
			$ci->db->update('product', $arr_stock_update);
		}
	}

	function check_unique($data) {
		$ci =& get_instance();

		$table = $data['table'];
		$key = $data['key'];
		$id = $data['id'];
		$idkey = $data['idkey'];
		$code = $data['code'];

		$ci->db->where($key, $code);
		if (strlen($id) > 0) {
			$ci->db->where($idkey.' != ', $id);
		}
		$the_data = $ci->db->get($table);

		$return = true;
		if ($the_data->num_rows() > 0) {
			$return = false;
		}

		return $return;
	}

}