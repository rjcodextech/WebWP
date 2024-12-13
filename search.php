<?php
/*
|-----------------------------------------------------------
| Search Page Template
|-----------------------------------------------------------
|
| This file is used for rendering search result page
|
*/
get_header();
?>
<?php if (have_posts()) : ?>

    <section class="webwp--grids grid-3-block">
        <div class="container">
            <div class="row">
                <div class="inner-header">
                    <h1><?php _e('Search results for:', 'webwp'); ?><small><?php echo get_search_query(); ?></small> </h1>
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

                <div class="col-lg-4">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
<?php else : ?>
    <section class="page-not-found">
        <div class="container">
            <div id="main">
                <div class="fof">
                    <h1><?php _e('Nothing Found', 'webwp'); ?></h1>
                    <p><?php _e('Apologies, but no results were found. Perhaps searching will help find a related post.', 'webwp'); ?></p>
                    <div class="search-wrapper">
                        <?php get_search_form(); ?>
                    </div>
                    <div class="btn-wrapper">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">Go to Homepage</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

<?php get_footer(); ?>