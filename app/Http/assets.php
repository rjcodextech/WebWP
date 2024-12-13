<?php
/*
|-----------------------------------------------------------------
| Theme Assets
|-----------------------------------------------------------------
|
| This file is for registering your theme stylesheets and scripts.
| In here you should also deregister all unwanted assets which
| can be shiped with various third-parity plugins.
|
*/

/**
 * Registers theme stylesheet files.
 *
 * @return void
 */
function webwp_register_stylesheets()
{
    wp_enqueue_style( 'google-font-archivo-narrow', '//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic&subset=latin,latin-ext', array(), '2014-12-20', 'all' );
    wp_enqueue_style('app', asset_path('styles/main.css'), array(), strtotime('now'));
    if (is_single() && is_singular("post")):
        wp_enqueue_style('article', asset_path('styles/article.css'), array(), strtotime('now'));       
    endif;
}
add_action('wp_enqueue_scripts', 'webwp_register_stylesheets');

/**
 * Registers theme script files.
 *
 * @return void
 */
function webwp_register_scripts()
{
    wp_enqueue_script('jquery');

    wp_register_script('app', asset_path('scripts/app.js'), array('jquery'), strtotime('now'));
    wp_enqueue_script('app');

    wp_localize_script(
        'app',
        'webwp',
        array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'security' => wp_create_nonce(strtotime('today')),
        )
    );

    if (is_single() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'webwp_register_scripts');



/**
 * Enqueue a script in the WordPress admin on edit.php.
 *
 * @param string $hook Hook suffix for the current admin page.
 */
function webwp_enqueue_admin_script()
{
    // Add default editor styles
    add_editor_style(asset_path('styles/editor.css'));
}
add_action('admin_enqueue_scripts', 'webwp_enqueue_admin_script');
