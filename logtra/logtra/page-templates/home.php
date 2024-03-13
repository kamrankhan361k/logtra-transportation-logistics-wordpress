<?php
/*
 * Template Name: Home
 * Description: A Page Template with a Page Builder design.
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); 
?>
<?php if (have_posts()){ ?>
<main class="main">
<?php while (have_posts()) : the_post()?>
    <?php the_content(); ?>
<?php endwhile; ?>  
</main> 
<?php }else {
    echo esc_html__( 'Page Canvas For Page Builder', 'logtra' );
}?>
<?php get_footer(); ?>