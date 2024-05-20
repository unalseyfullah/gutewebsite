<?php if (!defined('FW')) die('Forbidden'); ?>
<?php 
    if($atts['title'] != ''){
        echo "<h2>".esc_html($atts['title'])."</h2>";
    }
?>
<div class="slide-bottom twitter-icon"> <i class="fa fa-twitter"></i> </div>
<div class="slide-bottom tweet"></div>
