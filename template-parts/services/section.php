<!-- Services Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>Services</h2>
		<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
	</div><!-- End Section Title -->

	<div class="container">
		<div class="row gy-4">
			<?php
			$service_query = new WP_Query(
				array(
					'post_type' => 'service',
					'post_status' => 'publish',
				)
			);
			if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post();
				?>
				<div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
					<div class="service-item position-relative">
						<i class="bi bi-activity"></i>
						<h4><a href="<?php the_permalink();?>" class="stretched-link"><?php the_title();?></a></h4>
						<p><?php the_excerpt();?></p>
					</div>
				</div><!-- End Service Item -->
			<?php
			endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>

</section><!-- /Services Section -->