<?php
/**
 * The Template for displaying all single posts
 */
$logtra_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php 
    while (have_posts()): the_post(); ?>
    <main class="main">
        <?php if(isset($logtra_redux_demo['blog_detail_background']['url']) && $logtra_redux_demo['blog_detail_background']['url'] != ''){ ?> 
        <div class="site-breadcrumb" style="background: url(<?php echo esc_url($logtra_redux_demo['blog_detail_background']['url']);?>)">
        <?php } else { ?>
        <div class="site-breadcrumb" style="background: url(<?php echo get_template_directory_uri();?>/assets/img/pictures/breadcrumb.jpg)">
        <?php } ?>
            <div class="container">
                <div class="site-breadcrumb-wpr">
                    <h2 class="breadcrumb-title"><?php if(isset($logtra_redux_demo['blog_detail_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Blog Details', 'logtra' ); } ?></h2>
                    <ul class="breadcrumb-menu clearfix">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($logtra_redux_demo['blog_home_text'])){?>
                            <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_home_text']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home', 'logtra' ); } ?></a></li>
                        <li class="active"><?php if(isset($logtra_redux_demo['blog_detail_title'])){?>
                    <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['blog_detail_title']));?>
                    <?php }else{?>
                    <?php echo esc_html__( 'Blog Details', 'logtra' ); } ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="blog-single-area bg de-padding">
            <div class="container">
                <div class="blog-single-wpr">
                    <div class="row ps g-5">
                        <div class="col-xl-8">
                            <div class="theme-single blog-single">
                                <?php if ( has_post_thumbnail() ) { ?>
                                <div class="theme-pic">
                                    <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" class="big-pic" alt="thumb">
                                </div>
                                <?php } ?>
                                <div class="theme-info p-50">
                                    <div class="theme-desc">
                                        <div class="theme-meta">
                                            <div class="theme-meta-left">
                                                <ul>
                                                    <li>
                                                        <i class="fas fa-calendar"></i>
                                                        <?php the_time(get_option( 'date_format' ));?>
                                                    </li>
                                                    <li>
                                                        <i class="fas fa-comments"></i>
                                                        <?php comments_number( esc_html__('0 Comments', 'logtra'), esc_html__('1 Comment', 'logtra'), esc_html__('% Comments', 'logtra') ); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <h2 class="heading-2"><?php the_title(); ?></h2>
                                        <?php the_content(); ?>
                                        <div class="content-tags">
                                            <h5 class="mb-0"><?php if(isset($logtra_redux_demo['blog_tags']) && $logtra_redux_demo['blog_tags'] != ''){?>    
                                            <?php echo wp_specialchars_decode(esc_attr($logtra_redux_demo['blog_tags']));?>
                                            <?php }else{?>
                                            <?php echo esc_html__('Tags:', 'logtra' ); ?>
                                            <?php }  ?></h5>
                                            <ul>
                                                <?php
                                                if ( get_the_tags() ) :
                                                    $i=0;
                                                    foreach ( get_the_tags() as $tag ) : 
                                                    $i++ ?>
                                                <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" class="tags-link"><?php echo esc_attr( $tag->name ); ?></a></li>
                                                <?php endforeach; ?>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php comments_template();?>
                        </div>
                        <div class="col-xl-4">
                            <aside class="sidebar">
                                <?php get_sidebar();?>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main> 
    <?php endwhile; ?>
<?php
get_footer();
?>