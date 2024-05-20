<?php
/**
 * header.php
 *
 * The header for the theme.
 */
?><!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<!-- Mobile Specific Meta -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- Favicon, Apple Touch Icons and og icons -->
<?php wellnesscenter_get_header_icons(); ?>

<script type="text/javascript">
    var wellnesscenter_url = '<?php echo esc_url(get_template_directory_uri()); ?>';
    var wellnesscenter_home_url = '<?php echo esc_url(get_home_url('/')); ?>';
    var adminAjax = "<?php echo admin_url( "admin-ajax.php" ); ?>";
</script>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >

    <?php preloader(); ?>

<!-- Navigation Top start -->
<nav class="navbar navbar-default navbar-fixed-top navigation-top <?php 

if(function_exists('_filter_fw_ext_mega_menu_wp_nav_menu_args')){
echo 'mega-menu-activated';
}

?>" id="navigation-top" >
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Nav-Links start -->
        <?php
        wp_nav_menu(array(
            'menu' => 'primary',
            'theme_location' => 'primary',
//            'depth' => 2,
            'container' => 'div',
            'container_class' => 'collapse navbar-collapse',
            'container_id' => 'bs-navbar-collapse-1',
            'menu_class' => 'nav navbar-nav',
            'fallback_cb' => 'wellnesscenter_navwalker::fallback',
            'walker' => new wellnesscenter_navwalker())
        );
        ?>
        <!-- Nav-Links end -->
    </div>
</nav>
<!-- Navigation Top end -->
