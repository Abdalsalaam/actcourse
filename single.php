<?php
/**
 * Single post.
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
                        $categories = get_the_category();
                        foreach ( $categories as $category ) {
                            echo '<a style="padding: 0 12px;" href="' . get_category_link( $category ) . '">' . $category->name . '</a>';
                        }
                        ?>
                    </div>
                        <h3><?php the_title();?></h3>
                        <?php the_content(); ?>
		                <?php
		                $tags = get_the_tags();
                        if ( $tags && ! is_wp_error( $tags ) ) {
	                        foreach ( $tags as $tag ) {
		                        echo '<a style="padding: 0 12px;" href="' . get_tag_link( $tag ) . '">' . $tag->name . '</a>';
	                        }
                        }
		                ?>
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
