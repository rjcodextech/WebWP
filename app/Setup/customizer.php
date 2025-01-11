<?php
function webwp_customize_register($wp_customize)
{
    // Add Colors Section
    $wp_customize->add_section('webwp_colors', array(
        'title'       => __('Theme Colors', 'webwp'),
        'priority'    => 30,
        'description' => __('Customize the primary and secondary colors of your site.', 'webwp'),
    ));

    // Primary Color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#472f91',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'webwp'),
        'section'  => 'webwp_colors',
        'settings' => 'primary_color',
    )));

    // Secondary Color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#2c8196',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'webwp'),
        'section'  => 'webwp_colors',
        'settings' => 'secondary_color',
    )));

    // Background Color
    $wp_customize->add_setting('bg_color', array(
        'default'           => '#f7f4ec',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_color', array(
        'label'    => __('Background Color', 'webwp'),
        'section'  => 'webwp_colors',
        'settings' => 'bg_color',
    )));

    // Add Fonts Section
    $wp_customize->add_section('webwp_fonts', array(
        'title'       => __('Typography', 'webwp'),
        'priority'    => 31,
        'description' => __('Customize the fonts and sizes of your site.', 'webwp'),
    ));

    // Primary Font
    $wp_customize->add_setting('primary_font', array(
        'default'           => 'Poppins',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('primary_font', array(
        'label'    => __('Primary Font (Headings)', 'webwp'),
        'section'  => 'webwp_fonts',
        'settings' => 'primary_font',
        'type'     => 'select',
        'choices'  => array(
            'Poppins' => 'Poppins',
            'Roboto'  => 'Roboto',
            'Custom Font' => __('Custom Font URL', 'webwp'),
        ),
    ));

    // Secondary Font
    $wp_customize->add_setting('secondary_font', array(
        'default'           => 'Roboto',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('secondary_font', array(
        'label'    => __('Secondary Font (Body)', 'webwp'),
        'section'  => 'webwp_fonts',
        'settings' => 'secondary_font',
        'type'     => 'select',
        'choices'  => array(
            'Poppins' => 'Poppins',
            'Roboto'  => 'Roboto',
            'Custom Font' => __('Custom Font URL', 'webwp'),
        ),
    ));

    // Font Sizes
    $wp_customize->add_setting('base_size', array(
        'default'           => '1.6rem',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('base_size', array(
        'label'    => __('Base Font Size', 'webwp'),
        'section'  => 'webwp_fonts',
        'settings' => 'base_size',
        'type'     => 'text',
    ));

    $wp_customize->add_setting('content_font_size', array(
        'default'           => '1.3rem',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('content_font_size', array(
        'label'    => __('Content Font Size', 'webwp'),
        'section'  => 'webwp_fonts',
        'settings' => 'content_font_size',
        'type'     => 'text',
    ));

    // Custom Font URL
    $wp_customize->add_setting('custom_font_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('custom_font_url', array(
        'label'    => __('Custom Font URL', 'webwp'),
        'section'  => 'webwp_fonts',
        'settings' => 'custom_font_url',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'webwp_customize_register');

function webwp_customizer_styles()
{
    // Retrieve Customizer settings
    $primary_color   = get_theme_mod('primary_color', '#472f91');
    $secondary_color = get_theme_mod('secondary_color', '#2c8196');
    $bg_color        = get_theme_mod('bg_color', '#f7f4ec');
    $primary_font    = get_theme_mod('primary_font', 'Poppins');
    $secondary_font  = get_theme_mod('secondary_font', 'Roboto');
    $base_size       = get_theme_mod('base_size', '1.6rem');
    $content_size    = get_theme_mod('content_font_size', '1.3rem');
    $custom_font_url = get_theme_mod('custom_font_url', '');

    // Enqueue Google Fonts or Custom Font
    if ($primary_font !== 'Custom Font' && $secondary_font !== 'Custom Font') {
        wp_enqueue_style(
            'webwp-google-fonts',
            'https://fonts.googleapis.com/css2?family=' . urlencode($primary_font) . ':wght@400;700&family=' . urlencode($secondary_font) . ':wght@400;700&display=swap',
            array(),
            null
        );
    } elseif ($custom_font_url) {
        wp_enqueue_style('custom-font-url', esc_url($custom_font_url), array(), null);
    }

    // Generate inline styles
    $custom_css = "
        :root {
            --primary-color: {$primary_color};
            --secondary-color: {$secondary_color};
            --bg-color: {$bg_color};
            --primary-font: '{$primary_font}', serif;
            --secondary-font: '{$secondary_font}', sans-serif;
            --base-size: {$base_size};
            --content-size: {$content_size};
        }

        body {
            font-family: var(--secondary-font);
            font-size: var(--base-size);
            // background-color: var(--bg-color);
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: var(--primary-font);
        }

        a {
            color: var(--primary-color);
        }

        a:hover {
            color: var(--secondary-color);
        }
    ";
    wp_add_inline_style('webwp', $custom_css);
}
add_action('wp_enqueue_scripts', 'webwp_customizer_styles');
