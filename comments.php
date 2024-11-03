<?php
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx('One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'webwp'),
                number_format_i18n(get_comments_number())
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'      => 'ol',
                'short_ping' => true,
                'callback'   => 'webwp_comments',
            ));
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; // Check for comments. ?>

    <?php comment_form(); ?>

</div>

<?php
function webwp_comments($comment, $args, $depth) {
    ?>
    <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
        <div class="comment-meta">
            <?php echo get_avatar($comment, 48); ?>
            <cite class="fn"><?php comment_author_link(); ?></cite>
            <span class="comment-date"><?php comment_date(); ?></span>
        </div>
        <div class="comment-content">
            <?php comment_text(); ?>
        </div>
        <div class="reply">
            <?php
            comment_reply_link(array_merge($args, array(
                'depth' => $depth,
                'max_depth' => $args['max_depth'],
            )));
            ?>
        </div>
    </li>
    <?php
}
?>
