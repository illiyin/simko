<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LHistory_balance {

	function get_all() { 
		$ci =& get_instance();
		$ci->db->select('*');
		$ci->db->join('member', 'member.idmember = history_balance.idmember');
		$ci->db->where('member.status >', 0);
		$data = $ci->db->get('history_balance')->result_array();

		return json_encode($data);
	}
}