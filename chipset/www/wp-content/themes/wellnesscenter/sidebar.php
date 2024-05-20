<?php
/**
 * sidebar.php
 *
 * The primary sidebar.
 */
?>

<?php if (is_active_sidebar('sidebar-1')) : ?>
    <div class="sidebar">
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div> <!-- end sidebar -->
<?php endif; ?>