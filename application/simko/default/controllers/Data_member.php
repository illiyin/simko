<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_member extends CI_Controller {
	function get_data_member() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();

		$crud->set_select('idmember, member_code, member_name, department_name, balance, "" as btn');
		$crud->set_select_table('idmember, member_code, member_name, department_name, balance, btn');
		$crud->set_filter('member_code, member_name, department_name, balance, idbarcode');
		$crud->add_join('department', 'left');
		$crud->set_sorting('member_code, member_name, department_name, balance');
		$crud->set_id('member');
		$crud->add_where("member.status > 0");
		$crud->set_table('member');
		$crud->set_select_decimal('3');
		$crud->set_select_align(',,,right,center');
		$crud->set_order_by('member_code');
		$crud->set_edit(false);
		$crud->set_delete(false);
		$crud->set_custom_style('custom_style');
		echo $crud->get_table();
	}

	function custom_style($key, $value, $data) {
		if ($key == 'btn') {
			$idmember = azarr($data, 'idmember');
			$member_code = azarr($data, 'member_code');
			$member_name = azarr($data, 'member_name');
			$department = azarr($data, 'department_name');
			$name = $member_code.' - '.$member_name.' ('.$department.')';
			$btn = "<button data-name='".$name."' data-id='".$idmember."' class='btn btn-info btn-xs btn-choose-lmember' type='button'><i class='fa fa-arrow-down'></i> Pilih</button>";
			return $btn;
		}
		return $value;
	}

	function edit_data_product() {}
	function delete_data_product() {}

	function scanning() {
		$type = $this->input->post('type');
		$code = $this->input->post('code');
		$err_code = 0;
		$err_message = '';

		if ($type == 'nik') {
			$this->db->where('member_code', $code);			
		}
		else {
			$this->db->where('idbarcode', $code);
		}
		$this->db->join('department', 'member.iddepartment = department.iddepartment');
		$this->db->where('member.status', 1);
		$data = $this->db->get('member');

		$res = '';
		$id = '';
		if ($data->num_rows() == 0) {
			$err_code++;
			$err_message = 'Member tidak ditemukan';
		}
		else {
			$code = $data->row()->member_code;
			$name = $data->row()->member_name;
			$department = $data->row()->department_name;
			$res = $code.' - '.$name.' ('.$department.')';
			$id = $data->row()->idmember;
		}

		$return = array(
			'err_code' => $err_code,
			'err_message' => $err_message,
			'id' => $id,
			'name' => $res
		);

		echo json_encode($return);
	}
}