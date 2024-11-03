<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <!-- Blog -->
    <?php while (have_posts()) : the_post() ?>
        <section id="post-<?php the_ID(); ?>" <?php post_class('webwp--article'); ?>>
            <div class="container">
                <div class="row">
                    <div class="article-thumbnail">
                        <?php the_post_thumbnail('full', ['class' => 'img-fluid w-100']); ?>
                    </div>
                    <?php webwp_breadcrumb(); ?>
                    <h1><?php the_title(); ?></h1>
                    <div class="article-meta">
                        <span class="article-by">
                            <?php echo get_avatar(get_the_author_meta('ID'), 32); ?>
                            <?php echo get_the_author(); ?>
                        </span>
                        <span class="article-date"><?php echo get_the_date(); ?></span>

                    </div>
                </div>
                <div class="row">
                    <div class="article-primary">
                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php the_tags('<ul class="tags_post"><li>', '</li><li>', '</li></ul>'); ?>
                        </div>
                        <div class="article-nav">
                            <?php
                            // Previous/next post navigation.
                            the_post_navigation(array(
                                'next_text' => '<span class="meta-nav" aria-hidden="true">' . __('Next', 'webwp') . '</span> ' .
                                    '<span class="screen-reader-text">' . __('Next post:', 'webwp') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                                'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __('Previous', 'webwp') . '</span> ' .
                                    '<span class="screen-reader-text">' . __('Previous post:', 'webwp') . '</span> ' .
                                    '<span class="post-title">%title</span>',
                            ));
                            ?>

                        </div>
                    </div>
                    <div class="article-sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="article-comments">
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
    <section class="webwp--grids grid-3-block">
        <div class="container">

            <?php
            $recent_posts = wp_get_recent_posts([
                'numberposts' => 3,
                'post__not_in' => array(get_the_ID()),
                'post_status' => 'publish'
            ]);
            if (is_array($recent_posts) && count($recent_posts) > 0) :
            ?>
                <h2 class="title2">Recent Post</h2>
                <div class="row">
                    <?php
                    foreach ($recent_posts as $post_item) : ?>
                        <article class="grid-item">
                            <a href="<?php echo get_permalink($post_item['ID']); ?>" class="grid-item-inner">
                                <div class="post-img">
                                    <?php echo get_the_post_thumbnail($post_item['ID'], 'full', ['class' => 'img-fluid']); ?>
                                </div>
                                <div class="post-info">
                                    <label class="post-title"><?php echo $post_item['post_title']; ?></label>
                                </div>
                            </a>
                        </article>

                    <?php
                    endforeach;
                    ?>
                </div>
            <?php
            endif;
            ?>

        </div>
    </section>
<?php
endif;

get_footer();
?>