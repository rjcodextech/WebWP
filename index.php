<?php
/*
|-----------------------------------------------------------
| Blog Page Template
|-----------------------------------------------------------
|
| This file is used for rendering blog page
|
*/

get_header();
?>

<?php if (have_posts()) : ?>
    <section class="webwp--grids grid-3-block default-padding">
        <div class="container">
            <div class="row">
                <div class="inner-header">
                    <h1><?php _e('Blog', 'webwp'); ?></h1>
                </div>
            </div>

            <div class="row">

                <?php while (have_posts()) : the_post() ?>
                    <article class="grid-item">
                        <a href="<?php echo get_permalink(); ?>" class="grid-item-inner">
                            <div class="post-img">
                                <?php echo wp_get_attachment_image(get_post_thumbnail_id(), 'full', "", array("class" => "img-fluid")); ?>
                            </div>
                            <div class="post-info">
                                <div class="post-meta">
                                    <span class="post_date"><?php echo get_the_date(); ?></span>
                                    <span class="post_by"><b>by:</b> <?php echo get_the_author(); ?></span>
                                </div>
                                <label class="post-title"><?php the_title(); ?></label>
                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
                <?php webwp_pagination(); ?>

                <!-- <div class="col-lg-4">
                    <?php //get_template_part("template-part/sidebar", "widget"); 
                    ?>
                </div> -->
            </div>
        </div>
    </section>
<?php else : ?>

    <section id="post-0" class="post no-results default-padding not-found">
        <div class="container">
            <header class="entry-header">
                <h1 class="entry-title"><?php _e('Nothing Found', 'webwp'); ?></h1>
            </header>

            <div class="entry-content">
                <p><?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'webwp'); ?></p>
                <?php get_search_form(); ?>
            </div><!-- .entry-content -->
        </div>
    </section><!-- #post-0 -->

<?php endif; ?>

<?php get_footer(); ?>