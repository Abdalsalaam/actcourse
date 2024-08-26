<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<!-- Fonts -->
	<?php wp_head();?>
</head>

<?php
$arg = array();

if ( is_front_page() ) {
    $arg['body-class'] = 'index-page';
}

get_template_part( 'template-parts/header', 'navbar', $arg );
//include 'template-parts/header/navbar.php';
?>

<main class="main">
    <?php
    if ( ! is_front_page() && ! is_home() ) {
	    get_template_part( 'template-parts/header', 'title' );
    }
?>