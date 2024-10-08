<?php
/**
 * Template name: Homepage
 */
get_header();
?>
	<!-- Hero Section -->
	<section id="hero" class="hero section">

		<div class="container">
			<div class="row gy-4">
				<div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
					<h1><?php echo get_theme_mod( 'actcourse_hero_section_title' );?></h1>
					<p>We are team of talented designers making websites with Bootstrap</p>
					<div class="d-flex">
						<a href="#about" class="btn-get-started">Get Started</a>
						<a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"></a>
					</div>
				</div>
				<div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <?php
                    $default_image = get_template_directory_uri() . '/assets/img/hero-img.png';
                    $theme_image   = get_theme_mod( 'actcourse_hero_section_photo', $default_image );
                    ?>
					<img src="<?php echo empty( $theme_image ) ? $default_image : $theme_image; ?>" class="img-fluid animated" alt="">
				</div>
			</div>
		</div>
	</section><!-- /Hero Section -->

	<?php get_template_part( 'template-parts/services/section' ); ?>

    <?php get_template_part( 'template-parts/blog/latest-posts' ); ?>

    <?php get_template_part( 'template-parts/contact-us' ); ?>

<?php
get_footer();
