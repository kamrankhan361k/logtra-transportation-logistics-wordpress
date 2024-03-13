<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php $logtra_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) {
        ?>
    <link rel="shortcut icon" href="<?php if(isset($logtra_redux_demo['favicon']['url'])){?><?php echo esc_url($logtra_redux_demo['favicon']['url']); ?><?php }?>">
    <?php }?>
    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?> id="bdy">
    <div class="preloader">
        <div class="preloader-container">
            <span class="preloader-text"><?php echo esc_html__( 'Logtra', 'logtra' );?></span>
            <div class="preloader-animation">
            </div>
        </div>
    </div>
    <header class="header header-before-off">
        <div class="main-wrapper">
            <div class="navbar navbar-expand-lg bsnav bsnav-sticky bsnav-sticky-slide bsnav-transparent">
                <?php if(isset($logtra_redux_demo['background_nav']['url']) && $logtra_redux_demo['background_nav']['url'] != ''){ ?>
                <img src="<?php echo esc_url($logtra_redux_demo['background_nav']['url']); ?>" alt="no image" class="navbar-bar-shape">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/bg/bg-nav.png" class="navbar-bar-shape">
                <?php } ?>
                <div class="navbar-container">
                    <div class="navbar-extra-logo">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if(isset($logtra_redux_demo['logo_white']['url']) && $logtra_redux_demo['logo_white']['url'] != ''){ ?>
                            <img src="<?php echo esc_url($logtra_redux_demo['logo_white']['url']); ?>" class="logo-outside" alt="thumb">
                            <?php }else{ ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/logo/logo-white.png" class="logo-outside" alt="thumb">
                            <?php } ?>
                        </a>
                    </div>
                    <div class="top-header-menu">
                        <div class="top-bar-area pos-rel topbar-white">
                            <?php if(isset($logtra_redux_demo['topbar_background']['url']) && $logtra_redux_demo['topbar_background']['url'] != ''){ ?>
                            <img src="<?php echo esc_url($logtra_redux_demo['topbar_background']['url']); ?>" alt="no image" class="top-bar-shape">
                            <?php }else{ ?>
                            <img src="<?php echo get_template_directory_uri();?>/assets/img/bg/topbar-bg.png" alt="no image" class="top-bar-shape">
                            <?php } ?>
                            <div class="row">
                                <div class="col-xl-10 col-lg-6">
                                    <div class="top-box-wrp d-flex justify-content-md-center align-items-center">
                                        <?php if(isset($logtra_redux_demo['location']) && ($logtra_redux_demo['location'] != '')){?>
                                        <div class="top-box top-location mr-30">
                                            <?php if(isset($logtra_redux_demo['location_icon']) && ($logtra_redux_demo['location_icon'] != '')){?>
                                            <i class="<?php echo wp_kses_post($logtra_redux_demo['location_icon']); ?>"></i>
                                            <?php } ?>
                                            <span><?php echo wp_kses_post($logtra_redux_demo['location']); ?></span>
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($logtra_redux_demo['email']) && ($logtra_redux_demo['email'] != '')){?>
                                        <div class="top-email top-box mr-30">
                                            <?php if(isset($logtra_redux_demo['email_icon']) && ($logtra_redux_demo['email_icon'] != '')){?>
                                            <i class="<?php echo wp_kses_post($logtra_redux_demo['email_icon']); ?>"></i>
                                            <?php } ?>
                                            <span><?php echo wp_kses_post($logtra_redux_demo['email']); ?></span>
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($logtra_redux_demo['phone']) && ($logtra_redux_demo['phone'] != '')){?>
                                        <div class="top-phone top-box">
                                            <?php if(isset($logtra_redux_demo['phone_icon']) && ($logtra_redux_demo['phone_icon'] != '')){?>
                                            <i class="<?php echo wp_kses_post($logtra_redux_demo['phone_icon']); ?>"></i>
                                            <?php } ?>
                                            <span><?php echo wp_kses_post($logtra_redux_demo['phone']); ?></span>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-xl-2 col-lg-6">
                                    <div class="top-bar-social">
                                        <ul class="top-social">
                                            <?php if(isset($logtra_redux_demo['link_social_1']) && ($logtra_redux_demo['link_social_1'] != '')){?>
                                            <li><a href="<?php echo esc_url($logtra_redux_demo['link_social_1']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['social_1']); ?>"></i></a></li>
                                            <?php } ?>
                                            <?php if(isset($logtra_redux_demo['link_social_2']) && ($logtra_redux_demo['link_social_2'] != '')){?>
                                            <li><a href="<?php echo esc_url($logtra_redux_demo['link_social_2']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['social_2']); ?>"></i></a></li>
                                            <?php } ?>
                                            <?php if(isset($logtra_redux_demo['link_social_3']) && ($logtra_redux_demo['link_social_3'] != '')){?>
                                            <li><a href="<?php echo esc_url($logtra_redux_demo['link_social_3']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['social_3']); ?>"></i></a></li>
                                            <?php } ?>
                                            <?php if(isset($logtra_redux_demo['link_social_4']) && ($logtra_redux_demo['link_social_4'] != '')){?>
                                            <li><a href="<?php echo esc_url($logtra_redux_demo['link_social_4']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['social_4']); ?>"></i></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navbar-menu-opt">
                            <div class="navbar-brand-tog">
                                <a class="navbar-brand g-nop" href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php if(isset($logtra_redux_demo['logo_white']['url']) && $logtra_redux_demo['logo_white']['url'] != ''){ ?>
                                    <img src="<?php echo esc_url($logtra_redux_demo['logo_white']['url']); ?>" class="logo-display" alt="thumb">
                                    <?php }else{ ?>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo/logo-white.png" class="logo-display" alt="thumb">
                                    <?php } ?>

                                    <?php if(isset($logtra_redux_demo['logo']['url']) && $logtra_redux_demo['logo']['url'] != ''){ ?>
                                    <img src="<?php echo esc_url($logtra_redux_demo['logo']['url']); ?>" class="logo-scrolled" alt="thumb">
                                    <?php }else{ ?>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo/logo.png" class="logo-scrolled" alt="thumb">
                                    <?php } ?>
                                </a>
                                <button class="navbar-toggler toggler-spring">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse justify-content-md-between">
                                <a class="navbar-brand nop" href="<?php echo esc_url(home_url('/')); ?>">
                                    <?php if(isset($logtra_redux_demo['logo_white']['url']) && $logtra_redux_demo['logo_white']['url'] != ''){ ?>
                                    <img src="<?php echo esc_url($logtra_redux_demo['logo_white']['url']); ?>" class="logo-display" alt="thumb">
                                    <?php }else{ ?>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo/logo-white.png" class="logo-display" alt="thumb">
                                    <?php } ?>

                                    <?php if(isset($logtra_redux_demo['logo']['url']) && $logtra_redux_demo['logo']['url'] != ''){ ?>
                                    <img src="<?php echo esc_url($logtra_redux_demo['logo']['url']); ?>" class="logo-scrolled" alt="thumb">
                                    <?php }else{ ?>
                                    <img src="<?php echo get_template_directory_uri();?>/assets/img/logo/logo.png" class="logo-scrolled" alt="thumb">
                                    <?php } ?>
                                </a>
                                <?php 
                                wp_nav_menu( 
                                array( 
                                    'theme_location' => 'primary',
                                    'container' => '',
                                    'menu_class' => '', 
                                    'menu_id' => '',
                                    'menu'            => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'echo'            => true,
                                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                                    'walker'            => new logtra_wp_bootstrap_navwalker(),
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap'      => '<ul id=" %1$s" class=" navbar-nav navbar-mobile justify-content-md-center w-100  %2$s">%3$s</ul>',
                                    'depth'           => 0,        
                                )
                                ); ?>
                                <?php if(isset($logtra_redux_demo['link_button']) && ($logtra_redux_demo['link_button'] != '')){?>
                                <div class="search-cart nav-profile">
                                    <a href="<?php echo wp_kses_post($logtra_redux_demo['link_button']); ?>" class="btn-1 btn-sm"><?php echo wp_kses_post($logtra_redux_demo['button']); ?></a>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bsnav-mobile">
                <div class="bsnav-mobile-overlay"></div>
                <div class="navbar"></div>
            </div>
        </div>
    </header>

  