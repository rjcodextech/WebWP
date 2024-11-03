<?php get_header(); ?>

<section class="page_banner error_page_banner">
    <div class="container">
        <h1>Page Not Found</h1>
        <p>11 Sorry, the page you are looking for could not be found. Please check the URL or return to the homepage.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-icon-right">Go to Homepage <i class="las la-arrow-right me-2"></i></a>

    </div>
</section>

<?php get_footer(); ?>