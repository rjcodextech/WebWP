<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#app"><?php _e('Skip to content', 'webwp'); ?></a>
    <header class="site-header">
        <div class="container">
            <div class="header">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url("/")); ?>">
                        <?php
                        $custom_logo_id = get_theme_mod('custom_logo');
                        $custom_logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');
                        $site_title = get_bloginfo('name');
                        $site_description = get_bloginfo('description');
                        $title = $site_title . " | " . $site_description;
                        echo '<img src="' . esc_url($custom_logo_url) . '" alt="' . $title . '" title="' . $title . '" class="img-fluid">';
                        ?>
                    </a>
                </div>
                <div class="hamburger-menu" id="hamburger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <nav class="site-menu">
                    <?php
                    wp_nav_menu([
                        'menu_class' => 'navbar-nav ms-auto',
                        'menu_id' => 'primary-nav',
                        'container' => false,
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'theme_location' => 'primary',
                    ]);
                    ?>
                </nav>

            </div>
        </div>
    </header>
    <main id="app" class="app">