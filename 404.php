<?php
/*
|-----------------------------------------------------------
| 404 Page Template
|-----------------------------------------------------------
|
| This file is used for rendering 404 page
|
*/
get_header();
?>
<section class="page-not-found">
    <div class="container">
        <div id="main">
            <div class="fof">
                <h1>Error 404</h1>
                <p>Sorry, the page you are looking for could not be found. Please check the URL or return to the homepage.</p>
                <div class="btn-wrapper">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">Go to Homepage</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>