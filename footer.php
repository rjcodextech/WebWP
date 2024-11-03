<?php
/*
|-----------------------------------------------------------
| Footer Template
|-----------------------------------------------------------
|
| This file is used for rendering site footer
|
*/
?>
<footer class="site-footer">
    <div class="container">
        <div class="row">
            <?php if (is_active_sidebar('footer-1')) : ?>
                <div id="footer-1" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('footer-1'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-2')) : ?>
                <div id="footer-2" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('footer-2'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-3')) : ?>
                <div id="footer-3" class="widget-area" role="complementary">
                    <?php dynamic_sidebar('footer-3'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
</main>
<?php wp_footer(); ?>
</body>

</html>