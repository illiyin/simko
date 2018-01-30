<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Piutangmember extends AZ_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('az_auth');
        az_check_auth('accounting_pos_piutang_member');
        $this->table = 'history_balance';
        $this->controller = 'piutangmember';
  		$this->load->library('LHistory_balance');
        $this->load->helper('az_crud');
    }

	public function index(){
		$this->load->library('AZApp');
		$this->load->helper('az_config');
		$this->load->helper('az_core');

		$azapp = $this->azapp;
		$crud = $this->azapp->add_crud();
		// add js
		// $js = az_add_js('piutangmember/vjs_piutangmember');
		// $azapp->add_js($js);
		

		$data_header['title'] = azlang('Piutang Member');
		$data_header['breadcrumb'] = array('Piutang Member');
		$azapp->set_data_header($data_header);


		$v_modal = $this->load->view('piutangmember/v_modalbayar', $data, true);
		$crud->set_form('form');
		$crud->set_modal($v_modal);
		$crud->set_modal_title("Bayar");
		$v_modal = $crud->generate_modal();

		$history = $this->get_all();
		$history.= $v_modal;

		$data['history'] = $history;
		$data['piutang'] = $this->lhistory_balance->get_all();
		$v_base	= $this->load->view('piutangmember/v_piutangmember', $data, true);
		// show content
		$azapp->add_content($v_base);

		echo $azapp->render();	
	}

	public function get() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table('history_balance');
		$crud->set_column(array('#', 'Tanggal', 'NIK', 'Nama', 'ID Data Center', 'Jumlah', 'Saldo Akhir', 'Keterangan', azlang('Action')));
		$crud->set_select('idhistory_balance, member.idmember, member_code, member_name, balance_type, total, history_balance.balance, member_status');
		
		$crud->set_select_table('member.idmember, member_name, member_code,balance_type, total, history_balance.balance');
		$crud->add_join('member', 'left');
		$crud->set_id('member');
		$crud->add_where("member.status > 0");
		$crud->set_default_url(true);

		// button Cek Piutang
		$crud->set_btn_add(array());
		$cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		$crud->set_btn_top_custom($cekpiutang);


		// button Cetak Bukti
		$cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('tak').'</button>';
		$crud->set_custom_btn($cetakbukti);
		echo $crud->get_table();


		return $crud->render();


	}


	public function get_all(){
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_table("history_balance");
		$crud->set_column(array('#', 'NIK', 'Nama', 'ID Data Center', 'Keterangan', 'Jumlah', 'Saldo Akhir', azlang('Action')));		
		$crud->set_select('idhistory_balance, member_code, member_name, history_balance.balance, total, balance_type, member_status');
		$crud->set_select_table('idhistory_balance, member_code, member_name, history_balance.balance, total, balance_type, member_status');
		
		$crud->add_join('member', 'left');
		$crud->set_id($this->controller);
		$crud->add_where("member.status > 0");
		$crud->set_default_url(true);
		
		// button Cek Piutang
		$crud->set_btn_add(array());
		$cekpiutang = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-refresh"></span> '.azlang('Cek Piutang').'</button>';
		$crud->set_btn_top_custom($cekpiutang);

		// button Cetak Bukti
		$crud->set_edit(false);
		$crud->set_delete(false);
		$cetakbukti = '<button class="btn btn-primary az-btn-primary btn-cek type="button"><span class="glyphicon glyphicon-print"></span> '.azlang('tak').'</button>';
		$crud->set_custom_btn($cetakbukti);

		$crud->get_table();
		return $crud->render();
	}

}