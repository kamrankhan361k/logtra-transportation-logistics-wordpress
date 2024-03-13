<?php
/*
 * Template Name: Projects Template
 * Description: A Page Template with a Page Builder design.
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); ?>
<main class="main">
    <?php if(isset($logtra_redux_demo['project_background']['url']) && $logtra_redux_demo['project_background']['url'] != ''){ ?>
    <div class="site-breadcrumb" style="background: url(<?php echo esc_url($logtra_redux_demo['project_background']['url']);?>)">
    <?php } else { ?>
    <div class="site-breadcrumb" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/pictures/breadcrumb.jpg)">
    <?php } ?>
        <div class="container">
            <div class="site-breadcrumb-wpr">
                <h2 class="breadcrumb-title"><?php if(isset($logtra_redux_demo['project_title'])){?>
                <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['project_title']));?>
                <?php }else{?>
                <?php echo esc_html__( 'Our Projects', 'logtra' ); } ?></h2>
                <ul class="breadcrumb-menu clearfix">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($logtra_redux_demo['project_home_text'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['project_home_text']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Home', 'logtra' ); } ?></a></li>
                    <li class="active"><?php if(isset($logtra_redux_demo['project_title'])){?>
                <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['project_title']));?>
                <?php }else{?>
                <?php echo esc_html__( 'Our Projects', 'logtra' ); } ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="gallery-area bg de-padding pos-rel">
        <img src="<?php echo get_template_directory_uri();?>/assets/img/shape/gallery-shape.png" alt="no image" class="gallery-shape">
        <div class="container-fluid">
            <div class="gallery-wpr">
                <div class="swiper port-sldr">
                    <div class="swiper-wrapper">
                        <?php $args = array(    
                            'paged' => $paged,
                            'post_type' => 'project',
                            'posts_per_page' => $logtra_redux_demo['project_number'],
                            );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post();?>
                        <?php $p_desc = get_post_meta(get_the_ID(),'_cmb_p_description', true); ?>
                        <div class="swiper-slide">
                            <div class="gallery-single">
                                <div class="gallery-pic">
                                    <?php if ( has_post_thumbnail() ) { ?>
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="no image">
                                    <?php } ?>
                                    <div class="gallery-desc">
                                        <h3 class="heading-3"><?php the_title(); ?></h3>
                                        <p><?php echo esc_attr($p_desc);?></p>
                                        <a href="<?php the_permalink();?>" class="gallery-btn">
                                            <i class="fa-solid fa-chevron-right"></i>
                                            <?php if(isset($logtra_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($logtra_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More', 'logtra' ); } ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>  
</main> 
<?php
get_footer();
?>