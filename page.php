<?php
/*
|-----------------------------------------------------------
| Default Page Template
|-----------------------------------------------------------
|
| This file is used for rendering page
|
*/
get_header();


if (have_posts()) :
?>
  <section class="webwp--banner">
    <div class="container">
      <h1><?php the_title(); ?></h1>
      <?php webwp_breadcrumb(); ?>
    </div>
  </section>
  <section class="webwp--page">
    <div class="container">
      <div class="entry-content"> <?php the_content(); ?></div>
      <div class="page-links">
        <?php
        // Pagination for multi-page content
        wp_link_pages(array(
          'before' => '<div class="page-links">' . __('Pages:', 'webwp'),
          'after'  => '</div>',
          'link_before' => '<span class="page-number">',
          'link_after' => '</span>',
          'next_or_number' => 'number',
          'separator' => ' | ',
        ));
        ?>
      </div>
      <!-- /.page-links -->
    </div>
  </section>
<?php
endif;
get_footer();
