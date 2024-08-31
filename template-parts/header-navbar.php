<body <?php body_class( $args['body-class'] ?? '' );?>>

<?php
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
?>

<header id="header" class="header d-flex align-items-center sticky-top">
	<div class="container-fluid container-xl position-relative d-flex align-items-center">
		<div class="logo d-flex align-items-center me-auto">
			<?php the_custom_logo(); ?>
		</div>

		<nav id="navmenu" class="navmenu">
            <?php
            wp_nav_menu( array( 'theme_location' => 'actcourse-header', 'container'      => '', ) );
            ?>
			<i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
		</nav>

		<a class="btn-getstarted" href="index.html#about">Get Started</a>

	</div>
</header>
