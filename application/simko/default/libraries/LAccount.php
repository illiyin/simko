<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LAccount {
	function update_account($data) {
		$ci =& get_instance();

		$idaccount = $data['idaccount'];
		$iduser = $data['iduser'];
		$idtransaction = $data['idtransaction'];
		$type = $data['type'];
		$account_type = $data['account_type'];
		$total = floatval($data['total']);

		$ci->db->where('idaccount', $idaccount);
		$ci->db->order_by('idhistory_account', 'desc');
		$account = $ci->db->get('history_account', 1);
		$old_balance = 0;
		if ($account->num_rows() > 0) {
			$old_balance = $account->row()->balance;
		}

		if ($account_type == '+') {
			$new_balance = $old_balance + $total;
		}
		else {
			$new_balance = $old_balance - $total;
		}

		$ci->db->where('idaccount', $idaccount);
		$ci->db->order_by('idhistory_account', 'desc');
		$db_last_account = $ci->db->get('history_account', 1);
		if ($db_last_account->num_rows() > 0) {
			$last_account = $db_last_account->row()->balance;
			if ($last_account != $old_balance) {
				$diff_balance = $old_balance - $last_account;
				$arr_account = array(
					'type' => 'SYSTEM',
					'idaccount' => $idaccount,
					'total' => $diff_balance,
					'balance' => $old_balance
				);
				az_crud_save('', 'history_account', $arr_account);
			}
		}

		//insert ke account
		$arr_new_account = array(
			'idaccount' => $idaccount,
			'type' => $type,
			'idtransaction' => $idtransaction,
			'iduser' => $iduser,
			'total' => $account_type.az_crud_number($total),
			'balance' => $new_balance
		);
		az_crud_save('', 'history_account', $arr_new_account);

		//update account
		$arr_update = array(
			'balance' => $new_balance,
			'updated' => Date('Y-m-d H:i:s'),
			'updatedby' => $ci->session->userdata('username')
		);
		$ci->db->where('idaccount', $idaccount);
		$ci->db->update('account', $arr_update);

		//balance per user
		$ci->db->where('idaccount', $idaccount);
		$ci->db->where('account_type', 'TUNAI');
		$balance_user = $ci->db->get('account');
		if ($balance_user->num_rows() > 0) {
			$ci->db->where('iduser', $iduser);
			$data_user = $ci->db->get('user');
			if ($data_user->num_rows() > 0) {
				$user_balance = $data_user->row()->balance;
				if (strlen($user_balance) == 0) {
					$user_balance = 0;
				}
				if ($account_type == '+') {
					$new_user_balance = $user_balance + $total;
				}
				else {
					$new_user_balance = $user_balance - $total;
				}
				$arr_user_balance = array(
					'balance' => $new_user_balance
				);
				$ci->db->where('iduser', $iduser);
				$ci->db->update('user', $arr_user_balance);
			}
		}
	}
}