<?php

function webwp_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'primary') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'webwp_menu_classes', 10, 3);

function webwp_menu_location_atts($atts, $item, $args)
{
    if ($args->theme_location == 'primary') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'webwp_menu_location_atts', 10, 3);

