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
        $breadcrumbs[] = '<a href="' . esc_url(home_url('/')) . '">' . esc_html($home_title) . '</a>';

        if (is_category() || is_single()) {
            if (is_single()) {
                // Fetch all categories for the post and add each to the breadcrumb
                $categories = get_the_category();
                if ($categories) {
                    foreach ($categories as $category) {
                        $breadcrumbs[] = '<a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a>';
                    }
                }
            } else {
                $breadcrumbs[] = esc_html(single_cat_title('', false));
            }
        } elseif (is_page()) {
            $breadcrumbs[] = esc_html(get_the_title());
        } elseif (is_home()) {
            $breadcrumbs[] = esc_html__('Blog', 'webwp');
        }

        // Construct breadcrumbs output
        ob_start();
?>
        <ul class="breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php foreach ($breadcrumbs as $key => $breadcrumb): ?>
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <?php echo esc_attr($breadcrumb); // Escaped earlier when added to $breadcrumbs 
                    ?>
                    <meta itemprop="position" content="<?php echo esc_attr($key + 1); ?>" />
                </li>
                <?php if ($key < count($breadcrumbs) - 1): ?>
                    <li class="separator">
                        <?php
                        $next_is_category = ($key > 0 && isset($categories) && $key < count($categories));
                        echo esc_html($next_is_category ? $category_separator : $separator);
                        ?>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
<?php
        $output = ob_get_clean();
        echo esc_attr($output);
    }
}

/**
 * Clean Text
 */
function webwp_txt($text = '')
{
    return wp_unslash(wp_specialchars_decode($text));
}
