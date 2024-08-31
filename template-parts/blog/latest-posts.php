<?php
/**
 * Latest posts block.
 *
 */
?>
<!-- Services Section -->
<section id="services" class="services section">
	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>Blog</h2>
		<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
	</div><!-- End Section Title -->
</section><!-- /Services Section -->

<!-- Alt Services Section -->
<section id="alt-services" class="alt-services section">

	<div class="container" data-aos="fade-up" data-aos-delay="100">

		<div class="row gy-4">
			<?php
			$latest_posts = new WP_Query(
				array(
					'post_type'         => 'post',
					'post_status'       => 'publish',
					'posts_per_page'    => $args['posts_per_page'] ?? 4,
				)
			);

			if ( $latest_posts->have_posts() ) : while ( $latest_posts->have_posts() ) : $latest_posts->the_post();

				?>
				<div class="col-lg-6" data-aos="zoom-in" data-aos-delay="200">
					<div class="service-item position-relative">
						<div class="img">
							<?php
							the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-fluid' ) );
							?>
							<!--  <img src="assets/img/services-1.jpg" class="img-fluid" alt=""> -->
						</div>
						<div class="details">
							<a href="<?php the_permalink();?>" class="stretched-link">
								<h3><?php the_title();?></h3>
							</a>
							<p><?php the_excerpt();?></p>
						</div>
					</div>
				</div>
			<?php
			endwhile;
				wp_reset_postdata();
			endif;
			?>
		</div>
	</div>

</section><!-- /Alt Services Section -->