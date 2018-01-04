<?php
    $ci =& get_instance();
    $ci->load->helper("az_core");
    $ci->load->helper('az_menu');
    $ci->load->helper('az_config');
    $ci->load->helper('array');
?>
<!DOCTYPE html>
<html>
    <head>
    	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link rel="shortcut icon" href="<?php echo base_url().AZAPP.'assets/images/logo.png?v'.time();?>" />
        <title><?php echo az_get_config('app_name');?></title>

        <?php
        	echo az_css();
        ?>
        <script type="text/javascript">
            var base_url = "<?php echo base_url();?>"; 
            var app_url = "<?php echo app_url();?>";
        </script>  
	</head>
	<body>
        <div class="az-loading">
            <div>
                <img src="<?php echo base_url().AZAPP;?>assets/images/loading.gif">
            </div>
        </div>

        <div class="az-ltheme">
            <div class="container-header">
                <div class="az-ltheme-image-header">
                    <div class="image-header">
                        
                    </div>
                    <div class="header-content">
                        <div class="image-logo">
                            <img src="<?php echo base_url().AZAPP.'assets/images/logo.png?v'.time();?>"/>
                        </div>
                        <div class="app-info">
                            <?php echo az_get_config('app_name');?>
                            <div class="app-info-description">
                                <?php echo az_get_config('app_description');?>
                            </div>
                        </div>
                        <div class="account-box">
                            <?php 
                                $outlet_name = $this->session->userdata('outlet_name');
                                if (strlen($outlet_name) > 0) {
                            ?>
                            <div class="info-outlet">
                                <i class="fa fa-home"></i> 
                                <?php echo $outlet_name;?>
                            </div>
                            <?php
                                }
                            ?>
                            <div class="account">
                                <div class="account-container">
                                    <div class="icon-user">
                                        <i class="fa fa-user"></i>
                                    </div>
                                    <div>
                                        <?php echo $ci->session->userdata("name");?>
                                    </div>
                                </div>
                                <div class="account-detail">
                                    <div class="account-detail-content">
                                        <a href="<?php echo app_url().'account/change_password';?>"><button type="button" class="btn btn-primary az-btn-primary"><i class="fa fa-key"></i> <?php echo azlang('Change Password');?></button></a>
                                        <a href="<?php echo app_url().'login/logout';?>"><button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i> <?php echo azlang('Logout');?></button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="az-ltheme-header">
                    <div class="running-text-top">
                        <marquee onmouseover="this.stop()" onmouseout="this.start()">
                            <a target="_blank" href="<?php echo az_get_config('running_text_url');?>"><?php echo az_get_config('running_text');?></a>
                        </marquee>
                    </div>
                    <button class="btn btn-primary az-btn-primary az-btn-menu hidden-xs">
                        <i class="fa fa-bars"></i>
                    </button>
                    <button class="btn btn-primary az-btn-primary az-btn-xs-menu visible-xs">
                        <i class="fa fa-bars"></i>
                    </button>
                    <?php 
                        $active_lang = $ci->session->userdata('azlang');
                        if (strlen($active_lang) == 0) {
                            $active_lang = 'indonesian';
                            $ci->session->set_userdata('azlang', 'indonesian');
                        }
                        $arr_language = array();
                        $arr_language[] = array(
                            'code' => 'id',
                            'name' => 'Indonesian',
                            'active' => '',
                        );
                        $arr_language[] = array(
                            'code' => 'en',
                            'name' => 'English',
                            'active' => '',
                        );

                        if ($active_lang == 'indonesian') {
                            $arr_language[0]['active'] = 'active';    
                        }
                        else {
                            $arr_language[1]['active'] = 'active';
                        }

                    ?>
                    <div class="az-header-toolbar">
                       
                    </div>
                </div>
            </div>

            <div class="az-ltheme-body">
                <div class="az-ltheme-left">
                    <div class="az-menu">
                        <?php 
                            $breadcrumb = azarr($data_header, 'breadcrumb', array());
                            echo az_generate_menu($breadcrumb);
                        ?>
                    </div>
                </div>
                <div class="az-ltheme-right">
                    <div class="az-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="az-content-title">
                                <?php 
                                    echo azarr($data_header, 'title');
                                ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="az-breadcrumb">
                                    <?php echo az_generate_breadcrumb($breadcrumb);?>
                                </div>
                            </div>
                        </div>
                        <div class="az-content-container">
                        
                    