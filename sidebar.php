<?php
/*
|-----------------------------------------------------------
| Sidebar Template
|-----------------------------------------------------------
|
| This file is used for rendering sidebar
|
*/
?>
<aside id="secondary" class="widget-area">
    <?php if (is_active_sidebar('blog-sidebar')) : ?>
        <div id="blog-sidebar" class="widget-area" role="complementary">
            <?php dynamic_sidebar('blog-sidebar'); ?>
        </div>
    <?php endif; ?>
</aside>