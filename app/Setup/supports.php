<?php

/*
|-----------------------------------------------------------
| Theme Supports
|-----------------------------------------------------------
|
| This file enables theme supports, which activates various
| WordPress functions used or required by this theme.
| By default we enabled most common for you.
|
*/



/**
 * Adds various theme supports.
 *
 * @return void
 */
function webwp_add_theme_supports()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => __('Primary', 'webwp'),
        'footer' => __('Footer', 'webwp'),
    ]);

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
            'navigation-widgets',
        )
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support('custom-logo');

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Add support for custom line height controls.
    add_theme_support('custom-line-height');

    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');
}
add_action('after_setup_theme', 'webwp_add_theme_supports');


/**
 * Add a sidebar.
 */
function webwp_theme_slug_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Blog Sidebar', 'webwp'),
        'id'            => 'blog-sidebar',
        'description'   => __('Widgets in this area will be shown on blog and all posts.', 'webwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer - 1', 'webwp'),
        'id'            => 'footer-1',
        'description'   => __('Widgets in this area will be shown in footer', 'webwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer - 2', 'webwp'),
        'id'            => 'footer-2',
        'description'   => __('Widgets in this area will be shown in footer', 'webwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
    register_sidebar(array(
        'name'          => __('Footer - 3', 'webwp'),
        'id'            => 'footer-3',
        'description'   => __('Widgets in this area will be shown in footer', 'webwp'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ));
}
add_action('widgets_init', 'webwp_theme_slug_widgets_init');
