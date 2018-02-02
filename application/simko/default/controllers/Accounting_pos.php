<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounting_pos extends AZ_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('az_auth');
        az_check_auth('accounting_pos_piutang_member');
    }

    public function index(){

    }

	public function piutang_member(){
		$this->load->library('AZApp');
		$app = $this->azapp;
		$data_header['title'] = azlang('Piutang Member');
		$data_header['breadcrumb'] = array('Piutang Member');
		$app->set_data_header($data_header);
		$this->load->helper('az_config');
		$this->load->helper('az_core');

		$view = $this->load->view('piutang_member/v_piutangMember', '', true);
		$app->add_content($view);
		echo $app->render();	
	}


}