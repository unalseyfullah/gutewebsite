
<?php
/**
 * sidebar-woo.php
 *
 * The  sidebar for woocommerce.
 */
?>

<?php if (is_active_sidebar('sidebar-woo')) : ?>
    <div class="sidebar">
        <?php dynamic_sidebar('sidebar-woo'); ?>
    </div> <!-- end sidebar -->
<?php endif; ?>