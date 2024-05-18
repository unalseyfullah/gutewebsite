<?php if (!defined('FW')) die('Forbidden');
/**
 * @var string $submit_button_text
 */
?>
<div class="field-submit form-group">
    <div class="row form-actions">
        <div class="col-md-5">
            <button type="submit" class="btn btn-lg btn-success btn-submit"><?php echo esc_html($submit_button_text) ?> <i
                    class="fa fa-caret-right"></i></button>
        </div>
        <div class="col-md-7">
            <p class="form-info"><?php echo fw_get_db_settings_option('required_text'); ?></p>
        </div>
    </div>
</div>
<div class="result"></div>
