<?php

/**
 * Template Name: Page Home
 */
?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php the_content(); ?>
<?php endif; ?>

<section class="hero-banner">
    <div class="hero-heading">
        <div class="herotxt">
            <h1>Grow your star <span>with webwp</span></h1>
            <p>On a mission to ensure every parent has access to expert backend information needed to raise happy, confident
                and successful children.</p>
        </div>
    </div>
    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/herobanner.jpg" alt="Hero Banner">
</section>
<section class="about-section">
    <div class="container">
        <h2>About Us</h2>
        <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing
            layouts and visual mockups.</p>
        <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing
            layouts and visual mockups.Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
            industries for previewing layouts and visual mockups.</p>
        <p>Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing
            layouts and visual mockups.</p>

        <div class="join-community-form">
            <form action="">
                <div class="form-field">
                    <input type="text" placeholder="Name">
                    <input type="text" placeholder="Email">
                    <input type="text" placeholder="Phone No.">
                </div>
                <button>Join Our Community</button>
            </form>
            <div class="successfully">
                Form Submit successfully
            </div>
        </div>
        <div class="mid-image">
            <img src="<?php echo WEBWP_THEME_URL; ?>public/images/mid-image.jpg" alt="About">
        </div>
    </div>
</section>
<section class="advisor-section">
    <div class="container">
        <h2>Advisor</h2>
        <div class="advisor-listing">
            <div class="advisor-grid">
                <div class="image">
                    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/img-1.jpg" alt="Advisor">
                    <div class="sociallink">
                        <ul>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/facebook.png" alt="facebook"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/instagram.png" alt="instagram"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/linkedin.png" alt="linkedin"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/twiiter.png" alt="twiiter"></li>

                        </ul>
                    </div>
                </div>
                <div class="name">
                    Dr. Trisha
                    <span>Ramamurthy</span>
                </div>

            </div>
            <div class="advisor-grid">
                <div class="image">
                    <div class="sociallink">
                        <ul>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/facebook.png" alt="facebook"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/instagram.png" alt="instagram"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/linkedin.png" alt="linkedin"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/twiiter.png" alt="twiiter"></li>

                        </ul>
                    </div>
                    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/img-2.jpg" alt="Advisor">
                </div>
                <div class="name">
                    Pallavi Poojari
                    <span>Mahindra</span>
                </div>
            </div>
            <div class="advisor-grid">
                <div class="image">
                    <div class="sociallink">
                        <ul>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/facebook.png" alt="facebook"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/instagram.png" alt="instagram"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/linkedin.png" alt="linkedin"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/twiiter.png" alt="twiiter"></li>

                        </ul>
                    </div>
                    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/img-3.jpg" alt="Advisor">
                </div>
                <div class="name">
                    Shivangi
                    <span>Maniar</span>
                </div>
            </div>
            <div class="advisor-grid">
                <div class="image">
                    <div class="sociallink">
                        <ul>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/facebook.png" alt="facebook"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/instagram.png" alt="instagram"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/linkedin.png" alt="linkedin"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/twiiter.png" alt="twiiter"></li>

                        </ul>
                    </div>
                    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/img-4.jpg" alt="Advisor">
                </div>
                <div class="name">
                    Simran
                    <span>Arneja</span>
                </div>
            </div>
            <div class="advisor-grid">
                <div class="image">
                    <div class="sociallink">
                        <ul>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/facebook.png" alt="facebook"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/instagram.png" alt="instagram"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/linkedin.png" alt="linkedin"></li>
                            <li><img src="<?php echo WEBWP_THEME_URL; ?>public/images/twiiter.png" alt="twiiter"></li>

                        </ul>
                    </div>
                    <img src="<?php echo WEBWP_THEME_URL; ?>public/images/img-5.jpg" alt="Advisor">
                </div>
                <div class="name">
                    Vatsala
                    <span>Zutshi</span>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>