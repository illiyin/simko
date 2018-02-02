<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutangmember extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('az_auth');
        az_check_auth('accounting_pos_piutang_member');
        $this->table = 'history_balance';
        $this->controller = 'piutangmember';
  		$this->load->library('LHistory_balance');
        $this->load->helper('az_crud');

		$this->load->library('AZApp');
		$this->load->helper('az_config');
		$this->load->helper('az_core');
    }

	public function indexs(){

		// $azapp = $this->azapp;
		// $crud = $this->azapp->add_crud();
		// // add js
		// // $js = az_add_js('piutangmember/vjs_piutangmember');
		// // $azapp->add_js($js);
		

		// $data_header['title'] = azlang('Piutang Member');
		// $data_header['breadcrumb'] = array('Piutang Member');
		// $azapp->set_data_header($data_header);


		// $v_modal = $this->load->view('piutangmember/v_modalbayar', $data, true);
		// $crud->set_form('form');
		// $crud->set_modal($v_modal);
		// $crud->set_modal_title("Bayar");
		// // $v_modal = $crud->generate_modal();

		// $history = $this->get_all();
		// // $history.= $v_modal;

		// $data['history'] = $history;
		// $data['piutang'] = $this->lhistory_balance->get_all();
		// $v_base	= $this->load->view('piutangmember/v_piutangmember', $data, true);
		// // show content
		// $azapp->add_content($v_base);

		// echo $azapp->render();	
	}

	public function index(){
		$azapp = $this->azapp;
		$crud = $this->azapp->add_crud();
		$data_header['title'] = azlang('Piutang Member');
		$data_header['breadcrumb'] = array('Piutang Member');
		$azapp->set_data_header($data_header);

		// v modal bayar
		// $dataModalBayar['history'] = $history;
		$dataModalBayar['piutang'] = $this->getBayarAll();
		$v_modal = $this->load->view('piutangmember/v_modalbayar', $dataModalBayar, true);
		$crud->set_form('form');
		$crud->set_modal($v_modal);
		$crud->set_id('formcetak');
		$crud->set_modal_title("Bayar");
		$v_modal = $crud->generate_modal();
		$azapp->add_content($v_modal);

		// v modal piutang
		// $dataPiutangMember['history'] = $history;
		$dataPiutangMember['piutang'] = $this->getPiutangAll();
		$dataPiutangMember['bayar'] = $this->getBayarAll();
		$v_base	= $this->load->view('piutangmember/v_piutangmember', $dataPiutangMember, true);
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
		// $crud->set_url_edit();
		// $crud->set_url_save();
		// $crud->set_url_delete();
		
		// button Cek Piutang
		$crud->set_btn_add(array());
		$cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		$crud->set_btn_top_custom($cekpiutang);

		// button Cetak Bukti
		$crud->set_edit(false);
		$crud->set_delete(false);
		$cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('cetak').'</button>';
		$crud->set_custom_btn($cetakbukti);

		$crud->get_table();
		return $crud;
	}
	public function getPiutangAllJson(){
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table("history_balance");
		$crud->set_column(array('#', 'NIK', 'Nama', 'ID Data Center', 'Keterangan', 'Jumlah', 'Saldo Akhir', azlang('Action')));		
		$crud->set_select('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		$crud->set_filter('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		$crud->set_select_table('history_balance.idhistory_balance, member.member_code, member.member_name, member.iddatacenter, history_balance.balance, history_balance.total, history_balance.balance_type');
		
		$crud->add_join('member', 'left');
		$crud->set_id($this->controller);
		$crud->set_id_table('piutang');
		$crud->add_where("member.status > 0");
		$crud->set_default_url(false);
		$crud->set_url("getPiutangAllJson");
		// $crud->set_url_edit();
		// $crud->set_url_save();
		// $crud->set_url_delete();
		
		// button Cek Piutang
		$crud->set_btn_add(array());
		$cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		$crud->set_btn_top_custom($cekpiutang);

		// button Cetak Bukti
		$crud->set_edit(false);
		$crud->set_delete(false);
		$cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('cetak').'</button>';
		$crud->set_custom_btn($cetakbukti);

		echo $crud->get_table();
		// echo $crud->last_query();
	}

	public function getBayarAll(){
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table("member");
		$crud->set_column(array('#', 'NIK', 'ID Data Center', 'Nama', 'Departemen', 'Saldo', 'Sisa Limit', azlang('Action')));		
		$crud->set_select('member.idmember, history_balance.idhistory_balance, member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		$crud->set_filter('history_balance.idhistory_balance, member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		$crud->set_select_table('member.member_code, member.iddatacenter, member.member_name, department.department_name, history_balance.balance, member_level.credit_limit');
		
		// $crud->add_join('member_level', 'left');
		// $crud->add_join('history_balance', 'left');
		// $crud->add_join('department', 'left');

		$crud->add_join_manual('member_level', 'member_level.idmember_level = member.idmember', 'left');
		$crud->add_join_manual('history_balance', 'history_balance.idmember = member.idmember', 'left');
		$crud->add_join_manual('department', 'department.iddepartment = member.iddepartment', 'left');

		$crud->set_id($this->controller);
		$crud->set_id_table('bayar');

		$crud->add_where("history_balance.balance < 0");
		$crud->set_default_url(false);
		$crud->set_url("getBayarAllJson");
		// $crud->set_url_edit();
		// $crud->set_url_save();
		// $crud->set_url_delete();
		
		// button Cek Piutang
		// $crud->set_btn_add(array());
		// $cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		// $crud->set_btn_top_custom($cekpiutang);

		// // button Cetak Bukti
		// $crud->set_edit(false);
		// $crud->set_delete(false);
		// $cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('cetak').'</button>';
		// $crud->set_custom_btn($cetakbukti);

		$crud->get_table();
		return $crud;
	}
	public function getBayarAllJson(){
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
		// $crud->set_url_edit();
		// $crud->set_url_save();
		// $crud->set_url_delete();
		
		// button Cek Piutang
		// $crud->set_btn_add(array());
		// $cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		// $crud->set_btn_top_custom($cekpiutang);

		// // button Cetak Bukti
		// $crud->set_edit(false);
		// $crud->set_delete(false);
		// $cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('cetak').'</button>';
		// $crud->set_custom_btn($cetakbukti);

		echo $crud->get_table();
		// echo $crud->last_query();
		// return $crud;
	}
	public function cetak(){
		$dataModalBayar['piutang'] = $this->getBayarAll();
		$v_modal = $this->load->view('piutangmember/v_modalbayar', $dataModalBayar, true);
		$crud->set_form('form');
		$crud->set_id('formcetak');
		$crud->set_modal($v_modal);
		$crud->set_modal_title("Bayar");
		$v_modal = $crud->generate_modal();
		echo $v_modal;
	}

}