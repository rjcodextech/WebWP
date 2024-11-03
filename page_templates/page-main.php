<?php

/**
 * Template Name: Front Page
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php the_content(); ?>
<?php endif; ?>
<?php get_footer(); ?>