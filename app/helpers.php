<?php

/**
 * Asset URL from public folder 
 */
function asset_path($file)
{
    return WEBWP_THEME_URL . 'public/' . $file;
}


/**
 * Get Theme Options
 */

function theme_config($key)
{
    return carbon_get_theme_option($key);
}

/**
 * Get Meta Options
 */
function meta_config($id, $name)
{
    return carbon_get_post_meta($id, $name);
}

function webwp_pagination()
{
    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => __("Newer", "webwp"),
        'next_text' => __("Older", "webwp"),
    ));

    if (is_array($pages)) {
        echo '<div class="pagination-wrapper" > <ul class="pagination">';
        foreach ($pages as $page) {
            $class = strpos($page, 'current') !== false ? 'page-item active' : 'page-item';
            $page = str_replace('page-numbers', 'page-link', $page);
            echo '<li class="' . $class . '">' . $page . '</li>';
        }
        echo '</ul></div>';
    }
}

function get_previous_post_link_url()
{
    $previous_post = get_previous_post();
    return $previous_post ? get_permalink($previous_post->ID) : '';
}

function get_next_post_link_url()
{
    $next_post = get_next_post();
    return $next_post ? get_permalink($next_post->ID) : '';
}

function webwp_breadcrumb()
{
    if (!is_front_page()) {
        // Settings
        $separator = ' &gt; ';
        $category_separator = ' / ';
        $home_title = 'Home';

        // Get the current post type
        global $post;
        $breadcrumbs = array();

        // Home link
        $breadcrumbs[] = sprintf(
            '<a href="%s">%s</a>',
            esc_url(home_url('/')),
            esc_html($home_title)
        );

        if (is_category() || is_single()) {
            if (is_single()) {
                // Fetch all categories for the post and add each to the breadcrumb
                $categories = get_the_category();
                if ($categories) {
                    foreach ($categories as $category) {
                        $breadcrumbs[] = sprintf(
                            '<a href="%s">%s</a>',
                            esc_url(get_category_link($category->term_id)),
                            esc_html($category->name)
                        );
                    }
                }
            } else {
                $breadcrumbs[] = esc_html(single_cat_title('', false));
            }
        } elseif (is_page()) {
            $breadcrumbs[] = esc_html(get_the_title());
        } elseif (is_home()) {
            $breadcrumbs[] = esc_html__('Blog', 'text-domain');
        }

        // Construct breadcrumbs output
        $output = '<ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">';
        foreach ($breadcrumbs as $key => $breadcrumb) {
            $output .= '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">';
            $output .= wp_kses_post($breadcrumb);
            $output .= '<meta itemprop="position" content="' . esc_attr($key + 1) . '" />';
            $output .= '</li>';

            if ($key < count($breadcrumbs) - 1) {
                $next_is_category = ($key > 0 && isset($categories) && $key < count($categories));
                $separator_to_use = $next_is_category ? $category_separator : $separator;
                $output .= '<li class="separator">' . esc_html($separator_to_use) . '</li>';
            }
        }
        $output .= '</ul>';

        // Display breadcrumbs
        echo wp_kses_post($output);
    }
}

/**
 * Clean Text
 */
function webwp_txt($text = '')
{
    return wp_unslash(wp_specialchars_decode($text));
}
