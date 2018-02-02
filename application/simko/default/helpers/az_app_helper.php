<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

    if(!function_exists('az_select_product_category')){
        function az_select_product_category($id='product_category', $attr='') {
        	$ci =& get_instance();
        	$azapp = $ci->load->library('AZApp');
        	$select = $ci->azapp->add_select2();
        	$select->set_id($id);
        	$select->set_url('data/get_data_product_category');
            $select->set_placeholder(azlang('Select Product Category'));
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idproduct_category'));
                $select->add_class('element-top-filter');
            }
        	
            return $select->render();
        }
    }


    if(!function_exists('az_select_product_unit')){
        function az_select_product_unit($id='product_unit', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_url('data/get_data_product_unit');
            $select->set_placeholder(azlang('Select Product Unit'));
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idproduct_unit'));
                $select->add_class('element-top-filter');
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_product_unit_name')){
        function az_select_product_unit_name($id='product_unit', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_name('id'.$id);
            $select->set_url('data/get_data_product_unit');
            $select->set_placeholder(azlang('Select Product Unit'));
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idproduct_unit'));
                $select->add_class('element-top-filter');
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_product')){
        function az_select_product($class='', $attr='', $id='product', $type = 'product') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_name('id'.$id);
            $select->set_url('data/get_data_product');
            $select->set_placeholder('Pilih Produk');
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idproduct'));
                $select->add_class('element-top-filter');
                $select->add_attr('data-w', 'true');
            }
            $select->add_param_data('type', $type);
            return $select->render();
        }
    }

    if(!function_exists('az_select_department')){
        function az_select_department($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('department');
            $select->set_url('data/get_data_department');
            $select->set_placeholder('Pilih Departemen');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('department.iddepartment'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_position')){
        function az_select_position($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('position');
            $select->set_select_parent('iddepartment');
            $select->set_url('data/get_data_position');
            $select->set_placeholder('Pilih Jabatan');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('position.idposition'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_member_level')){
        function az_select_member_level($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('member_level');
            $select->set_url('data/get_data_member_level');
            $select->set_placeholder('Pilih Level Anggota');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('member_level.idmember_level'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_outlet')){
        function az_select_outlet($class='', $attr='', $id = 'outlet') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_url('data/get_data_outlet');
            $select->set_placeholder('Pilih Toko/Gudang');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idoutlet'));
                $select->add_attr('data-w', 'true');
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_supplier')){
        function az_select_supplier($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('supplier');
            $select->set_url('data/get_data_supplier');
            $select->set_placeholder('Pilih Supplier');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('supplier.idsupplier'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_purchase_order')){
        function az_select_purchase_order($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('purchase_order');
            $select->set_name('idpurchase_order');
            $select->set_url('data/get_data_purchase_order');
            $select->set_placeholder('Pilih Pesanan');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('purchase_order.idpurchase_order'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_purchase')){
        function az_select_purchase($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('purchase');
            $select->set_name('idpurchase');
            $select->set_url('data/get_data_purchase');
            $select->set_placeholder('Pilih Pembelian');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('purchase.idpurchase'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_sales')){
        function az_select_sales($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('sales');
            $select->set_name('idsales');
            $select->set_url('data/get_data_sales');
            $select->set_placeholder('Pilih Penjualan');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode('sales.idsales'));
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_memberx')){
        function az_select_memberx($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('member');
            $select->set_name('idmember');
            $select->set_url('data/get_data_member');
            $select->set_placeholder('Pilih Anggota');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.idmember'));
                $select->add_attr('data-w', true);
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_member')){
        function az_select_member($class='', $attr='') {
            $ci =& get_instance();
            $ci->load->library('LMember');
            $member = $ci->lmember->get_member($class, $attr);
            return $member;
        }
    }

    if(!function_exists('az_select_account')){
        function az_select_account($class='', $attr='', $id = 'account') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_name('id'.$id);
            $select->set_url('master_account/get_data'); // data is not accessible, if able $select->set_url('data/get_data_account');
            $select->set_placeholder('Pilih Akun');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.id'.$id));
                $select->add_attr('data-w', true);
            }
            
            return $select->render();
        }
    }

    if(!function_exists('az_select_user')){
        function az_select_user($class='', $attr='') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id('user');
            $select->set_name('iduser');
            $select->set_url('data/get_data_user');
            $select->set_placeholder('Pilih Pengguna');
            if (strlen($class) > 0) {
                $select->add_class($class);
            }
            if (strlen($attr) > 0) {
                $select->add_attr('data-id', $ci->encrypt->encode($attr.'.iduser'));
                $select->add_attr('data-w', true);
            }
            
            return $select->render();
        }
    }

