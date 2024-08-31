<!-- Services Section -->
<section id="services" class="services section">

	<!-- Section Title -->
	<div class="container section-title" data-aos="fade-up">
		<h2>Services</h2>
		<p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
	</div><!-- End Section Title -->

	<div class="container">
		<div class="row gy-4 services-list">
			<?php
			$service_query = new WP_Query(
				array(
					'post_type'         => 'service',
					'post_status'       => 'publish',
                    'posts_per_page'    => $args['posts_per_page'] ?? 4,
                    'paged'             => 1,
				)
			);

			if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post();
				get_template_part( 'template-parts/services/service-content' );
			endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
        <div class="text-center">
            <?php
            actcourse_get_services_pagination();
            ?>
        </div>
	</div>

</section><!-- /Services Section -->