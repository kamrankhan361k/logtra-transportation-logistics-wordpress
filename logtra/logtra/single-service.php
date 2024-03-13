<?php
/**
 * The Template for displaying all single posts
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
    while (have_posts()): the_post(); ?>
    <main class="main">
        <?php if(isset($logtra_redux_demo['service_detail_background']['url']) && $logtra_redux_demo['service_detail_background']['url'] != ''){ ?> 
        <div class="site-breadcrumb" style="background: url(<?php echo esc_url($logtra_redux_demo['service_detail_background']['url']);?>)">
        <?php } else { ?>
        <div class="site-breadcrumb" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/pictures/breadcrumb.jpg)">
        <?php } ?>
            <div class="container">
                <div class="site-breadcrumb-wpr">
                    <h2 class="breadcrumb-title"><?php if(isset($logtra_redux_demo['service_detail_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['service_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Service Details', 'logtra' ); } ?></h2>
                    <ul class="breadcrumb-menu clearfix">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($logtra_redux_demo['service_home_text'])){?>
                            <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['service_home_text']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home', 'logtra' ); } ?></a></li>
                        <li class="active"><?php if(isset($logtra_redux_demo['service_detail_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['service_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Service Details', 'logtra' ); } ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="service-single pos-rel de-padding">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-8">
                        <div class="service-single-wpr pr-50">
                            <?php if ( has_post_thumbnail() ) { ?>
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="d-block mb-30" alt="no image">
                            <?php } ?>
                            <h2 class="heading-2 mb-20"><?php the_title(); ?></h2>
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <aside class="sidebar">
                            <?php get_sidebar('service');?>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php endwhile; ?>
<?php
get_footer();
?>