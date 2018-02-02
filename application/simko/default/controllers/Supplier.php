<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->helper('az_auth');
        az_check_auth('master_pos_supplier');
        $this->table = 'supplier';
        $this->controller = 'supplier';
        $this->load->helper('az_crud');
    }

	public function index(){
		$this->load->helper('az_location');
		$this->load->library('AZApp');
		$azapp = $this->azapp;
		$crud = $azapp->add_crud();

		$crud->set_column(array('#', azlang('Name'), azlang('Phone'), azlang('Email'), azlang('Address'), azlang('District'), azlang('City'), azlang('Province'), azlang('Action')));
		$crud->set_id($this->controller);
		$crud->set_default_url(true);

		$v_modal = $this->load->view('supplier/v_supplier', '', true);
		$crud->set_form('form');
		$crud->set_modal($v_modal);
		$crud->set_modal_title(azlang("Supplier"));
		$v_modal = $crud->generate_modal();
		
		$crud = $crud->render();
		$crud .= $v_modal;	
		$azapp->add_content($crud);

		$data_header['title'] = azlang('Supplier');
		$data_header['breadcrumb'] = array('master_pos', 'master_pos_supplier');
		$azapp->set_data_header($data_header);
		
		echo $azapp->render();	
	}

	public function get() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_select('idsupplier, name, phone, email, address, district_name, city_name, province_name');
		$crud->add_join('province', 'left');
		$crud->add_join('city', 'left');
		$crud->add_join('district', 'left');
		$crud->set_filter('name');
		$crud->set_sorting('name, phone, email, address, district_name, city_name, province_name');
		$crud->set_id($this->controller);
		$crud->add_where("supplier.status > 0");
		$crud->set_table($this->table);
		$crud->set_order_by('name');
		echo $crud->get_table();
	}

	public function save(){
		$data = array();
		$data_post = $this->input->post();
		$idpost = azarr($data_post, 'id'.$this->table);
		$data['sMessage'] = '';
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('name', azlang('Name'), 'required|trim|max_length[200]');
		$this->form_validation->set_rules('address', azlang('Address'), 'required|trim|max_length[200]');

		$err_code = 0;
		$err_message = '';

		if($this->form_validation->run() == TRUE){
			$data_save = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'idcity' => $this->input->post('idcity'),
				'idprovince' => $this->input->post('idprovince'),
				'iddistrict' => $this->input->post('iddistrict'),
				'idtelegram' => $this->input->post('idtelegram'), 
				'is_lock_supplier' => $this->input->post('is_lock_supplier'), 
				'is_consignment' => $this->input->post('is_consignment'), 
				'is_send_info' => $this->input->post('is_send_info'), 
				'is_report_sales' => $this->input->post('is_report_sales'), 
				'default_discount' => str_replace(',', '.', $this->input->post('default_discount')), 
				'is_public_supplier' => $this->input->post('is_public_supplier'), 
				'pic_supplier' => $this->input->post('pic_supplier'), 
				// 'balance' => $this->input->post('balance'), 
				'limit' => str_replace('.', '', $this->input->post('limit')),
			);

			$response_save = az_crud_save($idpost, $this->table, $data_save);
			$err_code = azarr($response_save, 'err_code');
			$err_message = azarr($response_save, 'err_message');
			$insert_id = azarr($response_save, 'insert_id');
		}
		else {
			$err_code++;
			$err_message = validation_errors();
		}

		$data["sMessage"] = $err_message;
		echo json_encode($data);
	}

	public function edit() {
		$this->db->join('province', 'province.idprovince = supplier.idprovince', 'left');
		$this->db->join('city', 'city.idcity = supplier.idcity', 'left');
		$this->db->join('district', 'district.iddistrict = supplier.iddistrict', 'left');
		az_crud_edit('idsupplier, name, address, phone, email, supplier.idcity, supplier.idprovince, province_name as ajax_idprovince, city_name as ajax_idcity, supplier.iddistrict, district_name as ajax_iddistrict, idtelegram, is_lock_supplier, is_consignment, is_send_info, is_report_sales, default_discount, is_public_supplier, pic_supplier, balance, limit');
	}

	public function delete() {
		$id = $this->input->post('id');
		az_crud_delete($this->table, $id);
	}
}