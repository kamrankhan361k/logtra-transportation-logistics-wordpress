<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$logtra_redux_demo = get_option('redux_demo');
get_header('404'); ?> 
<main class="main d-flex align-items-center justify-content-center h-100vh">
    <div class="page-not-found de-padding">
        <div class="container">
            <div class="page-not-wpr grid-2">
                <?php if(isset($logtra_redux_demo['404_image']['url']) && $logtra_redux_demo['404_image']['url'] != ''){?>
                <div class="page-not-left">
                    <img src="<?php echo esc_url($logtra_redux_demo['404_image']['url']);?>" class="d-block text-center" alt="thumb">
                </div>
                <?php } ?>
                <div class="page-not-right d-flex align-items-center">
                    <div class="page-not-righ-ele">
                        <h2 class="headin-1"><?php if(isset($logtra_redux_demo['404_title'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['404_title']));?>
                        <?php }else{?>
                        <?php echo esc_html__( '404', 'logtra' );
                        }
                        ?></h2>
                        <h4 class="heading-4">Look like you're lost</h4>
                        <p class="mb-40"><?php if(isset($logtra_redux_demo['404_desc'])){?>
                        <?php echo htmlspecialchars_decode(esc_attr($logtra_redux_demo['404_desc']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'OOPPS! THE PAGE YOU WERE LOOKING FOR, COULD NOT BE FOUND.', 'logtra' ); } ?></p>
                        <a href="<?php echo esc_url(home_url()); ?>" class="btn-3"><?php if(isset($redux_demo['404_text'])){?>
                        <?php echo htmlspecialchars_decode($redux_demo['404_text']);?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Back To Home', 'logtra' );
                        }
                        ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> 
<?php get_footer('404'); ?>