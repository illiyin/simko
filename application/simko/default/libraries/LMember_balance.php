<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LMember_balance {

	
	function get_member_balance($idmember) {
		$ci =& get_instance();
		$ci->db->where('member.status', 1);
		$ci->db->join('member', 'member.idmember = history_balance.idmember');
		$data = $ci->db->get('member');
		$err_code = 0;
		$remaining_balance = 0;
		$balance = 0;
		$credit_limit = 0;
		if ($data->num_rows() == 0) {
			$credit_limit = 0;
			$err_code++;
		}
		else {
			$credit_limit = $data->row()->credit_limit;
			$balance = $data->row()->balance;
			$remaining_balance = $balance - ($credit_limit);
		}

		$return = array(
			'remaining_balance' => $remaining_balance,
			'balance' => $balance,
			'credit_limit' => $credit_limit,
			'err_code' => $err_code
		);		

		return $return;
	}

	function update_member_balance($data) {
		$ci =& get_instance();

		$idmember = $data['idmember'];
		$type = $data['type'];
		$total = $data['total'];
		$idbalance = $data['idbalance'];
		$balance_type = $data['balance_type'];
		$total = floatval($total);

		$the_balance = $this->get_member_balance($idmember);
		$old_balance = $the_balance['balance'];

		if ($type == '+') {
			$new_balance = $old_balance + $total;
		}
		else {
			$new_balance = $old_balance - $total;
		}

		$ci->db->where('idmember', $idmember);
		$ci->db->order_by('idhistory_balance', 'desc');
		$db_last_balance = $ci->db->get('history_balance', 1);
		if ($db_last_balance->num_rows() > 0) {
			$last_balance = $db_last_balance->row()->balance;
			if ($last_balance != $old_balance) {
				$diff_balance = $old_balance - $last_balance;
				$arr_member = array(
					'balance_type' => 'SYSTEM',
					'idmember' => $idmember,
					'total' => $diff_balance,
					'balance' => $old_balance
				);
				az_crud_save('', 'history_balance', $arr_member);
			}
		}

		//insert ke balance
		$arr_member = array(
			'idbalance' => $idbalance,
			'balance_type' => $balance_type,
			'idmember' => $idmember,
			'total' => $type.az_crud_number($total),
			'balance' => $new_balance
		);
		az_crud_save('', 'history_balance', $arr_member);

		//update member balance
		$arr_update = array(
			'balance' => $new_balance,
			'updated' => Date('Y-m-d H:i:s'),
			'updatedby' => $ci->session->userdata('username')
		);
		$ci->db->where('idmember', $idmember);
		$ci->db->update('member', $arr_update);
	}
}