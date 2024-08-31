<?php
/**
 * Registers theme supported feature.
 *
 * @return void
 */
function actcourse_after_setup_theme() {
	add_theme_support( 'title-tag' );

	add_theme_support( 'custom-logo', array(
		'height'               => 36,
		'flex-height'          => true,
		'flex-width'           => true,
		'unlink-homepage-logo' => true,
	) );

	add_theme_support( 'post-thumbnails' );
}

add_action( 'after_setup_theme', 'actcourse_after_setup_theme' );

/**
 * Include theme assets.
 *
 * @return void
 */
function actcourse_include_assets() {
	// Include bootstrap css.
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/css/bootstrap.min.css', array(), '1.0' );
	wp_enqueue_style( 'bootstrap-icons', get_template_directory_uri() . '/assets/vendor/bootstrap-icons/bootstrap-icons.css', array(), '1.0' );
	wp_enqueue_style( 'aos-style', get_template_directory_uri() . '/assets/vendor/aos/aos.css', array(), '1.0' );
	wp_enqueue_style( 'glightbox-style', get_template_directory_uri() . '/assets/vendor/glightbox/css/glightbox.min.css', array(), '1.0' );
	wp_enqueue_style( 'swiper-style', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.css', array(), '1.0' );

	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/assets/css/main.css', array(), '1.2' );
	wp_enqueue_style( 'theme-style', get_stylesheet_uri(), array(), '1.2' );

	// Include JS files.
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/vendor/bootstrap/js/bootstrap.bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/vendor/aos/aos.js', array(), '1.0', true );
	wp_enqueue_script( 'glightbox', get_template_directory_uri() . '/assets/vendor/glightbox/js/glightbox.min.js', array(), '1.0', true );
	wp_enqueue_script( 'purecounter_vanilla', get_template_directory_uri() . '/assets/vendor/purecounter/purecounter_vanilla.js', array(), '1.0', true );
	wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/vendor/swiper/swiper-bundle.min.js', array(), '1.0', true );
	wp_enqueue_script( 'imagesloaded', get_template_directory_uri() . '/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js', array(), '1.0', true );
	wp_enqueue_script( 'isotope', get_template_directory_uri() . '/assets/vendor/isotope-layout/isotope.pkgd.min.js', array(), '1.0', true );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), '1.0', true );
	wp_enqueue_script( 'theme-functions', get_template_directory_uri() . '/assets/js/theme-functions.js', array( 'jquery' ),  	filemtime( get_template_directory() . '/assets/js/theme-functions.js' ), true );

    wp_localize_script( 'theme-functions', 'act_data', array(
            'act_ajax_url'   => admin_url( 'admin-ajax.php' ),
            'posts_per_page' => 8, // Todo: Add theme option.
            'texts'          => array(
                    'loading'        => __( 'Loading', 'actcourse' ),
                    'loadmore'       => __( 'Load More', 'actcourse' ),
                    'nomoreservices' => __( 'No more services', 'actcourse' ),
            ),
    ) );
}

add_action( 'wp_enqueue_scripts', 'actcourse_include_assets' );

/**
 * Register menus.
 *
 * @return void
 */
function actcourse_menu_register() {
	register_nav_menu( 'actcourse-header', __( 'Header menu', 'actcourse' ) );
}

add_action( 'init', 'actcourse_menu_register' );

/**
 * Register service post type.
 *
 * @return void
 */
function actcourse_create_services_post_type() {
	$labels = array(
		'name'               => __( 'Services', 'actcourse' ),
		'singular_name'      => __( 'Service', 'sima-law' ),
		'add_new'            => __( 'Add New', 'sima-law' ),
		'add_new_item'       => __( 'Add New Service', 'sima-law' ),
		'edit_item'          => __( 'Edit Service', 'sima-law' ),
		'new_item'           => __( 'New Service', 'sima-law' ),
		'view_item'          => __( 'View Service', 'sima-law' ),
		'search_items'       => __( 'Search Services', 'sima-law' ),
		'not_found'          => __( 'No services found.', 'sima-law' ),
		'not_found_in_trash' => __( 'No services found in Trash.', 'sima-law' ),
		'all_items'          => __( 'All Services', 'sima-law' ),
		'menu_name'          => __( 'Services', 'sima-law' ),
	);

	$args = array(
		'labels'      => $labels,
		'public'      => true,
		'has_archive' => true,
		'rewrite'     => array( 'slug' => 'services' ),
		'supports'    => array( 'title', 'editor', 'thumbnail' ),
		//'show_in_rest' => true,
	);

	register_post_type( 'service', $args );
}

