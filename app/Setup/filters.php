<?php

/*
|-----------------------------------------------------------
| Theme Filters
|-----------------------------------------------------------
|
| This file purpose is to include your theme various
| filters hooks, which changes output or behaviour
| of different parts of WordPress functions.
|
*/
// Add specific CSS class by filter.

add_filter('body_class', function ($classes) {
    if (is_active_sidebar('blog-sidebar') && is_single()) :
        $classes = array_merge($classes, array('post-sidebar'));
    endif;

    return $classes;
});

/**
 * Shortens posts excerpts to 20 words.
 *
 * @return integer
 */
function webwp_modify_excerpt_length()
{
    return 20;
}
add_filter('excerpt_length', 'webwp_modify_excerpt_length');

function webwp_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'webwp_excerpt_more');
