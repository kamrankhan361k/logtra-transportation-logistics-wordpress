<?php
/**
 * Footer widget widget class
 *
 * @since 2.8.0
 */
class logtra_widget_footer_newsletter extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_footer_newsletter', 'description' => esc_html__( "Footer newsletter", 'logtra') );
        parent::__construct('footer-newsletter', esc_html__('Footer Newsletter', 'logtra'), $widget_ops);
        $this->alt_option_name = 'widget_footer_newsletter';
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('logtra_widget_footer_newsletter', 'widget');

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
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( '', 'logtra' );
        $title = apply_filters( 'widget_title', $title, $instance, $this->id_base );
        $wt_description = ( ! empty( $instance['wt_description'] ) ) ? $instance['wt_description'] : esc_html__( '', 'logtra' );
        $shortcode = ( ! empty( $instance['shortcode'] ) ) ? $instance['shortcode'] : esc_html__( '', 'logtra' );
        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <?php if(isset($title) && $title != ''){?>
        <h4 class="footer-widget-title">
            <?php echo esc_attr($title); ?>
            <span class="footer-title-line"></span>
        </h4>
        <?php } ?>
        <?php if(isset($wt_description) && $wt_description != ''){?>
        <p class="mb-30"><?php echo esc_attr($wt_description); ?></p>
        <?php } ?>
        <div class="subscribe-area">
            <?php print do_shortcode(html_entity_decode($shortcode)); ?>
        </div>  
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('logtra_widget_footer_newsletter', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['wt_description'] = strip_tags($new_instance['wt_description']);
        $instance['shortcode'] = strip_tags($new_instance['shortcode']);
        
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_footer_newsletter']) )
            delete_option('widget_footer_newsletter');
        return $instance;
    }

    function form( $instance ) {   
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';   
        $wt_description     = isset( $instance['wt_description'] ) ? esc_attr( $instance['wt_description'] ) : '';
        $shortcode     = isset( $instance['shortcode'] ) ? esc_attr( $instance['shortcode'] ) : '';
?>  
    <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title);?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'wt_description' )); ?>"><?php esc_html_e( 'Description', 'logtra' ); ?></label>
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'wt_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'wt_description' )); ?>" type="textarea"><?php echo esc_attr($wt_description);?></textarea></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'shortcode' )); ?>"><?php esc_html_e( 'Shortcode:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'shortcode' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'shortcode' )); ?>" type="text" value="<?php echo esc_attr($shortcode); ?>"/></p>

<?php
    }
}
function logtra_register_custom_widget_footer_newsletter() {
    register_widget( 'logtra_widget_footer_newsletter' );
}
add_action( 'widgets_init', 'logtra_register_custom_widget_footer_newsletter' );