<form class="form-horizontal az-form" id="form" name="form" method="post">
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Application name');?> *</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="app_name" id="app_name" value="<?php echo $app_name;?>" maxlength="30"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Description');?> *</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="app_description" id="app_description" value="<?php echo $app_description;?>" maxlength="70"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Login Title');?> *</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="app_login_title" id="app_login_title" value="<?php echo $app_login_title;?>" maxlength="70"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Running Text');?> *</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="running_text" id="running_text" value="<?php echo az_get_config('running_text');?>" maxlength="300"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Running Text URL');?> *</label>
            <div class="col-sm-7">
                <input class="form-control" type="text" name="running_text_url" id="running_text_url" value="<?php echo az_get_config('running_text_url');?>"/>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label">Max Diskon *</label>
            <div class="col-sm-2">
                <div class="input-group">
                    <input class="form-control format-number-decimal" type="text" name="max_discount" id="max_discount" value="<?php echo az_get_config('max_discount');?>"/>
                    <span class="input-group-addon">%</span>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Footer Nota');?> *</label>
            <div class="col-sm-7">
                <textarea rows="5" class="form-control ckeditor" name="footer_nota" id="footer_nota"><?php echo az_get_config('footer_nota');?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Preface');?> *</label>
            <div class="col-sm-7">
                <textarea rows="5" class="form-control ckeditor" name="app_preface" id="app_preface"><?php echo $app_preface;?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-sm-2 control-label"><?php echo azlang('Logo');?></label>
            <div class="col-sm-3">
                <?php echo $image;?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-3">
                <button type='button' class='btn btn-primary' id="btn_save_setting"><?php echo azlang('Save');?></button>
            </div>
        </div>

    </div>
</form>