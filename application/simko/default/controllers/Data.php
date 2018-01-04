<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
	public function get_data_koperasi(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("name");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("idkoperasi as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("koperasi", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("koperasi");
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

	public function get_data_outlet(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("idoutlet");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("idoutlet as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("outlet", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("outlet");
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

	public function get_data_product_category(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("name");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("idproduct_category as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("product_category", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("product_category");
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

	public function get_data_product_unit(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("name");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("idproduct_unit as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("product_unit", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("product_unit");
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

	public function get_data_department(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");

		$offset = ($page - 1) * $limit;

		$this->db->order_by("department_name");
		if (strlen($q) > 0) {
			$this->db->like("department_name", $q);
		}
		$this->db->select("iddepartment as id, department_name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("department", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("department_name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("department");
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

	public function get_data_position(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$parent = $this->input->get('parent');
		$offset = ($page - 1) * $limit;

		$this->db->order_by("position_name");
		if (strlen($q) > 0) {
			$this->db->like("position_name", $q);
		}
		if (strlen($parent) > 0) {
			$this->db->where('position.iddepartment', $parent);
		}
		$this->db->select("idposition as id, position_name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("position", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("position_name", $q);
		}
		if (strlen($parent) > 0) {
			$this->db->where('position.iddepartment', $parent);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("position");
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

	public function get_data_product(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$type = $this->input->get("type");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("product_name");
		if (strlen($q) > 0) {
			$this->db->like("product_name", $q);
		}
		$this->db->select("idproduct as id, product_name as text");
		$this->db->where('status', '1');
		if ($type == 'product') {
			$this->db->where('product_type', 'BARANG');
		}
		$data = $this->db->get("product", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("product_name", $q);
		}
		if ($type == 'product') {
			$this->db->where('product_type', 'BARANG');
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("product");
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

	public function get_data_member_level(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("member_level_name");
		if (strlen($q) > 0) {
			$this->db->like("member_level_name", $q);
		}
		$this->db->select("idmember_level as id, member_level_name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("member_level", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("member_level_name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("member_level");
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

	public function get_data_supplier(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("name");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("idsupplier as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("supplier", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("supplier");
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

	public function get_data_member(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("member_name");
		if (strlen($q) > 0) {
			$this->db->group_start();
			$this->db->where('idbarcode', $q);
			$this->db->or_where('member_code', $q);
			$this->db->or_like("member_name", $q);
			$this->db->or_where("idbarcode", $q);
			$this->db->group_end();
		}
		$this->db->select("idmember as id, concat(member_name, ' (', member_code, ')') as text");
		$this->db->where('status', '1');

		$data = $this->db->get("member", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->group_start();
			$this->db->where('idbarcode', $q);
			$this->db->or_where('member_code', $q);
			$this->db->or_like("member_name", $q);
			$this->db->or_where("idbarcode", $q);
			$this->db->group_end();
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("member");
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

	public function get_data_purchase_order(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("purchase_order_code");
		if (strlen($q) > 0) {
			$this->db->like("purchase_order_code", $q);
		}
		$this->db->join('supplier', 'purchase_order.idsupplier = supplier.idsupplier');
		$this->db->select("idpurchase_order as id, purchase_order_code as text");
		$this->db->where('purchase_order.status', '1');
		$this->db->where('purchase_order_status', 'SIAP');

		$data = $this->db->get("purchase_order", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("purchase_order_code", $q);
		}
		$this->db->where('purchase_order.status', '1');
		$this->db->where('purchase_order_status', 'SIAP');
		$cdata = $this->db->get("purchase_order");
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

	public function get_data_purchase(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("idpurchase", 'desc');
		if (strlen($q) > 0) {
			$this->db->like("purchase_code", $q);
		}
		$this->db->join('supplier', 'purchase.idsupplier = supplier.idsupplier');
		$this->db->select("idpurchase as id, purchase_code as text");
		$this->db->where('purchase.status', '1');
		$data = $this->db->get("purchase", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("purchase_code", $q);
		}
		$this->db->where('purchase.status', '1');
		$cdata = $this->db->get("purchase");
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

	public function get_data_sales(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		
		if (strlen($q) > 0) {
			$this->db->like("sales_code", $q);
		}
		$this->db->select("idsales as id, sales_code as text");
		$this->db->where('sales.status', '1');
		$this->db->group_start();
		$this->db->where('is_refund != 1');
		$this->db->or_where('is_refund is null');
		$this->db->group_end();		

		$this->db->order_by('idsales', 'desc');
		$data = $this->db->get("sales", $limit, $offset);

		if (strlen($q) > 0) {
			$this->db->like("sales_code", $q);
		}
		$this->db->where('sales.status', '1');
		$this->db->group_start();
		$this->db->where('is_refund != 1');
		$this->db->or_where('is_refund is null');
		$this->db->group_end();
		$cdata = $this->db->get("sales");
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

	public function get_data_account(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->order_by("account_name");
		if (strlen($q) > 0) {
			$this->db->like("account_name", $q);
		}
		$this->db->select("idaccount as id, concat(account_code, ' - ', account_name) as text");
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

	public function get_data_user(){
		$limit = 20;
		$q = $this->input->get("term");
		$page = $this->input->get("page");
		$offset = ($page - 1) * $limit;

		$this->db->where('username != ', 'superadmin');
		$this->db->order_by("name");
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->select("iduser as id, name as text");
		$this->db->where('status', '1');

		$data = $this->db->get("user", $limit, $offset);

		$this->db->where('username != ', 'superadmin');
		if (strlen($q) > 0) {
			$this->db->like("name", $q);
		}
		$this->db->where('status', '1');
		$cdata = $this->db->get("user");
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