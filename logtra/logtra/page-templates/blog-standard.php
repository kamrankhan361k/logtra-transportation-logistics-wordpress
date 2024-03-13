<?php
/*
 * Template Name: Blog Standard Template
 * Description: A Page Template with a Page Builder design.
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); ?>
<main class="main">
    <?php if(isset($logtra_redux_demo['blog_standard_background']['url']) && $logtra_redux_demo['blog_standard_background']['url'] != ''){ ?>
    <div class="site-breadcrumb" style="background: url(<?php echo esc_url($logtra_redux_demo['blog_standard_background']['url']);?>)">
    <?php } else { ?>
    <div class="site-breadcrumb" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/pictures/breadcrumb.jpg)">
    <?php } ?>
        <div class="container">
            <div class="site-breadcrumb-wpr">
                <h2 class="breadcrumb-title"><?php if(isset($logtra_redux_demo['blog_standard_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_standard_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Latest Blog', 'logtra' ); } ?></h2>
                <ul class="breadcrumb-menu clearfix">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($logtra_redux_demo['blog_home_text'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_home_text']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Home', 'logtra' ); } ?></a></li>
                    <li class="active"><?php if(isset($logtra_redux_demo['blog_standard_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_standard_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Latest Blog', 'logtra' ); } ?></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="blog-area de-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 offset-xl-1">
                    <div class="blog-standard-wpr">
                        <?php $args = array(    
                            'paged' => $paged,
                            'post_type' => 'post',
                            );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post();?>
                        <?php $featured_image_3 = get_post_meta(get_the_ID(),'_cmb_featured_image_3', true); ?>
                        <div class="blog-box blog-df blog-page-df">
                            <?php if ( isset($featured_image_3) && $featured_image_3 != '' ) { ?>
                            <div class="blog-pic">
                                <img src="<?php echo wp_get_attachment_url($featured_image_3);?>" alt="no image">
                            </div>
                            <?php } ?>
                            <div class="blog-desc">
                                <h4><?php the_title(); ?></h4>
                                <p class="blog-text">
                                    <?php echo esc_attr(logtra_excerpt_2(20));?>
                                </p>
                                <div class="blog-meta">
                                    <div class="blog-admin">
                                        <i class="fas fa-calendar"></i>
                                        <span><?php the_time(get_option( 'date_format' ));?></span>
                                    </div>
                                    <div class="blog-like-com">
                                        <div class="blog-com">
                                            <i class="ti-comment"></i>
                                            <span><?php comments_number( esc_html__('0 Comments', 'logtra'), esc_html__('1 Comment', 'logtra'), esc_html__('% Comments', 'logtra') ); ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="blog-btnb mt-30">
                                    <a href="<?php the_permalink();?>" class="btn-1 btn-md"><?php if(isset($logtra_redux_demo['read_more'])){?>
                                        <?php echo wp_specialchars_decode(esc_attr($logtra_redux_demo['read_more']));?>
                                        <?php }else{?>
                                        <?php echo esc_html__( 'Read More', 'logtra' ); } ?></a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php logtra_pagination(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
get_footer();
?>