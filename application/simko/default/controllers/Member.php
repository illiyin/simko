<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct() {
        parent::__construct();

        $this->load->helper('az_auth');
        az_check_auth('manajemen_anggota_anggota');
        $this->table = 'member';
        $this->controller = 'member';
        $this->load->helper('az_crud');
    }

	public function index(){
		$this->load->helper('az_location');
		$this->load->library('AZApp');
		$this->load->helper('az_core');
		$azapp = $this->azapp;
		$crud = $azapp->add_crud();

		$crud->set_column(array('#', 'Foto', 'NIK', 'Nama', 'Departemen', 'Alamat', 'Kota/Kabupaten', 'Status', azlang('Action')));

		$crud->set_id($this->controller);
		$crud->set_default_url(true);

		$birthdate = $azapp->add_datetime();
		$birthdate->set_id('birthdate');
		$birthdate->set_format('DD-MM-YYYY');
		$birthdate->set_name('birthdate');
		$data['birthdate'] = $birthdate->render();

		$expired_date = $azapp->add_datetime();
		$expired_date->set_id('expired_date');
		$expired_date->set_format('DD-MM-YYYY');
		$expired_date->set_name('expired_date');
		$data['expired_date'] = $expired_date->render();

		$join_date = $azapp->add_datetime();
		$join_date->set_id('join_date');
		$join_date->set_format('DD-MM-YYYY');
		$join_date->set_name('join_date');
		$data['join_date'] = $join_date->render();

		$image = $azapp->add_image();
		$image->set_id('photo');
		$image->set_image_height('160px');
		$image->set_image_width('160px');
		$image = $image->render();
		$data['photo'] = $image;

		$v_modal = $this->load->view('member/v_member', $data, true);
		$crud->set_form('form');
		$crud->set_modal($v_modal);
		$crud->set_modal_title("Anggota");
		$v_modal = $crud->generate_modal();

		$crud->set_callback_add("jQuery('#autosp').prop('checked', true);");
		
		$crud = $crud->render();
		$crud .= $v_modal;	
		$azapp->add_content($crud);

		$js = az_add_js('member/vjs_member');
		$azapp->add_js($js);

		$data_header['title'] = 'Anggota';
		$data_header['breadcrumb'] = array('manajemen_anggota', 'manajemen_anggota_anggota');
		$azapp->set_data_header($data_header);
		
		echo $azapp->render();	
	}

	public function get() {
		$this->load->library('AZApp');
		$crud = $this->azapp->add_crud();
		$crud->set_select('idmember, photo, member_code, member_name, department_name, address, city_name, member_status');
		$crud->set_filter('member_name, member_code, department_name, address, city_name');
		$crud->add_join('city', 'left');
		$crud->add_join('department', 'left');
		$crud->set_sorting('photo, member_code, member_name, department_name, address, city_name, member_status');
		$crud->set_id($this->controller);
		$crud->add_where("member.status > 0");
		$crud->set_table($this->table);
		$crud->set_order_by('member_code');
		$crud->set_custom_style('custom_style');
		echo $crud->get_table();
	}

	function custom_style($key, $value, $data) {
		if ($key == 'photo') {
			if (strlen($value) > 0) {
				$url = base_url().AZAPP."assets/images/member_photos/".$value.'?'.strtotime(Date('YmdHis'));
			}
			else {
				$url = base_url().AZAPP."assets/images/no-image.jpg";
			}
			return "<img class='img-member-row' src='".$url."'>";
		}
		if ($key == 'member_status') {
			$txt = 'danger';
			if ($value == 'AKTIF') {
				$txt = 'success';
			}

			return "<label class='label label-".$txt."'>".$value."</label>";
		}
		return $value;
	}

	public function save(){
		$data = array();
		$data_post = $this->input->post();
		$idpost = azarr($data_post, 'id'.$this->table);
		$data['sMessage'] = '';
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('', '');

		$this->form_validation->set_rules('member_name', azlang('Name'), 'required|trim|max_length[200]');
		$this->form_validation->set_rules('member_code', 'NIK', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('identity_card', 'Nomor KTP', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('employee_status', 'Status Karyawan', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('join_date', 'Tanggal Bergabung', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('member_status', 'Status Member', 'required|trim|max_length[200]');
		$this->form_validation->set_rules('idmember_level', 'Level Member', 'required|trim|max_length[200]');

		$employee_status = $this->input->post('employee_status');
		if ($employee_status == 'KONTRAK') {
			$this->form_validation->set_rules('expired_date', 'Tgl Expired', 'required|trim|max_length[200]');
		}

		$err_code = 0;
		$err_message = '';

		if($this->form_validation->run() == TRUE){	
			$data_save = array(
				'member_name' => $this->input->post('member_name'),
				'idprovince' => $this->input->post('idprovince'), 
				'idcity' => $this->input->post('idcity'), 
				'iddistrict' => $this->input->post('iddistrict'), 
				'iddepartment' => $this->input->post('iddepartment'), 
				'idposition' => $this->input->post('idposition'), 
				'member_code' => $this->input->post('member_code'), 
				// 'iddatacenter' => $this->input->post('iddatacenter'), 
				'identity_card' => $this->input->post('identity_card'), 
				'tax_number' => $this->input->post('tax_number'), 
				'birthdate' => az_crud_date($this->input->post('birthdate'), 'Y-m-d'), 
				'religion' => $this->input->post('religion'), 
				'address' => $this->input->post('address'), 
				'biological_mother' => $this->input->post('biological_mother'), 
				'join_date' => az_crud_date($this->input->post('join_date'), 'Y-m-d'), 
				'employee_status' => $this->input->post('employee_status'), 
				'expired_date' => az_crud_date($this->input->post('expired_date'), 'Y-m-d'), 
				'vehicle_number' => $this->input->post('vehicle_number'), 
				'blood_group' => $this->input->post('blood_group'), 
				'member_status' => $this->input->post('member_status'), 
				'phone' => $this->input->post('phone'), 
				'idmember_level' => $this->input->post('idmember_level'),
				'account_number' => $this->input->post('account_number'), 
				'account_number_type' => $this->input->post('account_number_type'), 
				'member_card' => $this->input->post('member_card'), 
				'transaction_pin' => $this->input->post('transaction_pin'),
				'email' => $this->input->post('email'),
				'idbarcode' => $this->input->post('idbarcode'),
				'idtelegram' => $this->input->post('idtelegram'),
			);

			//check unique
			$this->load->library('Simko');
			$ac_member_code = array(
				'table' => 'member',
				'key' => 'member_code',
				'id' => $idpost,
				'idkey' => 'idmember',
				'code' => $this->input->post('member_code')
			);
			$check_member_code = $this->simko->check_unique($ac_member_code);
			if (!$check_member_code) {
				$err_code++;
				$err_message = 'NIK telah digunakan';
			}
			//check unique
			if (strlen($this->input->post('idbarcode')) > 0) {
				$ac_member_code = array(
					'table' => 'member',
					'key' => 'idbarcode',
					'id' => $idpost,
					'idkey' => 'idmember',
					'code' => $this->input->post('idbarcode')
				);
				$check_member_code = $this->simko->check_unique($ac_member_code);
				if (!$check_member_code) {
					$err_code++;
					$err_message = 'ID Barcode telah';
				}
			}

			if ($err_code == 0) {
				$response_save = az_crud_save($idpost, $this->table, $data_save);
				$err_code = azarr($response_save, 'err_code');
				$err_message = azarr($response_save, 'err_message');
				$insert_id = azarr($response_save, 'insert_id');
			}

			if ($err_code == 0) {
				if(isset($_FILES['image-photo']['tmp_name'])){
					$config['upload_path'] = APPPATH.'/assets/images/member_photos';
					$config['allowed_types'] = 'jpg';
					$config['overwrite'] = true;
					$config['max_size']	= '500';

					$new_name = 'member_photo_'.$insert_id.'.jpg';
					$config['file_name'] = $new_name;
					
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('image-photo')){
						$err_message = $this->upload->display_errors();
					}
					else {
						$data = array('upload_data' => $this->upload->data());
						$data_update['photo'] = azarr($this->upload->data(), 'file_name');
						if (strlen($data_update['photo']) > 0) {
							$this->db->where('idmember', $insert_id);
							$this->db->update('member', $data_update);
						}
					}
				}
			}
		}
		else {
			$err_code++;
			$err_message = validation_errors();
		}

		$data["sMessage"] = $err_message;
		echo json_encode($data);
	}

	public function edit() {
		$this->db->join('province', 'member.idprovince = province.idprovince', 'LEFT');
		$this->db->join('city', 'member.idcity = city.idcity', 'LEFT');
		$this->db->join('district', 'member.iddistrict = district.iddistrict', 'LEFT');
		$this->db->join('department', 'member.iddepartment = department.iddepartment', 'LEFT');
		$this->db->join('position', 'member.idposition = position.idposition', 'LEFT');
		$this->db->join('member_level', 'member.idmember_level = member_level.idmember_level');
		az_crud_edit('idmember, member_name, member.idprovince, member.idcity, member.iddistrict, member.iddepartment, member.idposition, member.idmember_level, province_name as ajax_idprovince, city_name as ajax_idcity, district_name as ajax_iddistrict, department_name as ajax_iddepartment, position_name ajax_idposition, member_level_name as ajax_idmember_level, member_code, iddatacenter, identity_card, tax_number, date_format(birthdate, "%d-%m-%Y") as birthdate, date_format(join_date, "%d-%m-%Y") as join_date, date_format(expired_date, "%d-%m-%Y") as expired_date, religion, address, biological_mother, employee_status, vehicle_number, blood_group, photo as azimage_photo, member_status, phone, account_number, account_number_type, member_card, balance, shu_running, transaction_pin, email, idbarcode, idtelegram, autosp, s_pokok, s_wajib, s_lain, p_wajib, p_sukarela, p_lain');
	}

	public function delete() {
		$id = $this->input->post('id');

		@unlink(base_url().AZAPP.'member_photos/member_photo_'.$id.'.jpg');

		az_crud_delete($this->table, $id);
	}
}