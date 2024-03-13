<?php
/**
 * The Template for displaying all single posts
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
    while (have_posts()): the_post(); ?>
    <main class="main">
        <?php if(isset($logtra_redux_demo['project_detail_background']['url']) && $logtra_redux_demo['project_detail_background']['url'] != ''){ ?> 
        <div class="site-breadcrumb" style="background: url(<?php echo esc_url($logtra_redux_demo['project_detail_background']['url']);?>)">
        <?php } else { ?>
        <div class="site-breadcrumb" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/pictures/breadcrumb.jpg)">
        <?php } ?>
            <div class="container">
                <div class="site-breadcrumb-wpr">
                    <h2 class="breadcrumb-title"><?php the_title(); ?></h2>
                    <ul class="breadcrumb-menu clearfix">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($logtra_redux_demo['project_home_text'])){?>
                            <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['project_home_text']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home', 'logtra' ); } ?></a></li>
                        <li class="active"><?php if(isset($logtra_redux_demo['project_detail_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['project_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Project Details', 'logtra' ); } ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="project-single pos-rel de-padding">
            <div class="container">
                <div class="project-single-wpr">
                    <?php if ( has_post_thumbnail() ) { ?>
                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="no image">
                    <?php } ?>
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
    <?php endwhile; ?>
<?php
get_footer();
?>