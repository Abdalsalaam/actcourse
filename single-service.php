<?php
/**
 * Single Service file.
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
                        <div>
							<?php
							$service_types = get_the_terms( get_the_ID(), 'service_type' );
							if ( $service_types || ! is_wp_error( $service_types ) ) {
								foreach ( $service_types as $service_type ) {
									echo '<a style="padding: 0 12px;" href="' . get_term_link( $service_type ) . '">' . $service_type->name . '</a>';
								}
							}
							?>
                        </div>
                        <h3><?php the_title();?></h3>
                        <strong>
                            <?php
                            $service_meta = get_post_meta( $post->ID );
                            echo 'Price : ' . esc_html( $service_meta['actcourse_service_price'][0] ) . '$';
                            ?>
                        </strong>
						<?php the_content(); ?>
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
