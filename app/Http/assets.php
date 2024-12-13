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
    wp_enqueue_style( 'google-font-archivo-narrow', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap', array(), strtotime('now'), 'all' );
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
