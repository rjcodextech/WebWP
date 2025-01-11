<?php
/*
|-----------------------------------------------------------
| Functions
|-----------------------------------------------------------
|
| This file is used for rendering all hooks and custom functions
|
*/

if (!defined('WEBWP_THEME_URL')) :
    define('WEBWP_THEME_URL', trailingslashit(get_template_directory_uri()));
endif;

if (!defined('WEBWP_THEME_PATH')) :
    define('WEBWP_THEME_PATH', trailingslashit(get_template_directory()));
endif;



/**
 * Debug Method
 *
 * @param string $data
 * @return void
 */
function _debug($data = '')
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


require_once WEBWP_THEME_PATH . 'app/helpers.php';
require_once WEBWP_THEME_PATH . 'app/Http/assets.php';
require_once WEBWP_THEME_PATH . 'app/Http/ajaxes.php';
require_once WEBWP_THEME_PATH . 'app/Setup/customizer.php';
require_once WEBWP_THEME_PATH . 'app/Setup/actions.php';
require_once WEBWP_THEME_PATH . 'app/Setup/filters.php';
require_once WEBWP_THEME_PATH . 'app/Setup/supports.php';
require_once WEBWP_THEME_PATH . 'app/Setup/nav-menu.php';
