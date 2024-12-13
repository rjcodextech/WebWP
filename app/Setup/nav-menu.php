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

function webwp_custom_html_to_menu_items($items, $args)
{
    // Loop through each menu item
    foreach ($items as &$item) {
        if (in_array('menu-item-has-children', $item->classes)) {
            $item->title .= '<svg class="downarrow" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>';
        }
    }

    return $items;
}
add_filter('wp_nav_menu_objects', 'webwp_custom_html_to_menu_items', 10, 2);
