<?php
/**
 * Page file.
 *
 * @package actcourse
 */
get_header( 'page' );
?>
	<!-- Service Details Section -->
	<section id="service-details" class="service-details section">
		<div class="container">
			<div class="row gy-4">
				<?php get_sidebar();?>
				<div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
					<?php
					if ( have_posts() ) : while ( have_posts() ) : the_post();
						?>
						<?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid services-img' ) ); ?>
						<h3><?php the_title();?></h3>
						<?php the_content();?>
					<?php
					endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
	</section>
	<!-- /Service Details Section -->
<?php
get_footer();