add_action( 'init', 'actcourse_create_services_post_type', 10 );

/**
 * Register service taxonomies.
 */
function actcourse_register_taxonomy() {
	$args = array(
		'label'        => __( 'Services type', 'actcourse' ),
		'public'       => true,
		'hierarchical' => true,
	);

	register_taxonomy( 'service_type', 'service', $args );
}

add_action( 'init', 'actcourse_register_taxonomy' );

/**
 * Register sidebars.
 *
 * @return void
 */
function actcourse_widgets_init() {
	register_sidebar( array(
		'name'           => __( 'Primary Sidebar', 'actcourse' ),
		'id'             => 'sidebar-1',
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => '</aside>',
		'before_sidebar' => '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">',
		'after_sidebar'  => '</div>',
	) );

	register_sidebar( array(
		'name'           => __( 'Services Sidebar', 'actcourse' ),
		'id'             => 'services-side',
		'before_widget'  => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'   => '</aside>',
		'before_sidebar' => '<div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">',
		'after_sidebar'  => '</div>',
	) );
}

add_action( 'widgets_init', 'actcourse_widgets_init' );

/**
 * Modify excerpt length.
 *
 * @param int $length Excerpt length.
 *
 * @return int
 */
function actcourse_excerpt_length( $length ) {
	return 20;
}

add_filter( 'excerpt_length', 'actcourse_excerpt_length' );

/**
 * Register meta box for post.
 */
function actcourse_register_meta_box() {
	$screen = array(
		'service',
	);

	add_meta_box( 'service_custom_data', esc_html__( 'Service Data', 'actcourse' ), 'actcourse_service_data_box', $screen );
}

add_action( 'add_meta_boxes', 'actcourse_register_meta_box' );

function actcourse_service_data_box() {
    global $post;
    $service_price = get_post_meta( $post->ID, 'actcourse_service_price', true );
	?>
	<label for="service_price"><?php echo esc_html__( 'Price:', 'actcourse' );?></label>
	<input type="number" name="service_price" id="service_price" value="<?php echo $service_price ? intval( $service_price ) : 0 ;?>">
<?php
}

function actcourse_save_service_data( $post_id ) {
	if ( array_key_exists( 'service_price', $_POST ) ) {

		update_post_meta( $post_id, 'actcourse_service_price', sanitize_text_field( $_POST['service_price'] ) );
	}
}
add_action( 'save_post', 'actcourse_save_service_data' );

/**
 * Service data.
 */
function actcourse_get_service_data( int $service_id ) {
	$service_meta = get_post_meta( $service_id );

	return array(
		'price'    => $service_meta['actcourse_service_price'][0] ?? '',
		'features' => $service_meta['actcourse_service_features'] ?? array(),
	);
}

/**
 * Get services pagination
 */
function actcourse_get_services_pagination() {
	$pagination_type ='load_more'; // ToDO: Add theme option for pagination type;

    if ( 'pagination' === $pagination_type ) {
	    the_posts_pagination(
		    array(
			    'before_page_number' => '<span class="page-number">',
			    'after_page_number'  => '</span>',
		    )
	    );
    }

    if ( 'load_more' === $pagination_type ) {
        echo '<button id="load-more" data-paged="1">' . esc_html__( 'Load more', 'actcourse' ) . '</button>';
    }
}

function actcourse_load_more_services() {
	$service_query = new WP_Query(
		array(
			'post_type'         => 'service',
			'post_status'       => 'publish',
			'posts_per_page'    => $_POST['posts_per_page'],
			'paged'             => $_POST['page'],
		)
	);

	if ( $service_query->have_posts() ) : while ( $service_query->have_posts() ) : $service_query->the_post();
		get_template_part( 'template-parts/services/service-content' );
	endwhile;
    else:
        return '';
	endif;
	wp_reset_postdata();

    wp_die();
}
add_action( 'wp_ajax_actcourse_load_more_services', 'actcourse_load_more_services' );
