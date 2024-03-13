<?php
/**
 * Footer widget widget class
 *
 * @since 2.8.0
 */
class logtra_widget_footer_about extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_footer_about', 'description' => esc_html__( "Footer about", 'logtra') );
        parent::__construct('footer-about', esc_html__('Footer About', 'logtra'), $widget_ops);
        $this->alt_option_name = 'widget_footer_about';
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('logtra_widget_footer_about', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( ! isset( $args['widget_id'] ) )
            $args['widget_id'] = $this->id;

        if ( isset( $cache[ $args['widget_id'] ] ) ) {
            echo wp_specialchars_decode(esc_attr($cache[ $args['widget_id'] ]));
            return;
        }

        ob_start();
        extract($args);
        $about_description = ( ! empty( $instance['about_description'] ) ) ? $instance['about_description'] : esc_html__( '', 'logtra' );
        $admin_name = ( ! empty( $instance['admin_name'] ) ) ? $instance['admin_name'] : esc_html__( '', 'logtra' );
        $admin_email = ( ! empty( $instance['admin_email'] ) ) ? $instance['admin_email'] : esc_html__( '', 'logtra' );

        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <div class="mb-30"></div>
        <?php if(isset($about_description) && $about_description != ''){?>
        <p class="mb-40"><?php echo esc_attr($about_description); ?></p>
        <?php } ?>
        <div class="footer-bio">
            <div class="footer-bio-text">
                <?php if(isset($admin_name) && $admin_name != ''){?>
                <h6><?php echo esc_attr($admin_name); ?></h6>
                <?php } ?>                
                <?php if(isset($admin_email) && $admin_email != ''){?>
                <span><?php echo esc_attr($admin_email); ?></span>
                <?php } ?>
            </div>
        </div>   
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('logtra_widget_footer_about', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['about_description'] = strip_tags($new_instance['about_description']);
        $instance['admin_name'] = strip_tags($new_instance['admin_name']);
        $instance['admin_email'] = strip_tags($new_instance['admin_email']);

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_footer_about']) )
            delete_option('widget_footer_about');
        return $instance;
    }

    function form( $instance ) {      
        $about_description     = isset( $instance['about_description'] ) ? esc_attr( $instance['about_description'] ) : '';
        $admin_name     = isset( $instance['admin_name'] ) ? esc_attr( $instance['admin_name'] ) : '';
        $admin_email     = isset( $instance['admin_email'] ) ? esc_attr( $instance['admin_email'] ) : '';

?>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'about_description' )); ?>"><?php esc_html_e( 'Description:', 'logtra' ); ?></label>
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'about_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'about_description' )); ?>" type="textarea"><?php echo esc_attr($about_description);?></textarea></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'admin_name' )); ?>"><?php esc_html_e( 'Admin Name:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'admin_name' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'admin_name' )); ?>" value="<?php echo esc_attr($admin_name);?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'admin_email' )); ?>"><?php esc_html_e( 'Admin Email:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'admin_email' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'admin_email' )); ?>" value="<?php echo esc_attr($admin_email);?>" /></p>
<?php
    }
}
function logtra_register_custom_widget_footer_about() {
    register_widget( 'logtra_widget_footer_about' );
}
add_action( 'widgets_init', 'logtra_register_custom_widget_footer_about' );