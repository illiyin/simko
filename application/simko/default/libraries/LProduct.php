<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LProduct {

	function validate_product($data) {
		$ci =& get_instance();
		$err_code = 0;
		$err_message = '';
		$sku = $data['sku'];
		$idproduct = $data['idproduct'];
		$barcode_1 = $data['barcode_1'];
		$barcode_2 = $data['barcode_2'];
		$barcode_3 = $data['barcode_3'];

		//check unique
		$ci->load->library('Simko');

		$arr_unique = array('sku', 'barcode_1', 'barcode_2', 'barcode_3');
		foreach ($arr_unique as $key => $value) {
			if (strlen($data[$value]) == 0) {
				continue;
			}
			$ac_product = array(
				'table' => 'product',
				'key' => $value,
				'id' => $idproduct,
				'idkey' => 'idproduct',
				'code' => $data[$value]
			);
			$check_product = $ci->simko->check_unique($ac_product);
			if (!$check_product) {
				$err_code++;
				$koma = '';
				if (strlen($err_message) > 0) {
					$koma = ', ';
				}
				if ($value == 'sku') {
					$err_message .= $koma.'Kode produk telah digunakan';
				}
				else {
					$err_message .= $koma.ucfirst(str_replace('_', ' ', $value)).' telah digunakan';
				}
			}
		}

		if ($err_code == 0) {
			$is_barcode_1 = true;
			$is_barcode_2 = true;
			$is_barcode_3 = true;
			if (strlen($barcode_1) > 0) {
				if (strlen($barcode_2) > 0) {
					if ("'".$barcode_1."'" == "'".$barcode_2."'") {
						$is_barcode_1 = false;
					}
				}
				if (strlen($barcode_3) > 0) {
					if ("'".$barcode_1."'" == "'".$barcode_3."'") {
						$is_barcode_1 = false;
					}
				}
			}
			if (strlen($barcode_2) > 0) {
				if (strlen($barcode_1) > 0) {
					if ("'".$barcode_1."'" == "'".$barcode_2."'") {
						$is_barcode_2 = false;
					}
				}
				if (strlen($barcode_3) > 0) {
					if ("'".$barcode_2."'" == "'".$barcode_3."'") {
						$is_barcode_2 = false;
					}
				}
			}
			if (strlen($barcode_3) > 0) {
				if (strlen($barcode_1) > 0) {
					if ("'".$barcode_1."'" == "'".$barcode_3."'") {
						$is_barcode_3 = false;
					}
				}
				if (strlen($barcode_2) > 0) {
					if ("'".$barcode_2."'" == "'".$barcode_3."'") {
						$is_barcode_3 = false;
					}
				}
			}
			
			if (!$is_barcode_1 || !$is_barcode_2 || !$is_barcode_3) {
				$err_code++;
				$err_message = 'Barcode tidak boleh sama';
			}

		}

		if ($err_code == 0) {
			if (strlen($barcode_1) > 0) {
				$ci->db->where('status', 1);
				$ci->db->where('barcode_2', $barcode_1);
				$ci->db->or_where('barcode_3', $barcode_1);
				$check_barcode_1 = $ci->db->get('product');
				if ($check_barcode_1->num_rows() > 0) {
					$err_code++;
					$err_message = 'Barcode telah digunakan';
				}
			}
		}
		if ($err_code == 0) {
			if (strlen($barcode_2) > 0) {
				$ci->db->where('status', 1);
				$ci->db->where('barcode_1', $barcode_2);
				$ci->db->or_where('barcode_3', $barcode_2);
				$check_barcode_2 = $ci->db->get('product');
				if ($check_barcode_2->num_rows() > 0) {
					$err_code++;
					$err_message = 'Barcode telah digunakan';
				}
			}
		}
		if ($err_code == 0) {
			if (strlen($barcode_3) > 0) {
				$ci->db->where('status', 1);
				$ci->db->where('barcode_1', $barcode_3);
				$ci->db->or_where('barcode_2', $barcode_3);
				$check_barcode_3 = $ci->db->get('product');
				if ($check_barcode_3->num_rows() > 0) {
					$err_code++;
					$err_message = 'Barcode telah digunakan';
				}
			}
		}

		if ($err_code == 0) {
			if (strlen($barcode_1) == 0) {
				$barcode_1 = NULL;
			}
			if (strlen($barcode_2) == 0) {
				$barcode_2 = NULL;
			}
			if (strlen($barcode_3) == 0) {
				$barcode_3 = NULL;
			}
		}

		$return = array(
			'err_code' => $err_code,
			'err_message' => $err_message
		);

		return $return;
	}
}