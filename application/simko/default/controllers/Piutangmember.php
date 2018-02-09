<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutangmember extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('az_auth');
        az_check_auth('accounting_pos_piutang_member');
        $this->table = 'history_balance';
        $this->controller = 'piutangmember';
        $this->load->helper('az_crud');
  		//$this->load->library('LHistory_balance');

		$this->load->library('AZApp');
		$this->load->helper('az_config');
		$this->load->helper('az_core');
    }

	public function index(){
		$azapp = $this->azapp;

		$crud = $this->azapp->add_crud();

		$data_header['title'] = azlang('Piutang Member');
		$data_header['breadcrumb'] = array('Piutang Member');
		$azapp->set_data_header($data_header);

		// modal cetak
		$modal_cetak = $this->azapp->add_crud();
		$modal_cetak->set_form('form');
		$modal_cetak->set_id('cetakbukti');
		$modal_cetak->set_modal_title("KOP UNIT PT. AISIN INDONESIA");
		$modal_cetak->set_modal_subtitle("Ejip Plot 5 J Cikarang Selatan Bekasi 17550 ");
		$modal_cetak->add_btn_left_modal('pdf', 'PDF');
		$modal_cetak->add_btn_right_modal('excel', 'Excel');
		$modal_cetak->set_btn_save_modal(false);
		$view 		= $this->load->view('piutangmember/v_modalhistory', '', true);
		$modal_cetak->set_modal($view);
		$v_modal = $modal_cetak->generate_custom_modal();
		$azapp->add_content($v_modal);

		// modal detail
		$modal_detail = $this->azapp->add_crud();
		$modal_detail->set_form('form');
		$modal_detail->set_id('detail');
		$modal_detail->set_modal_title("KOP UNIT PT. AISIN INDONESIA");
		$modal_detail->set_modal_subtitle("Ejip Plot 5 J Cikarang Selatan Bekasi 17550 ");
		$modal_detail->add_btn_left_modal('pdf', 'PDF');
		$modal_detail->add_btn_right_modal('excel', 'Excel');
		$modal_detail->set_btn_save_modal(false);
		$view 		= $this->load->view('piutangmember/v_modaldetail', '', true);
		$modal_detail->set_modal($view);
		$v_modal 	= $modal_detail->generate_custom_modal();
		$azapp->add_content($v_modal);


		// modal bayar
		$modal_bayar = $this->azapp->add_crud();
		$modal_bayar->set_form('form');
		$modal_bayar->set_id('bayar');
		$modal_bayar->set_modal_title("Bayar Piutang Member & Deposit Saldo");
		$view 		 = $this->load->view('piutangmember/v_modalbayar', '', true);
		$modal_bayar->set_modal($view);
		$v_modal = $modal_bayar->generate_custom_modal();
		$azapp->add_content($v_modal);

		// view
		$data['piutang'] = $this->getPiutangAll();
		$data['bayar'] = $this->getBayarAll();
		$data['account'] = az_select_account();
		$v_base	= $this->load->view('piutangmember/v_piutangmember', $data, true);

		$azapp->add_content($v_base);

		echo $azapp->render();
	}
	public function getPiutangAll(){
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table("history_balance");
		$crud->set_column(array('#', 'NIK', 'Nama', 'ID Data Center', 'Jumlah', 'Saldo Akhir', 'Keterangan',azlang('Action')));		
		$crud->set_select('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		$crud->set_filter('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		$crud->set_select_table('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		
		$crud->add_join('member', 'left');
		$crud->set_id($this->controller);
		$crud->set_id_table('piutang');
		$crud->add_where("member.status > 0");
		$crud->set_default_url(false);
		$crud->set_url("getPiutangAllJson");
		
		// button Cek Piutang
		$crud->set_btn_add(array());
		$cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		$crud->set_btn_top_custom($cekpiutang);

		// button Cetak Bukti
		$crud->set_edit(false);
		$crud->set_delete(false);
        $custom_button = array('cetak bukti');
		$crud->set_custom_btn($custom_button);

		$crud->get_table();
		return $crud;
	}
	public function getPiutangAllJson(){
		echo $this->getPiutangAll()->get_table();
	}

	public function getBayarAll(){
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table("member");
		$crud->set_column(array('#', 'NIK', 'ID Data Center', 'Nama', 'Departemen', 'Saldo', 'Sisa Limit', azlang('Action')));		
		$crud->set_select('member.idmember, history_balance.idhistory_balance, member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		$crud->set_filter('history_balance.idhistory_balance, member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		$crud->set_select_table('member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		
		$crud->add_join_manual('member_level', 'member_level.idmember_level = member.idmember', 'left');
		$crud->add_join_manual('history_balance', 'history_balance.idmember = member.idmember', 'left');
		$crud->add_join_manual('department', 'department.iddepartment = member.iddepartment', 'left');

		$crud->set_id($this->controller);
		$crud->set_id_table('bayar');

		$crud->add_where("history_balance.balance < 0");
		$crud->set_default_url(false);
		$crud->set_url("getBayarAllJson");
		
		// button Cek Piutang
		$crud->set_btn_add(array());

		// button Detail dan Bayar 
		$crud->set_edit(false);
		$crud->set_delete(false);
		$custom_button = array('detail', 'bayar');
		$crud->set_custom_btn($custom_button);

		$crud->get_table();
		return $crud;
	}
	public function getBayarAllJson(){
		echo $this->getBayarAll()->get_table();
	}
	public function getcetakbukti($id){
		$data	= $this->db->select('member.idmember, member.member_name, member.member_code, 
												member.iddatacenter, department.department_name, history_balance.created,
												history_balance.total, history_balance.updatedby,
												history_balance.balance, history_balance.balance_type')
										->from('member')
										->join('history_balance', 'history_balance.idmember = member.idmember')
										->join('department', 'member.iddepartment = department.iddepartment')
										->where('history_balance.idhistory_balance = '. $id)
										->get()->row();
		$result = array(
						"idmember" 		=> $data->idmember,
						"member_name" 	=> $data->member_name,
						"member_code" 	=> $data->member_code,
						"date" 			=> date("d F Y", strtotime($data->created)),
						"total" 		=> $data->total,
						"balance" 		=> $data->balance,
						"balance_type" 		=> $data->balance_type,
						"department_name"	=> $data->department_name,
						"iddatacenter" 		=> $data->iddatacenter,
						"penyetor" 			=> $data->member_name,
						"updatedby" 		=> $data->updatedby,
					);
		echo json_encode($result);
	}


	public function getdetail($id){
		$where 		= array('idmember' => $id);
		$member 	= $this->db->select('idmember, member_name, member_code, iddatacenter, department_name')
										->from('member')
										->join('department', 'member.iddepartment = department.iddepartment')
										->where($where)
										->get()->row();
		$detail 	= $this->db->get_where('history_balance', $where)->result_array();
		$transaksi  = '';
		foreach($detail as $detail){
		$transaksi 	.=  '<tr> 
							<td>'.date("d F Y", strtotime($detail['created'])).'</td>
							<td>'.$detail['idhistory_balance'].'</td>
							<td>'.$detail['balance_type'].'</td>
							<td>'.($detail['total'] > 0 ? "Kredit" : "Debet").'</td>
							<td>Rp '.$detail['balance'].'</td>
						</tr>
						';	
		}
		$result 	= array(
						"idmember"		=> $member->idmember,
						"member_name" 	=> $member->member_name,
						"member_code" 	=> $member->member_code,
						"iddatacenter"	=> $member->iddatacenter,
						"department_name" => $member->department_name,
						"transaksi" 	=> $transaksi
					);
		echo json_encode($result);
	}


	public function getbayar($id){
		$data 	= $this->db->select('member.idmember, member.member_name, member.member_code, 
												member.iddatacenter, department.department_name, history_balance.created,
												history_balance.total, history_balance.updatedby,
												history_balance.balance, history_balance.balance_type')
										->from('member')
										->join('history_balance', 'history_balance.idmember = member.idmember')
										->join('department', 'member.iddepartment = department.iddepartment')
										->where('history_balance.idhistory_balance = '. $id)
										->order_by('history_balance.idhistory_balance', 'DESC')
										->limit('1')
										->get()->row();

		$result = array(
					"idmember"	=> $data->idmember,
					"member_name" => $data->member_name,
					"member_code" => $data->member_code,
					"iddatacenter"	=> $data->iddatacenter,
					"department_name" => $data->department_name,
					"balance" => $data->balance
					);
		echo json_encode($result);
	}

}