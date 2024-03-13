<?php
$logtra_redux_demo = get_option('redux_demo');

//Custom fields:
require_once get_template_directory() . '/framework/widget/recent-post.php';
require_once get_template_directory() . '/framework/widget/footer-about.php';
require_once get_template_directory() . '/framework/widget/footer-links.php';
require_once get_template_directory() . '/framework/widget/footer-newsletter.php';
require_once get_template_directory() . '/framework/widget/footer-working-time.php';
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';

//Theme Set up:
function logtra_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
	add_theme_support( 'custom-header' ); 
	add_theme_support( 'custom-background' );
	$lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('logtra', $lang);

    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( "title-tag" );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
    'primary' =>  esc_html__( 'Primary Navigation Menu: Chosen menu in Home page, single, blog, pages ...', 'logtra' ),
	) );
    // This theme uses its own gallery styles.
}
add_action( 'after_setup_theme', 'logtra_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
 
function logtra_theme_scripts_styles() {
	$logtra_redux_demo = get_option('redux_demo');
	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/assets/css/bootstrap.min.css');
    wp_enqueue_style('all', get_template_directory_uri().'/assets/css/all.min.css');
    wp_enqueue_style('animate', get_template_directory_uri().'/assets/css/animate.css');
    wp_enqueue_style('logtra-themify-icons', get_template_directory_uri().'/assets/css/themify-icons.css');
    wp_enqueue_style('icofont', get_template_directory_uri().'/assets/css/icofont.min.css');
    wp_enqueue_style('bootstrap-icons', get_template_directory_uri().'/assets/css/bootstrap-icons.css');
    wp_enqueue_style('bsnav', get_template_directory_uri().'/assets/css/bsnav.min.css');
    wp_enqueue_style('logtra-preloader', get_template_directory_uri().'/assets/css/preloader.css');
    wp_enqueue_style('magnific-popup', get_template_directory_uri().'/assets/css/magnific-popup.css');
    wp_enqueue_style('swiper-bundle', get_template_directory_uri().'/assets/css/swiper-bundle.min.css');
    wp_enqueue_style('jquery-ui', get_template_directory_uri().'/assets/css/jquery-ui.css');
    wp_enqueue_style('logtra-css-1', get_template_directory_uri().'/assets/style.css');
    wp_enqueue_style('logtra-css-2', get_template_directory_uri().'/style.css');
    wp_enqueue_style('logtra-responsive', get_template_directory_uri().'/assets/css/responsive.css');
    wp_enqueue_style('logtra-style', get_stylesheet_uri(), array(), '2023-03-02' );
    if(isset($logtra_redux_demo['chosen-color']) && $logtra_redux_demo['chosen-color']==1){
    wp_enqueue_style( 'color', get_template_directory_uri().'/framework/color.php');
    } 
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script( 'comment-reply' );
    //Javascript 
    wp_enqueue_script('jquery-3.7.0', get_template_directory_uri().'/assets/js/jquery-3.7.0.min.js',array(),false,true);
    wp_enqueue_script('popper', get_template_directory_uri().'/assets/js/popper.min.js',array(),false,true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/js/bootstrap.min.js',array(),false,true);
    wp_enqueue_script('bsnav', get_template_directory_uri().'/assets/js/bsnav.min.js',array(),false,true);
    wp_enqueue_script('jquery-magnific-popup', get_template_directory_uri().'/assets/js/jquery.magnific-popup.min.js',array(),false,true);
    wp_enqueue_script('isotope-pkgd', get_template_directory_uri().'/assets/js/isotope.pkgd.min.js',array(),false,true);
    wp_enqueue_script('imagesloaded-pkgd', get_template_directory_uri().'/assets/js/imagesloaded.pkgd.min.js',array(),false,true);
    wp_enqueue_script('wow', get_template_directory_uri().'/assets/js/wow.min.js',array(),false,true);
    wp_enqueue_script('logtra-count-to', get_template_directory_uri().'/assets/js/count-to.js',array(),false,true);
    wp_enqueue_script('logtra-progress-bar', get_template_directory_uri().'/assets/js/progress-bar.min.js',array(),false,true);
    wp_enqueue_script('jquery-easypiechart', get_template_directory_uri().'/assets/js/jquery.easypiechart.js',array(),false,true);
    wp_enqueue_script('typed', get_template_directory_uri().'/assets/js/typed.js',array(),false,true);
    wp_enqueue_script('YTPlayer', get_template_directory_uri().'/assets/js/YTPlayer.min.js',array(),false,true);
    wp_enqueue_script('jquery-appear', get_template_directory_uri().'/assets/js/jquery.appear.js',array(),false,true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri().'/assets/js/jquery.easing.min.js',array(),false,true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri().'/assets/js/swiper-bundle.min.js',array(),false,true);
    wp_enqueue_script('logtra-active-class', get_template_directory_uri().'/assets/js/active-class.js',array(),false,true);
    wp_enqueue_script('jquery-ui', get_template_directory_uri().'/assets/js/jquery-ui.min.js',array(),false,true);
    wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js',array(),false,true);
   }
add_action( 'wp_enqueue_scripts', 'logtra_theme_scripts_styles' );

//Custom Excerpt Function
function logtra_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
}

add_filter('user_contactmethods', 'my_user_contactmethods');  
               
function my_user_contactmethods($user_contactmethods){  
  
    
  $user_contactmethods['facebook'] = 'Facebook Link';  
  $user_contactmethods['twitter'] = 'Twitter Link';
  $user_contactmethods['instagram'] = 'Instagram Link';  
 
  
  return $user_contactmethods;  
} 
// Widget Sidebar
function logtra_widgets_init() {
	register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar 1', 'logtra' ),
        'id'            => 'sidebar-1',        
		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'logtra' ),        
		'before_widget' => '<div id="%1$s" class="widget %2$s">',        
		'after_widget'  => '</div>',        
		'before_title'  => '<h5 class="work-title">',        
		'after_title'   => '</h5>'
    ) ); 
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar 2', 'logtra' ),
        'id'            => 'sidebar-2',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'logtra' ),        
        'before_widget' => '<div id="%1$s" class="widget subs bg-overlay hero-bg %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h5 class="work-title">',        
        'after_title'   => '</h5>'
    ) ); 
    register_sidebar( array(
        'name'          => esc_html__( 'Service Sidebar', 'logtra' ),
        'id'            => 'sidebar-3',        
        'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'logtra' ),        
        'before_widget' => '<div id="%1$s" class="widget %2$s">',        
        'after_widget'  => '</div>',        
        'before_title'  => '<h5 class="work-title">',        
        'after_title'   => '</h5>'
    ) ); 
    register_sidebar( array(
      'name'          => esc_html__( 'Footer One Widget', 'spower' ),
      'id'            => 'footer-area-1',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'spower' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '',
      'after_title'   => '',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Two Widget', 'spower' ),
      'id'            => 'footer-area-2',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'spower' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h4 class="footer-widget-title">',
      'after_title'   => '<span class="footer-title-line"></span>
              </h4>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Three Widget', 'spower' ),
      'id'            => 'footer-area-3',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'spower' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h4 class="footer-widget-title">',
      'after_title'   => '<span class="footer-title-line"></span>
              </h4>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Four Widget', 'spower' ),
      'id'            => 'footer-area-4',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'spower' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => '<h4 class="footer-widget-title">',
      'after_title'   => '<span class="footer-title-line"></span>
              </h4>',
    ) );
}
add_action( 'widgets_init', 'logtra_widgets_init' );

