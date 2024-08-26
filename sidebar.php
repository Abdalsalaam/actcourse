<?php
/**
 * Sidebar file.
 */
if ( 'service' === get_post_type() ) {
	dynamic_sidebar( 'services-side' );
} else {
	dynamic_sidebar();
}