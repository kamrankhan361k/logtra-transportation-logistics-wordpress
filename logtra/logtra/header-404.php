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
    

  