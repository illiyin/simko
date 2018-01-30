<?php
defined('BASEPATH') OR exit('No direct script access allowed');   

   
    if(!function_exists('az_select_account')){
        function az_select_account($class='', $attr='', $id = 'account') {
            $ci =& get_instance();
            $azapp = $ci->load->library('AZApp');
            $select = $ci->azapp->add_select2();
            $select->set_id($id);
            $select->set_name('id'.$id);
            $select->set_url('master_account/get_data');
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