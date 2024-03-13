<?php
/**
 * Footer widget widget class
 *
 * @since 2.8.0
 */

class logtra_widget_footer_working_time extends WP_Widget {

    function __construct() {
        $widget_ops = array('classname' => 'widget_footer_working_time', 'description' => esc_html__( "Footer working time", 'logtra') );
        parent::__construct('footer-working-time', esc_html__('Footer Working Time', 'logtra'), $widget_ops);
        $this->alt_option_name = 'widget_footer_working_time';
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('logtra_widget_footer_working_time', 'widget');

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
        $day_1 = ( ! empty( $instance['day_1'] ) ) ? $instance['day_1'] : esc_html__( '', 'logtra' );
        $time_1 = ( ! empty( $instance['time_1'] ) ) ? $instance['time_1'] : esc_html__( '', 'logtra' );
        $day_2 = ( ! empty( $instance['day_2'] ) ) ? $instance['day_2'] : esc_html__( '', 'logtra' );
        $time_2 = ( ! empty( $instance['time_2'] ) ) ? $instance['time_2'] : esc_html__( '', 'logtra' );
        $day_3 = ( ! empty( $instance['day_3'] ) ) ? $instance['day_3'] : esc_html__( '', 'logtra' );
        $time_3 = ( ! empty( $instance['time_3'] ) ) ? $instance['time_3'] : esc_html__( '', 'logtra' );
        $day_4 = ( ! empty( $instance['day_4'] ) ) ? $instance['day_4'] : esc_html__( '', 'logtra' );
        $time_4 = ( ! empty( $instance['time_4'] ) ) ? $instance['time_4'] : esc_html__( '', 'logtra' );
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
        <ul class="footer-hours">
            <?php if(isset($day_1) && $day_1 != ''){?>
            <li><span><?php echo esc_attr($day_1); ?></span> <span><?php echo esc_attr($time_1); ?></span> </li>
            <?php } ?>
            <?php if(isset($day_2) && $day_2 != ''){?>
            <li><span><?php echo esc_attr($day_2); ?></span> <span><?php echo esc_attr($time_2); ?></span> </li>
            <?php } ?>
            <?php if(isset($day_3) && $day_3 != ''){?>
            <li><span><?php echo esc_attr($day_3); ?></span> <span><?php echo esc_attr($time_3); ?></span> </li>
            <?php } ?>
            <?php if(isset($day_4) && $day_4 != ''){?>
            <li><span><?php echo esc_attr($day_4); ?></span> <span><?php echo esc_attr($time_4); ?></span></li>
            <?php } ?>
        </ul>       
        <?php echo wp_specialchars_decode(esc_attr($after_widget)); ?>
    <?php
        // Reset the global $the_post as this query will have stomped on it
        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('logtra_widget_footer_working_time', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['wt_description'] = strip_tags($new_instance['wt_description']);
        $instance['day_1'] = strip_tags($new_instance['day_1']);
        $instance['time_1'] = strip_tags($new_instance['time_1']);
        $instance['day_2'] = strip_tags($new_instance['day_2']);
        $instance['time_2'] = strip_tags($new_instance['time_2']); 
        $instance['day_3'] = strip_tags($new_instance['day_3']);
        $instance['time_3'] = strip_tags($new_instance['time_3']);
        $instance['day_4'] = strip_tags($new_instance['day_4']);
        $instance['time_4'] = strip_tags($new_instance['time_4']); 

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_footer_working_time']) )
            delete_option('widget_footer_working_time');
        return $instance;
    }

    function form( $instance ) {   
        $title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';   
        $wt_description     = isset( $instance['wt_description'] ) ? esc_attr( $instance['wt_description'] ) : '';
        $day_1     = isset( $instance['day_1'] ) ? esc_attr( $instance['day_1'] ) : '';

        $time_1     = isset( $instance['time_1'] ) ? esc_attr( $instance['time_1'] ) : '';
        $day_2     = isset( $instance['day_2'] ) ? esc_attr( $instance['day_2'] ) : '';
        $time_2     = isset( $instance['time_2'] ) ? esc_attr( $instance['time_2'] ) : '';
        $day_3     = isset( $instance['day_3'] ) ? esc_attr( $instance['day_3'] ) : '';

        $time_3     = isset( $instance['time_3'] ) ? esc_attr( $instance['time_3'] ) : '';
        $day_4     = isset( $instance['day_4'] ) ? esc_attr( $instance['day_4'] ) : '';
        $time_4     = isset( $instance['time_4'] ) ? esc_attr( $instance['time_4'] ) : '';
?>  
    <p><label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php esc_html_e( 'Title:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title);?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'wt_description' )); ?>"><?php esc_html_e( 'Description', 'logtra' ); ?></label>
    <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'wt_description' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'wt_description' )); ?>" type="textarea"><?php echo esc_attr($wt_description);?></textarea></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'day_1' )); ?>"><?php esc_html_e( 'Day 1:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'day_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'day_1' )); ?>" type="text" value="<?php echo esc_attr($day_1); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'time_1' )); ?>"><?php esc_html_e( 'Time 1:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'time_1' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'time_1' )); ?>" type="text" value="<?php echo esc_attr($time_1); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'day_2' )); ?>"><?php esc_html_e( 'Day 2:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'day_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'day_2' )); ?>" type="text" value="<?php echo esc_attr($day_2); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'time_2' )); ?>"><?php esc_html_e( 'Time 2:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'time_2' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'time_2' )); ?>" type="text" value="<?php echo esc_attr($time_2); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'day_3' )); ?>"><?php esc_html_e( 'Day 3:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'day_3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'day_3' )); ?>" type="text" value="<?php echo esc_attr($day_3); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'time_3' )); ?>"><?php esc_html_e( 'Time 3:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'time_3' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'time_3' )); ?>" type="text" value="<?php echo esc_attr($time_3); ?>"/></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'day_4' )); ?>"><?php esc_html_e( 'Day 4:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'day_4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'day_4' )); ?>" type="text" value="<?php echo esc_attr($day_4); ?>" /></p>

    <p><label for="<?php echo esc_attr($this->get_field_id( 'time_4' )); ?>"><?php esc_html_e( 'Time 4:', 'logtra' ); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'time_4' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'time_4' )); ?>" type="text" value="<?php echo esc_attr($time_4); ?>"/></p>

<?php
    }
}
function logtra_register_custom_widget_footer_working_time() {
    register_widget( 'logtra_widget_footer_working_time' );
}
add_action( 'widgets_init', 'logtra_register_custom_widget_footer_working_time' );