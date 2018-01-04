<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LMember {
	function get_member($class = '', $id = '') {
		$ci =& get_instance();

		$ci->load->library('AZApp');
		$ci->load->helper('az_core');
		$azapp = $ci->azapp;

		$crud = $azapp->add_crud();
		$crud->set_column(array('No', 'NIK', 'Nama', 'Departemen', 'Saldo', 'Aksi'));
		$crud->set_id("member");
		$crud->set_url("app_url+'data_member/get_data_member'");
		$crud->set_url_edit("app_url+'data_member/edit_data_member'");
		$crud->set_url_save("app_url+'data_member/save_data_member'");
		$crud->set_url_delete("app_url+'data_member/delete_data_product'");
		$crud->set_width(',,,,,80px');

		$crud->set_btn_add(false);

		$crud = $crud->render();

		$modal = $azapp->add_modal();
		$modal->set_id('lmember');
		$modal->set_modal_title('Member');
		$modal->set_modal($crud);
		$ret = $modal->render();

		$the_id = 'idmember';
		if (strlen($id) > 0) {
			$the_id = $id.'.'.$the_id;
		}

		$ci->load->library('encrypt');

		$data['data_id'] = $ci->encrypt->encode($the_id);
		$data['data_class'] = $class;

		$txt = $ci->load->view('lmember/v_lmember', $data, true);

		$js = az_add_js('lmember/vjs_lmember');
		$azapp->add_js($js);

		$ret .= $txt;

		return $ret;
	}
}