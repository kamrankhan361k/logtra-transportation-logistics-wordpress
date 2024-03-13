<?php
/**
 * Footer widget widget class
 *
 * @since 2.8.0
 */

class logtra_widget_footer_links extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_footer_links', 'description' => esc_html__( "Footer links", 'logtra') );
        parent::__construct('footer-links', esc_html__('Footer Links', 'logtra'), $widget_ops);
        $this->alt_option_name = 'widget_footer_links';
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('logtra_widget_footer_links', 'widget');

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
        $link_1 = ( ! empty( $instance['link_1'] ) ) ? $instance['link_1'] : esc_html__( '', 'logtra' );
        $text_link_1 = ( ! empty( $instance['text_link_1'] ) ) ? $instance['text_link_1'] : esc_html__( '', 'logtra' );
        $link_2 = ( ! empty( $instance['link_2'] ) ) ? $instance['link_2'] : esc_html__( '', 'logtra' );
        $text_link_2 = ( ! empty( $instance['text_link_2'] ) ) ? $instance['text_link_2'] : esc_html__( '', 'logtra' );
        $link_3 = ( ! empty( $instance['link_3'] ) ) ? $instance['link_3'] : esc_html__( '', 'logtra' );
        $text_link_3 = ( ! empty( $instance['text_link_3'] ) ) ? $instance['text_link_3'] : esc_html__( '', 'logtra' );
        $link_4 = ( ! empty( $instance['link_4'] ) ) ? $instance['link_4'] : esc_html__( '', 'logtra' );
        $text_link_4 = ( ! empty( $instance['text_link_4'] ) ) ? $instance['text_link_4'] : esc_html__( '', 'logtra' );
        $link_5 = ( ! empty( $instance['link_5'] ) ) ? $instance['link_5'] : esc_html__( '', 'logtra' );
        $text_link_5 = ( ! empty( $instance['text_link_5'] ) ) ? $instance['text_link_5'] : esc_html__( '', 'logtra' );
        $link_6 = ( ! empty( $instance['link_6'] ) ) ? $instance['link_6'] : esc_html__( '', 'logtra' );
        $text_link_6 = ( ! empty( $instance['text_link_6'] ) ) ? $instance['text_link_6'] : esc_html__( '', 'logtra' );
        ?>
        <?php echo wp_specialchars_decode(esc_attr($before_widget),ENT_QUOTES); ?>
        <?php if(isset($title) && $title != ''){?>
        <h4 class="footer-widget-title">
            <?php echo esc_attr($title); ?>
            <span class="footer-title-line"></span>
        </h4>
        <?php } ?>
        <ul class="footer-list">
            <?php if(isset($text_link_1) && $text_link_1 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_1); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_1); ?>
                </a>
            </li>
            <?php } ?>
            <?php if(isset($text_link_2) && $text_link_2 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_2); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_2); ?>
                </a>
            </li>
            <?php } ?>
            <?php if(isset($text_link_3) && $text_link_3 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_3); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_3); ?>
                </a>
            </li>
            <?php } ?>
            <?php if(isset($text_link_4) && $text_link_4 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_4); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_4); ?>
                </a>
            </li>
            <?php } ?>
            <?php if(isset($text_link_5) && $text_link_5 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_5); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_5); ?>
                </a>
            </li>
            <?php } ?>
            <?php if(isset($text_link_6) && $text_link_6 != ''){?> 
            <li>
                <a href="<?php echo esc_url($link_6); ?>">
                    <i class="fa-solid fa-chevron-right"></i>
                    <?php echo esc_attr($text_link_6); ?>
                </a>
            </li>
            <?php } ?>
        </ul>
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('logtra_widget_footer_links', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['link_1'] = strip_tags($new_instance['link_1']);
        $instance['text_link_1'] = strip_tags($new_instance['text_link_1']);
        $instance['link_2'] = strip_tags($new_instance['link_2']);
        $instance['text_link_2'] = strip_tags($new_instance['text_link_2']);
        $instance['link_3'] = strip_tags($new_instance['link_3']);
        $instance['text_link_3'] = strip_tags($new_instance['text_link_3']);
        $instance['link_4'] = strip_tags($new_instance['link_4']);
        $instance['text_link_4'] = strip_tags($new_instance['text_link_4']);
        $instance['link_5'] = strip_tags($new_instance['link_5']);
        $instance['text_link_5'] = strip_tags($new_instance['text_link_5']);
        $instance['link_6'] = strip_tags($new_instance['link_6']);
        $instance['text_link_6'] = strip_tags($new_instance['text_link_6']);
        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_footer_links']) )
            delete_option('widget_footer_links');
        return $instance;
    }

    function form( $instance ) {      
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';

        $link_1     = isset( $instance['link_1'] ) ? esc_url( $instance['link_1'] ) : '';
        $text_link_1     = isset( $instance['text_link_1'] ) ? esc_attr( $instance['text_link_1'] ) : '';
        $link_2     = isset( $instance['link_2'] ) ? esc_url( $instance['link_2'] ) : '';
        $text_link_2     = isset( $instance['text_link_2'] ) ? esc_attr( $instance['text_link_2'] ) : '';
        $link_3     = isset( $instance['link_3'] ) ? esc_url( $instance['link_3'] ) : '';
        $text_link_3     = isset( $instance['text_link_3'] ) ? esc_attr( $instance['text_link_3'] ) : '';
        $link_4     = isset( $instance['link_4'] ) ? esc_url( $instance['link_4'] ) : '';
        $text_link_4     = isset( $instance['text_link_4'] ) ? esc_attr( $instance['text_link_4'] ) : '';
        $link_5     = isset( $instance['link_5'] ) ? esc_url( $instance['link_5'] ) : '';
        $text_link_5     = isset( $instance['text_link_5'] ) ? esc_attr( $instance['text_link_5'] ) : '';
        $link_6     = isset( $instance['link_6'] ) ? esc_url( $instance['link_6'] ) : '';
        $text_link_6     = isset( $instance['text_link_6'] ) ? esc_attr( $instance['text_link_6'] ) : '';
?>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title);?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_1' )); ?>"><?php esc_html_e( 'Link 1:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_1' )); ?>" type="text" value="<?php echo esc_attr($link_1);?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_1' )); ?>"><?php esc_html_e( 'Text link 1:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_1' )); ?>" type="text" value="<?php echo esc_attr($text_link_1); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_2' )); ?>"><?php esc_html_e( 'Link 2:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_2' )); ?>" type="text" value="<?php echo esc_attr($link_2); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_2' )); ?>"><?php esc_html_e( 'Text link 2:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_2' )); ?>" type="text" value="<?php echo esc_attr($text_link_2); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_3' )); ?>"><?php esc_html_e( 'Link 3:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_3' )); ?>" type="text" value="<?php echo esc_attr($link_3); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_3' )); ?>"><?php esc_html_e( 'Text link 3:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_3' )); ?>" type="text" value="<?php echo esc_attr($text_link_3); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_4' )); ?>"><?php esc_html_e( 'Link 4:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_4' )); ?>" type="text" value="<?php echo esc_attr($link_4);?>" /></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_4' )); ?>"><?php esc_html_e( 'Text link 4:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_4' )); ?>" type="text" value="<?php echo esc_attr($text_link_4); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_5' )); ?>"><?php esc_html_e( 'Link 5:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_5' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_5' )); ?>" type="text" value="<?php echo esc_attr($link_5);?>" /></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_5' )); ?>"><?php esc_html_e( 'Text link 5:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_5' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_5' )); ?>" type="text" value="<?php echo esc_attr($text_link_5); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'link_6' )); ?>"><?php esc_html_e( 'Link 6:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link_6' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'link_6' )); ?>" type="text" value="<?php echo esc_attr($link_6);?>" /></p>
    <p><label for="<?php echo esc_attr($this->get_field_id( 'text_link_6' )); ?>"><?php esc_html_e( 'Text link 6:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text_link_6' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'text_link_6' )); ?>" type="text" value="<?php echo esc_attr($text_link_6); ?>" /></p>
<?php
    }
}
function logtra_register_custom_widget_footer_links() {
    register_widget( 'logtra_widget_footer_links' );
}
add_action( 'widgets_init', 'logtra_register_custom_widget_footer_links' );

