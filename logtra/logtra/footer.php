<?php $logtra_redux_demo = get_option('redux_demo');?> 
<?php if(isset($logtra_redux_demo['footer_background']['url']) && $logtra_redux_demo['footer_background']['url'] != ''){ ?> 
<footer class="footer pos-rel overflow-hidden hero-bg" style="background-image: url(<?php echo esc_url($logtra_redux_demo['footer_background']['url']);?>)">
<?php } else { ?>
<footer class="footer pos-rel overflow-hidden hero-bg" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/bg/bg-footer.jpg)">
<?php } ?>
        <div class="footer-up de-padding">
            <div class="container">
                <div class="row g-5">
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="footer-widget about-us">
                            <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                              <?php dynamic_sidebar( 'footer-area-1' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-6 col-md-6">
                        <div class="footer-widget footer-link">
                            <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                              <?php dynamic_sidebar( 'footer-area-2' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="footer-widget pr-30">
                            <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                              <?php dynamic_sidebar( 'footer-area-3' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="footer-widget">
                            <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                              <?php dynamic_sidebar( 'footer-area-4' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright py-5">
            <div class="container">
                <div class="copyright-element d-flex align-items-center justify-content-between">
                    <?php if(isset($logtra_redux_demo['footer_text']) && $logtra_redux_demo['footer_text']!= ''){?>
                    <p class="mb-0"><?php echo wp_kses_post($logtra_redux_demo['footer_text']);?></p>
                    <?php } ?>
                    <ul class="footer-social">
                        <?php if(isset($logtra_redux_demo['f_link_social_1']) && ($logtra_redux_demo['f_link_social_1'] != '')){?>
                        <li><a href="<?php echo esc_url($logtra_redux_demo['f_link_social_1']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['f_social_1']); ?>"></i></a></li>
                        <?php } ?>
                        <?php if(isset($logtra_redux_demo['f_link_social_2']) && ($logtra_redux_demo['f_link_social_2'] != '')){?>
                        <li><a href="<?php echo esc_url($logtra_redux_demo['f_link_social_2']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['f_social_2']); ?>"></i></a></li>
                        <?php } ?>
                        <?php if(isset($logtra_redux_demo['f_link_social_3']) && ($logtra_redux_demo['f_link_social_3'] != '')){?>
                        <li><a href="<?php echo esc_url($logtra_redux_demo['f_link_social_3']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['f_social_3']); ?>"></i></a></li>
                        <?php } ?>
                        <?php if(isset($logtra_redux_demo['f_link_social_4']) && ($logtra_redux_demo['f_link_social_4'] != '')){?>
                        <li><a href="<?php echo esc_url($logtra_redux_demo['f_link_social_4']); ?>"><i class="<?php echo wp_kses_post($logtra_redux_demo['f_social_4']); ?>"></i></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <a href="#bdy" id="scrtop" class="smooth-menu"><i class="ti-arrow-up"></i></a>
<?php wp_footer(); ?>
</body>
</html>