//function tag widgets
function logtra_tag_cloud_widget($args) {
	$args['number'] = 0; //adding a 0 will display all tags
	$args['largest'] = 18; //largest tag
	$args['smallest'] = 11; //smallest tag
	$args['unit'] = 'px'; //tag font unit
	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'logtra_tag_cloud_widget' );
function logtra_excerpt() {
  $logtra_redux_demo = get_option('redux_demo');
  if(isset($logtra_redux_demo['blog_excerpt'])){
    $limit = $logtra_redux_demo['blog_excerpt'];
  }else{
    $limit = 80;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function logtra_excerpt_2() {
  $logtra_redux_demo = get_option('redux_demo');
  if(isset($logtra_redux_demo['blog_excerpt_2'])){
    $limit = $logtra_redux_demo['blog_excerpt_2'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function logtra_excerpt_3() {
  $logtra_redux_demo = get_option('redux_demo');
  if(isset($logtra_redux_demo['blog_excerpt_3'])){
    $limit = $logtra_redux_demo['blog_excerpt_3'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function project_excerpt() {
  $logtra_redux_demo = get_option('redux_demo');
  if(isset($logtra_redux_demo['project_excerpt'])){
    $limit = $logtra_redux_demo['project_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function service_excerpt() {
  $logtra_redux_demo = get_option('redux_demo');
  if(isset($logtra_redux_demo['service_excerpt'])){
    $limit = $logtra_redux_demo['service_excerpt'];
  }else{
    $limit = 30;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
//pagination
function logtra_pagination($prev = 'Prev', $next = 'Next', $pages='') {
    global $paged; // current page
    if(empty($paged)) $paged = 1;
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
        $pages = 1;
    }
    if($pages != 1){
        echo '<div class="pagination">';
        if($paged >= 1) echo '<a class="prev page-value" href="'.get_pagenum_link($paged - 1).'" ><i class="ti ti-arrow-left"></i></a>';
        for($page = 1; $page <= $pages; $page++){
        echo $page == $paged ? '<span class="page-value current">'. $page. '</span>' : '<a class="page-value" href="'.get_pagenum_link($page).'">'. $page. '</a>';
     }
    if($paged <= $pages) echo '<a class="next page-value" href="'.get_pagenum_link($paged + 1).'" ><i class="ti ti-arrow-right"></i></a>';
    echo "</div>\n";
    }
}

function logtra_search_form( $form ) {
  $form = '
  <form  method="get" class="search-form" action="' . esc_url(home_url('/')) . '"> 
    <input type="search" class="form-control" placeholder="'.esc_attr('Search', 'logtra').'" value="' . get_search_query() . '" name="s" id="s"> 
    <button type="submit"><i class="icon fa fa-search"></i> 
    </button>
  </form>
	';
  return $form;
}
add_filter( 'get_search_form', 'logtra_search_form' );
//Custom comment List:

// Comment Form
function logtra_theme_comment($comment, $args, $depth) {
  //echo 's';
  $GLOBALS['comment'] = $comment; ?>
    <?php if(get_avatar($comment,$size='80' )!=''){?>
    <li>
        <div class="single-commentor-user">
            <?php echo get_avatar($comment,$size='100' ); ?>
            <div class="single-commentor-user-bio">
                <div class="single-commentor-user-bio-head">
                    <h4> <?php printf( esc_html__('%s','logtra'), get_comment_author_link()) ?> </h4>
                    <span class="date">
                        <i class="fas fa-calendar"></i>
                        <?php the_time(get_option( 'date_format' ));?>
                    </span>
                </div>
                <?php comment_text() ?>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
    </li>
    <?php }else{?>
    <li>
        <div class="single-commentor-user">
            <div class="single-commentor-user-bio">
                <div class="single-commentor-user-bio-head">
                    <h4> <?php printf( esc_html__('%s','logtra'), get_comment_author_link()) ?> </h4>
                    <span class="date">
                        <i class="fas fa-calendar"></i>
                        <?php the_time(get_option( 'date_format' ));?>
                    </span>
                </div>
                <?php comment_text() ?>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </div>
        </div>
    </li>
  <?php }?>
<?php
}
function move_comment_field_to_bottom( $fields ) {
$comment_field = $fields['comment'];
unset( $fields['comment'] );
$fields['comment'] = $comment_field;
return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_field_to_bottom');

/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'logtra_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one included with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function logtra_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to include a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'logtra' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'logtra' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'logtra' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'logtra' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'logtra' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'logtra' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Elementor', 'logtra' ),
            'slug'                     => 'elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/elementor.zip',
        ),
      array(
            'name'                     => esc_html__( 'Logtra Common', 'logtra' ),
            'slug'                     => 'logtra-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/logtra-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Logtra Elementor', 'logtra' ),
            'slug'                     => 'logtra-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/logtra-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'logtra' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'logtra' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'logtra' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'logtra' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'logtra' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'logtra' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'logtra' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'logtra' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'logtra' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'logtra' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'logtra' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'logtra' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'logtra' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'logtra' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'logtra' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'logtra' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'logtra' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>