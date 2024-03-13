<?php
/**
 * The Sidebar containing the main widget area
 */
?>
<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
	<?php dynamic_sidebar( 'sidebar-3' ); ?>
<?php endif; ?> 
<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-2' ); ?>
<?php endif; ?> 