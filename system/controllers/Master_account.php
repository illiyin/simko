<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_account extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->helper('az_auth');

        $this->table = 'account';
        $this->controller = 'master_account';
        $this->table_column = 'idaccount, account_name';
        $this->load->helper('az_lang');
        $this->load->helper('array');
        $this->load->helper('az_crud');
        $this->load->library('AZApp');
        $this->crud = $this->azapp->add_crud();
    }
    
	public function get_data(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("account_name");
		if (strlen($q) > 0) {
			$this->db->like("account_name", $q);
		}
		$this->db->select("idaccount as id, account_name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("account", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("account_name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("account");
		$count = $cdata->num_rows();

		$endCount = $offset + $limit;
		$morePages = $endCount < $count;

		$results = array(
		  "results" => $data->result_array(),
		  "pagination" => array(
		  	"more" => $morePages
		  )
		);
		echo json_encode($results);
	}
}