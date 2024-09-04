<?php
/**
 * Theme options functionality.
 */

/**
 * @param WP_Customize_Manager $wp_customize
 *
 * @return void
 */
function actcourse_customize_register( WP_Customize_Manager $wp_customize ) {
	$wp_customize->add_panel( 'actcourse_theme_options', array(
		'title'       => __( 'Act Theme Customization', 'actcourse' ),
		'description' => __( 'You can customize the theme from here!', 'actcourse' ),
		'priority'    => 40,
	) );

	// Add hero section.
	$wp_customize->add_section( 'hero_section', array(
		'title'       => __( 'Hero Section', 'actcourse' ),
		'description' => __( '....', 'actcourse' ),
		'panel'       => 'actcourse_theme_options',
	) );

	// Add main picture.
	$wp_customize->add_setting( 'actcourse_hero_section_photo', array(
		'type'      => 'theme_mod',
		'default'   => get_template_directory_uri() . '/assets/img/hero-img.png',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'actcourse_hero_section_photo', array(
		'label'    => __( 'Main picture', 'actcourse' ),
		'section'  => 'hero_section',
		'settings' => 'actcourse_hero_section_photo',
	) ) );

	// Add hero section title.
	$wp_customize->add_setting( 'actcourse_hero_section_title', array(
		'type'      => 'theme_mod',
		'default'   => 'Grow your business with Vesperr',

		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'actcourse_hero_section_title_control', array(
		'label'    => __( 'Section Title', 'actcourse' ),
		'description' => '..',
		'section'  => 'hero_section',
		'settings' => 'actcourse_hero_section_title',
	) );


	// Add contact section.
	$wp_customize->add_section( 'contact_section', array(
		'title'       => __( 'Contact us Section', 'actcourse' ),
		'panel'       => 'actcourse_theme_options',
	) );

	$wp_customize->add_setting( 'actcourse_contact_email', array(
		'type'      => 'theme_mod',
		'default'   => 'test@actit.ps',
		'transport' => 'refresh',
	) );

	$wp_customize->add_control( 'actcourse_contact_email_control', array(
		'label'    => __( 'Email', 'actcourse' ),
		'section'  => 'contact_section',
		'settings' => 'actcourse_contact_email',
	) );
}

add_action( 'customize_register', 'actcourse_customize_register' );
