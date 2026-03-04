<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
<?php wp_body_open(); ?>
<header id="site-header">
    <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
    </div>
    <nav id="site-navigation">
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
</header>
